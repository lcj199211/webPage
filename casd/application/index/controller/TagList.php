<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/23
 * Time: 17:48
 */

namespace app\index\controller;


use app\index\model\Details;
use app\index\model\News;
use app\index\model\Recruit;
use app\index\model\TagImglist;
use app\index\model\Tags;
use PHPMailer\SendEmail;

class TagList extends Base
{
    public function index(){
        $tagsM = new Tags();
        $tagsData = $tagsM->getTagsData(input('tags_id'));
        //校验tags类型并渲染对应的数据
        $this->checkTagsType($tagsData);
        $this->assign([
            'tagsRes'=>$tagsM->getTags(input('category_id')),
            'tagsData'=>$tagsData,//获取提交过来的tag_id获取并赋值模板
        ]);
        //var_dump($tagsData);exit;
        return view('tag_list');
    }

    //校验tags类型并渲染对应的数据
    public function checkTagsType($tagsData){
        switch ($tagsData['type']){
            case 1:
                $detailsM = new Details();
                $this->assign('detailsData',$detailsM->getDetailsData($tagsData['id']));
                break;
            case 2:
                $tagImgListM = new TagImglist();
                $this->assign('tagImgListData',$tagImgListM->getTagImglistData($tagsData['id']));
                break;
            case 3:
                $NewsM = new News();
                $this->assign('newsData',$NewsM->getNewsData($tagsData['id']));
                break;
            case 4:
                $recruitM = new Recruit();
                $this->assign('recruitData',$recruitM->getRecruitData($tagsData['id']));
        }
    }

    //发送邮件
    public function sendMail(){
        $data = input('post.');
        if ($data['type'] == 1){
            return '请选择类别';
        }
        $validate = validate('SendMail');
        if(!$validate->check($data)) {
            return $validate->getError();
        }
        $text = $data['name'].'————'.$data['contact'].'————'.$data['contents'];
        $result = SendEmail::SendEmail($data['type'],$text,$data['sendType']);
        if($result){
            return $result;
        }else{
            return $result;
        }
    }


}