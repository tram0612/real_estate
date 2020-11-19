<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Model\CatModel;
class Menu extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $cat = new CatModel();
        $menu = $cat->getItems();
        $menu = $menu->toArray();
        //dd($menu);
        return view('widgets.menu', [
            'config' => $this->config,
            'menu'=> $menu,
        ]);
    }
}
