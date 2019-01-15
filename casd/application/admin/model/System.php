<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/22
 * Time: 16:34
 */

namespace app\admin\model;


class System extends BaseModel
{

    //修改单页

    public function modifySystemData($data){
        $result = self::save($data,['id'=>$data['id']]);
        return $result;
    }

}