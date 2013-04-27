<?php
function video_checkModuleAdmin()
{
    if ( file_exists($GLOBALS['xoops']->path('/Frameworks/moduleclasses/moduleadmin/moduleadmin.php'))){
        include_once $GLOBALS['xoops']->path('/Frameworks/moduleclasses/moduleadmin/moduleadmin.php');
        return true;
    } else {
        echo xoops_error("Error: You don't use the Frameworks \"admin module\". Please install this Frameworks");
        return false;
    }
}

function video_MygetItemIds($permtype,$dirname)
{
	global $xoopsUser;
	static $permissions = array();
	if(is_array($permissions) && array_key_exists($permtype, $permissions)) {
		return $permissions[$permtype];
	}
	$module_handler =& xoops_gethandler('module');
	$Module =& $module_handler->getByDirname($dirname);
	$groups = is_object($xoopsUser) ? $xoopsUser->getGroups() : XOOPS_GROUP_ANONYMOUS;
	$gperm_handler =& xoops_gethandler('groupperm');
	$categories = $gperm_handler->getItemIds($permtype, $groups, $Module->getVar('mid'));
	return $categories;
}
/**

* retourne le nombre de t�l�chargements dans le cat�gories enfants d'une cat�gorie

**/
function video_NumbersOfEntries($mytree, $categories, $entries,$cid)
{
	$count = 0;
	$child_arr = array();
	if(in_array($cid, $categories)) {
		$child = $mytree->getAllChild($cid);
		foreach (array_keys($entries) as $i) {
			if ($entries[$i]->getVar('cid') == $cid){
				$count++;
			}
			foreach (array_keys($child) as $j) {
				if ($entries[$i]->getVar('cid') == $j){
					$count++;
				}
			}
		}
	}
	return $count;
}
function video_Thumbnail($time, $status) {
    global $xoopsModuleConfig;
    $count = 7;
    $new = '';
    $startdate = (time()-(86400 * $count));
    if($xoopsModuleConfig['showupdated'] == 1) {
        if ($startdate < $time) {
            $language = $GLOBALS['xoopsConfig']['language'];
            if ( !is_dir( XOOPS_ROOT_PATH . "/modules/video/language/" . $language . "/" ) ){
                $language = 'english';
            }
            $img_path = XOOPS_ROOT_PATH . "/modules/video/language/" . $language . "/images/";
            $img_url = XOOPS_URL . "/modules/video/language/" . $language . "/images/";
            if($status==1) {
                if ( is_readable( $img_path . 'new.png') ){
                    $new = '&nbsp;<img src="' . $img_url . 'new.png" alt="" />';
                } else {
                    $new = '&nbsp;<img src="' . XOOPS_URL . '/modules/video/language/english/images/new.png" alt="" />';
                }
            }elseif($status==2) {
                if ( is_readable( $img_path . 'updated.png') ){                    
                    $new = '&nbsp;<img src="' . $img_url . 'updated.png" alt="" />';
                } else {
                    $new = '&nbsp;<img src="' . XOOPS_URL . '/modules/video/language/english/images/updated.png" alt="" />';
                }
                
            }
        }
    }
    return $new;
}

function video_Popular($hits) {
    global $xoopsModuleConfig;
    $pop = '';
    if ($hits >= $xoopsModuleConfig['popular']) {
        $language = $GLOBALS['xoopsConfig']['language'];
        if ( !is_dir( XOOPS_ROOT_PATH . "/modules/video/language/" . $language . "/" ) ){
            $language = 'english';
        }
        $img_path = XOOPS_ROOT_PATH . "/modules/video/language/" . $language . "/images/";
        $img_url = XOOPS_URL . "/modules/video/language/" . $language . "/images/";
        if ( is_readable( $img_path . 'popular.png') ){
            $pop = '&nbsp;<img src="' . $img_url . 'popular.png" alt="" />';
        } else {
            $pop = '&nbsp;<img src ="' . XOOPS_URL . '/modules/video/language/english/images/popular.png" alt="" />';
        }
    }
    return $pop;
}

function trans_size($size) {
	if($size>0) {
		$mb = 1024*1024;
		if ( $size > $mb ) {
			$mysize = sprintf ("%01.2f",$size/$mb) . _AM_VIDEO_MB;
		}
		elseif ( $size >= 1024 ) {
			$mysize = sprintf ("%01.2f",$size/1024) . _AM_VIDEO_KB;
		}
		else {
			$mysize = sprintf(_AM_VIDEO_NUMBYTES,$size);
		}
		return $mysize;
	} else {
		return '';
	}
}

function formatTime($secs) {
	if($secs < 3600) {
		$times = array(60, 1);
		$time = '';
		$tmp = '';
		for($i = 0; $i < 2; $i++) {
			$tmp = floor($secs / $times[$i]);
			if($tmp < 1) {
				$tmp = '00';
			}
			elseif($tmp < 10) {
				$tmp = '0' . $tmp;
			}
			$time .= $tmp;
			if($i < 1) {
				$time .= ':';
			}
			$secs = $secs % $times[$i];
		}
	} else {
		$times = array(3600, 60, 1);
		$time = '';
		$tmp = '';
		for($i = 0; $i < 3; $i++) {
			$tmp = floor($secs / $times[$i]);
			if($tmp < 1) {
				$tmp = '00';
			}
			elseif($tmp < 10) {
				$tmp = '0' . $tmp;
			}
			$time .= $tmp;
			if($i < 2) {
				$time .= ':';
			}
			$secs = $secs % $times[$i];
		}
	}		
	return $time;
}

