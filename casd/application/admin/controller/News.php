<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/27
 * Time: 15:19
 */

namespace app\admin\controller;


class News extends Base
{
    //列表页渲染
    public function index(){
        return view('news');
    }
    //新增页渲染
    public function add(){
        $TagsM = new \app\admin\model\Tags();
        $tagsType = $TagsM->getTypeData(3);
        $this->assign('tagsType',$tagsType);
        return view();
    }

    //编辑页渲染
    public function edit($id){
        $NewsM = new \app\admin\model\News();
        $TagsM = new \app\admin\model\Tags();
        $tagType = $TagsM->getTypeData(3);
        $NewsData = $NewsM->getOneNewsData($id);
        //var_dump($NewsData);exit;
        $this->assign([
            'NewsData'=>$NewsData,
            'tagsType'=>$tagType
        ]);
        return view();
    }

    //添加
    public function addData(){
        if (request()->isPost()){
            $data = input('post.');
            $data['create_time']=strtotime($data['create_time']);
            $NewsM = new \app\admin\model\News();
            $validate = validate('news');
            if(!$validate->check($data)) {
                return $validate->getError();
            }

            $result = $NewsM->addNews($data);
            return $result;
        }
        return '非法请求';
    }

    //修改
    public function editData(){
        if (request()->isPost()){
            $data = input('post.');
            $data['create_time']=strtotime($data['create_time']);
            $NewsM = new \app\admin\model\News();
            $validate = validate('News');
            if(!$validate->check($data)) {
                return $validate->getError();
            }
            $result = $NewsM->modifyNewsData($data);

            return $result;

        }
        return '非法请求';
    }

    //列表展示
    public function getNewsList($page,$limit){
        $NewsM = new \app\admin\model\News();
        $result = $NewsM->getNewsData($page,$limit);
        if (!$result){
            return [
                'code'=>1,
                'msg'=> '当前没有数据',
            ];
        }
        return [
            'code'=>0,
            'msg'=> 'ok',
            'count'=> $result['count'],
            'data'=>$result['data']
        ];
    }

    //删除
    public function del($id){
        $NewsM = new \app\admin\model\News();
        $result = $NewsM->delNewsData($id);
        return $result;
    }

}