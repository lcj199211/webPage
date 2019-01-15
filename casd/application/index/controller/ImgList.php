<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/26
 * Time: 16:30
 */

namespace app\index\controller;


use app\index\model\PictureList;

class ImgList extends Base
{
    public function index($category_id){
        $pictureM = new PictureList();
        $this->assign([
            'pictureRes'=>$pictureM->getPictureList($category_id)
        ]);
        return view('img_list');
    }
}