<?php

function b_VIDEO_sel_show($options) {
	require_once XOOPS_ROOT_PATH."/modules/video/include/functions.php";
	//appel de la class
	$downloads_Handler =& xoops_getModuleHandler('video_downloads', 'video');
	$block = array();
	$type_block = $options[0];
	$img_height = $options[1];
	$img_width = $options[2];
	array_shift($options);
	array_shift($options);
	array_shift($options);
	//$categories = video_MygetItemIds('video_view', 'video');
	$criteria = new CriteriaCompo();
	//$criteria->add(new Criteria('lid', '(' . implode(',', $categories) . ')','IN'));
	if (!(count($options) == 1 && $options[0] == 0)) {
		$criteria->add(new Criteria('lid', '(' . implode(',', $options) . ')','IN'));
	}
	$criteria->add(new Criteria('status', 0, '!='));
	//$criteria->setLimit($nb_entree);
	$downloads_arr = $downloads_Handler->getall($criteria);
	foreach (array_keys($downloads_arr) as $i) {
		$block[$i]['lid'] = $downloads_arr[$i]->getVar('lid');
		$block[$i]['title'] = $downloads_arr[$i]->getVar('title');
		$block[$i]['hits'] = $downloads_arr[$i]->getVar("hits");
		$block[$i]['rating'] = number_format($downloads_arr[$i]->getVar("rating"),1);
		$block[$i]['date'] = formatTimeStamp($downloads_arr[$i]->getVar("date"),"s");
		$block[$i]['logourl'] = $downloads_arr[$i]->getVar('url') . '/uploads/video/images/shots/' . $downloads_arr[$i]->getVar('logourl');
		$block[$i]['width'] = $img_width;
		$block[$i]['height'] = $img_height;
	}
	return $block;
}


function b_VIDEO_sel_edit($options) {
	//appel de la class
	$downloadscat_Handler =& xoops_getModuleHandler('video_downloads', 'video');
	$criteria = new CriteriaCompo();
	//$criteria = new CriteriaCompo();
	//$criteria->setSort('weight ASC, title');
	$criteria->setOrder('ASC');
	$downloadscat_arr = $downloadscat_Handler->getall($criteria);
	$form = _MB_VIDEO_HEIGHT . "&nbsp;\n";
	$form .= "<input type=\"hidden\" name=\"options[0]\" value=\"" . $options[0] . "\" />";
	$form .= "<input name=\"options[1]\" size=\"5\" maxlength=\"255\" value=\"" . $options[1] . "\" type=\"text\" />&nbsp;<br />";
	$form .= _MB_VIDEO_WIDTH . " : <input name=\"options[2]\" size=\"5\" maxlength=\"255\" value=\"" . $options[2] . "\" type=\"text\" /><br /><br />";

	array_shift($options);
	array_shift($options);
	array_shift($options);

	$form .= _MB_VIDEO_VIDTODISPLAY . "<br /><select name=\"options[]\" multiple=\"multiple\" size=\"5\">";
	//$form .= "<option value=\"0\" " . (array_search(0, $options) === false ? '' : 'selected="selected"') . ">" . _MB_VIDEO_ALLDOWNLAODS . "</option>";
	foreach (array_keys($downloadscat_arr) as $i) {
		$form .= "<option value=\"" . $downloadscat_arr[$i]->getVar('lid') . "\" " . (array_search($downloadscat_arr[$i]->getVar('lid'), $options) === false ? '' : 'selected="selected"') . ">".$downloadscat_arr[$i]->getVar('title')."</option>";
	}
	$form .= "</select>";
	return $form;
}
?>