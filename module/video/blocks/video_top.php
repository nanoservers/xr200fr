<?php
function b_VIDEO_top_show($options) {
	$blockoption = array();
	$imgw = $options[5];
	$lenght_description = $options[6];
	$info = $options[7];
	$selectid = $options[8];
	array_shift($options);
	array_shift($options);
	array_shift($options);
	array_shift($options);
	array_shift($options);
	$categories = video_MygetItemIds('video_view', 'video');
			
		   $criteria->add(new Criteria('date', time() - (60 * 60 * 24 * 30), '>'));
			
			
			
		case "spotlight":
		   global $xoTheme;
		   $xoTheme->addScript ( "browse.php?Frameworks/jquery/jquery.js" );
		   $xoTheme->addScript ( XOOPS_URL . '/modules/video/js/scrollable.js' );
		   $criteria->setSort('date');
			$block['selectid'] = $selectid;
			break;	
	$criteria->setLimit($nb_entree);
	$count = 1;
			$video[$i]['description'] = mb_substr ( strip_tags($downloads_arr[$i]->getVar('description')), 0, 60, 'utf-8' ) . "...";  
		$video[$i]['hits'] = $downloads_arr[$i]->getVar("hits");
		$video[$i]['duration'] = formatTime($downloads_arr[$i]->getVar('duration'));
		$video[$i]['author'] = XoopsUser::getUnameFromId ( $downloads_arr[$i]->getVar ( 'submitter' ) );
		$video[$i]['submitter'] = $downloads_arr[$i]->getVar ( 'submitter' );
		$video[$i]['count'] = $count ++;
	
	$block['video'] = $video;
	$block['info'] = $info;
function b_VIDEO_top_edit($options) {
	$form .= _MB_VIDEO_IMGW . " : <input name=\"options[5]\" size=\"5\" maxlength=\"255\" value=\"" . $options[5] . "\" type=\"text\" /><br />\n";
   
   if ($options[7] == false){
   $form .= _MB_VIDEO_ID . " : <input name=\"options[8]\" size=\"5\" maxlength=\"255\" value=\"" . $options[8] . "\" type=\"text\" /><br />\n";
   
	array_shift($options);
	array_shift($options);
	array_shift($options);
	array_shift($options);
	$form .= _MB_VIDEO_CATTODISPLAY . "<br /><select name=\"options[]\" multiple=\"multiple\" size=\"5\">\n";