<?php
namespace App\Http\Controllers;

use App\Menu;

class NavController extends Controller{

    public $menu;
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function test(){
        dump($this->menu->getMenu());
    }

    public function start(){
        return view('layouts.start');
    }

}