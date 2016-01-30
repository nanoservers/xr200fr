<?phpfunction b_VIDEO_show_show($options){    require_once XOOPS_ROOT_PATH . "/modules/video/include/functions.php";    $downloads_Handler =& xoops_getModuleHandler('video_downloads', 'video');    global $xoTheme, $xoopsModuleConfig;    $block = array();    $video = array();    $sort = $options[0];    $flv_height = $options[1];    $flv_width = $options[2];    array_shift($options);    array_shift($options);    array_shift($options);    $time = time() - '60*60*24*30';    $xoTheme->addScript(XOOPS_URL . '/modules/video/js/jwplayer/jwplayer.js');    $uploadpach_shots = '/uploads/video/images/shots/';    $uploadpach_flv = '/uploads/video/flv/';    $uploadpach_mp4 = '/uploads/video/mp4/';    switch ($sort) {        case 'random':            $criteria = new CriteriaCompo();            $criteria->add(new Criteria('top', 1));            $criteria->add(new Criteria('status', 0, '!='));            $criteria->add(new Criteria('date', $time, '<'));            $criteria->setSort('RAND()');            $criteria->setLimit(1);            break;        case 'select':            $criteria = new CriteriaCompo();            $criteria->add(new Criteria('lid', '(' . implode(',', $options) . ')', 'IN'));            $criteria->setLimit(1);            break;    }    $downloads_arr = $downloads_Handler->getall($criteria);    foreach (array_keys($downloads_arr) as $i) {        $video[$i]['lid'] = $downloads_arr[$i]->getVar('lid');        $video[$i]['title'] = $downloads_arr[$i]->getVar('title');        $video[$i]['hits'] = $downloads_arr[$i]->getVar("hits");        $video[$i]['rating'] = number_format($downloads_arr[$i]->getVar("rating"), 1);        $video[$i]['date'] = formatTimeStamp($downloads_arr[$i]->getVar("date"), "s");        $video[$i]['logourl'] = XOOPS_URL . '/' . $xoopsModuleConfig['overlogo'];        $video[$i]['flvHeight'] = $flv_height;        $video[$i]['flvWidth'] = $flv_width;        $video[$i]['description'] = $downloads_arr[$i]->getVar('description');        $video[$i]['type'] = $downloads_arr[$i]->getVar('type');        if ($video[$i]['type'] == 'flv') {            $video[$i]['flashFile'] = $downloads_arr[$i]->getVar('url') . $uploadpach_flv . $downloads_arr[$i]->getVar('filename') . '.flv';        } elseif ($video[$i]['type'] == 'mp4') {            $video[$i]['flashFile'] = $downloads_arr[$i]->getVar('url') . $uploadpach_mp4 . $downloads_arr[$i]->getVar('filename') . '.mp4';        }        $video[$i]['imgurl'] = $downloads_arr[$i]->getVar('url') . $uploadpach_shots . $downloads_arr[$i]->getVar('logourl');    }    $block['video'] = $video;    return $block;}function b_VIDEO_show_edit($options){    $downloadscat_Handler =& xoops_getModuleHandler('video_downloads', 'video');    $criteria = new CriteriaCompo();    $criteria->add(new Criteria('status', 0, '!='));    $criteria->add(new Criteria('top', 1));    $criteria->setOrder('DESC');    $criteria->setLimit(50);    $downloadscat_arr = $downloadscat_Handler->getall($criteria);    $sort = new XoopsFormSelect(_MB_VIDEO_SORT, 'options[]', $options[0]);    $sort->addOption("random", _MB_VIDEO_RANDOM);    $sort->addOption("select", _MB_VIDEO_SELECT);    $form = _MB_VIDEO_SORT . " : " . $sort->render() . '<br />';    $form .= _MB_VIDEO_HEIGHT . " : <input name=\"options[1]\" size=\"5\" maxlength=\"255\" value=\"" . $options[1] . "\" type=\"text\" />&nbsp;<br />";    $form .= _MB_VIDEO_WIDTH . " : <input name=\"options[2]\" size=\"5\" maxlength=\"255\" value=\"" . $options[2] . "\" type=\"text\" /><br />";    array_shift($options);    array_shift($options);    array_shift($options);    $form .= _MB_VIDEO_VIDTODISPLAY . "<br /><select name=\"options[]\" >";    foreach (array_keys($downloadscat_arr) as $i) {        $form .= "<option value=\"" . $downloadscat_arr[$i]->getVar('lid') . "\" " . (array_search($downloadscat_arr[$i]->getVar('lid'), $options) === false ? '' : 'selected="selected"') . ">" . $downloadscat_arr[$i]->getVar('title') . "</option>";    }    $form .= "</select>";    return $form;}?>