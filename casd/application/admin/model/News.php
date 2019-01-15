<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/27
 * Time: 16:58
 */

namespace app\admin\model;


class News extends BaseModel
{
    // 关闭自动写入create_time字段
    protected $createTime = false;
//    public function item(){
//        return $this->hasOne('Category','id','category_id')->field('id,name');
//    }
    //添加数据
    public function addNews($data)
    {
        $result = self::save($data);
        return $result;
    }

    //获取所有新闻数据并分页
    public function getNewsData($page,$limit){
        $count=$this->count('id');
        $result = $this->page($page,$limit)->order('tag_id desc')->select();
        foreach ($result as $k=>$v){
            $url = Images::where('id',$v['img_id'])->value('url');
            $nameData = Tags::getTagID($v['tag_id']);
            $v['url']=config('setting.img_prefix').$url;
            $v['name'] = $nameData['title'];
            $v['create_time']=date('Y-m-d h:i:s',$v['create_time']);
        }
        $arr = [
            'count'=>$count,
            'data'=>$result
        ];
        return $arr;
    }

    //根据当前新闻id获取新闻数据
    public function getOneNewsData($id){

        $result = $this->alias('a')->where('a.id',$id)->find();
        if ($result['img_id'] == 0){
            $result['url']=null;
        }else{
            $result['url']=Images::where('id',$result['img_id'])->value('url');
        }
        return $result;
    }

    //修改新闻

    public function modifyNewsData($data){
        $result = self::save($data,['id'=>$data['id']]);
        return $result;
    }

    //删除当前新闻和所有图片
    public function delNewsData($id){
        $data = self::where('id',$id)->find();
        $imgs = getImgs($data['content']);
        $this->delNews($data['img_id']);
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
    //删除当前内容和图片
    public function delNews($imgId){
        $imgs = Images::get($imgId);
        @unlink($_SERVER['DOCUMENT_ROOT'].$imgs->url);
        $result = Images::destroy($imgId,true);
        return $result;
    }
}