<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17
 * Time: 11:07
 */

namespace app\admin\controller;

use app\admin\model\Category as CategoryModel;

class Tags extends Base
{

    public function index(){
        return view('tags');
    }

    public function add(){
        $categoryM = new CategoryModel();
        $Type = $categoryM->getTypeData(2);
        $this->assign('Type',$Type);
        return view();
    }


    //编辑页渲染
    public function edit($id){
        $TagsM = new \app\admin\model\Tags();
        $categoryM = new CategoryModel();
        $Type = $categoryM->getTypeData(2);
        $TagsData = $TagsM->getTagsData($id);
        //var_dump($TagsData);
        $this->assign([
            'TagsData'=>$TagsData,
            'Type'=>$Type
        ]);
        return view();
    }

    //添加
    public function addData(){
        if (request()->isPost()){
            $data = input('post.');
            $TagsM = new \app\admin\model\Tags();
            $validate = validate('Tags');
            if(!$validate->check($data)) {
                return $validate->getError();
            }
            $result = $TagsM->addTagsRes($data);
            return $result;
        }
        return '非法请求';
    }

    //列表展示
    public function getTags($page,$limit){
        $TagsM = new \app\admin\model\Tags();
        $result = $TagsM->getTags($page,$limit);
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
    //修改
    public function editData(){
        if (request()->isPost()){
            $data = input('post.');
            $TagsM = new \app\admin\model\Tags();
            $validate = validate('Tags');
            if(!$validate->check($data)) {
                return $validate->getError();
            }

            $result = $TagsM->modifyTagsData($data);

            return $result;

        }
        return '非法请求';
    }
    //删除
    public function del($id){
        $TagsM = new \app\admin\model\Tags();
        $result = $TagsM->delTagsData($id);
        return $result;
    }

}