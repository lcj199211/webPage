<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16
 * Time: 9:21
 */

namespace app\index\model;


class TagImglist extends BaseModel
{

    //根据当前id获取数据
    public function getTagImglistData($tag_id){
        $arr = [];
        $result = $this->alias('a')->join('ca_images b','a.img_id=b.id')->where('tag_id',$tag_id)
            ->field('a.id,tag_id,url,title,desc,type')->select();
        if (!$result){
            return $arr['0']['type']=0;
        }
        return $result;
    }


}