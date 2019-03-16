<?php

namespace app\index\widget;

use think\Db;

class Common extends \app\index\controller\Common {

    public function nav() {
        return $this->fetch('public:nav');
    }

    public function cate() {
        $district = Db::name($this->district)
                ->where('status', '=', 1)
                ->where('is_deleted', '=', 0)
                ->select();
        $cate = Db::name($this->cate)
                ->where('status', '=', 1)
                ->where('is_deleted', '=', 0)
                ->where('type', 1)
                ->order('sort asc')
                ->limit(14)
                ->select();
        return $this->fetch('public:cate', ['district' => $district, 'cate' => $cate]);
    }

    public function help_left() {
        $list = Db::name($this->news_cate)
                ->where('is_deleted', '=', 0)
                ->where('status', '=', 1)
                ->order('sort asc,create_at desc')
                ->select();
        return $this->fetch('help:left', ['list' => $list]);
    }

    public function kefu() {
        $result = Db::name('single_page')->where('flag', '=', 'kefu')->select();
        $kf = [];
        foreach ($result as $key => $val) {
            $row = explode('#@#', $val['value']);
            foreach ($row as $k => $v) {
               $row['qq'] = Db::name($this->user)->where('id', '=', $row[0])->value('qq');
            }
            $kf[$val['name']] = $row;
        }
//        print_r($row);
        return $this->fetch('index@public:kefu', ['kf' => $kf]);
    }

}
