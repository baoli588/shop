<?php
/**
 *		商品属性数据层
 *      [HeYi] (C)2013-2099 HeYi Science and technology Yzh.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      http://www.yaozihao.cn
 *      tel:18519188969
 */

class attribute_table extends table {
	protected $_validate = array(
       /* array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间]) */
		array('name', 'require', '{goods/goods_attribute_name_require}', table::MUST_VALIDATE),
	);
    protected $_auto = array(
		
    );
}