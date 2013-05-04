<?php
require 'header.php';
xoops_cp_header();

$op = tv_CleanVars($_REQUEST, 'op', '', 'string');
$day = tv_CleanVars($_REQUEST, 'day', '', 'int');

$xoTheme->addStylesheet(XOOPS_URL . '/modules/system/css/admin.css');

switch ($op)
{
    case 'new_list':
        $obj = $list_handler->create();
		  $obj->getListForm();
        break;

    case 'edit_list':
        $list_id = tv_CleanVars($_REQUEST, 'list_id', 0, 'int');
        if ($list_id > 0) {
            $obj = $list_handler->get($list_id);
			   $obj->getListForm();
        } else {
            redirect_header('list.php', 1, _AM_TV_MSG_EDIT_ERROR);
        }
        break; 
        
     case 'delete_list':
        $list_id = tv_CleanVars($_REQUEST, 'list_id', 0, 'int');
        if ($list_id > 0) {
            // Prompt message
            xoops_confirm(array("list_id"=>$list_id), 'backend.php?op=deletelist', _AM_TV_MSG_DELETE);
				xoops_cp_footer();
        } 
        break; 
       
              
     case 'order':
        if (isset($_POST['mod'])) {
            $i = 1;
            foreach ($_POST['mod'] as $order) {
                if ($order > 0) {
                    $contentorder = $list_handler->get($order);
                    $contentorder->setVar('list_order', $i);
                    if (!$list_handler->insert($contentorder)) {
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
		  $xoTheme->addScript(XOOPS_URL . '/modules/tv/js/order.js');
		  $xoTheme->addScript(XOOPS_URL . '/modules/tv/js/admin.js');
		  // Add module stylesheet
		  $xoTheme->addStylesheet(XOOPS_URL . '/modules/system/css/ui/' . xoops_getModuleOption('jquery_theme', 'system') . '/ui.all.css');
		  $xoTheme->addStylesheet(XOOPS_URL . '/modules/system/css/admin.css');
      
        $info = array();
        $info['list_sort'] = 'list_order';
        $info['list_order'] = 'ASC';
        
        // Select day
        if($day) {
	        	$info['list_day'] = $day;
        } else {
	        	$info['list_day'] = null;
        }
        		
	     // get limited information
        if (isset($_REQUEST['limit'])) {
            $info['list_limit'] = tv_CleanVars($_REQUEST, 'limit', 0, 'int');
        } else {
            $info['list_limit'] = xoops_getModuleOption ( 'admin_perpage', 'tv' );
        }

        // get start information
        if (isset($_REQUEST['start'])) {
            $info['list_start'] = tv_CleanVars($_REQUEST, 'start', 0, 'int');
        } else {
            $info['list_start'] = 0;
        }
        
        $lists = $list_handler->adminList($info);
        $list_numrows = $list_handler->listCount();

        if ($list_numrows > $info['list_limit']) {
            $list_pagenav = new XoopsPageNav($list_numrows,  $info['list_limit'], $info['list_start'], 'start', 'limit=' . $info['list_limit']);
            $list_pagenav = $list_pagenav->renderNav(4);
        } else {
            $list_pagenav = '';
        }
        
        $xoopsTpl->assign('lists', $lists);
        $xoopsTpl->assign('list_pagenav', $list_pagenav);
        
        // Call template file
		  $xoopsTpl->display(XOOPS_ROOT_PATH . '/modules/tv/templates/admin/tv_list.html');
	     break;     
}        

// footer
xoops_cp_footer();
?>