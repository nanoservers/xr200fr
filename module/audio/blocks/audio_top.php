<?php
function b_audio_top_show($options) {	require_once XOOPS_ROOT_PATH."/modules/audio/include/functions.php";	//appel de la class	$downloads_Handler =& xoops_getModuleHandler('audio_downloads', 'audio');	$block = array();
	$blockoption = array();	$type_block = $options[0];	$nb_entree = $options[1];	$lenght_title = $options[2];	$use_logo = $options[3];	$use_description = $options[4];
	$imgw = $options[5];
	$lenght_description = $options[6];
	$info = $options[7];
	$selectid = $options[8];   
	array_shift($options);
	array_shift($options);	array_shift($options);	array_shift($options);	array_shift($options);	array_shift($options);
	array_shift($options);
	array_shift($options);
	array_shift($options);
	$categories = audio_MygetItemIds('audio_view', 'audio');	$criteria = new CriteriaCompo();	$criteria->add(new Criteria('cid', '(' . implode(',', $categories) . ')','IN'));	if (!(count($options) == 1 && $options[0] == 0)) {		$criteria->add(new Criteria('cid', '(' . implode(',', $options) . ')','IN'));	}	$criteria->add(new Criteria('status', 0, '!='));	switch ($type_block)	{		case "date":			$criteria->setSort('date');			$criteria->setOrder('DESC');			break;
					case "hits":
		   $criteria->add(new Criteria('date', time() - (60 * 60 * 24 * 30), '>'));			$criteria->setSort('hits');			$criteria->setOrder('DESC');			break;
					case "rating":			$criteria->setSort('rating');			$criteria->setOrder('DESC');			break;
					case "random":			$criteria->setSort('RAND()');			break;
			
		case "spotlight":
		   global $xoTheme;
		   $xoTheme->addScript ( "browse.php?Frameworks/jquery/jquery.js" );
		   $xoTheme->addScript ( XOOPS_URL . '/modules/audio/js/scrollable.js' );
		   $criteria->setSort('date');			$criteria->setOrder('DESC');
			$block['selectid'] = $selectid;
			break;		}
	$criteria->setLimit($nb_entree);	$downloads_arr = $downloads_Handler->getall($criteria);
	$count = 1;	foreach (array_keys($downloads_arr) as $i) {		$audio[$i]['lid'] = $downloads_arr[$i]->getVar('lid');		$audio[$i]['title'] = strlen($downloads_arr[$i]->getVar('title')) > $lenght_title ? mb_substr($downloads_arr[$i]->getVar('title'),0,($lenght_title),'utf-8')."..." : $downloads_arr[$i]->getVar('title');		$description_short = '';		if ($use_description == true){
			$audio[$i]['description'] = mb_substr ( strip_tags($downloads_arr[$i]->getVar('description')), 0, 60, 'utf-8' ) . "...";  		}		$logourl = '';		if ($use_logo == true){			if ($downloads_arr[$i]->getVar('logourl') == 'blank.gif'){				$logourl = '';			}else{				$logourl = $downloads_arr[$i]->getVar('url') . '/uploads/audio/images/shots/'. $downloads_arr[$i]->getVar('logourl');			}		}		$audio[$i]['logourl'] = $logourl;		$audio[$i]['logourl_width'] = $imgw;
		$audio[$i]['hits'] = $downloads_arr[$i]->getVar("hits");		$audio[$i]['rating'] = number_format($downloads_arr[$i]->getVar("rating"),1);		$audio[$i]['date'] = formatTimeStamp($downloads_arr[$i]->getVar("date"),"s");
		$audio[$i]['duration'] = audio_formatTime($downloads_arr[$i]->getVar('duration'));
		$audio[$i]['author'] = XoopsUser::getUnameFromId ( $downloads_arr[$i]->getVar ( 'submitter' ) );
		$audio[$i]['submitter'] = $downloads_arr[$i]->getVar ( 'submitter' );
		$audio[$i]['count'] = $count ++;	}
	
	$block['audio'] = $audio;
	$block['info'] = $info;	return $block;}
