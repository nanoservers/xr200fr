<?php 
// Call header
require dirname(__FILE__) . '/header.php';
// Define default value
$op = Cv_Utils::Cv_CleanVars($_REQUEST, 'op', '', 'string');
$level = Cv_Utils::Cv_CleanVars($_REQUEST, 'level', '', 'string');

switch ($op)
{
	case 'add':
	   $obj = $profile_handler->create();
		$obj->Form();
		break;
		
	case 'edit':
	   $id = Cv_Utils::Cv_CleanVars($_GET, 'id', 0, 'int');
      if ($id > 0) {
          $obj = $profile_handler->get($id);
		    $obj->Form();
      } else {
          redirect_header('profile.php', 1, _AM_CV_MSG_EDIT_ERROR);
      }
		break;
		
	case 'save':
	   $profile_id = Cv_Utils::Cv_CleanVars($_POST, 'profile_id', 0, 'int');
	   if($profile_id > 0) {
		   $obj = $profile_handler->get($profile_id); 
	   } else {
	   	$obj = $profile_handler->create();
	   	$obj->setVar('profile_create', time());
	   }	
	   $obj->setVars($_POST);	
	   if(!$profile_handler->insert($obj)) {
			redirect_header( 'onclick="javascript:history.go(-1);"', 1, _AM_CV_MSG_ERROR);
		}
		// Redirect page
		redirect_header('profile.php', 1, _AM_CV_MSG_WAIT);
		break;
		
	case 'delete':
      $id = Cv_Utils::Cv_CleanVars($_GET, 'id', 0, 'int');
      if ($id > 0) {
          xoops_confirm(array("id"=>$id), 'profile.php?op=deleting', _AM_CV_MSG_DELETE);
      } 
		break;

	case 'deleting':
	
		break;
		
	case 'view':
		$id = Cv_Utils::Cv_CleanVars($_GET, 'id', 0, 'int');
      if ($id == 0) {
          redirect_header('profile.php', 1, _AM_CV_MSG_EDIT_ERROR);
      }
      $obj = $profile_handler->get($id);
      $profile = $obj->toArray();
      $xoopsTpl->assign('profile', $profile);
      // Call template file
		$xoopsTpl->display(XOOPS_ROOT_PATH . '/modules/cv/templates/admin/cv_profile_view.html');
		break;
		
	case 'profile_thesis':
	   $id = Cv_Utils::Cv_CleanVars($_GET, 'id', 0, 'int');
      if ($id == 0) {
          redirect_header('profile.php', 1, _AM_CV_MSG_EDIT_ERROR);
      }
      $obj = $profile_handler->get($id);
      $profile = $obj->toArray();
	   switch($level) {
		   case 'add':
	         $obj = $profile_thesis_handler->create();
		      $obj->Form($profile);
			   break;
			   
		   case 'save': 
		   
			   break;
	   }	
		break;
		
	case 'profile_congress':
	
		break;
		
	case 'profile_paper':
	
		break;
		
	case 'profile_project':
	
		break;
		
	case 'profile_arbitration':
	
		break;
		
	case 'profile_journal':
	
		break;	

	default:
	case 'list':
      // get start information
      if (isset($_GET['start'])) {
         $option['start'] = Cv_Utils::Cv_CleanVars($_GET, 'start', 0, 'int');
      } else {
         $option['start'] = 0;
      } 

	   $list = $profile_handler->GetList($option);
	   $count = $profile_handler->GetListCount();
	   
	   if ($count > 25) {
         $pagenav = new XoopsPageNav($count, 25, $option['start'], 'start');
         $pagenav = $pagenav->renderNav(4);
      } else {
         $pagenav = '';
      }
      
      $xoopsTpl->assign('list', $list);
      $xoopsTpl->assign('pagenav', $pagenav);
		// Call template file
		$xoopsTpl->display(XOOPS_ROOT_PATH . '/modules/cv/templates/admin/cv_profile.html');
		break;			
}

// Call footer
require dirname(__FILE__) . '/footer.php';
?>