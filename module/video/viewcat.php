<?php

// Module header
include 'header.php';
// Page template
$xoopsOption ['template_main'] = 'video_viewcat.html';
// Xoops Header
include_once XOOPS_ROOT_PATH . '/header.php';
// Main page style
$xoTheme->addStylesheet ( XOOPS_URL . '/modules/' . $xoopsModule->getVar ( 'dirname', 'n' ) . '/css/style.css', null );
// Check permissions
$categories = video_MygetItemIds ( 'video_view', 'video' );
// Get cat Id
$cid = video_CleanVars ( $_REQUEST, 'cid', 0, 'int' );
// Check category exist
$criteria = new CriteriaCompo ();
$criteria->add ( new Criteria ( 'cat_cid', $cid ) );
if ($downloadscat_Handler->getCount ( $criteria ) == 0 || $cid == 0) {
	redirect_header ( 'index.php', 3, _MD_VIDEO_CAT_NONEXISTENT );
	exit ();
}
// Check category permissions
if (! in_array ( intval ( $_REQUEST ['cid'] ), $categories )) {
	redirect_header ( 'index.php', 2, _NOPERM );
	exit ();
}
// Get category
$categorie = $downloadscat_Handler->get ( $cid );
// Get all sub categories$criteria = new CriteriaCompo ();
$criteria->add ( new Criteria ( 'cat_cid', '(' . implode ( ',', $categories ) . ')', 'IN' ) );
if($categorie->getVar('cat_weight')) {
	$criteria->add ( new Criteria ( 'cat_weight', 0, '!=' ) );
}	
$criteria->setSort ( 'cat_weight ASC, cat_title' );
$criteria->setOrder ( 'ASC' );
$downloadscat_arr = $downloadscat_Handler->getall ( $criteria );
$mytree = new XoopsObjectTree ( $downloadscat_arr, 'cat_cid', 'cat_pid' );
//breadcrumb
$breadcrumb = video_PathTreeUrl ( $mytree, $cid, $downloadscat_arr, 'cat_title', $prefix = ' &raquo; ', true, 'ASC' );
$xoopsTpl->assign ( 'breadcrumb', $breadcrumb );
// video cat and sub cats
$video_cats[] = $categorie->getVar('cat_cid');
// Make categories tree
$count = 1;
$keywords = '';
foreach ( array_keys ( $downloadscat_arr ) as $i ) {
	if ($downloadscat_arr [$i]->getVar ( 'cat_pid' ) == $cid) {
		$keywords .= $downloadscat_arr[$i]->getVar ( 'cat_title' ) . ',';
		$xoopsTpl->append ( 'subcategories', array ('image' => $uploadurl . $downloadscat_arr [$i]->getVar ( 'cat_imgurl' ), 'id' => $downloadscat_arr [$i]->getVar ( 'cat_cid' ), 'title' => $downloadscat_arr [$i]->getVar ( 'cat_title' ), 'description_main' => $downloadscat_arr [$i]->getVar ( 'cat_description_main' ), 'count' => $count , 'weight' => $downloadscat_arr [$i]->getVar ( 'cat_weight' ) ) );
		$count ++;
		$video_cats[] = $downloadscat_arr[$i]->getVar('cat_cid');
	}
}

