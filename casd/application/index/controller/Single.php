<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/23
 * Time: 10:40
 */

namespace app\index\controller;


class Single extends Base
{
    public function index($category_id){
        $singleM = new \app\index\model\Single();
        $this->assign([
           'singles'=>$singleM->getSingle($category_id)
        ]);
        return view('single');
    }
}