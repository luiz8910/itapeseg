<?php

namespace App\Http\Controllers;


use App\Repositories\MenuRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    /**
     * @var MenuRepository
     */
    private $menu;

    public function __construct(MenuRepository $menu)
    {
        $this->menu = $menu;
    }

    public function reorder_menu()
    {
        $route = 'menu.index';

        $scripts[] = '../../js/menu.js';

        $menu = $this->menu->orderBy('order')->all();

        return view('index', compact('route', 'scripts', 'menu'));
    }

    public function reorder(Request $request)
    {
        $order = json_decode($request->get('order'));

        DB::beginTransaction();

        try {

            for ($i = 0; $i < count($order); $i++)
            {
                $x['order'] = $i;

                $this->menu->update($x, $order[$i]->id);
            }

            DB::commit();

            return json_encode(['status' => true]);

        }catch (\Exception $e){
            DB::rollBack();

            return json_encode(['status' => false, 'msg' => $e->getMessage()]);
        }


    }

    public function home()
    {
        $menus = $this->menu->orderBy('order')->all();

        return view('welcome', compact('menus'));
    }
}
