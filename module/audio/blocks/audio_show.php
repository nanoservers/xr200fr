<?php
function b_audio_show_show($options) {
	global $xoTheme , $xoopsModuleConfig;
	
	$audio = array();
	
	
	
	$time = time() - '60*60*24*30';
	$xoTheme->addScript ( XOOPS_URL . '/modules/audio/js/jwplayer/jwplayer.js' );
	$uploadpach_shots = '/uploads/audio/images/shots/';
	$uploadpach_mp3 = '/uploads/audio/mp3/';
	
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
		$audio[$i]['mp3Height'] = $mp3_height;
	
	$block['audio'] = $audio;
function b_audio_show_edit($options) {
	$downloadscat_Handler =& xoops_getModuleHandler('audio_downloads', 'audio');
	
	$criteria->add(new Criteria('status', 0, '!='));
	$criteria->add(new Criteria('top', 1));
	$criteria->setLimit(50);
	
	
	$sort = new XoopsFormSelect(_MB_AUDIO_SORT, 'options[]', $options[0]);
   $sort->addOption("random", _MB_AUDIO_RANDOM);
   $sort->addOption("select", _MB_AUDIO_SELECT);
   $form = _MB_AUDIO_SORT . " : " . $sort->render() . '<br />';
	$form .= _MB_AUDIO_HEIGHT . " : <input name=\"options[1]\" size=\"5\" maxlength=\"255\" value=\"" . $options[1] . "\" type=\"text\" />&nbsp;<br />";
	
	
	$form .= _MB_AUDIO_VIDTODISPLAY . "<br /><select name=\"options[]\" >";
	