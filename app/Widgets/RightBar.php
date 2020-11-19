<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Model\NewsModel;
class RightBar extends AbstractWidget
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
        $item = new NewsModel();
        $new=$item->getNewItems();
        $hot=$item->getHotItems();
        return view('widgets.right_bar', [
            'config' => $this->config,
            'new' => $new,
            'hot' => $hot,
        ]);
    }
}
