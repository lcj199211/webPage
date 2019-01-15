<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/26
 * Time: 17:29
 */

namespace app\index\controller;


use app\index\model\TimeLine;

class Course extends Base
{
    public function index($category_id){
        $TimeLineM= new TimeLine();
        $this->assign('timeLineRes',$TimeLineM->getTimeLine($category_id));
        return view('course');
    }
}