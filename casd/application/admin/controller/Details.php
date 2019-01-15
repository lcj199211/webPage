<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/27
 * Time: 15:19
 */

namespace app\admin\controller;


class Details extends Base
{
    //列表页渲染
    public function index(){
        return view('details');
    }
    //新增页渲染
    public function add(){
        $TagsM = new \app\admin\model\Tags();
        $TagsType = $TagsM->getTypeData(1);
        $this->assign('TagsType',$TagsType);
        return view();
    }

    //编辑页渲染
    public function edit($id){
        $DetailsM = new \app\admin\model\Details();
        $TagsM = new \app\admin\model\Tags();
        $DetailsType = $TagsM->getTypeData(1);
        $DetailsData = $DetailsM->getOneDetailsData($id);
        $this->assign([
            'detailsData'=>$DetailsData,
            'detailsType'=>$DetailsType
        ]);
        return view();
    }

    //添加
    public function addData(){
        if (request()->isPost()){
            $data = input('post.');
            $DetailsM = new \app\admin\model\Details();
            $validate = validate('Details');
            if(!$validate->check($data)) {
                return $validate->getError();
            }
            $result = $DetailsM->addDetails($data);
            return $result;
        }
        return '非法请求';
    }

    //修改
    public function editData(){
        if (request()->isPost()){
            $data = input('post.');
            $DetailsM = new \app\admin\model\Details();
            $validate = validate('Details');
            if(!$validate->check($data)) {
                return $validate->getError();
            }
            //判断tag
            if ($data['currentTagId'] !== $data['tag_id']){
                if ($data['tag_id'] != 0) {
                    $result = $DetailsM->verificationTagsID($data['tag_id']);
                    if ($result['id']){
                        return [
                            'msg'=>'所选类型已存在单页，请更换所选栏目'
                        ];
                    }
                }
            }
            array_pop($data);
            $result = $DetailsM->modifyDetailsData($data);

            return $result;

        }
        return '非法请求';
    }

    //列表展示
    public function getDetails($page,$limit){
        $DetailsM = new \app\admin\model\Details();
        $result = $DetailsM->getDetailsData($page,$limit);
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
        $DetailsM = new \app\admin\model\Details();
        $result = $DetailsM->delDetailsData($id);
        return $result;
    }

}