function b_audio_top_edit($options) {	$downloadscat_Handler =& xoops_getModuleHandler('audio_cat', 'audio');	$criteria = new CriteriaCompo();	$criteria = new CriteriaCompo();	$criteria->setSort('cat_weight ASC, cat_title');	$criteria->setOrder('ASC');	$downloadscat_arr = $downloadscat_Handler->getall($criteria);	$form = _MB_AUDIO_DISP . "&nbsp;\n";	$form .= "<input type=\"hidden\" name=\"options[0]\" value=\"" . $options[0] . "\" />\n";	$form .= "<input name=\"options[1]\" size=\"5\" maxlength=\"255\" value=\"" . $options[1] . "\" type=\"text\" />&nbsp;" . _MB_AUDIO_FILES . "<br />\n";	$form .= _MB_AUDIO_CHARS . " : <input name=\"options[2]\" size=\"5\" maxlength=\"255\" value=\"" . $options[2] . "\" type=\"text\" /><br />\n";	if ($options[3] == false){		$checked_yes = '';		$checked_no = 'checked="checked"';	}else{		$checked_yes = 'checked="checked"';		$checked_no = '';	}	$form .= _MB_AUDIO_LOGO . " : <input name=\"options[3]\" value=\"1\" type=\"radio\" " . $checked_yes . "/>" . _YES . "&nbsp;\n";	$form .= "<input name=\"options[3]\" value=\"0\" type=\"radio\" " . $checked_no . "/>" . _NO . "<br />\n";	if ($options[4] == false){		$checked_yes = '';		$checked_no = 'checked="checked"';	}else{		$checked_yes = 'checked="checked"';		$checked_no = '';	}	$form .= _MB_AUDIO_DESCRIPTION . " : <input name=\"options[4]\" value=\"1\" type=\"radio\" " . $checked_yes . "/>" . _YES . "&nbsp;\n";	$form .= "<input name=\"options[4]\" value=\"0\" type=\"radio\" " . $checked_no . "/>" . _NO . "<br /><br />\n";
	$form .= _MB_AUDIO_IMGW . " : <input name=\"options[5]\" size=\"5\" maxlength=\"255\" value=\"" . $options[5] . "\" type=\"text\" /><br />\n";   $form .= _MB_AUDIO_DESCCHARS . " : <input name=\"options[6]\" size=\"5\" maxlength=\"255\" value=\"" . $options[6] . "\" type=\"text\" /><br />\n";
   
   if ($options[7] == false){		$checked_yes = '';		$checked_no = 'checked="checked"';	}else{		$checked_yes = 'checked="checked"';		$checked_no = '';	}	$form .= _MB_AUDIO_INFO . " : <input name=\"options[7]\" value=\"1\" type=\"radio\" " . $checked_yes . "/>" . _YES . "&nbsp;\n";	$form .= "<input name=\"options[7]\" value=\"0\" type=\"radio\" " . $checked_no . "/>" . _NO . "<br />\n";
   $form .= _MB_AUDIO_ID . " : <input name=\"options[8]\" size=\"5\" maxlength=\"255\" value=\"" . $options[8] . "\" type=\"text\" /><br />\n";
   	array_shift($options);	array_shift($options);	array_shift($options);	array_shift($options);	array_shift($options);
	array_shift($options);
	array_shift($options);
	array_shift($options);
	array_shift($options);
	$form .= _MB_AUDIO_CATTODISPLAY . "<br /><select name=\"options[]\" multiple=\"multiple\" size=\"5\">\n";	$form .= "<option value=\"0\" " . (array_search(0, $options) === false ? '' : 'selected="selected"') . ">" . _MB_AUDIO_ALLCAT . "</option>\n";	foreach (array_keys($downloadscat_arr) as $i) {		$form .= "<option value=\"" . $downloadscat_arr[$i]->getVar('cat_cid') . "\" " . (array_search($downloadscat_arr[$i]->getVar('cat_cid'), $options) === false ? '' : 'selected="selected"') . ">".$downloadscat_arr[$i]->getVar('cat_title')."</option>\n";	}	$form .= "</select>\n";	return $form;}?>