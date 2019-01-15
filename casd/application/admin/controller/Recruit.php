<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/27
 * Time: 15:19
 */

namespace app\admin\controller;


class Recruit extends Base
{
    //列表页渲染
    public function index(){
        return view('recruit');
    }
    //新增页渲染
    public function add(){
        $TagsM = new \app\admin\model\Tags();
        $TagsType = $TagsM->getTypeData(4);
        $this->assign('TagsType',$TagsType);
        return view();
    }

    //编辑页渲染
    public function edit($id){
        $RecruitM = new \app\admin\model\Recruit();
        $TagsM = new \app\admin\model\Tags();
        $RecruitType = $TagsM->getTypeData(4);
        $RecruitData = $RecruitM->getOneRecruitData($id);
        $this->assign([
            'RecruitData'=>$RecruitData,
            'RecruitType'=>$RecruitType
        ]);
        return view();
    }

    //添加
    public function addData(){
        if (request()->isPost()){
            $data = input('post.');
            $RecruitM = new \app\admin\model\Recruit();
            $validate = validate('Recruit');
            if(!$validate->check($data)) {
                return $validate->getError();
            }
            $result = $RecruitM->addRecruit($data);
            return $result;
        }
        return '非法请求';
    }

    //修改
    public function editData(){
        if (request()->isPost()){
            $data = input('post.');
            $RecruitM = new \app\admin\model\Recruit();
            $validate = validate('Recruit');
            if(!$validate->check($data)) {
                return $validate->getError();
            }
            $result = $RecruitM->modifyRecruitData($data);

            return $result;

        }
        return '非法请求';
    }

    //列表展示
    public function getRecruitList($page,$limit){
        $RecruitM = new \app\admin\model\Recruit();
        $result = $RecruitM->getRecruitData($page,$limit);
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
        $RecruitM = new \app\admin\model\Recruit();
        $result = $RecruitM->delRecruitData($id);
        return $result;
    }

}