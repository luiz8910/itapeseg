<?php

namespace App\Http\Controllers;

use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SubCatChooseRepository;
use App\Repositories\SubCategoryRepository;
use App\Traits\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use Config;

    /**
     * @var ProductRepository
     */
    private $repository;
    /**
     * @var ProductCategoryRepository
     */
    private $categories;
    /**
     * @var SubCategoryRepository
     */
    private $subCategory;
    /**
     * @var SubCatChooseRepository
     */
    private $subCatChoose;

    public function __construct(ProductRepository $repository, ProductCategoryRepository $categories,
                                SubCategoryRepository $subCategory, SubCatChooseRepository $subCatChoose)
    {
        $this->repository = $repository;
        $this->categories = $categories;
        $this->subCategory = $subCategory;
        $this->subCatChoose = $subCatChoose;
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

        $sub = $this->subCategory->findWhere(['status' => 1, 'active' => 1]);

        /*foreach ($categories as $category)
            $category->name = $category->name == "CFTV" ? $category->name : ucfirst(strtolower($category->name));*/


        return view('index', compact('route', 'edit', 'scripts', 'categories', 'sub'));
    }

    public function edit($id)
    {
        $route = 'products.form';

        $edit = true;

        $scripts[] = '../../js/product.js';

        $product = $this->repository->findByField('id', $id)->first();

        $categories = $this->categories->findByField('active', 1);

        $sub = $this->subCategory->findWhere(['status' => 1, 'active' => 1]);

        $choose = $this->subCatChoose->findByField('product_id', $id);

        if($product)
            return view('index', compact('route', 'edit', 'scripts', 'product', 'categories', 'sub', 'choose'));

        return abort(404);
    }

    public function store(Request $request)
    {
        $data = $request->only(['name', 'code', 'brand', 'model', 'description', 'active', 'category_id', 'file']);

        $sub = $request->except(['name', 'code', 'brand', 'model', 'description', 'active', 'category_id', 'file']);

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
            $file = $request->file('file');

            if($file)
            {
                $path = $file->store('public/uploads');

                $data['picture'] = $path;
            }

            $id = $this->repository->create($data)->id;

            foreach (array_keys($sub) as $s)
            {
                $c['product_id'] = $id;
                $c['sub_id'] = $s;

                $this->subCatChoose->create($c);
            }


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
        $data = $request->only(['name', 'code', 'brand', 'model', 'description', 'active', 'category_id', 'file']);

        $sub = $request->except(['name', 'code', 'brand', 'model', 'description', 'active', 'category_id', '_method', 'file']);

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
            $file = $request->file('file');

            if($file)
            {
                $path = $file->store('public/uploads');

                $data['picture'] = $path;
            }

            $this->repository->update($data, $id);

            $choices = $this->subCatChoose->findByField('product_id', $id);

            foreach($choices as $choice)
                $this->subCatChoose->delete($choice->id);

            foreach (array_keys($sub) as $s)
            {
                $c['product_id'] = $id;
                $c['sub_id'] = $s;

                $this->subCatChoose->create($c);
            }

            DB::commit();

            $request->session()->flash('success.msg', 'O produto foi alterado com sucesso');

        }catch (\Exception $e){
            DB::rollBack();

            $request->session()->flash('error.msg', 'Um erro ocorreu, tente novamente mais tarde');

            dd($e);
        }

        return redirect()->route('product.index');
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

        //dd($data);

        if(isset($data['active']))
            $data['status'] = 1;
        else
            $data['status'] = 0;

        $data['active'] = 1;

        if($this->categories->findByField('name', $data['name'])->first())
        {
            $request->session()->flash('error.msg', "Esta categoria já existe");

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

        if(isset($data['active']))
            $data['status'] = 1;
        else
            $data['status'] = 0;

        $data['active'] = 1;

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

            $file = $request->file('file');

            if($file)
            {
                $path = $file->store('public/uploads');

                $data['picture'] = $path;
            }


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

    public function deleted_categories()
    {
        $scripts[] = '../../js/product.js';

        $route = 'products.index_category';

        $categories = $this->categories->findByField('active', 0);

        $deleted = true;

        return view('index', compact('route', 'scripts', 'categories', 'deleted'));
    }

    public function activate_category($id)
    {
        $category = $this->categories->findByField('id', $id)->first();

        DB::beginTransaction();

        try {
            if($category)
            {
                $p['active'] = 1;

                $this->categories->update($p, $id);

                return json_encode(['status' => true]);
            }
            else
                return json_encode(['status' => false, 'msg' => 'Esta categoria não foi encontrada', 'code' => 404]);

        }catch (\Exception $e)
        {
            DB::rollBack();

            return json_encode(['status' => false, 'msg' => 'Houve um erro ao ativar esta categoria, tente novamente mais tarde']);
            //return json_encode(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function categories_sub($category_id = null)
    {
        $sub = $category_id ?
            $this->subCategory->findWhere(['active' => 1, 'category_id' => $category_id]) :
            $this->subCategory->findByField('active', 1);

        $route = 'products.index_category_sub';

        $scripts[] = '../../js/product.js';

        $categories = $this->categories->findByField('active', 1);

        foreach ($sub as $s)
            $s->category_name = $this->categories->findByField('id', $s->category_id)->first()->name;

        return view('index', compact('route', 'scripts', 'sub', 'categories'));
    }

    public function create_category_sub()
    {
        $edit = false;

        $scripts[] = '../../js/product.js';

        $route = 'products.form_category_sub';

        $categories = $this->categories->findByField('active', 1);

        return view('index', compact('route', 'scripts', 'edit', 'categories'));
    }

    public function edit_category_sub($id)
    {
        $edit = true;

        $scripts[] = '../../js/product.js';

        $sub = $this->subCategory->findByField('id', $id)->first();

        $route = 'products.form_category_sub';

        $categories = $this->categories->findByField('active', 1);

        if($sub)
            return view('index', compact('route', 'scripts', 'sub', 'edit', 'categories'));

        return abort(404);
    }

    public function store_category_sub(Request $request)
    {
        $data = $request->all();

        if(isset($data['active']))
            $data['status'] = 1;
        else
            $data['status'] = 0;

        $data['active'] = 1;

        if($this->subCategory->findByField('name', $data['name'])->first())
        {
            $request->session()->flash('error.msg', "Esta subcategoria já existe");

            return redirect()->back();
        }

        DB::beginTransaction();

        try {

            $this->subCategory->create($data);

            DB::commit();

            $request->session()->flash('success.msg', 'A subcategoria foi criada com sucesso');

        }catch (\Exception $e)
        {
            DB::rollBack();

            $request->session()->flash('error.msg', 'Houve um erro ao gravar esta subcategoria, tente novamente mais tarde');

            dd($e);
        }

        return redirect()->back();
    }

    public function update_category_sub(Request $request, $id)
    {
        $data = $request->all();

        if(isset($data['active']))
            $data['status'] = 1;
        else
            $data['status'] = 0;


        $data['active'] = 1;

        if(!$this->subCategory->findByField('id', $id)->first())
        {
            $request->session()->flash('error.msg', "Esta subcategoria não existe");

            return redirect()->back();
        }

        if($this->subCategory->findWhere(['name' => $data['name'], ['id', '<>', $id]])->first())
        {
            $request->session()->flash('error.msg', "Esta subcategoria já esta cadastrada");

            return redirect()->back();
        }

        DB::beginTransaction();

        try {

            $this->subCategory->update($data, $id);

            DB::commit();

            $request->session()->flash('success.msg', 'A subcategoria foi alterada com sucesso');

            return redirect()->route('product.index.category.sub');

        }catch (\Exception $e)
        {
            DB::rollBack();

            $request->session()->flash('error.msg', 'Houve um erro ao alterar esta subcategoria, tente novamente mais tarde');

            dd($e);

            return redirect()->back();
        }


    }

    public function delete_category_sub($id)
    {
        $category = $this->subCategory->findByField('id', $id)->first();

        DB::beginTransaction();

        try {
            if($category)
            {
                $c['active'] = 0;

                $this->subCategory->update($c, $id);

                DB::commit();

                return json_encode(['status' => true]);
            }
            else
                return json_encode(['status' => false, 'msg' => 'Esta subcategoria não foi encontrada', 'code' => 404]);

        }catch (\Exception $e)
        {
            DB::rollBack();

            return json_encode(['status' => false, 'msg' => 'Um erro ocorreu, tente novamente mais tarde']);
        }

    }

    public function deleted_categories_sub()
    {
        $scripts[] = '../../js/product.js';

        $route = 'products.index_category_sub';

        $sub = $this->subCategory->findByField('active', 0);

        foreach($sub as $s)
            $s->category_name = $this->categories->findByField('id', $s->category_id)->first()->name;

        $deleted = true;

        $categories = $this->categories->findByField('active', 1);

        return view('index', compact('route', 'scripts', 'sub', 'deleted', 'categories'));
    }

    public function activate_category_sub($id)
    {
        $sub = $this->subCategory->findByField('id', $id)->first();

        DB::beginTransaction();

        try {
            if($sub)
            {
                $p['active'] = 1;

                $this->subCategory->update($p, $id);

                return json_encode(['status' => true]);
            }
            else
                return json_encode(['status' => false, 'msg' => 'Esta subcategoria não foi encontrada', 'code' => 404]);

        }catch (\Exception $e)
        {
            DB::rollBack();

            dd($e);
            return json_encode(['status' => false, 'msg' => 'Houve um erro ao ativar esta subcategoria, tente novamente mais tarde']);
        }
    }

    public function catalogo()
    {
        $categories = $this->categories->findByField('active', 1);

        return view('catalogo.index', compact('categories'));
    }

    public function catalogo_products($category_id)
    {
        $category = $this->categories->findByField('id', $category_id)->first();

        if($category)
        {
            $sub = $this->subCategory->findByField('category_id', $category_id);

            $products = $this->repository->findByField('category_id', $category_id);

            foreach ($products as $product)
            {
                $product->choose = $this->subCatChoose->findByField('product_id', $product->id);
                //dd($product);
            }



            return view('catalogo.product', compact('category', 'sub', 'products'));
        }


    }
}















