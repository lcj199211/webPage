<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16
 * Time: 9:21
 */

namespace app\admin\model;


class HomeText extends BaseModel
{
    //添加数据
    public function addHomeText($data)
    {
        $result = self::save($data);
        return $result;
    }

    //获取所有数据并分页
    public function getHomeTextList($page,$limit){
        $count=$this->count('id');
        $result = $this->page($page,$limit)->select();
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
    public function getOneHomeTextData($id){

        $result = $this->alias('a')->join('ca_images b','a.img_id=b.id')->where('a.id',$id)
            ->field('a.id,link,url,title,desc,img_id')->find();
        return $result;
    }

    //修改

    public function modifyHomeTextData($data){

        $result = self::save($data,['id'=>$data['id']]);
        return $result;
    }

    //检测当前提交的栏目id是否存在所属图片内容
    public function verificationCategoryID($category_id){
        $result = $this->where('category_id',$category_id)->field('id')->find();
        return $result;
    }

    //删除当前内容和图片
    public function delHomeTextData($id){
        $imgId = self::where('id',$id)->value('img_id');
        $imgs = Images::get($imgId);
        @unlink($_SERVER['DOCUMENT_ROOT'].$imgs->url);
        Images::destroy($imgId,true);
        $result = self::destroy($id,true);
        return $result;
    }


}