<?php

function tv_list_show($options) {
	 $block = array();
	 $today = date("N");
	 $list_handler = xoops_getmodulehandler('list', 'tv');
	 $block['lists'] = $list_handler->todayList($today);
	 $block['today'] = $today;
	 return $block;
}

function tv_list_edit($options) {

}

function tv_select_show($options) {
	 $block = array();
	 global $xoTheme;
	 $item_handler = xoops_getmodulehandler('item', 'tv');
	 $block['items'] = $item_handler->selectList();
	 $xoTheme->addStylesheet(XOOPS_URL . '/modules/tv/css/block.css');
	 return $block;
}

function tv_select_edit($options) {
	 
}	
 
?>