<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/24
 * Time: 9:36
 */

namespace app\index\model;


class Tags extends BaseModel
{
    public function getTags($category_id){
        $result = self::where('category_id',$category_id)->select();
        return $result;
    }

    //根据tag_id获取
    public function getTagsData($tag_id){
        $result = $this->where('id',$tag_id)->find();
        return $result;
    }

    //根据tag_id获取类型
    public function getTagsType($tag_id){
        $result = $this->where('id',$tag_id)->value('type');
        return $result;
    }

    //获取类型为新闻的tag以及所属文章
    public function getTypeNewsData(){
        $news = [];
        $NewsData = $this->where('type',3)->limit(2)->field('id,title,category_id')->select();
        $category_id=Category::getTypeNewsId($NewsData['0']['category_id']);
        foreach ($NewsData as $k=>$v){
            $news[] = News::where('tag_id',$v['id'])->field('id,title,create_time,tag_id')->order('id desc')->limit(4)->select();
        }
        return [
            'category_id'=>$category_id,
            'newsData'=>$NewsData,
            'data'=>$news
        ];
    }
}