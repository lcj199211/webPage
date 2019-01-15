<?php
namespace app\admin\controller;
use app\admin\model\Images;
use think\Controller;
use think\Request;

class Base extends Controller
{
    public function _initialize()
    {
        if (!session('username')) {
            $this->redirect('/admin/login');
        }
    }

    //图片上传
    public function picture(){
        if (request()->isPost()){
            $type = request()->param();
            if($type['fileType'] == 1){
                $fileName = 'textimg';
            }else{
                $fileName = 'images';
            };
            // 获取表单上传文件
            $files = request()->file();
             static $arr = [];
            foreach ($files as $file){
                // 移动到框架应用根目录/public/upload/textimg 目录下
                $info = $file->validate(['ext' => 'jpg,png'])->move(ROOT_PATH . 'public' . DS . 'upload' . DS . $fileName);
                $path='/upload' . DS . $fileName.'/'.$info->getSaveName();
                $path= str_replace('\\','/',$path);
                $images = new Images(['url'=>$path]);
                $images->save();
                $arr[]=[
                    'id'=>$images->id,
                    'url'=>config('setting.img_prefix').$images->url
                ];
            }
            if ($info){
                $msg['errno'] = 0;
                $msg['data'] = $arr;
                return json($msg);
            }
            $msg['errno'] = 1;
            $msg['msg'] = '上传出错，请稍后再试~';
            return json($msg);
        }
    }

    //删除当前提交图片
    public function delImage(){
        $data = input('post.');
        $imgIds = substr($data['img_id'],0,-1);
        $imgs = Images::all($imgIds);

        if ($imgs){
            foreach($imgs as $k=>$v){
                @unlink($_SERVER['DOCUMENT_ROOT'].$v['url']);
            }
        }
        $result = Images::destroy($data['img_id'],true);
        return $result;
    }

    //删除文本编辑器的初始图片
    public function delTextImgs(){

        $data = input('post.');
        $imgs = [];

        if (array_key_exists('imgs',$data)){

            if (array_key_exists('compareImgs',$data)){

                foreach ($data['imgs'] as $k=>$v){
                    if (!in_array($v,$data['compareImgs'])){
                        $imgs[]=$v;
                    }
                }

            }else{

                $imgs = $data['imgs'];

            }

            foreach ($imgs as $k=>$v){
                $url = strstr($v,'/upload');
                @unlink($_SERVER['DOCUMENT_ROOT'].$url);
                Images::where('url',$url)->delete();
            }

        }

        return true;
    }

    //新增图片
    public function addImgs($imgs){

        foreach ($imgs as $k=>$v){
            $imagesM = new Images();
            $result = $imagesM->save(['url'=>$v]);
            return $result;
        }
    }
}
