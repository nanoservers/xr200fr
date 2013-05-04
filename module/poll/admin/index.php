<?php
// $Id: index.php,v 1.18 2005/06/26 15:38:29 mithyt2 Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
include '../../../include/cp_header.php';
include XOOPS_ROOT_PATH."/modules/poll/include/constants.php";
include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
include_once XOOPS_ROOT_PATH."/class/xoopslists.php";
include_once XOOPS_ROOT_PATH."/class/xoopsblock.php";
include_once XOOPS_ROOT_PATH."/modules/poll/class/poll.php";
include_once XOOPS_ROOT_PATH."/modules/poll/class/polloption.php";
include_once XOOPS_ROOT_PATH."/modules/poll/class/polllog.php";
include_once XOOPS_ROOT_PATH."/modules/poll/class/pollrenderer.php";

$op = "list";

if (!empty($_GET['op'])) {
	$op = $_GET['op'];
}
if ( isset($_POST) ) {
	foreach ( $_POST as $k => $v ) {
		$$k = $v;
	}
}

if ( $op == "list" ) {
	$limit = (!empty($_GET['limit'])) ? $_GET['limit'] : 30;
	$start = (!empty($_GET['start'])) ? $_GET['start'] : 0;
	$polls_arr =& poll::getAll(array(), true, "weight ASC, end_time DESC", $limit+1, $start);
	xoops_cp_header();
	echo "<h4>"._AM_POLLCONF."</h4>";
	echo "<h4 style='text-align:left;'>"._AM_POLLSLIST."</h4>";
	$polls_count = count($polls_arr);
	if ( is_array($polls_arr) && $polls_count > 0) {
		echo "<form action='index.php' method='post'><table border='0' cellpadding='0' cellspacing='0' width='100%'><tr><td class='bg2'>
		<table width='100%' border='0' cellpadding='4' cellspacing='1'>
		<tr class='bg3'><td>"._AM_DISPLAYBLOCK."</td><td>"._AM_DISPLAYORDER."</td><td>"._AM_POLLQUESTION."</td><td>"._AM_VOTERS."</td><td>"._AM_VOTES."</td><td>"._AM_EXPIRATION."</td><td>&nbsp;</td></tr>";
		$max = ( $polls_count > $limit ) ? $limit : $polls_count;
		for ( $i = 0; $i < $max; $i++ ) {
			$checked = "";
			if ( 1 == $polls_arr[$i]->getVar("display") ) {
				$checked = " checked='checked'";
			}
			if ( $polls_arr[$i]->getVar("end_time") > time() ) {
				$end = formatTimestamp($polls_arr[$i]->getVar("end_time"),"m");
			} else {
				$end = "<span style='color:#ff0000;'>"._AM_EXPIRED."</span><br /><a href='index.php?op=restart&amp;poll_id=".$polls_arr[$i]->getVar("poll_id")."'>"._AM_RESTART."</a>";
			}
			echo "<tr class='bg1'><td align='center'><input type='hidden' name='poll_id[$i]' value='".$polls_arr[$i]->getVar("poll_id")."' /><input type='hidden' name='old_display[$i]' value='".$polls_arr[$i]->getVar("display")."' /><input type='checkbox' name='display[$i]' value='1'".$checked." /></td><td><input type='hidden' name='old_weight[$i]' value='".$polls_arr[$i]->getVar("weight")."' /><input type='text' name='weight[$i]' value='".$polls_arr[$i]->getVar("weight")."' size='6' maxlength='5' /></td><td>".$polls_arr[$i]->getVar("question")."</td><td align='center'>".$polls_arr[$i]->getVar("voters")."</td><td align='center'>".$polls_arr[$i]->getVar("votes")."</td><td>".$end."</td><td align='right'><a href='index.php?op=edit&amp;poll_id=".$polls_arr[$i]->getVar("poll_id")."'>"._EDIT."</a><br /><a href='index.php?op=delete&amp;poll_id=".$polls_arr[$i]->getVar("poll_id")."'>"._DELETE."</a><br /><a href='index.php?op=log&amp;poll_id=".$polls_arr[$i]->getVar("poll_id")."'>"._AM_VIEWLOG."</a></td></tr>";
		}
		echo "<tr align='right' class='bg3'><td colspan='7'><input type='button' name='button' onclick=\"location='index.php?op=add'\" value='"._AM_ADDPOLL."' /> <input type='submit' value='"._SUBMIT."' /><input type='hidden' name='op' value='quickupdate' /></td></tr></table></td></tr></table></form>";
		echo "<table width='100%'><tr><td align='left'>";
		if ( $start > 0 ) {
			$prev_start = ($start - $limit > 0) ? $start - $limit : 0;
			echo "<a href='index.php?start=".$prev_start."&amp;limit=".$limit."'>"._PL_PREV."</a>";
		} else {
			echo "&nbsp;";
		}
		echo "</td><td align='right'>";
		if ( $polls_count > $limit ) {
			echo "<a href='index.php?start=".($start+$limit)."&amp;limit=".$limit."'>"._PL_NEXT."</a>";
		}
		echo "</td></tr></table>";
	}
	xoops_cp_footer();
	exit();
}

