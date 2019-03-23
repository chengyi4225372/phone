<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/15
 * Time: 10:01
 */

namespace app\index\controller;

use think\Db;
use app\index\controller\Common;
use think\Request;

class Index extends Common {


    //首页
    public function index(){
        return $this->view->fetch();
    }

    //在线 报价
    public function online_quote(){
        if(request()->isPost()){
            $data['brand']  =input('post.brand');
            $data['model']  =input('post.model');
        }
        return $this->view->fetch();
    }

/* todo 自我诊断     */
   //自我诊断
    public function self_diagnosis(){
        return $this->view->fetch();
    }

    //新闻列表
    public function self_diagnosis_list(){
        return $this->view->fetch();
    }

    //新闻详情
    public function self_diagnosis_new(){
        return $this->view->fetch();
    }

    //金额 对应 具体详情 todo 后期优化
    public function quote_result(){
        if(request()->isPost()){
            $data = array();
            $data["store_id"]=input('post.store_id');
            $data["brand"] = input('post.brand');
            $data["model"] = input('post.model');
            $data["issue"] =input('post.issue');
            $data["state"] = input('post.state');
            $data["store"] = input('post.store');
            //查询费用
            $pid =Db::name('phone_pai')->where('pai',$data['brand'])->value('id');
            $mid = Db::name('phone_models')->where('models',$data['model'])->where('pid',$pid)->value('id');
            $cid =Db::name('zhen_title')->where('names',$data['issue'])->value('id');
            $where = array('pid'=>$pid,'mid'=>$mid,'cid'=>$cid);
            $data['price']= Db::name('phone_money')->where($where)->value('money');
            $this->assign('data',$data);
            return $this->view->fetch();
        }else{
            return false;
        }

    }



    //提交用户信息
    public function  book_now(){
        /*
         if($this->request->isPost()){
             $data['store_id'] = input('post.store_id');
             $data['brand'] = input('post.brand');
             $data['model'] = input('post.model');
             $data['issue'] = input('post.issue');
             $data['state'] = input('state');
             $data['price'] = input('price');
            foreach($data as $k =>$val){
                 if($data[$k] == ''|| $data[$k] == null){
                     $this->result('','400','error','json');
                 }
            }
             $this->assign('data',$data);
             $this->redirect('index/book_now','','',['data'=>$data]);
         }*/
        return $this->view->fetch();
    }



    //订单页面
    public function booking_confirmation(){
        //$this->assign('info',$info);
        return $this->view->fetch();
    }



}