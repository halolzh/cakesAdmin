<?php
namespace app\index\controller;
use think\Db;

class Index {
	public function index() {
		$data = Db::table('cakes')->select();
		return json_encode($data);
	}
}
