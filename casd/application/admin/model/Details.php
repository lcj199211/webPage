<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/27
 * Time: 16:58
 */

namespace app\admin\model;


class Details extends BaseModel
{
//    public function item(){
//        return $this->hasOne('tag','id','tag_id')->field('id,name');
//    }
    //添加数据
    public function addDetails($data)
    {
        $result = self::save($data);
        return $result;
    }

    //获取所有数据并分页
    public function getDetailsData($page,$limit){
        $count=$this->count('id');
        $result = $this->page($page,$limit)->select();
        foreach ($result as $k=>$v){
            if ($v['tag_id'] == 0){
                $v['name']= '未选择';
            }else{
                $nameData = Tags::getTagID($v['tag_id']);
                $v['name'] = $nameData['title'];
            }
        }
        $arr = [
            'count'=>$count,
            'data'=>$result
        ];
        return $arr;
    }

    //检测当前提交的tagid是否存在所属详情
    public function verificationTagsID($tag_id){
        $result = $this->where('tag_id',$tag_id)->field('id')->find();
        return $result;
    }

    //根据当前id获取详情数据
    public function getOneDetailsData($id){

        $result = $this->where('id',$id)->find();

        return $result;
    }

    //修改单页

    public function modifyDetailsData($data){
        $result = self::save($data,['id'=>$data['id']]);
        return $result;
    }

    //删除当前详情页和所有图片
    public function delDetailsData($id){
        $data = self::where('id',$id)->value('content');
        $imgs = getImgs($data);
        $result = self::destroy($id,true);
        if ($imgs){
            if ($result){
                foreach ($imgs as $k=>$v){
                    $url = strstr($v,'/upload');
                    @unlink($_SERVER['DOCUMENT_ROOT'].$url);
                    Images::where('url',$url)->delete();
                }
            }

            return true;
        }
        return true;
    }
}