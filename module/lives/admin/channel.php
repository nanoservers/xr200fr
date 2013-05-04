<?php
require 'header.php';
xoops_cp_header();

$op = lives_CleanVars($_REQUEST, 'op', '', 'string');

switch ($op)
{
	 case 'add':
        $obj = $channel_handler->create();
		  $obj->GetForm();
        break;

    case 'edit':
        $channel_id = lives_CleanVars($_GET, 'channel_id', 0, 'int');
        if ($channel_id > 0) {
            $obj = $channel_handler->get($channel_id);
			   $obj->GetForm();
        } else {
            redirect_header('channel.php', 1, _AM_LIVES_MSG_EDIT_ERROR);
        }
        break;
    
    case 'delete':
        $channel_id = lives_CleanVars($_GET, 'channel_id', 0, 'int');
        if ($channel_id > 0) {
            // Prompt message
            xoops_confirm(array("channel_id"=>$channel_id), 'backend.php?op=delete', _AM_LIVE_MSG_DELETE);
				xoops_cp_footer();
        } 
        break; 
        
     case 'order':
        if (isset($_POST['mod'])) {
            $i = 1;
            foreach ($_POST['mod'] as $order) {
                if ($order > 0) {
                    $contentorder = $channel_handler->get($order);
                    $contentorder->setVar('channel_order', $i);
                    if (!$channel_handler->insert($contentorder)) {
                        $error = true;
                    }
                    $i++;
                }
            }
        }
        exit;
        break;   
     
      default:     
      
        // Define scripts
		  $xoTheme->addScript('browse.php?Frameworks/jquery/jquery.js');
		  $xoTheme->addScript('browse.php?Frameworks/jquery/plugins/jquery.ui.js');
		  $xoTheme->addScript(XOOPS_URL . '/modules/lives/js/order.js');
		  $xoTheme->addScript(XOOPS_URL . '/modules/lives/js/admin.js');
		  // Add module stylesheet
		  $xoTheme->addStylesheet(XOOPS_URL . '/modules/system/css/ui/' . xoops_getModuleOption('jquery_theme', 'system') . '/ui.all.css');
		  $xoTheme->addStylesheet(XOOPS_URL . '/modules/system/css/admin.css');

        $info = array();
       
        // get limited information
        if (isset($_REQUEST['limit'])) {
            $info['limit'] = lives_CleanVars($_REQUEST, 'limit', 0, 'int');
        } else {
            $info['limit'] = 25;
        }

        // get start information
        if (isset($_REQUEST['start'])) {
            $info['start'] = lives_CleanVars($_REQUEST, 'start', 0, 'int');
        } else {
            $info['start'] = 0;
        }
        
        $channels = $channel_handler->AdminList($info);
        $channel_numrows = $channel_handler->Count($info);

        if ($channel_numrows > $info['limit']) {
            $channel_pagenav = new XoopsPageNav($channel_numrows,  $info['limit'], $info['start'], 'start', 'limit=' . $info['limit']);
            $channel_pagenav = $channel_pagenav->renderNav(4);
        } else {
            $channel_pagenav = '';
        }
        
        $xoopsTpl->assign('channels', $channels);
        $xoopsTpl->assign('channel_pagenav', $channel_pagenav);

		  // Call template file
		  $xoopsTpl->display(XOOPS_ROOT_PATH . '/modules/lives/templates/admin/lives_channel.html');
		  break; 

}        

// footer
xoops_cp_footer();
?>