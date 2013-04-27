<?php
function b_VIDEO_show_show($options) {
	global $xoTheme , $xoopsModuleConfig;
	
	$video = array();
	
	
	
	$time = time() - '60*60*24*30';
	$xoTheme->addScript ( XOOPS_URL . '/modules/video/js/jwplayer/jwplayer.js' );
	$uploadpach_shots = '/uploads/video/images/shots/';
	$uploadpach_flv = '/uploads/video/flv/';
	
		case 'random':
			$criteria = new CriteriaCompo();
			$criteria->add(new Criteria('top', 1));
		   $criteria->add(new Criteria('date', $time, '<'));
			$criteria->setSort('RAND()');
			$criteria->setLimit(1);
			break;
		
		case 'select':
			$criteria = new CriteriaCompo();
			$criteria->setLimit(1);
			break;
	}	
	$downloads_arr = $downloads_Handler->getall($criteria);
	foreach (array_keys($downloads_arr) as $i) {
		$video[$i]['flvHeight'] = $flv_height;
	
	$block['video'] = $video;
function b_VIDEO_show_edit($options) {
	$downloadscat_Handler =& xoops_getModuleHandler('video_downloads', 'video');
	
	$criteria->add(new Criteria('status', 0, '!='));
	$criteria->add(new Criteria('top', 1));
	$criteria->setLimit(50);
	
	
	$sort = new XoopsFormSelect(_MB_VIDEO_SORT, 'options[]', $options[0]);
   $sort->addOption("random", _MB_VIDEO_RANDOM);
   $sort->addOption("select", _MB_VIDEO_SELECT);
   $form = _MB_VIDEO_SORT . " : " . $sort->render() . '<br />';
	$form .= _MB_VIDEO_HEIGHT . " : <input name=\"options[1]\" size=\"5\" maxlength=\"255\" value=\"" . $options[1] . "\" type=\"text\" />&nbsp;<br />";
	
	
	$form .= _MB_VIDEO_VIDTODISPLAY . "<br /><select name=\"options[]\" >";
	