<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/22
 * Time: 9:07
 */

namespace app\admin\model;


class HomeImg extends BaseModel
{
    public function getHomeData(){
        $result = self::select();
        foreach ($result as $k=>$v){
            if ($v['img_id']){
                $v['img_url'] = Images::where('id',$v['img_id'])->value('url');
            }else{
                $v['img_url'] = null;
            }
        }
        return $result;
    }

    //修改

    public function modifyHomeImgData($data){
        //var_dump($data);exit;
        $data = [
           [
               'id'=>$data['data1']['id'],
               'img_id'=>$data['data1']['img_id'],
               'url'=>$data['data1']['url'],
               'title'=>$data['data1']['title'],
               'desc'=>$data['data1']['desc']
           ],
            [
                'id'=>$data['data2']['id'],
                'img_id'=>$data['data2']['img_id'],
                'url'=>$data['data2']['url'],
                'title'=>$data['data2']['title'],
                'desc'=>$data['data2']['desc']
            ]
        ];
        $result = self::saveAll($data);
        return $result;
    }
}