if ( $op == "add" ) {
	$poll_form = new XoopsThemeForm(_AM_CREATNEWPOLL, "poll_form", "index.php", "post", true);
	$question_text = new XoopsFormText(_AM_POLLQUESTION, "question", 50, 255);
	$poll_form->addElement($question_text);
	$desc_tarea = new XoopsFormTextarea(_AM_POLLDESC, "description");
	$poll_form->addElement($desc_tarea);
	$currenttime = formatTimestamp(time(), "Y-m-d H:i:s");
	$endtime = formatTimestamp(time()+604800, "Y-m-d H:i:s");
	$expire_text = new XoopsFormText(_AM_EXPIRATION."<br /><small>"._AM_FORMAT."<br />".sprintf(_AM_CURRENTTIME, $currenttime)."</small>", "end_time", 30, 19, $endtime);
	$poll_form->addElement($expire_text);
	$disp_yn = new XoopsFormRadioYN(_AM_DISPLAYBLOCK, "display", 1);
	$poll_form->addElement($disp_yn);
	$weight_text = new XoopsFormText(_AM_DISPLAYORDER, "weight", 6, 5, 0);
	$poll_form->addElement($weight_text);
	$multi_yn = new XoopsFormRadioYN(_AM_ALLOWMULTI, "multiple", 0);
	$poll_form->addElement($multi_yn);
	$anonymous_yn = new XoopsFormRadioYN(_AM_ALLOWANONYMOUS, "anonymous", 1); 
	$poll_form->addElement($anonymous_yn);
	$notify_yn = new XoopsFormRadioYN(_AM_NOTIFY, "notify", 1);
	$poll_form->addElement($notify_yn);
	$option_tray = new XoopsFormElementTray(_AM_POLLOPTIONS, "");
	$barcolor_array = XoopsLists::getImgListAsArray(XOOPS_ROOT_PATH."/modules/poll/images/colorbars/");
	for($i = 0; $i < 10; $i++){
		$current_bar = (current($barcolor_array) != "blank.gif") ? current($barcolor_array) : next($barcolor_array);
		$option_text = new XoopsFormText("", "option_text[]", 50, 255);
		$option_tray->addElement($option_text);
		$color_select = new XoopsFormSelect("", "option_color[".$i."]", $current_bar);
		$color_select->addOptionArray($barcolor_array);
		$color_select->setExtra("onchange='showImgSelected(\"option_color_image[".$i."]\", \"option_color[".$i."]\", \"modules/poll/images/colorbars\", \"\", \"".XOOPS_URL."\")'");
		$color_label = new XoopsFormLabel("", "<img src='".XOOPS_URL."/modules/poll/images/colorbars/".$current_bar."' name='option_color_image[".$i."]' id='option_color_image[".$i."]' width='30' align='bottom' height='15' alt='' /><br />");
		$option_tray->addElement($color_select);
		$option_tray->addElement($color_label);
		if ( !next($barcolor_array) ) {
			reset($barcolor_array);
		}
		unset($color_select, $color_label);
	}
	$poll_form->addElement($option_tray);
	$submit_button = new XoopsFormButton("", "poll_submit", _SUBMIT, "submit");
	$poll_form->addElement($submit_button);
	$op_hidden = new XoopsFormHidden("op", "save");
	$poll_form->addElement($op_hidden);
	xoops_cp_header();
	echo "<h4>"._AM_POLLCONF."</h4>";
	$poll_form->display();
	xoops_cp_footer();
	exit();
}

