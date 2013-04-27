<?php 
// Call header
require dirname(__FILE__) . '/header.php';
// Define default value
$op = Cv_Utils::Cv_CleanVars($_REQUEST, 'op', '', 'string');

switch ($op)
{
	case 'add':
	   $obj = $thesis_handler->create();
		$obj->Form();
		break;
		
	case 'edit':
	   $id = Cv_Utils::Cv_CleanVars($_GET, 'id', 0, 'int');
      if ($id > 0) {
          $obj = $thesis_handler->get($id);
		    $obj->Form();
      } else {
          redirect_header('thesis.php', 1, _AM_CV_MSG_EDIT_ERROR);
      }
		break;
		
	case 'save':
	   $thesis_id = Cv_Utils::Cv_CleanVars($_POST, 'thesis_id', 0, 'int');
	   if($thesis_id > 0) {
		   $obj = $thesis_handler->get($thesis_id); 
	   } else {
	   	$obj = $thesis_handler->create();
	   	$obj->setVar('thesis_create', time());
	   }	
	   $obj->setVars($_POST);	
	   if(!$thesis_handler->insert($obj)) {
			redirect_header( 'onclick="javascript:history.go(-1);"', 1, _AM_CV_MSG_ERROR);
		}
		// Redirect page
		redirect_header('thesis.php', 1, _AM_CV_MSG_WAIT);
		break;
		
	case 'delete':
      $id = Cv_Utils::Cv_CleanVars($_GET, 'id', 0, 'int');
      if ($id > 0) {
          xoops_confirm(array("id"=>$id), 'thesis.php?op=deleting', _AM_CV_MSG_DELETE);
      } 
		break;

	case 'deleting':
	
		break;

	default:
	case 'list':
      // get start information
      if (isset($_GET['start'])) {
         $option['start'] = Cv_Utils::Cv_CleanVars($_GET, 'start', 0, 'int');
      } else {
         $option['start'] = 0;
      } 

	   $list = $thesis_handler->GetList($option);
	   $count = $thesis_handler->GetListCount();
	   
	   if ($count > 25) {
         $pagenav = new XoopsPageNav($count, 25, $option['start'], 'start');
         $pagenav = $pagenav->renderNav(4);
      } else {
         $pagenav = '';
      }
      
      $xoopsTpl->assign('list', $list);
      $xoopsTpl->assign('pagenav', $pagenav);
		// Call template file
		$xoopsTpl->display(XOOPS_ROOT_PATH . '/modules/cv/templates/admin/cv_thesis.html');
		break;			
}

// Call footer
require dirname(__FILE__) . '/footer.php';
?>