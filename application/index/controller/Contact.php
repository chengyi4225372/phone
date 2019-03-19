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
use think\Request;
class Contact extends Common{

    //联系我们
    public function  contact(){
        return $this->view->fetch();
    }

    //接受客户提交信息 todo 表单需要验证 需要优化
    public function contact_info(){
        if($this->request->isPost()){
           // $data = input('post.');
            $insert['name']  = input('post.name');
            $insert['email']  = input('post.email');
            $insert['phone']  = input('post.phone');
            $insert['message']  =input('post.message');
            $res = Db::name('contact')->data($insert)->insert();
            if($res){
                $this->result(['status'=>'mail_sent'],'200','mail_sent','json');
             }else{
                $this->result('','400','error','json');
             }
           }
        }


}