if ( $op == "save" ) {
    if (!$GLOBALS['xoopsSecurity']->check()) {
        redirect_header('index.php', 3, implode('<br />', $GLOBALS['xoopsSecurity']->getErrors()));
    }
	$poll = new poll();
	$poll->setVar("question", $question);
	$poll->setVar("description", $description);
	if ( !empty($end_time) ) {
		$poll->setVar("end_time", userTimeToServerTime(strtotime($end_time), $xoopsUser->timezone()));
	} else {
		// if expiration date is not set, set it to 10 days from now
		$poll->setVar("end_time", time() + (86400 * 10));
	}
	$poll->setVar("display", $display);
	$poll->setVar("weight", $weight);
	$poll->setVar("multiple", $multiple);
	$poll->setVar("anonymous", $anonymous);
	if ( $notify == 1 ) {
		// if notify, set mail status to "not mailed"
		$poll->setVar("mail_status", POLL_NOTMAILED);
	} else {
		// if not notify, set mail status to already "mailed"
		$poll->setVar("mail_status", POLL_MAILED);
	}
	$poll->setVar("user_id", $xoopsUser->getVar("uid"));
	$new_poll_id = $poll->store();
	if ( !empty($new_poll_id) ) {
		$i = 0;
		foreach ( $option_text as $optxt ) {
			$optxt = trim($optxt);
			if ( $optxt != "" ) {
				$option = new pollOption();
				$option->setVar("option_text", $optxt);
				$option->setVar("option_color", $option_color[$i]);
				$option->setVar("poll_id", $new_poll_id);
				$option->store();
			}
			$i++;
		}
		include_once XOOPS_ROOT_PATH.'/class/template.php';
		xoops_template_clear_module_cache($xoopsModule->getVar('mid'));
	} else {
		echo $poll->getHtmlErrors();
		exit();
	}
	redirect_header("index.php",1,_AM_DBUPDATED);
	exit();
}

