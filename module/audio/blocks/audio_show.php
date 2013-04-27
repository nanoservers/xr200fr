<?php
function b_audio_show_show($options) {	require_once XOOPS_ROOT_PATH."/modules/audio/include/functions.php";	$downloads_Handler =& xoops_getModuleHandler('audio_downloads', 'audio');
	global $xoTheme , $xoopsModuleConfig;
		$block = array();
	$audio = array();
		$sort = $options[0];	$mp3_height = $options[1];	$mp3_width = $options[2];
		array_shift($options);	array_shift($options);	array_shift($options);
	
	$time = time() - '60*60*24*30';
	$xoTheme->addScript ( XOOPS_URL . '/modules/audio/js/jwplayer/jwplayer.js' );
	$uploadpach_shots = '/uploads/audio/images/shots/';
	$uploadpach_mp3 = '/uploads/audio/mp3/';
		switch($sort) {
		case 'random':
			$criteria = new CriteriaCompo();
			$criteria->add(new Criteria('top', 1));			$criteria->add(new Criteria('status', 0, '!='));
		   $criteria->add(new Criteria('date', $time, '<'));
			$criteria->setSort('RAND()');
			$criteria->setLimit(1);
			break;
		
		case 'select':
			$criteria = new CriteriaCompo();  		   $criteria->add(new Criteria('lid', '(' . implode(',', $options) . ')','IN'));
			$criteria->setLimit(1);
			break;
	}	
	$downloads_arr = $downloads_Handler->getall($criteria);
	foreach (array_keys($downloads_arr) as $i) {		$audio[$i]['lid'] = $downloads_arr[$i]->getVar('lid');		$audio[$i]['title'] = $downloads_arr[$i]->getVar('title');		$audio[$i]['hits'] = $downloads_arr[$i]->getVar("hits");		$audio[$i]['rating'] = number_format($downloads_arr[$i]->getVar("rating"),1);		$audio[$i]['date'] = formatTimeStamp($downloads_arr[$i]->getVar("date"),"s");		$audio[$i]['logourl'] = XOOPS_URL.'/'.$xoopsModuleConfig['overlogo'];
		$audio[$i]['mp3Height'] = $mp3_height;		$audio[$i]['mp3Width'] = $mp3_width;		$audio[$i]['audioFile'] = $downloads_arr[$i]->getVar('url') . $uploadpach_mp3 . $downloads_arr[$i]->getVar('filename') . '.mp3';		$audio[$i]['imgurl'] = $downloads_arr[$i]->getVar('url') . $uploadpach_shots . $downloads_arr[$i]->getVar('logourl');	}
	
	$block['audio'] = $audio;	return $block;}
function b_audio_show_edit($options) {
	$downloadscat_Handler =& xoops_getModuleHandler('audio_downloads', 'audio');
		$criteria = new CriteriaCompo();
	$criteria->add(new Criteria('status', 0, '!='));
	$criteria->add(new Criteria('top', 1));	$criteria->setOrder('DESC');
	$criteria->setLimit(50);	$downloadscat_arr = $downloadscat_Handler->getall($criteria);
	
	
	$sort = new XoopsFormSelect(_MB_AUDIO_SORT, 'options[]', $options[0]);
   $sort->addOption("random", _MB_AUDIO_RANDOM);
   $sort->addOption("select", _MB_AUDIO_SELECT);
   $form = _MB_AUDIO_SORT . " : " . $sort->render() . '<br />';
	$form .= _MB_AUDIO_HEIGHT . " : <input name=\"options[1]\" size=\"5\" maxlength=\"255\" value=\"" . $options[1] . "\" type=\"text\" />&nbsp;<br />";	$form .= _MB_AUDIO_WIDTH . " : <input name=\"options[2]\" size=\"5\" maxlength=\"255\" value=\"" . $options[2] . "\" type=\"text\" /><br />";
		array_shift($options);	array_shift($options);	array_shift($options);
	
	$form .= _MB_AUDIO_VIDTODISPLAY . "<br /><select name=\"options[]\" >";	foreach (array_keys($downloadscat_arr) as $i) {		$form .= "<option value=\"" . $downloadscat_arr[$i]->getVar('lid') . "\" " . (array_search($downloadscat_arr[$i]->getVar('lid'), $options) === false ? '' : 'selected="selected"') . ">".$downloadscat_arr[$i]->getVar('title')."</option>";	}	$form .= "</select>";
		return $form;}?>