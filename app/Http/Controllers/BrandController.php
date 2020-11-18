<?php

namespace App\Http\Controllers;

use App\Repositories\BrandRepository;
use App\Repositories\BrandSegmentRepository;
use App\Repositories\SegBrandChoosesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    /**
     * @var BrandRepository
     */
    private $repository;
    /**
     * @var BrandSegmentRepository
     */
    private $segments;
    /**
     * @var SegBrandChoosesRepository
     */
    private $segBrand;

    public function __construct(BrandRepository $repository, BrandSegmentRepository $segments, SegBrandChoosesRepository $segBrand)
    {
        $this->repository = $repository;
        $this->segments = $segments;
        $this->segBrand = $segBrand;
    }

    public function index($orderBy = null, $status = null)
    {
        $route = 'brands.index';
        $scripts[] = '../../js/brands.js';


        if(is_numeric($orderBy)){
            $ids = $this->segBrand->findByField('segment_id', $orderBy);

            foreach ($ids as $id)
                $array[] = $id->brand_id;

            $brands = $this->repository->findWhereIn('id', $array);

        }elseif($status)

            $brands = $this->repository->findWhere([
                'active' => 1,
                'status' => $status == 'disponivel' ? 1 : 0
            ]);
        else
        {
            $brands = $this->repository->findByField('active', 1);
            $orderBy = $status = null;
        }


        $segments = $this->segments->findByField('active', 1);

        foreach ($brands as $brand) {
            $brand->segments = $this->segBrand->findByField('brand_id', $brand->id);

            foreach ($brand->segments as $s)
                $s->name = $this->segments->findByField('id', $s->segment_id)->first() ?
                    $this->segments->findByField('id', $s->segment_id)->first()->name : 'Segmento Desconhecido';

        }


        return view('index', compact('route', 'brands', 'segments', 'scripts', 'orderBy', 'status'));
    }

    public function create()
    {
        $edit = false;

        $route = 'brands.form';

        $segments = $this->segments->orderBy('name')->all();

        return view('index', compact('edit', 'route', 'segments'));
    }

    public function edit($id)
    {
        $edit = true;

        $route = 'brands.form';

        $segments = $this->segments->orderBy('name')->all();

        $brand = $this->repository->findByField('id', $id)->first();

        if($brand) {

            $selected_seg = $this->segBrand->findByField('brand_id', $brand->id);

            return view('index', compact('edit', 'route', 'segments', 'brand', 'selected_seg'));
        }
        return abort(404);
    }

    public function store(Request $request)
    {
        $data = $request->only(['name', 'active', 'inactive', 'file']);

        $sub = $request->except(['name', 'active', 'inactive', 'file']);

        if(isset($data['active']))
            $data['status'] = 1;
        else
            $data['status'] = 0;

        $data['active'] = 1;
        //$data['name'] = strtolower($data['name']);

        if($this->repository->findByField('name', $data['name'])->first())
        {
            $request->session()->flash('error.msg', "Esta marca já existe");

            return redirect()->back();
        }


        DB::beginTransaction();

        try {
            $file = $request->file('file');

            if($file)
            {
                $path = $file->store('public/uploads');

                $data['picture'] = $path;
            }

            $id = $this->repository->create($data)->id;

            foreach (array_keys($sub) as $s)
            {
                $c['brand_id'] = $id;
                $c['segment_id'] = $s;

                $this->segBrand->create($c);
            }


            DB::commit();

            $request->session()->flash('success.msg', 'A marca foi criada com sucesso');

            return redirect()->route('brand.index');

        }catch (\Exception $e)
        {
            DB::rollBack();

            $request->session()->flash('error.msg', 'Um erro ocorreu, tente novamente mais tarde');

            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['name', 'active', 'inactive', 'file']);

        $sub = $request->except(['name', 'active', 'inactive', 'file', '_method']);

        if(isset($data['active']))
            $data['status'] = 1;
        else
            $data['status'] = 0;

        $data['active'] = 1;
        //$data['name'] = strtolower($data['name']);

        if(!$this->repository->findByField('id', $id)->first())
        {
            $request->session()->flash('error.msg', "Esta marca não existe");

            return redirect()->back();
        }

        if($this->repository->findWhere(['name' => $data['name'], ['id', '<>', $id]])->first())
        {
            $request->session()->flash('error.msg', "Este marca já esta cadastrada");

            return redirect()->back();
        }


        DB::beginTransaction();

        try {
            $file = $request->file('file');

            if($file)
            {
                $path = $file->store('public/uploads');

                $data['picture'] = $path;
            }

            $this->repository->update($data, $id);

            $choices = $this->segBrand->findByField('brand_id', $id);

            foreach($choices as $choice)
                $this->segBrand->delete($choice->id);

            foreach (array_keys($sub) as $s)
            {
                $c['brand_id'] = $id;
                $c['segment_id'] = $s;

                $this->segBrand->create($c);
            }


            DB::commit();

            $request->session()->flash('success.msg', 'A marca foi alterada com sucesso');

            return redirect()->route('brand.index');

        }catch (\Exception $e)
        {
            DB::rollBack();

            $request->session()->flash('error.msg', 'Um erro ocorreu, tente novamente mais tarde');

            dd($e->getMessage());
            //return redirect()->back();
        }
    }

    public function delete($id)
    {
        $brand = $this->repository->findByField('id', $id)->first();

        if($brand)
        {
            DB::beginTransaction();

            try {
                $choices = $this->segBrand->findByField('brand_id', $id);

                foreach($choices as $choice)
                    $this->segBrand->delete($choice->id);

                $x['active'] = 0;

                $this->repository->update($x, $id);

                DB::commit();

                return json_encode(['status' => true]);

            }catch (\Exception $e)
            {
                DB::rollBack();

                dd($e->getMessage());

                return json_encode(['status' => false, 'msg' => 'Houve um erro, tente novamente mais tarde']);
            }
        }

        return json_encode(['status' => false, 'msg' => 'Marca não encontrada']);
    }

    public function index_segment()
    {
        $segments = $this->segments->findByField('active', 1);

        foreach ($segments as $segment)
            $segment->count = count($this->segBrand->findByField('segment_id', $segment->id));

        $route = 'brands.index_segment';

        return view('index', compact('segments', 'route'));
    }

    public function create_segment()
    {
        $edit = false;

        $route = 'brands.form_segment';

        return view('index', compact('edit', 'route'));
    }

    public function edit_segment($id)
    {
        $edit = true;

        $route = 'brands.form_segment';

        $segment = $this->segments->findByField('id', $id)->first();

        if($segment)
            return view('index', compact('edit', 'route', 'segment'));

        return abort(404);
    }

    public function store_segment(Request $request)
    {
        $data = $request->all();

        if(isset($data['active']))
            $data['status'] = 1;
        else
            $data['status'] = 0;

        $data['active'] = 1;

        if($this->segments->findByField('name', $data['name'])->first())
        {
            $request->session()->flash('error.msg', "Este segmento já existe");

            return redirect()->back();
        }

        DB::beginTransaction();

        try {

            $this->segments->create($data);

            DB::commit();

            $request->session()->flash('success.msg', 'O Segmento foi criado com sucesso');

        }catch (\Exception $e)
        {
            DB::rollBack();

            $request->session()->flash('error.msg', 'Houve um erro ao gravar este segmento, tente novamente mais tarde');

            dd($e);
        }

        return redirect()->route('brand.index.segment');
    }

    public function update_segment(Request $request, $id)
    {
        $data = $request->all();

        if(isset($data['active']))
            $data['status'] = 1;
        else
            $data['status'] = 0;

        $data['active'] = 1;

        if(!$this->segments->findByField('name', $data['name'])->first())
        {
            $request->session()->flash('error.msg', "Este segmento não existe");

            return redirect()->back();
        }

        if($this->segments->findWhere(['name' => $data['name'], ['id', '<>', $id]])->first())
        {
            $request->session()->flash('error.msg', "Este segmento já existe");

            return redirect()->back();
        }

        DB::beginTransaction();

        try {

            $this->segments->update($data, $id);

            DB::commit();

            $request->session()->flash('success.msg', 'O Segmento foi alterado com sucesso');

        }catch (\Exception $e)
        {
            DB::rollBack();

            $request->session()->flash('error.msg', 'Houve um erro ao gravar este segmento, tente novamente mais tarde');

            dd($e);
        }

        return redirect()->route('brand.index.segment');
    }

    public function delete_segment($id)
    {
        $segment = $this->segments->findByField('id', $id)->first();

        if($segment)
        {
            DB::beginTransaction();

            try {
                $choices = $this->segBrand->findByField('segment_id', $id);

                foreach($choices as $choice)
                    $this->segBrand->delete($choice->id);

                $x['active'] = 0;

                $this->repository->update($x, $id);

                DB::commit();

                return json_encode(['status' => true]);

            }catch (\Exception $e)
            {
                DB::rollBack();

                dd($e->getMessage());

                return json_encode(['status' => false, 'msg' => 'Houve um erro, tente novamente mais tarde']);
            }
        }

        return json_encode(['status' => false, 'msg' => 'Segmento não encontrado']);
    }

}



















