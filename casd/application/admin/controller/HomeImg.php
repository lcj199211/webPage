<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/22
 * Time: 9:07
 */

namespace app\admin\controller;


class HomeImg extends Base
{
    public function index(){
        $homeImgM = new \app\admin\model\HomeImg();
        $homeImgs = $homeImgM->getHomeData();
        $this->assign('homeImgs',$homeImgs);
        return view('home_img');
    }

    public function editData(){
        if (request()->isPost()){
            $data = input('post.');
            $HomeImgM = new \app\admin\model\HomeImg();
            $result = $HomeImgM->modifyHomeImgData($data);

            return $result;

        }
        return '非法请求';
    }


}