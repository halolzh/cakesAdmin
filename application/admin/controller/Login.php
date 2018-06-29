<?php

namespace app\admin\controller;

use app\admin\common\Base;
use app\admin\model\Admin;
use think\Controller;
use think\Request;
use think\Session;

class Login extends Base {
	/**
	 * 渲染登录页面
	 */
	public function index() {
		//
		return $this->view->fetch('login');
	}

	/**
	 * 验证用户身份
	 */
	public function check(Request $request) {
		//
		$status = 0;
		//获取表单的数据，并保存在变量中
		$data = $request->param();
		$username = $data['username'];
		$password = md5($data['password']);

		//在admin表中进行查询
		$map = ['username' => $username];
		$admin = Admin::get($map);

		//将用户名和密码分开验证
		//如果没有查询到该用户
		if (is_null($admin)) {
			$message = '用户名不正确';
		} elseif ($admin->password != $password) {
			$message = '密码不正确';
		} else {
			//如果用户名和密码都通过了验证，表明是合法用户
			//修改一下返回信息
			$status = 1;
			$message = '登录成功';

			//更新表中登录次数与登录时间
			$admin->setInc('login_count');
			$admin->save(['last_time' => time()]);

			Session::set('user_id', $username);
			Session::set('user_info', $data);
		}

		return ['status' => $status, 'message' => $message];
	}

	/**
	 *  退出登录
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
		//
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
