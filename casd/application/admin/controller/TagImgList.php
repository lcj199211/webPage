<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/11
 * Time: 10:04
 */

namespace app\admin\controller;


class TagImgList extends Base
{
    public function index(){

        return view('imgList');
    }

    public function add(){
        $TagsM = new \app\admin\model\Tags();
        $Type = $TagsM->getTypeData(2);
        $this->assign('Type',$Type);
        return view();
    }

    //编辑页渲染
    public function edit($id){
        $TagImglistM = new \app\admin\model\TagImglist();
        $TagsM = new \app\admin\model\Tags();
        $Type = $TagsM->getTypeData(2);
        $TagImglistData = $TagImglistM->getTagImglistData($id);
        //var_dump($TagImglistData);
        $this->assign([
            'TagImglistData'=>$TagImglistData,
            'Type'=>$Type
        ]);
        return view();
    }

    //添加
    public function addData(){
        if (request()->isPost()){
            $data = input('post.');
            $TagImglistM = new \app\admin\model\TagImglist();
            $validate = validate('TagImglist');
            if(!$validate->check($data)) {
                return $validate->getError();
            }
            $result = $TagImglistM->addTagImglistRes($data);
            return $result;
        }
        return '非法请求';
    }

    //列表展示
    public function getTagImgList($page,$limit){
        $TagImglistM = new \app\admin\model\TagImglist();
        $result = $TagImglistM->getTagImgList($page,$limit);
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
            $TagImglistM = new \app\admin\model\TagImglist();
            $validate = validate('TagImglist');
            if(!$validate->check($data)) {
                return $validate->getError();
            }
            $result = $TagImglistM->modifyTagImglistData($data);
            return $result;

        }
        return '非法请求';
    }
    //删除
    public function del($id){
        $TagImglistM = new \app\admin\model\TagImglist();
        $result = $TagImglistM->delTagImglistData($id);
        return $result;
    }



}