if ( $op == "edit" ) {
	$poll = new poll($_GET['poll_id']);
	$poll_form = new XoopsThemeForm(_AM_EDITPOLL, "poll_form", "index.php", "post", true);
	$author_label = new XoopsFormLabel(_AM_AUTHOR, "<a href='".XOOPS_URL."/userinfo.php?uid=".$poll->getVar("user_id")."'>".XoopsUser::getUnameFromId($poll->getVar("user_id"))."</a>");
	$poll_form->addElement($author_label);
	$question_text = new XoopsFormText(_AM_POLLQUESTION, "question", 50, 255, $poll->getVar("question", "E"));
	$poll_form->addElement($question_text);
	$desc_tarea = new XoopsFormTextarea(_AM_POLLDESC, "description", $poll->getVar("description", "E"));
	$poll_form->addElement($desc_tarea);
	$date = formatTimestamp($poll->getVar("end_time"), "Y-m-d H:i:s");
	if ( !$poll->hasExpired() ) {
		$expire_text = new XoopsFormText(_AM_EXPIRATION."<br /><small>"._AM_FORMAT."<br />".sprintf(_AM_CURRENTTIME, formatTimestamp(time(), "Y-m-d H:i:s"))."</small>", "end_time", 20, 19, $date);
		$poll_form->addElement($expire_text);
	} else {
		$restart_label = new XoopsFormLabel(_AM_EXPIRATION, sprintf(_AM_EXPIREDAT, $date)."<br /><a href='index.php?op=restart&amp;poll_id=".$poll->getVar("poll_id")."'>"._AM_RESTART."</a>");
		$poll_form->addElement($restart_label);
	}
	$disp_yn = new XoopsFormRadioYN(_AM_DISPLAYBLOCK, "display", $poll->getVar("display"));
	$poll_form->addElement($disp_yn);
	$weight_text = new XoopsFormText(_AM_DISPLAYORDER, "weight", 6, 5, $poll->getVar("weight"));
	$poll_form->addElement($weight_text);
	$multi_yn = new XoopsFormRadioYN(_AM_ALLOWMULTI, "multiple", $poll->getVar("multiple"));
	$poll_form->addElement($multi_yn);
		$anonymous_yn = new XoopsFormRadioYN(_AM_ALLOWANONYMOUS, "anonymous", $poll->getVar("anonymous")); 
	$poll_form->addElement($anonymous_yn);
	$options_arr =& pollOption::getAllByPollId($poll->getVar("poll_id"));
	$notify_value = 1;
	if ( $poll->getVar("mail_status") != 0 ) {
		$notify_value = 0;
	}
	$notify_yn = new XoopsFormRadioYN(_AM_NOTIFY, "notify", $notify_value);
	$poll_form->addElement($notify_yn);
	$option_tray = new XoopsFormElementTray(_AM_POLLOPTIONS, "");
	$barcolor_array =& XoopsLists::getImgListAsArray(XOOPS_ROOT_PATH."/modules/poll/images/colorbars/");
	$i = 0;
	foreach($options_arr as $option){
		$option_text = new XoopsFormText("", "option_text[]", 50, 255, $option->getVar("option_text"));
		$option_tray->addElement($option_text);
		$option_id_hidden = new XoopsFormHidden("option_id[]", $option->getVar("option_id"));
		$option_tray->addElement($option_id_hidden);
		$color_select = new XoopsFormSelect("", "option_color[".$i."]", $option->getVar("option_color"));
		$color_select->addOptionArray($barcolor_array);
		$color_select->setExtra("onchange='showImgSelected(\"option_color_image[".$i."]\", \"option_color[".$i."]\", \"modules/poll/images/colorbars\", \"\", \"".XOOPS_URL."\")'");
		$color_label = new XoopsFormLabel("", "<img src='".XOOPS_URL."/modules/poll/images/colorbars/".$option->getVar("option_color", "E")."' name='option_color_image[".$i."]' id='option_color_image[".$i."]' width='30' align='bottom' height='15' alt='' /><br />");
		$option_tray->addElement($color_select);
		$option_tray->addElement($color_label);
		unset($color_select, $color_label, $option_id_hidden, $option_text);
		$i++;
	}
	$more_label = new XoopsFormLabel("", "<br /><a href='index.php?op=addmore&amp;poll_id=".$poll->getVar("poll_id")."'>"._AM_ADDMORE."</a>");
	$option_tray->addElement($more_label);
	$poll_form->addElement($option_tray);
	$op_hidden = new XoopsFormHidden("op", "update");
	$poll_form->addElement($op_hidden);
	$poll_id_hidden = new XoopsFormHidden("poll_id", $poll->getVar("poll_id"));
	$poll_form->addElement($poll_id_hidden);
	$submit_button = new XoopsFormButton("", "poll_submit", _SUBMIT, "submit");
	$poll_form->addElement($submit_button);
	xoops_cp_header();
	echo "<h4>"._AM_POLLCONF."</h4>";
	$poll_form->display();
	xoops_cp_footer();
	exit();
}

