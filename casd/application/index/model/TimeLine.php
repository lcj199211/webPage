<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16
 * Time: 16:17
 */

namespace app\index\model;


class TimeLine extends BaseModel
{

    //获取所有数据并分页
    public function getTimeLine($category_id){
        $result = self::where('category_id',$category_id)->order('id desc')->select();
        return $result;
    }
}