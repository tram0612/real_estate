<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use DB;
class Select extends AbstractWidget
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
        $cats=DB::table('cat')->get();

        return view('widgets.select', [
            'config' => $this->config,
            'cats'  => $cats,
        ]);
    }
}
