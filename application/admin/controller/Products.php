<?php

namespace app\admin\controller;
use app\admin\common\Base;
use think\Controller;
use think\Request;
use app\admin\model\Cakes;

class Products extends Base {
	/**
	 * 产品列表
	 */
	public function index() {
		//
		$list = Cakes::paginate(10);
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
		dump($id);
		return $this->view->fetch('products_edit');	
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
