<?php
/**
 *      [HeYi] (C)2013-2099 HeYi Science and technology Yzh.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      http://www.yaozihao.cn
 *      tel:18519188969
 */
class consult_control extends cp_control {
    public function _initialize() {
        parent::_initialize();
		$this->user_consult = $this->load->service('goods/goods_consult');
    }

    public function index() {
	   $_GET['page'] = (int)$_GET['page'];
	   $_GET['id'] = (int)$this->member['id'];
	   if($_GET['id'] < 1){
		   showmessage(lang('_param_error_'));
	   }
	   $userinfo = $this->user_consult->user_consult($_GET['id'],$_GET['page']);
	   $count = $this->load->table('goods_consult')->where(array('mid' => array('eq',$_GET['id'])))->count();
	   $pages = pages($count,10);
	   $SEO = seo('我的咨询 - 会员中心');
	   $this->load->librarys('View')->assign('SEO',$SEO)->assign('userinfo',$userinfo)->assign('pages',$pages)->display('consult');
    }
	public function get_consult(){
		$result = $this->user_consult->get_consult($this->member['id'],$_GET['page'],$_GET['limit']);
		$this->load->librarys('View')->assign('result',$result);
		$result = $this->load->librarys('View')->get('result');
		echo json_encode($result);
	}
}
