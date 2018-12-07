<?php

namespace Admin\Controller;

class PublicController extends BaseController {

	/**
	 * 用户登录
	 */
	public function login(){
		if(IS_POST){
			$data = I('post.');
			$res = D('Users')->login($data);
			if($res['status'] != 200){
				$this->error($res['msg']);
			}
			$this->success($res['msg'],U('Index/index'));
		}
		$this->display();
	}

	/**
	 * 退出
	 */
	public function logout(){
		session('user_auth',null);
		redirect(U('Public/login'));
	}

	/**
	 * 图片验证码
	 */
	public function verify_code(){
		ob_clean();
		$verify = new \Think\Verify(array('imageW'=>'320px','length'=>4));
		$verify->entry();
	}
}
