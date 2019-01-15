<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16
 * Time: 9:21
 */

namespace app\index\model;


class HomeText extends BaseModel
{
    public function getHomeTextRes(){
        $result = $this->alias('a')->join('ca_images b','a.img_id=b.id')
            ->select();
        return $result;
    }


}