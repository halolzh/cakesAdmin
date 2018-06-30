<?php

namespace app\admin\controller;
use app\admin\common\Base;
use app\admin\model\Cakes;
use think\Controller;
use think\Db;
use think\Request;

class Products extends Base {

	public $list;
	/**
	 * 产品列表
	 */
	public function index() {
		//
		$list = Cakes::order('id desc')->paginate(10);
		$this->assign('list', $list);

		$editUrl = '{:url(products/edit)}';

		$this->assign('editUrl', $editUrl);

		return $this->view->fetch('products_list');
	}

	/**
	 * 产品删除
	 */
	public function del() {

		return $this->view->fetch('products_del');
	}

	/**
	 * 显示创建资源表单页.
	 *
	 * @return \think\Response
	 */
	public function create() {
		//
	}

	/**
	 * 保存新建的资源
	 *
	 * @param  \think\Request  $request
	 * @return \think\Response
	 */
	public function save(Request $request) {
		//
	}

	/**
	 * 显示指定的资源
	 *
	 * @param  int  $id
	 * @return \think\Response
	 */
	public function read($id) {
		//
	}

	/**
	 * 显示编辑资源表单页.
	 *
	 * @param  int  $id
	 * @return \think\Response
	 */
	public function edit($id) {

		$typeLists = Db::table("productType")->select();

		$this->assign("typeLists", $typeLists);

		return $this->view->fetch('products_edit');
	}

	public function editcommit(Request $request) {
		$data = $request->param();
		$imgSrc = $data['imgSrc'];
		$type = $data['type'];
		$productName = "1323"; //$data['productName'];

		//echo $imgSrc . ' ' . $productName;

		$status = 1;
		$message = "ok";
		return ['imgSrc' => $imgSrc, 'productName' => $productName, 'type' => $type];
	}

	/**
	 * 保存更新的资源
	 *
	 * @param  \think\Request  $request
	 * @param  int  $id
	 * @return \think\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * 删除指定资源
	 *
	 * @param  int  $id
	 * @return \think\Response
	 */
	public function delete($id) {
		//
	}
}
