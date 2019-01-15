<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/23
 * Time: 11:38
 */

namespace app\index\model;


class Single extends BaseModel
{
    public function getSingle($category_id){
        $result = self::where('category_id',$category_id)->find();
        return $result;
    }
}