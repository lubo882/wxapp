<?php
namespace App\Presenters;

use App\Menu;

class NavPresenter{
    public $menu;
    public $childField;
    public $config = [
        'item_no_child'=>'<li><a href="__URL__"><i class="__ICON__"></i> <span>__TITLE__</span></a></li>',
        'item_has_child'=>'<li class="treeview">
                    <a href="__URL__"><i class="__ICON__"></i> <span>__TITLE__</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                    __LIST__
                    </ul>
                </li>',
        'list_first_ul'=>'<ul class="sidebar-menu" data-widget="tree">__LIST__</ul>'
    ];

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function render(){
        $data = $this->menu->getMenu();
        $htmlbody = $this->makeHtmlBody($data);
        $html = $this->makeHtmlHead($htmlbody);
        return $html;
    }

    public function makeHtmlBody($data){
       $html = '';
        foreach($data as $key=>$value){
            if($value->_child){
                /** has_child */
                $list = $this->makeHtmlBody($value->_child);
                $arr1 = ['__TITLE__','__URL__','__ICON__','__LIST__'];
                $arr2 = [$value->title,$value->url,$value->icon,$list];
                $html .= str_replace($arr1,$arr2,$this->config['item_has_child']);
            }else{
                /** no_child */
                $arr1 = ['__TITLE__','__URL__','__ICON__'];
                $arr2 = [$value->title,$value->url,$value->icon];
                $html .= str_replace($arr1,$arr2,$this->config['item_no_child']);
            }
        }
        return $html;
    }

    public function makeHtmlHead($html){
        $replace_html = str_replace('__LIST__',$html,$this->config['list_first_ul']);
        return $replace_html;
    }



}