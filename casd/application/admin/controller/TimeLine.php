<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16
 * Time: 16:14
 */

namespace app\admin\controller;
use app\admin\model\TimeLine as TimeLineModel;

class TimeLine extends Base
{
    public function index(){
        return view('TimeLine');
    }

    public function add(){
        $categoryM = new \app\admin\model\Category();
        $Type = $categoryM->getTypeData(6);
        $this->assign('Type',$Type);
        return view();
    }

    public function edit($id){
        $TimeLineM = new TimeLineModel();
        $categoryM = new \app\admin\model\Category();
        $Type = $categoryM->getTypeData(6);
        $TimeLineData = $TimeLineM->getTimeLineData($id);
        //var_dump($TimeLineData);
        $this->assign([
            'TimeLineData'=>$TimeLineData,
            'Type'=>$Type
        ]);
        return view();
    }

    //添加
    public function addData(){
        if (request()->isPost()){
            $data = input('post.');
            $TimeLineM = new TimeLineModel();
            $validate = validate('TimeLine');
            if(!$validate->check($data)) {
                return $validate->getError();
            }
            $result = $TimeLineM->addTimeLineRes($data);
            return $result;
        }
        return '非法请求';
    }

    //列表展示
    public function getTimeLine($page,$limit){
        $TimeLineM = new TimeLineModel();
        $result = $TimeLineM->getTimeLine($page,$limit);
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
            $TimeLineM = new TimeLineModel();
            $validate = validate('TimeLine');
            if(!$validate->check($data)) {
                return $validate->getError();
            }
            $result = $TimeLineM->modifyTimeLineData($data);

            return $result;

        }
        return '非法请求';
    }

    //删除
    public function del($id){
        //$TimeLineM = new TimeLineModel();
        $result = TimeLineModel::destroy($id,true);
        return $result;
    }



}