if ( $op == "update" ) {
    if (!$GLOBALS['xoopsSecurity']->check()) {
        redirect_header('index.php', 3, implode('<br />', $GLOBALS['xoopsSecurity']->getErrors()));
    }
	$poll = new poll($poll_id);
	$poll->setVar("question", $question);
	$poll->setVar("description", $description);
	if ( !empty($end_time) ) {
		$end_time = userTimeToServerTime(strtotime($end_time), $xoopsUser->timezone());
		$poll->setVar("end_time", $end_time);
	}
	$poll->setVar("display", $display);
	$poll->setVar("weight", $weight);
	$poll->setVar("multiple", $multiple);
	$poll->setVar("anonymous", $anonymous);
	if ( $notify == 1 && $end_time > time() ) {
		// if notify, set mail status to "not mailed"
		$poll->setVar("mail_status", POLL_NOTMAILED);
	} else {
		// if not notify, set mail status to already "mailed"
		$poll->setVar("mail_status", POLL_MAILED);
	}
	if ( !$poll->store() ) {
		echo $poll->getHtmlErrors();
		exit();
	}
	$i = 0;
	foreach ( $option_id as $opid ) {
		$option = new pollOption($opid);
		$option_text[$i] = trim ($option_text[$i]);
		if ( $option_text[$i] != "" ) {
			$option->setVar("option_text", $option_text[$i]);
			$option->setVar("option_color", $option_color[$i]);
			$option->store();
		} else {
			if ( $option->delete() != false ) {
				pollLog::deleteByOptionId($option->getVar("option_id"));
			}
		}
		$i++;
	}
	$poll->updateCount();
	include_once XOOPS_ROOT_PATH.'/class/template.php';
	xoops_template_clear_module_cache($xoopsModule->getVar('mid'));
	redirect_header("index.php",1,_AM_DBUPDATED);
	exit();
}

if ( $op == "addmore" ) {
	$poll = new poll($_GET['poll_id']);
	$poll_form = new XoopsThemeForm(_AM_ADDMORE, "poll_form", "index.php", 'post', true);
	$question_label = new XoopsFormLabel(_AM_POLLQUESTION, $poll->getVar("question"));
	$poll_form->addElement($question_label);
	$option_tray = new XoopsFormElementTray(_AM_POLLOPTIONS, "");
	$barcolor_array =& XoopsLists::getImgListAsArray(XOOPS_ROOT_PATH."/modules/poll/images/colorbars/");
	for($i = 0; $i < 10; $i++){
		$current_bar = (current($barcolor_array) != "blank.gif") ? current($barcolor_array) : next($barcolor_array);
		$option_text = new XoopsFormText("", "option_text[]", 50, 255);
		$option_tray->addElement($option_text);
		$color_select = new XoopsFormSelect("", "option_color[".$i."]", $current_bar);
		$color_select->addOptionArray($barcolor_array);
		$color_select->setExtra("onchange='showImgSelected(\"option_color_image[".$i."]\", \"option_color[".$i."]\", \"modules/poll/images/colorbars\", \"\", \"".XOOPS_URL."\")'");
		$color_label = new XoopsFormLabel("", "<img src='".XOOPS_URL."/modules/poll/images/colorbars/".$current_bar."' name='option_color_image[".$i."]' id='option_color_image[".$i."]' width='30' align='bottom' height='15' alt='' /><br />");
		$option_tray->addElement($color_select);
		$option_tray->addElement($color_label);
		unset($color_select, $color_label, $option_text);
		if ( !next($barcolor_array) ) {
			reset($barcolor_array);
		}
	}
	$poll_form->addElement($option_tray);
	$submit_button = new XoopsFormButton("", "poll_submit", _SUBMIT, "submit");
	$poll_form->addElement($submit_button);
	$op_hidden = new XoopsFormHidden("op", "savemore");
	$poll_form->addElement($op_hidden);
	$poll_id_hidden = new XoopsFormHidden("poll_id", $poll->getVar("poll_id"));
	$poll_form->addElement($poll_id_hidden);
	xoops_cp_header();
	echo "<h4>"._AM_POLLCONF."</h4>";
	$poll_form->display();
	xoops_cp_footer();
	exit();
}

