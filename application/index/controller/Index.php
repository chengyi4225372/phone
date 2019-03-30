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
        $data['store_id'] = input('get.store_id');
        $data['brand'] = input('get.brand');
        $data['model'] = input('get.model');
        $data['price'] = input('get.price');
        $data['issue'] = input('get.issue');
        $this->assign('data',$data);
        return $this->view->fetch();
    }

    //保存订单信息
    public function booking_order(){
        $data['store_id'] = input('get.store_id');
        $data['name'] = input('get.name');
        $data['email'] = input('get.email');
        $data['price'] = input('get.price');
        $data['date'] = input('get.date');
        $data['screen'] = input('get.screen');
        $data['zhen'] = input('get.zhen');
        $data['time'] = input('get.time');
        $data['tel']  = input('get.tel');
        $data['store'] = Db::name('store')->field('sid,names')->where('id',$data['store_id'])->find();
        $data['state'] = Db::name('state')->where('id',$data['store']['sid'])->value('names');
        $res = array(
            'name'=>$data['name'],
            'email'=>$data['email'],
            'price'=>$data['price'],
            'issue'=>$data['zhen'],
            'date'=>$data['date'],
            'time'=>$data['time'],
            'state'=>$data['state'],
            'store'=>$data['store']['names'],
            'phone'=>$data['tel'],
            'screen'=>$data['screen'],
        );
        $result_id = Db::name('order_list')->insertGetId($res);
        if($result_id){
            session('order_id',$result_id);
            $this->redirect('index/booking_confirmation');
        }
    }

    //订单页面
    public function booking_confirmation(){
        $data = Db::name('order_list')->where('id',session('order_id'))->find();
        if(empty($data)){
            echo "<script>alert('Order submission failed!')</script>";
            return false;
        }
        $this->assign('data',$data);
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

    //新闻搜索
    public function diagnosis_results(){
         return $this->view->fetch();
    }

    //条款和条件
    public function terms_and_conditions(){
        return $this->view->fetch();
    }

    //隐私条款
    public function privacy_policy(){
        return $this->view->fetch();
    }


}