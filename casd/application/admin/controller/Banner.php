<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/19
 * Time: 17:18
 */

namespace app\admin\controller;



class Banner extends Base
{
    public function index(){
        return view('banner');
    }

    public function add(){
        return view();
    }

    //添加
    public function addData(){
        if (request()->isPost()){
            $data = input('post.');
            $BannerM = new \app\admin\model\Banner();
            $validate = validate('banner');
            if(!$validate->check($data)) {
                return $validate->getError();
            }
            $result = $BannerM->addBannerRes($data);
            return $result;
        }
        return '非法请求';
    }


    //列表展示
    public function getBannerList($page,$limit){
        $BannerM = new \app\admin\model\Banner();
        $result = $BannerM->getBannerList($page,$limit);
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

    //编辑页渲染
    public function edit($id){
        $BannerM = new \app\admin\model\Banner();
        $BannerData = $BannerM->getOneBannerData($id);
        $this->assign([
            'BannerData'=>$BannerData,
        ]);
        return view();
    }

    //修改
    public function editData(){
        if (request()->isPost()){
            $data = input('post.');
            $BannerM = new \app\admin\model\Banner();
            $validate = validate('Banner');
            if(!$validate->check($data)) {
                return $validate->getError();
            }
            $result = $BannerM->modifyBannerData($data);

            return $result;

        }
        return '非法请求';
    }

    //删除
    public function del($id){
        $BannerM = new \app\admin\model\Banner();
        $result = $BannerM->delBannerData($id);
        return $result;
    }


}