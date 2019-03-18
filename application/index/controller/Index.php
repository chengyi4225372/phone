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

    //金额 对应 具体详情
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


            $this->assign('data',$data);
        }
        return $this->view->fetch();
    }

    //订单通知页面
    public function booking_confirmation(){
        return $this->view->fetch();
    }



}