<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/11
 * Time: 10:04
 */

namespace app\admin\controller;


class PictureList extends Base
{
    public function index(){

        return view('pictureList');
    }

    public function add(){
        $categoryM = new \app\admin\model\Category();
        $Type = $categoryM->getTypeData(3);
        $this->assign('Type',$Type);
        return view();
    }

    //编辑页渲染
    public function edit($id){
        $pictureListM = new \app\admin\model\PictureList();
        $categoryM = new \app\admin\model\Category();
        $Type = $categoryM->getTypeData(3);
        $pictureListData = $pictureListM->getPictureListData($id);
        //var_dump($pictureListData);
        $this->assign([
            'pictureListData'=>$pictureListData,
            'Type'=>$Type
        ]);
        return view();
    }

    //添加
    public function addData(){
        if (request()->isPost()){
            $data = input('post.');
            $pictureListM = new \app\admin\model\PictureList();
            $validate = validate('PictureList');
            if(!$validate->check($data)) {
                return $validate->getError();
            }
            $result = $pictureListM->addPictureRes($data);
            return $result;
        }
        return '非法请求';
    }

    //列表展示
    public function getPictureList($page,$limit){
        $PictureListM = new \app\admin\model\PictureList();
        $result = $PictureListM->getPictureList($page,$limit);
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
            $PictureListM = new \app\admin\model\PictureList();
            // $validate = validate('PictureList');
            // if(!$validate->check($data)) {
            //     return $validate->getError();
            // }

            $result = $PictureListM->modifyPictureListData($data);

            return $result;

        }
        return '非法请求';
    }
    //删除
    public function del($id){
        $PictureListM = new \app\admin\model\PictureList();
        $result = $PictureListM->delPictureListData($id);
        return $result;
    }



}