if ( $op == "savemore" ) {
    if (!$GLOBALS['xoopsSecurity']->check()) {
        redirect_header('index.php', 3, implode('<br />', $GLOBALS['xoopsSecurity']->getErrors()));
    }
	$poll = new poll($poll_id);
	$i = 0;
	foreach ( $option_text as $optxt ) {
		$optxt = trim($optxt);
		if ( $optxt != "" ) {
			$option = new pollOption();
			$option->setVar("option_text", $optxt);
			$option->setVar("poll_id", $poll->getVar("poll_id"));
			$option->setVar("option_color", $option_color[$i]);
			$option->store();
		}
		$i++;
	}
	include_once XOOPS_ROOT_PATH.'/class/template.php';
	xoops_template_clear_module_cache($xoopsModule->getVar('mid'));
	redirect_header("index.php",1,_AM_DBUPDATED);
	exit();
}

if ( $op == "delete" ) {
	xoops_cp_header();
	echo "<h4>"._AM_POLLCONF."</h4>";
	$poll = new poll($_GET['poll_id']);
	xoops_confirm(array('op' => 'delete_ok', 'poll_id' => $poll->getVar('poll_id')), 'index.php', sprintf(_AM_RUSUREDEL,$poll->getVar("question")));
	xoops_cp_footer();
	exit();
}

if ( $op == "delete_ok" ) {
    if (!$GLOBALS['xoopsSecurity']->check()) {
        redirect_header('index.php', 3, implode('<br />', $GLOBALS['xoopsSecurity']->getErrors()));
    }
	$poll = new poll($poll_id);
	if ( $poll->delete() != false ) {
		pollOption::deleteByPollId($poll->getVar("poll_id"));
		pollLog::deleteByPollId($poll->getVar("poll_id"));
		include_once XOOPS_ROOT_PATH.'/class/template.php';
		xoops_template_clear_module_cache($xoopsModule->getVar('mid'));
		// delete comments for this poll
		xoops_comment_delete($xoopsModule->getVar('mid'), $poll->getVar('poll_id'));

	}
	redirect_header("index.php",1,_AM_DBUPDATED);
	exit();
}

if ( $op == "restart" ) {
	$poll = new poll($_GET['poll_id']);
	$poll_form = new XoopsThemeForm(_AM_RESTARTPOLL, "poll_form", "index.php", 'post', true);
	$expire_text = new XoopsFormText(_AM_EXPIRATION."<br /><small>"._AM_FORMAT."<br />".sprintf(_AM_CURRENTTIME, formatTimestamp(time(), "Y-m-d H:i:s"))."</small>", "end_time", 20, 19, formatTimestamp(time()+604800, "Y-m-d H:i:s"));
	$poll_form->addElement($expire_text);
	$notify_yn = new XoopsFormRadioYN(_AM_NOTIFY, "notify", 1);
	$poll_form->addElement($notify_yn);
	$reset_yn = new XoopsFormRadioYN(_AM_RESET, "reset", 0);
	$poll_form->addElement($reset_yn);
	$op_hidden = new XoopsFormHidden("op", "restart_ok");
	$poll_form->addElement($op_hidden);
	$poll_id_hidden = new XoopsFormHidden("poll_id", $poll->getVar("poll_id"));
	$poll_form->addElement($poll_id_hidden);
	$submit_button = new XoopsFormButton("", "poll_submit", _AM_RESTART, "submit");
	$poll_form->addElement($submit_button);
	xoops_cp_header();
	echo "<h4>"._AM_POLLCONF."</h4>";
	$poll_form->display();
	xoops_cp_footer();
	exit();
}

