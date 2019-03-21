<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model{
    public $config = [];
    public $data =[];

    public function getAllData(){
        $this->data = $this->all();
    }

    public function getConfig(){
        $this->config = config('nav');
    }

    protected function getMenuArray($pid = 0){
        $list = [];
        foreach($this->data as $key=>$value){
            if($value[$this->config['pid']] == $pid){
                $value[$this->config['child']]=$this->getMenuArray($value[$this->config['id']]);
                $list[] = $value;
            };
        }
        return $list;
    }

    public function getMenu($from=0){
        $this->getAllData();
        $this->getConfig();
        return $this->getMenuArray($from);
    }

    public function getChildField(){
        return $this->config['child'];
    }


}