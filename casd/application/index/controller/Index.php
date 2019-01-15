<?php
namespace app\index\controller;

use app\index\model\HomeImg;
use app\index\model\HomeText;
use app\index\model\Banner;
use app\index\model\Tags;

class Index extends Base
{
    public function index()
    {
        $bannerM = new Banner();
        $homeTextM = new HomeText();
        $homeImgM = new HomeImg();
        $newsM = new Tags();
        //var_dump($newsM->getTypeNewsData());exit;
        $this->assign([
            'bannerRes'=>$bannerM->getBanner(),
            'homeTextRes'=>$homeTextM->getHomeTextRes(),
            'homeImgRes'=>$homeImgM->getHomeImgRes(),
            'newsRes'=>$newsM->getTypeNewsData()
        ]);
        return view();
    }
}