if ( $op == "restart_ok" ) {
    if (!$GLOBALS['xoopsSecurity']->check()) {
        redirect_header('index.php', 3, implode('<br />', $GLOBALS['xoopsSecurity']->getErrors()));
    }
	$poll = new poll($poll_id);
	if ( !empty($end_time) ) {
		$end_time = userTimeToServerTime(strtotime($end_time), $xoopsUser->timezone());
		$poll->setVar("end_time", $end_time);
	} else {
		$poll->setVar("end_time", time() + (86400 * 10));
	}
	if ( $notify == 1 && $end_time > time() ) {
		// if notify, set mail status to "not mailed"
		$poll->setVar("mail_status", POLL_NOTMAILED);
	} else {
		// if not notify, set mail status to already "mailed"
		$poll->setVar("mail_status", POLL_MAILED);
	}
	if ( $reset == 1 ) {
		// reset all logs
		pollLog::deleteByPollId($poll->getVar("poll_id"));
		pollOption::resetCountByPollId($poll->getVar("poll_id"));
	}
	if (!$poll->store()) {
		echo $poll->getHtmlErrors();
		exit();
	}
	$poll->updateCount();
	include_once XOOPS_ROOT_PATH.'/class/template.php';
	xoops_template_clear_module_cache($xoopsModule->getVar('mid'));
	redirect_header("index.php",1,_AM_DBUPDATED);
	exit();
}

