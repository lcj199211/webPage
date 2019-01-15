<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/24
 * Time: 14:17
 */

namespace app\index\model;


class Details extends BaseModel
{
    //获取详情页数据
    public function getDetailsData($tag_id){
        $result = $this->where('tag_id',$tag_id)->find();
        return $result;
    }
}