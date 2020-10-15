<?php

namespace App\Http\Controllers;

use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $repository;
    /**
     * @var ProductCategoryRepository
     */
    private $categories;

    public function __construct(ProductRepository $repository, ProductCategoryRepository $categories)
    {
        $this->repository = $repository;
        $this->categories = $categories;
    }

    public function index($category_id = null)
    {
        $scripts[] = '../../js/product.js';

        $route = 'products.index';

        $products = $category_id && $category_id > 0 ?
            $this->repository->findWhere(['active' => 1, 'category_id' => $category_id]) :
            $this->repository->findByField('active', 1);

        $categories = $this->categories->findByField('active', 1);

        foreach ($products as $product)
        {
            if($product->category_id)
                $product->category_name = $this->categories->findByField('id', $product->category_id)->first()->name;
            else
                $product->category_name = "Sem categoria";
        }


        return view('index', compact('route', 'scripts', 'products', 'categories'));
    }

    public function create()
    {
        $route = 'products.form';

        $edit = false;

        $scripts[] = '../../js/product.js';

        $categories = $this->categories->findByField('active', 1);

        /*foreach ($categories as $category)
            $category->name = $category->name == "CFTV" ? $category->name : ucfirst(strtolower($category->name));*/


        return view('index', compact('route', 'edit', 'scripts', 'categories'));
    }

    public function edit($id)
    {
        $route = 'products.form';

        $edit = true;

        $scripts[] = '../../js/product.js';

        $product = $this->repository->findByField('id', $id)->first();

        $categories = $this->categories->findByField('active', 1);

        if($product)
            return view('index', compact('route', 'edit', 'scripts', 'product', 'categories'));

        return abort(404);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if(isset($data['active']))
            $data['status'] = 1;
        else
            $data['status'] = 0;

        $data['active'] = 1;
        //$data['name'] = strtolower($data['name']);

        if($this->repository->findByField('name', $data['name'])->first())
        {
            $request->session()->flash('error.msg', "Este produto já existe");

            return redirect()->back();
        }

        DB::beginTransaction();

        try {

            $this->repository->create($data);

            DB::commit();

            $request->session()->flash('success.msg', 'O produto foi criado com sucesso');

        }catch (\Exception $e){
            DB::rollBack();

            $request->session()->flash('error.msg', 'Um erro ocorreu, tente novamente mais tarde');

            dd($e);
        }

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        if(isset($data['active']))
            $data['status'] = 1;
        else
            $data['status'] = 0;

        $data['active'] = 1;

        //$data['name'] = strtolower($data['name']);

        if(!$this->repository->findByField('id', $id)->first())
        {
            $request->session()->flash('error.msg', "Este produto não existe");

            return redirect()->back();
        }

        if($this->repository->findWhere(['name' => $data['name'], ['id', '<>', $id]])->first())
        {
            $request->session()->flash('error.msg', "Este produto já esta cadastrado");

            return redirect()->back();
        }

        DB::beginTransaction();

        try {

            $this->repository->update($data, $id);

            DB::commit();

            $request->session()->flash('success.msg', 'O produto foi alterado com sucesso');

        }catch (\Exception $e){
            DB::rollBack();

            $request->session()->flash('error.msg', 'Um erro ocorreu, tente novamente mais tarde');

            dd($e);
        }

        return redirect()->back();
    }

    public function delete($id)
    {
        $product = $this->repository->findByField('id', $id)->first();

        DB::beginTransaction();

        try {
            if($product)
            {
                $p['active'] = 0;

                $this->repository->update($p, $id);

                return json_encode(['status' => true]);
            }
            else
                return json_encode(['status' => false, 'msg' => 'Este produto não foi encontrado', 'code' => 404]);

        }catch (\Exception $e)
        {
            DB::rollBack();

            return json_encode(['status' => false, 'msg' => 'Houve um erro ao excluir este produto, tente novamente mais tarde']);
        }

    }

    public function activate($id)
    {
        $product = $this->repository->findByField('id', $id)->first();

        DB::beginTransaction();

        try {
            if($product)
            {
                $p['active'] = 1;

                $this->repository->update($p, $id);

                return json_encode(['status' => true]);
            }
            else
                return json_encode(['status' => false, 'msg' => 'Este produto não foi encontrado', 'code' => 404]);

        }catch (\Exception $e)
        {
            DB::rollBack();

            return json_encode(['status' => false, 'msg' => 'Houve um erro ao ativar este produto, tente novamente mais tarde']);
        }
    }

    public function deleted()
    {
        $scripts[] = '../../js/product.js';

        $route = 'products.index';

        $products = $this->repository->findByField('active', 0);

        $categories = $this->categories->findByField('active', 1);

        foreach ($products as $product)
        {
            if($product->category_id)
                $product->category_name = $this->categories->findByField('id', $product->category_id)->first()->name;
            else
                $product->category_name = "Sem categoria";
        }

        $deleted = true;

        return view('index', compact('route', 'scripts', 'products', 'categories', 'deleted'));
    }

    public function categories()
    {
        $categories = $this->categories->findByField('active', 1);

        $route = 'products.index_category';

        $scripts[] = '../../js/product.js';

        return view('index', compact('route', 'scripts', 'categories'));
    }

    public function create_category()
    {
        $edit = false;

        $scripts[] = '../../js/product.js';

        $route = 'products.form_category';

        return view('index', compact('route', 'scripts', 'edit'));
    }

    public function edit_category($id)
    {
        $edit = true;

        $scripts[] = '../../js/product.js';

        $category = $this->categories->findByField('id', $id)->first();

        $route = 'products.form_category';

        if($category)
            return view('index', compact('route', 'scripts', 'category', 'edit'));

        return abort(404);
    }

    public function store_category(Request $request)
    {
        $data = $request->all();

        if(isset($data['status']))
            $data['status'] = 1;
        else
            $data['status'] = 0;

       // $data['name'] = strtolower($data['name']);

        if($this->categories->findByField('name', $data['name'])->first())
        {
            $request->session()->flash('error.msg', "Esta categoria já existe");

            return redirect()->back();
        }

        DB::beginTransaction();

        try {

            $this->categories->create($data);

            DB::commit();

            $request->session()->flash('success.msg', 'A categoria foi criada com sucesso');

        }catch (\Exception $e)
        {
            DB::rollBack();

            $request->session()->flash('error.msg', 'Houve um erro ao gravar esta categoria, tente novamente mais tarde');

            dd($e);
        }

        return redirect()->back();
    }

    public function update_category(Request $request, $id)
    {
        $data = $request->all();

        if(isset($data['status']))
            $data['status'] = 1;
        else
            $data['status'] = 0;


        //$data['name'] = strtolower($data['name']);

        if(!$this->categories->findByField('id', $id)->first())
        {
            $request->session()->flash('error.msg', "Esta categoria não existe");

            return redirect()->back();
        }

        if($this->categories->findWhere(['name' => $data['name'], ['id', '<>', $id]])->first())
        {
            $request->session()->flash('error.msg', "Esta categoria já esta cadastrada");

            return redirect()->back();
        }

        DB::beginTransaction();

        try {

            $this->categories->update($data, $id);

            DB::commit();

            $request->session()->flash('success.msg', 'A categoria foi alterada com sucesso');

            return redirect()->route('product.index.category');

        }catch (\Exception $e)
        {
            DB::rollBack();

            $request->session()->flash('error.msg', 'Houve um erro ao alterar esta categoria, tente novamente mais tarde');

            dd($e);

            return redirect()->back();
        }


    }

    public function delete_category($id)
    {
        $category = $this->categories->findByField('id', $id)->first();

        DB::beginTransaction();

        try {
            if($category)
            {
                $c['active'] = 0;

                $this->categories->update($c, $id);

                DB::commit();

                return json_encode(['status' => true]);
            }
            else
                return json_encode(['status' => false, 'msg' => 'Esta categoria não foi encontrada', 'code' => 404]);

        }catch (\Exception $e)
        {
            DB::rollBack();

            return json_encode(['status' => false, 'msg' => 'Um erro ocorreu, tente novamente mais tarde']);
        }

    }
}















