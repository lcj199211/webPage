<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/19
 * Time: 17:18
 */

namespace app\admin\model;


class Banner extends BaseModel
{
    //添加数据
    public function addBannerRes($data)
    {
        $result = self::save($data);
        return $result;
    }

    //获取所有数据并分页
    public function getBannerList($page,$limit){
        $count=$this->count('id');
        $result = $this->page($page,$limit)->order('id asc')->select();
        foreach ($result as $k=>$v){
            $url = Images::where('id',$v['img_id'])->value('url');
            $v['url']=config('setting.img_prefix').$url;
        }
        $arr = [
            'count'=>$count,
            'data'=>$result
        ];
        return $arr;
    }

    //根据当前id获取数据
    public function getOneBannerData($id){

        $result = $this->alias('a')->join('ca_images b','a.img_id=b.id')->where('a.id',$id)
            ->field('a.id,url,link,title,img_id')->find();
        return $result;
    }

    //修改

    public function modifyBannerData($data){
        //var_dump($data);exit;
        $result = self::save($data,['id'=>$data['id']]);
        return $result;
    }

    //删除当前内容和图片
    public function delBannerData($id){
        $imgId = self::where('id',$id)->value('img_id');

        $imgs = Images::get($imgId);
        @unlink($_SERVER['DOCUMENT_ROOT'].$imgs->url);
        Images::destroy($imgId,true);
        $result = self::destroy($id,true);
        return $result;
    }
}