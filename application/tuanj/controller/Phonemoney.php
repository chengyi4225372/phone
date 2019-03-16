<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/16
 * Time: 15:47
 */

namespace app\tuanj\controller;

use think\Db;
use controller\BasicAdmin;
use service\DataService;

class Phonemoney extends BasicAdmin {

    private $dataform = 'phone_money';


    public function index() {
        $this->title = '手机诊断报价列表';
        list($get, $db) = [$this->request->get(), Db::name($this->dataform)];
        (isset($get['keywords']) && $get['keywords'] !== '') && $db->whereLike('money', "%{$get['keywords']}%");
        if (isset($get['date']) && $get['date'] !== '') {
            list($start, $end) = explode(' - ', $get['date']);
            $db->whereBetween('create_at', ["{$start} 00:00:00", "{$end} 23:59:59"]);
        }
        return parent::_list($db->order('id desc'));
    }

    //关联手机品牌 手机型号 诊断类型
    protected function _data_filter(&$data) {
        foreach ($data as $key => $val) {
            $data[$key]['phonepai'] = Db::name('phone_pai')->where('id', '=', $val['pid'])->value('pai');
            $data[$key]['phonemodels'] = Db::name('phone_models')->where('id', '=', $val['mid'])->value('models');
            $data[$key]['zhenduan'] = Db::name('zhen_title')->where('id', '=', $val['cid'])->value('names');
        }
    }


    //查询所属手机品牌的型号
    public function models(){
        $id = input('post.id');
        $models = Db::name('phone_models')->where('pid',$id)->select();
        if(empty($models)){
           return  $this->result('','400','没有类容','json');
        }else{
           return  $this->result($models,'200','ok','json');
        }
    }



    /**
     * 添加
     * @return type
     */
    public function add() {
        return $this->_form($this->dataform, 'form');
    }

    /**
     * 编辑
     * @return type
     */
    public function edit() {
        return $this->_form($this->dataform, 'form');
    }

    /**
     * 添加成功回跳处理
     * @param bool $result
     */
    protected function _form_result($result) {
        if ($result !== false) {
            list($base, $spm, $url) = [url('@admin'), $this->request->get('spm'), url('tuanj/phonemoney/index')];
            $this->success('数据保存成功！', "{$base}#{$url}?spm={$spm}");
        }
    }

    /**
     * 删除
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function del() {
        if (DataService::update($this->dataform)) {
            $this->success("删除成功!", '');
        }
        $this->error("删除失败, 请稍候再试!");
    }

    /**
     * 禁用
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function forbid() {
        if (DataService::update($this->dataform)) {
            $this->success("禁用成功!", '');
        }
        $this->error("禁用失败, 请稍候再试!");
    }

    /**
     * 禁用
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function resume() {
        if (DataService::update($this->dataform)) {
            $this->success("启用成功!", '');
        }
        $this->error("启用失败, 请稍候再试!");
    }

}