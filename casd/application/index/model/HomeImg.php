<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/23
 * Time: 10:03
 */

namespace app\index\model;


class HomeImg extends BaseModel
{
    public function getHomeImgRes(){
        $result = self::select();
        foreach ($result as $k=>$v){
            if ($v['img_id']){
                $v['img_url'] = Images::where('id',$v['img_id'])->value('url');
            }else{
                $v['img_url'] = null;
            }
        }
        return $result;
    }
}