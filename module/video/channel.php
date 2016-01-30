<?php

// Module header
include 'header.php';
// Page template
$xoopsOption ['template_main'] = 'video_channel.html';
// Xoops Header
include_once XOOPS_ROOT_PATH . '/header.php';
// Main page style
$xoTheme->addStylesheet(XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname', 'n') . '/css/style.css', null);
// Check permissions
$categories = video_MygetItemIds('video_view', 'video');
// Get User Id
$user = video_CleanVars($_GET, 'user', 0, 'int');

if (!$user) {
    if ($xoopsUser) {
        $user = $xoopsUser->getVar('uid');
    }
}

// redirection si pas de droit pour poster
if ($perm_channel == false) {
    redirect_header('index.php', 2, _NOPERM);
    exit();
}

// Check user exist
if (!$user) {
    redirect_header('index.php', 3, _MD_VIDEO_CHANNEL_NOTSELECT);
    exit ();
}

// Get number of files in module/cat
$criteria = new CriteriaCompo ();
$criteria->add(new Criteria ('status', 0, '!='));
$criteria->add(new Criteria ('cid', '(' . implode(',', $categories) . ')', 'IN'));
$criteria->add(new Criteria ('submitter', $user));
$numrows = $downloads_Handler->getCount($criteria);

if (!$numrows) {
    redirect_header('index.php', 3, _MD_VIDEO_CHANNEL_NOVIDEO);
    exit ();
}

// breadcrumb
$breadcrumb = _MD_VIDEO_CHANNEL_PAGENAVE . ' &raquo; ' . XoopsUser::getUnameFromId($user);
$xoopsTpl->assign('breadcrumb', $breadcrumb);
$xoopsTpl->assign('breadcrumb', $breadcrumb);

// Check use video shot
if ($xoopsModuleConfig ['useshots'] == 1) {
    $xoopsTpl->assign('shotwidth', $xoopsModuleConfig ['shotwidth']);
    $xoopsTpl->assign('show_screenshot', true);
}

// Get video list
if (isset ($_REQUEST ['limit'])) {
    $criteria->setLimit($_REQUEST ['limit']);
    $limit = $_REQUEST ['limit'];
} else {
    $criteria->setLimit($xoopsModuleConfig ['perpage']);
    $limit = $xoopsModuleConfig ['perpage'];
}
if (isset ($_REQUEST ['start'])) {
    $criteria->setStart($_REQUEST ['start']);
    $start = $_REQUEST ['start'];
} else {
    $criteria->setStart(0);
    $start = 0;
}
if (isset ($_REQUEST ['sort'])) {
    $criteria->setSort($_REQUEST ['sort']);
    $sort = $_REQUEST ['sort'];
} else {
    $criteria->setSort('date');
    $sort = 'date';
}
if (isset ($_REQUEST ['order'])) {
    $criteria->setOrder($_REQUEST ['order']);
    $order = $_REQUEST ['order'];
} else {
    $criteria->setOrder('DESC');
    $order = 'DESC';
}
$downloads_arr = $downloads_Handler->getall($criteria);

// Set pagenav
if ($numrows > $limit) {
    $pagenav = new XoopsPageNav ($numrows, $limit, $start, 'start', 'limit=' . $limit . '&user=' . $user);
    $pagenav = $pagenav->renderNav(4);
} else {
    $pagenav = '';
}
$xoopsTpl->assign('pagenav', $pagenav);

// Start make video list
foreach (array_keys($downloads_arr) as $i) {

    // Set image
    if ($downloads_arr [$i]->getVar('logourl') == 'blank.gif') {
        $logourl = '';
    } else {
        $logourl = $downloads_arr [$i]->getVar('url') . $uploadpach_shots . $downloads_arr [$i]->getVar('logourl');
    }

    // Set time
    $datetime = formatTimestamp($downloads_arr [$i]->getVar('date'), 's');

    // Set user
    //$submitter = XoopsUser::getUnameFromId ( $downloads_arr [$i]->getVar ( 'submitter' ) );

    // Set description
    $description = $downloads_arr [$i]->getVar('description');
    if (strpos($description, '[pagebreak]') == false) {
        $description_short = $description;
    } else {
        $description_short = substr($description, 0, strpos($description, '[pagebreak]'));
    }

    // Set Popular and New
    $new = video_Thumbnail($downloads_arr [$i]->getVar('date'), $downloads_arr [$i]->getVar('status'));
    $pop = video_Popular($downloads_arr [$i]->getVar('hits'));

    // Set Admin link
    if (is_object($xoopsUser) && $xoopsUser->isAdmin($xoopsModule->mid())) {
        $adminlink = '<a href="' . XOOPS_URL . '/modules/video/admin/downloads.php?op=view_downloads&amp;downloads_lid=' . $downloads_arr [$i]->getVar('lid') . '" title="' . _MD_VIDEO_EDITTHISDL . '"><img src="' . XOOPS_URL . '/modules/video/images/editicon.png" width="16px" height="16px" border="0" alt="' . _MD_VIDEO_EDITTHISDL . '" /></a>';
    } else {
        $adminlink = '';
    }

    //download permission
    if ($xoopsModuleConfig ['permission_download'] == 1) {
        if (!in_array($downloads_arr [$i]->getVar('cid'), $categories)) {
            $perm_download = false;
        } else {
            $perm_download = true;
        }
    } else {
        if (!in_array($downloads_arr [$i]->getVar('lid'), $item)) {
            $perm_download = false;
        } else {
            $perm_download = true;
        }
    }

    // Set duration
    $duration = formatTime($downloads_arr [$i]->getVar('duration'));

    // Set title
    $title = mb_substr(strip_tags($downloads_arr [$i]->getVar('title')), 0, 28, 'utf-8') . '...';

    // Send information to template
    $xoopsTpl->append('file', array('id' => $downloads_arr [$i]->getVar('lid'), 'cid' => $downloads_arr [$i]->getVar('cid'), 'title' => $title, 'fulltitle' => $downloads_arr [$i]->getVar('title') . $new . $pop, 'shorttitle' => $downloads_arr [$i]->getVar('title'), 'logourl' => $logourl, 'updated' => $datetime, 'description_short' => $description_short, 'adminlink' => $adminlink, 'perm_download' => $perm_download, 'duration' => $duration, 'hits' => $downloads_arr [$i]->getVar('hits')));

    //Set keyword
    $keywords = $downloads_arr [$i]->getVar('title') . ',';
}
// end make video list

// profile
$member_handler =& xoops_gethandler('member');
$thisUser =& $member_handler->getUser($user);

if ($thisUser->getVar('user_avatar') && "blank.gif" != $thisUser->getVar('user_avatar')) {
    $avatar = XOOPS_UPLOAD_URL . "/" . $thisUser->getVar('user_avatar');
}

$profile = array();
$profile['avatar'] = $avatar;
$profile['uname'] = $thisUser->getVar('uname');
$profile['bio'] = $thisUser->getVar('bio');
$profile['video'] = $numrows;

if ($xoopsUser && $user == $xoopsUser->getVar('uid')) {
    $userinfo = true;
} else {
    $userinfo = false;
}

$xoopsTpl->assign('profile', $profile);
$xoopsTpl->assign('userinfo', $userinfo);

// Set page title
$xoopsTpl->assign('xoops_pagetitle', _MD_VIDEO_CHANNEL_PAGENAVE);

//description
$xoTheme->addMeta('meta', 'description', _MD_VIDEO_CHANNEL_PAGENAVE);

//keywords
$keywords = substr($keywords, 0, -1);
$xoTheme->addMeta('meta', 'keywords', $keywords);

// Send info to template
$xoopsTpl->assign('nbcolumn', $xoopsModuleConfig ['nbcolumn']);

// Add Xoops Footer
include XOOPS_ROOT_PATH . '/footer.php';
?>