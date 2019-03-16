<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/15
 * Time: 11:10
 */

namespace  app\index\controller;
use think\Db;
use app\index\controller\Common;

class Contact extends Common{

    //联系我们
    public function  contact(){
        return $this->view->fetch();
    }

    //接受客户提交信息 todo 表单需要验证 需要优化
    public function contact_info(){
        $data = input('post.');
        $insert['name']  = $data['your-name'];
        $insert['email']  = $data['your-email'];
        $insert['phone']  = $data['your-phone'];
        $insert['message']  = $data['your-message'];
        if(empty($data['your-name'])){
           return  $this->result(['status'=>'validation_failed'],'400','error','json');
        }
        $res = Db::name('contact')->data($insert)->insert();
        if($res){
           $this->result(['status'=>'mail_sent'],'200','mail_sent','json');
        }
      return false;
    }

}