if ( $op == "log" ) {
	$poll_id = $_GET['poll_id'];
	$limit = (!empty($_GET['limit'])) ? $_GET['limit'] : 30;
	$start = (!empty($_GET['start'])) ? $_GET['start'] : 0;
	
	$orderby = (!empty($_GET['orderby'])) ? $_GET['orderby'] : "time";
	$orderdir = (!empty($_GET['orderdir'])) ? $_GET['orderdir'] : "ASC";

	$poll = new poll($poll_id);
	
	xoops_cp_header();
	echo "<h4>"._AM_POLLCONF."</h4>";
	echo "<h4 style='text-align:left;'>"._AM_LOGSLIST."</h4>";
	// show brief descriptions of the question we are focusing
	echo "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
	echo "<tr><td class='bg2'>";
	echo "<table width='100%' border='0' cellpadding='4' cellspacing='1'>";
	echo "<tr class='bg3'>";
	echo "<td nowrap>"._AM_POLLQUESTION."</td><td nowrap>"._AM_POLLDESC."</td>";
	echo "<td nowrap>"._AM_VOTERS."</td><td nowrap>"._AM_VOTES."</td>";
	echo "<td nowrap>"._AM_EXPIRATION."</td>";
	echo "</tr>";
	echo "<tr class='bg1'>";
	echo "<td>".$poll->getVar('question')."</td><td>".$poll->getVar('description')."</td>";
	echo "<td align='center'>".$poll->getVar('voters')."</td><td align='center'>".$poll->getVar('votes')."</td>";
	echo "<td>".formatTimestamp($poll->getVar('end_time'), "l")."</td>";
	echo "</tr>";
	echo "</table>";
	echo "</td></tr>";
	echo "</table>";
	echo "<br>";

	// show logs
	$logs_arr =& pollLog::getAllByPollId($poll_id, $orderby." ".$orderdir);
	$logs_count = count($logs_arr);
	$arrow_up = XOOPS_URL."/modules/poll/images/up.gif";
	$arrow_down = XOOPS_URL."/modules/poll/images/down.gif";
	$sorthref = "index.php?op=log&amp;poll_id=".$poll_id."&amp;orderby=";
	if ( is_array($logs_arr) && $logs_count > 0) {
		echo "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
		echo "<tr><td class='bg2'>";
		echo "<table width='100%' border='0' cellpadding='4' cellspacing='1'>";
		echo "<tr class='bg3'>";
		echo "<td nowrap>";
		echo "<a href='".$sorthref."log_id&amp;orderdir=ASC'><img src=".$arrow_up."></a>";
		echo "<a href='".$sorthref."log_id&amp;orderdir=DESC'><img src=".$arrow_down."></a>&nbsp;"._AM_LOGID."</td>";
		echo "<td nowrap>";
		echo "<a href='".$sorthref."option_id&amp;orderdir=ASC'><img src=".$arrow_up."></a>";
		echo "<a href='".$sorthref."option_id&amp;orderdir=DESC'><img src=".$arrow_down."></a>&nbsp;"._AM_OPTIONID."</td>";
		echo "<td nowrap>";
		echo "<a href='".$sorthref."ip&amp;orderdir=ASC'><img src=".$arrow_up."></a>";
		echo "<a href='".$sorthref."ip&amp;orderdir=DESC'><img src=".$arrow_down."></a>&nbsp;"._AM_IP."</td>";
		echo "<td nowrap>";
		echo "<a href='".$sorthref."user_id&amp;orderdir=ASC'><img src=".$arrow_up."></a>";
		echo "<a href='".$sorthref."user_id&amp;orderdir=DESC'><img src=".$arrow_down."></a>&nbsp;"._AM_VOTER."</td>";
		echo "<td nowrap>";
		echo "<a href='".$sorthref."time&amp;orderdir=ASC'><img src=".$arrow_up."></a>";
		echo "<a href='".$sorthref."time&amp;orderdir=DESC'><img src=".$arrow_down."></a>&nbsp;"._AM_VOTETIME."</td>";
//		echo "<td nowrap>&nbsp;</td>";
		echo "</tr>";

		$max = ( $logs_count > $limit ) ? $limit : $logs_count;
		for ( $i = 0; $i < $max; $i++ ) {
			$option = new pollOption($logs_arr[$i]->getVar("option_id"));
			echo "<tr class='bg1'>";
			echo "<td align='center'>".$logs_arr[$i]->getVar("log_id")."</td>";
			echo "<td>".$option->getVar('option_text')."</td>";

			if ($xoopsModuleConfig['lookuphost'] == 1) {
				$remote_ip = gethostbyaddr_with_cache($logs_arr[$i]->getVar("ip"));
			} else {
				$remote_ip = $logs_arr[$i]->getVar("ip");
			}
			echo "<td align='center'>".$remote_ip."</td>";

			if ($logs_arr[$i]->getVar("user_id") != 0) {
				$user = new XoopsUser($logs_arr[$i]->getVar("user_id"));
				$uname = $user->getVar('uname');
				echo "<td align='center'><a href=".XOOPS_URL."/userinfo.php?uid=".$user->getVar("uid").">".$uname."</a></td>";
			} else {
				$uname = $xoopsConfig['anonymous'];
				echo "<td align='center'>".$uname."</td>";
			}
			echo "<td>".formatTimeStamp($logs_arr[$i]->getVar("time"), "l")."</td>";
//			echo "<td>"._DELETE."</td>";
			echo "</tr>";
		}
		echo "</table></td></tr></table>";

		echo "<table width='100%'><tr><td align='left'>";
		if ( $start > 0 ) {
			$prev_start = ($start - $limit > 0) ? $start - $limit : 0;
			echo "<a href='index.php?op=log&amp;poll_id=".$poll_id."&amp;start=".$prev_start."&amp;limit=".$limit."'>"._PL_PREV."</a>";
		} else {
			echo "&nbsp;";
		}
		echo "</td><td align='right'>";
		if ( $logs_count > $limit ) {
			echo "<a href='index.php?op=log&amp;poll_id=".$poll_id."&amp;start=".($start+$limit)."&amp;limit=".$limit."'>"._PL_NEXT."</a>";
		}
		echo "</td></tr></table>";
	}

	// Link to polls list
	echo "<table width='100%'><tr><td align='center'>[<a href='index.php?op=list'>"._AM_RETURNLIST."</a>]</td></tr></table>";

	xoops_cp_footer();
	exit();
}

if ( $op == "quickupdate" ) {
	$count = count($poll_id);
	for ( $i = 0; $i < $count; $i++ ) {
		$display[$i] = empty($display[$i]) ? 0 : 1;
		$weight[$i] = empty($weight[$i]) ? 0 : $weight[$i];
		if ( $display[$i] != $old_display[$i] || $weight[$i] != $old_weight[$i] ) {
			$poll = new poll($poll_id[$i]);
			$poll->setVar("display", $display[$i]);
			$poll->setVar("weight", intval($weight[$i]));
			$poll->store();
		}
	}
	include_once XOOPS_ROOT_PATH.'/class/template.php';
	xoops_template_clear_module_cache($xoopsModule->getVar('mid'));
	redirect_header("index.php",1,_AM_DBUPDATED);
	exit();
}
?>