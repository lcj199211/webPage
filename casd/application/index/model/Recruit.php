<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/27
 * Time: 16:58
 */

namespace app\index\model;


class Recruit extends BaseModel
{
    public function getRecruitData($tag_id){
        $result = self::where('tag_id',$tag_id)->order('id desc')->select();
        return $result;
    }
}