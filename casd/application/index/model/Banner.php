<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/22
 * Time: 17:31
 */

namespace app\index\model;


class Banner extends BaseModel
{
    public function getBanner(){
       $result = self::alias('a')->join('ca_images b','a.img_id=b.id')
           ->field('a.title,a.link,b.url')->order('a.id asc')->select();
       return $result;
    }
}