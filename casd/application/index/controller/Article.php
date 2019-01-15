<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/25
 * Time: 17:58
 */

namespace app\index\controller;


use app\index\model\News;
use app\index\model\Tags;

class Article extends Base
{
    public function index(){
        $data = input('get.');
        $newsM = new News();
        $tagsM = new Tags();
        $this->assign([
            'articleRes'=>$newsM->getNesDataPage($data),
            'tagsData'=>$tagsM->getTagsData($data['tags_id'])
        ]);
        return view('article');
    }
}