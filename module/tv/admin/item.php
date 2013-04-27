<?php
require 'header.php';
xoops_cp_header();

$op = tv_CleanVars($_REQUEST, 'op', '', 'string');

switch ($op)
{
	 case 'new_item':
        $obj = $item_handler->create();
		  $obj->getItemForm();
        break;

    case 'edit_item':
        $item_id = tv_CleanVars($_REQUEST, 'item_id', 0, 'int');
        if ($item_id > 0) {
            $obj = $item_handler->get($item_id);
			   $obj->getItemForm();
        } else {
            redirect_header('item.php', 1, _AM_TV_MSG_EDIT_ERROR);
        }
        break;
    
    case 'delete_item':
        $item_id = tv_CleanVars($_REQUEST, 'item_id', 0, 'int');
        if ($item_id > 0) {
            // Prompt message
            xoops_confirm(array("item_id"=>$item_id), 'backend.php?op=deleteitem', _AM_TV_MSG_DELETE);
				xoops_cp_footer();
        } 
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
        $info['item_sort'] = 'item_id';
        $info['item_order'] = 'ASC';
        
        // get limited information
        if (isset($_REQUEST['limit'])) {
            $info['item_limit'] = tv_CleanVars($_REQUEST, 'limit', 0, 'int');
        } else {
            $info['item_limit'] = xoops_getModuleOption ( 'admin_perpage', 'tv' );
        }

        // get start information
        if (isset($_REQUEST['start'])) {
            $info['item_start'] = tv_CleanVars($_REQUEST, 'start', 0, 'int');
        } else {
            $info['item_start'] = 0;
        }
        
        $info['alltopics'] = $list_handler->getall();
        $items = $item_handler->itemAdminList($info);
        $item_numrows = $item_handler->itemCount();

        if ($item_numrows > $info['item_limit']) {
            $item_pagenav = new XoopsPageNav($item_numrows,  $info['item_limit'], $info['item_start'], 'start', 'limit=' . $info['item_limit']);
            $item_pagenav = $item_pagenav->renderNav(4);
        } else {
            $item_pagenav = '';
        }
        
        $xoopsTpl->assign('items', $items);
        $xoopsTpl->assign('item_pagenav', $item_pagenav);
        
		  // Call template file
		  $xoopsTpl->display(XOOPS_ROOT_PATH . '/modules/tv/templates/admin/tv_item.html');
		  break; 
}        

// footer
xoops_cp_footer();
?>