<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16
 * Time: 9:21
 */

namespace app\index\model;


class PictureList extends BaseModel
{

    //获取所有数据
    public function getPictureList($category_id){
       $result = $this->alias('a')->join('ca_images b','a.img_id=b.id')
           ->where('category_id',$category_id)->field('a.id,title,desc,b.url')->select();
       return $result;
    }


}