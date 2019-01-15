<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16
 * Time: 9:21
 */

namespace app\admin\model;


class TagImglist extends BaseModel
{
    //添加数据
    public function addTagImglistRes($data)
    {
        $result = self::save($data);
        return $result;
    }

    //获取所有数据并分页
    public function getTagImgList($page,$limit){
        $count=$this->count('id');
        $result = $this->page($page,$limit)->order('tag_id desc')->select();
        foreach ($result as $k=>$v){
                $url = Images::where('id',$v['img_id'])->value('url');
                $nameData = Tags::getTagID($v['tag_id']);
                $v['url']=config('setting.img_prefix').$url;
                $v['name'] = $nameData['title'];
        }
        $arr = [
            'count'=>$count,
            'data'=>$result
        ];
        return $arr;
    }

    //根据当前id获取数据
    public function getTagImglistData($id){

        $result = $this->alias('a')->join('ca_images b','a.img_id=b.id')->where('a.id',$id)
            ->field('a.id,tag_id,url,title,desc,img_id,type')->find();
        return $result;
    }

    //修改

    public function modifyTagImglistData($data){

        $result = self::save($data,['id'=>$data['id']]);
        return $result;
    }


    //删除当前内容和图片
    public function delTagImglistData($id){
        $imgId = self::where('id',$id)->value('img_id');

        $imgs = Images::get($imgId);
        @unlink($_SERVER['DOCUMENT_ROOT'].$imgs->url);
        Images::destroy($imgId,true);
        $result = self::destroy($id,true);
        return $result;
    }


}