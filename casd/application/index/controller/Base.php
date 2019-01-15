<?php
namespace app\index\controller;
use app\index\model\Category;
use app\index\model\Tags;
use think\Controller;

class Base extends Controller
{
    public function _initialize()
    {
        $categoryRes = model('Category')->getCategory();//渲染栏目
        $systems = model('System')->find(1);//渲染系统设置
        $tagsM = new Tags();
        //当前位置
        if(input('category_id')){
            $this->getCategoryPos(input('category_id'));//导航当前位置

        }
        //var_dump(input('category_id'));exit;
        $this->assign([
            'categoryRes'=>$categoryRes,
            'systems'=>$systems,
            'category_id'=>input('category_id'),//输出栏目id
            'tag_id'=>input('tags_id'),
            'tag_type'=>$tagsM->getTagsType(input('tags_id')),
            'category_type'=>model('Category')->getCategoryType(input('category_id'))
        ]);
    }

    public function getCategoryPos($category_id){
        $categoryM = new Category();
        $result = $categoryM->getCategoryData($category_id);

        $this->assign('categoryPos',$result);
        //var_dump($result);exit();
    }

}
