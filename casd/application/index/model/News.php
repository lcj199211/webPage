<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/27
 * Time: 16:58
 */

namespace app\index\model;


class News extends BaseModel
{
    public $createTime = false;
    public function getNewsData($tag_id){

        $result = $this->where('tag_id',$tag_id)->order('id desc')->select();

        foreach ($result as $k=>$v){
            $v['time'] = $v['create_time'];
            $v['time'] = strtotime($v['time']);
            if($v['img_id'] != 0){
                $v['url'] = Images::where('id',$v['img_id'])->value('url');
            }else{
                $v['url'] = null;
            }
        }
        return $result;

    }
    //根据文章id获取当前数据并获取上一页下一页数据
    public function getNesDataPage($data){
        $this->where('id',$data['article_id'])->setInc('click');//增加阅读量
        $article = $this->where('id',$data['article_id'])->find();
        $articlePrevious = $this->where('id','<',$data['article_id'])
            ->where('tag_id',$data['tags_id'])->field('id,title,tag_id')->order('id desc')->find();
        $articleNext = $this->where('id','>',$data['article_id'])
            ->where('tag_id',$data['tags_id'])->field('id,title,tag_id')->order('id asc')->find();
        return [
            'article'=>$article,
            'articlePrevious'=>$articlePrevious,
            'articleNext'=>$articleNext
        ];
    }
}