function video_CleanVars( &$global, $key, $default = '', $type = 'int' ) {
	switch ( $type ) {
		case 'string':
			$ret = ( isset( $global[$key] ) ) ? filter_var( $global[$key], FILTER_SANITIZE_MAGIC_QUOTES ) : $default;
			break;
		case 'int': default:
			$ret = ( isset( $global[$key] ) ) ? filter_var( $global[$key], FILTER_SANITIZE_NUMBER_INT ) : $default;
			break;
	}
	if ( $ret === false ) {
		return $default;
	}
	return $ret;
}

function video_PathTree($mytree, $key, $category_array, $title, $prefix = '' )
{
	$category_parent = $mytree->getAllParent($key);
	$category_parent = array_reverse($category_parent);
	$Path = '';
	foreach (array_keys($category_parent) as $j) {
		$Path .= $category_parent[$j]->getVar($title) . $prefix;
	}
	if (array_key_exists($key, $category_array)){
		$first_category = $category_array[$key]->getVar($title);
	} else {
		$first_category = '';
	}
	$Path .= $first_category;
	return $Path;
}

function video_PathTreeUrl($mytree, $key, $category_array, $title, $prefix = '', $link = false, $order = 'ASC', $lasturl = false)
{
	global $xoopsModule;
	$category_parent = $mytree->getAllParent($key);
	$Path = '<a href="' . XOOPS_URL . '">' . _MD_VIDEO_HOME . '</a>' . $prefix;
	if ($order == 'ASC'){
		$category_parent = array_reverse($category_parent);
		if ($link == true) {
			$Path .= '<a href="index.php">' . $xoopsModule->name() . '</a>' . $prefix;
		} else {
			$Path .= $xoopsModule->name() . $prefix;
		}
	} else {
		if (array_key_exists($key, $category_array)){
			$first_category = $category_array[$key]->getVar($title);
		} else {
			$first_category = '';
		}
		$Path = $first_category . $prefix;
	}
	foreach (array_keys($category_parent) as $j) {
		if ($link == true) {
			$Path .= '<a href="viewcat.php?cid=' . $category_parent[$j]->getVar('cat_cid') . '">' . $category_parent[$j]->getVar($title) . '</a>' . $prefix;
		} else {
			$Path .= $category_parent[$j]->getVar($title) . $prefix;
		}
	}
	if ($order == 'ASC'){
		if (array_key_exists($key, $category_array)){
			if ($lasturl == true){
				$first_category = '<a href="viewcat.php?cid=' . $category_array[$key]->getVar('cat_cid') . '">' . $category_array[$key]->getVar($title) . '</a>';
			} else {
				$first_category = $category_array[$key]->getVar($title);
			}
		} else {
			$first_category = '';
		}
		$Path .= $first_category;
	} else {
		if ($link == true) {
			$Path .= '<a href="index.php">' . $xoopsModule->name() . '</a>';
		} else {
			$Path .= $xoopsModule->name();
		}
	}
	return $Path;
}

function video_checkrelated($inputs) {
	$inputs = htmlspecialchars($inputs);
	$inputs = explode(',', $inputs);
	foreach ($inputs as $input){
		$input = filter_var( $input, FILTER_SANITIZE_NUMBER_INT );
		if(!empty($input)) {
			$output[] = $input;
		}
	}
	$output = array_unique($output);
	$output = implode(",", $output);
	return $output;
}

	/**
	 * Generate function for update user post
	 *
	 * @ Update user post count after send approve content
	 * @ Update user post count after change status content
	 * @ Update user post count after delete content
	 */
	function Video_Updateposts($uid, $status, $action) {
		switch ($action) {
			case 'add' :
				if ($uid && $status) {
					$user = new xoopsUser ( $uid );
					$member_handler = & xoops_gethandler ( 'member' );
					$member_handler->updateUserByField ( $user, 'posts', $user->getVar ( 'posts' ) + 1 );
				}
				break;
			
			case 'delete' :
				if ($uid && $status) {
					$user = new xoopsUser ( $uid );
					$member_handler = & xoops_gethandler ( 'member' );
					$member_handler->updateUserByField ( $user, 'posts', $user->getVar ( 'posts' ) - 1 );
				}
				break;
			
			case 'status' :
				if ($uid) {
					$user = new xoopsUser ( $uid );
					$member_handler = & xoops_gethandler ( 'member' );
					if ($status) {
						$member_handler->updateUserByField ( $user, 'posts', $user->getVar ( 'posts' ) - 1 );
					} else {
						$member_handler->updateUserByField ( $user, 'posts', $user->getVar ( 'posts' ) + 1 );
					}
				}
				break;
		}
	}
?>