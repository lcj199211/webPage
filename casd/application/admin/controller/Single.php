<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/27
 * Time: 15:19
 */

namespace app\admin\controller;


class Single extends Base
{
    //列表页渲染
    public function index(){
        return view('single');
    }
    //新增页渲染
    public function add(){
        $categoryM = new \app\admin\model\Category();
        $singleType = $categoryM->getTypeData(1);
        $this->assign('singleType',$singleType);
        return view();
    }

    //编辑页渲染
    public function edit($id){
        $singleM = new \app\admin\model\Single();
        $categoryM = new \app\admin\model\Category();
        $singleType = $categoryM->getTypeData(1);
        $singleData = $singleM->getOneSingleData($id);
        $this->assign([
            'singleData'=>$singleData,
            'singleType'=>$singleType
        ]);
        return view();
    }

    //添加
    public function addData(){
        if (request()->isPost()){
            $data = input('post.');
            $singleM = new \app\admin\model\Single();
            $validate = validate('single');
            if(!$validate->check($data)) {
                return $validate->getError();
            }
            if ($data['category_id'] != 0) {
                $result = $singleM->verificationCategoryID($data['category_id']);
                if ($result){
                    return '所选栏目已存在单页，请更换所选栏目';
                }
            }
            $result = $singleM->addSingle($data);
            return $result;
        }
        return '非法请求';
    }

    //修改
    public function editData(){
        if (request()->isPost()){
            $data = input('post.');
            $singleM = new \app\admin\model\Single();
            //新增图片
//            if (array_key_exists('imgs',$data)){
//                $this->addImgs($data['imgs']);
//                array_pop($data);
//            }
            //判断栏目单页
            if ($data['currentCategoryId'] !== $data['category_id']){
                if ($data['category_id'] != 0) {
                    $result = $singleM->verificationCategoryID($data['category_id']);
                    if ($result['id']){
                        return [
                            'msg'=>'所选栏目已存在单页，请更换所选栏目'
                        ];
                    }
                }
            }
            array_pop($data);
            $result = $singleM->modifySingleData($data);

            return $result;

        }
        return '非法请求';
    }

    //列表展示
    public function getSingleList($page,$limit){
        $singleM = new \app\admin\model\Single();
        $result = $singleM->getSingleData($page,$limit);
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
        $singleM = new \app\admin\model\Single();
        $result = $singleM->delSingleData($id);
        return $result;
    }

}