// Make video list
if ($xoopsModuleConfig ['perpage'] > 0) {
   
   // Get numrows
   $criteria = new CriteriaCompo ();
	$criteria->add ( new Criteria ( 'status', 0, '!=' ) );
	$criteria->add ( new Criteria ( 'cid', '(' . implode ( ',', $video_cats ) . ')', 'IN' ) );
	$numrows = $downloads_Handler->getCount ( $criteria );

	// Get video list	if (isset ( $_REQUEST ['limit'] )) {
		$criteria->setLimit ( $_REQUEST ['limit'] );
		$limit = $_REQUEST ['limit'];
	} else {
		$criteria->setLimit ( $xoopsModuleConfig ['perpage'] );
		$limit = $xoopsModuleConfig ['perpage'];
	}
	if (isset ( $_REQUEST ['start'] )) {
		$criteria->setStart ( $_REQUEST ['start'] );
		$start = $_REQUEST ['start'];
	} else {
		$criteria->setStart ( 0 );
		$start = 0;
	}
	if (isset ( $_REQUEST ['sort'] )) {
		$criteria->setSort ( $_REQUEST ['sort'] );
		$sort = $_REQUEST ['sort'];
	} else {
		$criteria->setSort ( 'date' );
		$sort = 'date';
	}
	if (isset ( $_REQUEST ['order'] )) {
		$criteria->setOrder ( $_REQUEST ['order'] );
		$order = $_REQUEST ['order'];
	} else {
		$criteria->setOrder ( 'DESC' );
		$order = 'DESC';
	}
	$downloads_arr = $downloads_Handler->getall ( $criteria );
	
	// Set pagenav
	if ($numrows > $limit) {
		$pagenav = new XoopsPageNav ( $numrows, $limit, $start, 'start', 'limit=' . $limit . '&cid=' . intval ( $_REQUEST ['cid'] ) . '&sort=' . $sort . '&order=' . $order );
		$pagenav = $pagenav->renderNav ( 4 );
	} else {
		$pagenav = '';
	}
	$xoopsTpl->assign ( 'pagenav', $pagenav );

	// Set paremeter
	$categories = video_MygetItemIds ( 'video_download', 'video' );
	$item = video_MygetItemIds ( 'video_download_item', 'video' );
	foreach ( array_keys ( $downloads_arr ) as $i ) {
		
		// Set image
		if ($downloads_arr [$i]->getVar ( 'logourl' ) == 'blank.gif') {
			$logourl = '';
		} else {
			$logourl = $downloads_arr [$i]->getVar ( 'url' ) . $uploadpach_shots . $downloads_arr [$i]->getVar ( 'logourl' );
		}
		
		// Set time
		$datetime = formatTimestamp ( $downloads_arr [$i]->getVar ( 'date' ), 's' );
		
		// Set user
		//$submitter = XoopsUser::getUnameFromId ( $downloads_arr [$i]->getVar ( 'submitter' ) );
		
		// Set description
		$description = $downloads_arr [$i]->getVar ( 'description' );
		if (strpos ( $description, '[pagebreak]' ) == false) {
			$description_short = $description;
		} else {
			$description_short = substr ( $description, 0, strpos ( $description, '[pagebreak]' ) );
		}
		
		// Set Popular and New		$new = video_Thumbnail ( $downloads_arr [$i]->getVar ( 'date' ), $downloads_arr [$i]->getVar ( 'status' ) );
		$pop = video_Popular ( $downloads_arr [$i]->getVar ( 'hits' ) );
		
		// Set Admin link		if (is_object ( $xoopsUser ) && $xoopsUser->isAdmin ( $xoopsModule->mid () )) {
			$adminlink = '<a href="' . XOOPS_URL . '/modules/video/admin/downloads.php?op=view_downloads&amp;downloads_lid=' . $downloads_arr [$i]->getVar ( 'lid' ) . '" title="' . _MD_VIDEO_EDITTHISDL . '"><img src="' . XOOPS_URL . '/modules/video/images/editicon.png" width="16px" height="16px" border="0" alt="' . _MD_VIDEO_EDITTHISDL . '" /></a>';
		} else {
			$adminlink = '';
		}
		
		//download permission		if ($xoopsModuleConfig ['permission_download'] == 1) {
			if (! in_array ( $downloads_arr [$i]->getVar ( 'cid' ), $categories )) {
				$perm_download = false;
			} else {
				$perm_download = true;
			}
		} else {
			if (! in_array ( $downloads_arr [$i]->getVar ( 'lid' ), $item )) {
				$perm_download = false;
			} else {
				$perm_download = true;
			}
		}
		
		// Set duration
		$duration = formatTime($downloads_arr [$i]->getVar ( 'duration' ));
		
		// Set title
		$title = mb_substr ( strip_tags($downloads_arr [$i]->getVar ( 'title' ) ), 0, 28, 'utf-8' ) . '...';
		
		// category
		$category = $downloadscat_arr[$downloads_arr[$i]->getVar('cid')]->getVar('cat_title');
		
		// Send information to template
		$xoopsTpl->append ( 'file', array ('id' => $downloads_arr [$i]->getVar ( 'lid' ), 'cid' => $downloads_arr [$i]->getVar ( 'cid' ), 'title' => $title, 'fulltitle' => $downloads_arr [$i]->getVar ( 'title' ) . $new . $pop, 'shorttitle' => $downloads_arr [$i]->getVar ( 'title' ), 'logourl' => $logourl, 'updated' => $datetime, 'description_short' => $description_short, 'adminlink' => $adminlink, 'perm_download' => $perm_download ,'duration' => $duration ,'hits' => $downloads_arr [$i]->getVar ( 'hits' ), 'category' => $category) );
		
		//Set keyword		$keywords .= $downloads_arr [$i]->getVar ( 'title' ) . ',';
	}

	// Set sort	if ($numrows > 1) {
		$xoopsTpl->assign ( 'navigation', true );
		$xoopsTpl->assign ( 'category_id', intval ( $_REQUEST ['cid'] ) );
		$sortorder = $sort . $order;
		if ($sortorder == "hitsASC")
		$affichage_tri = _MD_VIDEO_CAT_POPULARITYLTOM;
		if ($sortorder == "hitsDESC")
		$affichage_tri = _MD_VIDEO_CAT_POPULARITYMTOL;
		if ($sortorder == "titleASC")
		$affichage_tri = _MD_VIDEO_CAT_TITLEATOZ;
		if ($sortorder == "titleDESC")
		$affichage_tri = _MD_VIDEO_CAT_TITLEZTOA;
		if ($sortorder == "dateASC")
		$affichage_tri = _MD_VIDEO_CAT_DATEOLD;
		if ($sortorder == "dateDESC")
		$affichage_tri = _MD_VIDEO_CAT_DATENEW;
		if ($sortorder == "ratingASC")
		$affichage_tri = _MD_VIDEO_CAT_RATINGLTOH;
		if ($sortorder == "ratingDESC")
		$affichage_tri = _MD_VIDEO_CAT_RATINGHTOL;
		$xoopsTpl->assign ( 'affichage_tri', sprintf ( _MD_VIDEO_CAT_CURSORTBY, $affichage_tri ) );
	}
	
}

// Set page title
$pagetitle = video_PathTreeUrl ( $mytree, $cid, $downloadscat_arr, 'cat_title', $prefix = ' - ', false, 'DESC' );
$xoopsTpl->assign ( 'xoops_pagetitle', $pagetitle );

//description
$xoTheme->addMeta ( 'meta', 'description', strip_tags ( $downloadscat_arr [$cid]->getVar ( 'cat_description_main' ) ) );

//keywords
$keywords = substr ( $keywords, 0, - 1 );
$xoTheme->addMeta ( 'meta', 'keywords', $keywords );

// Send info to template
$xoopsTpl->assign ( 'nbcolumn', $xoopsModuleConfig ['nbcolumn'] );
$xoopsTpl->assign ( 'shotwidth', $xoopsModuleConfig ['shotwidth'] );

// Add Xoops Footer
include XOOPS_ROOT_PATH . '/footer.php';
?>