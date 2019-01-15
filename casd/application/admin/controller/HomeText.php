<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/27
 * Time: 15:19
 */

namespace app\admin\controller;


class HomeText extends Base
{
    //列表页渲染
    public function index(){
        return view('home_text');
    }
    //新增页渲染
    public function add(){
        return view();
    }

    //编辑页渲染
    public function edit($id){
        $HomeTextM = new \app\admin\model\HomeText();
        $HomeTextData = $HomeTextM->getOneHomeTextData($id);
        $this->assign([
            'HomeTextData'=>$HomeTextData
        ]);
        return view();
    }

    //添加
    public function addData(){
        if (request()->isPost()){
            $data = input('post.');
            $HomeTextM = new \app\admin\model\HomeText();
            $validate = validate('HomeText');
            if(!$validate->check($data)) {
                return $validate->getError();
            }
            $result = $HomeTextM->addHomeText($data);
            return $result;
        }
        return '非法请求';
    }

    //修改
    public function editData(){
        if (request()->isPost()){
            $data = input('post.');
            $HomeTextM = new \app\admin\model\HomeText();
            $validate = validate('HomeText');
            if(!$validate->check($data)) {
                return $validate->getError();
            }
            $result = $HomeTextM->modifyHomeTextData($data);

            return $result;

        }
        return '非法请求';
    }

    //列表展示
    public function getHomeTextList($page,$limit){
        $HomeTextM = new \app\admin\model\HomeText();
        $result = $HomeTextM->getHomeTextList($page,$limit);
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
        $HomeTextM = new \app\admin\model\HomeText();
        $result = $HomeTextM->delHomeTextData($id);
        return $result;
    }

}