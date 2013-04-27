<?php

if (!defined('XOOPS_ROOT_PATH')) {
	die('XOOPS root path not defined');
}

$modversion['name'] = _MI_VIDEO_NAME;
$modversion['version'] = 1.27;
$modversion['description'] = _MI_VIDEO_DESC;
$modversion['credits'] = "MOHTAVA";
$modversion['author'] = "MOHTAVA";
$modversion['help'] = "video.html";
$modversion['license'] = "GPL see LICENSE";
$modversion['official'] = 1;
$modversion['image'] = "images/video.png";
$modversion['dirname'] = "video";
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['onInstall'] = 'include/install.php';
$modversion['onUpdate'] = 'include/update.php';
$modversion['min_php'] = '5.2';
$modversion['min_xoops'] = '2.5';

//informations compémentaires
$modversion["release"] = "08-06-2012";
$modversion["module_status"] = "Stable";
$modversion['support_site_url']	= "http://www.mohtava.com";
$modversion['support_site_name'] = "www.mohtava.com";

// Tables crée depuis le fichier sql
$modversion['tables'][0] = "video_broken";
$modversion['tables'][1] = "video_cat";
$modversion['tables'][2] = "video_downloads";
$modversion['tables'][3] = "video_mod";
$modversion['tables'][4] = "video_votedata";
$modversion['tables'][5] = "video_field";
$modversion['tables'][6] = "video_fielddata";
$modversion['tables'][7] = "video_modfielddata";

// Pour avoir une administration
$modversion['hasAdmin'] = 1;
$modversion['system_menu'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

// Pour les blocs
$modversion['blocks'][1]['file'] = "video_top.php";
$modversion['blocks'][1]['name'] = _MI_VIDEO_BNAME1;
$modversion['blocks'][1]['description'] = _MI_VIDEO_BNAMEDSC1;
$modversion['blocks'][1]['show_func'] = "b_VIDEO_top_show";
$modversion['blocks'][1]['edit_func'] = "b_VIDEO_top_edit";
$modversion['blocks'][1]['options'] = 'date|10|19|1|1|100|100|0|0|1';
$modversion['blocks'][1]['template'] = 'video_block_new.html';

$modversion['blocks'][2]['file'] = "video_top.php";
$modversion['blocks'][2]['name'] = _MI_VIDEO_BNAME2;
$modversion['blocks'][2]['description'] = _MI_VIDEO_BNAMEDSC2;
$modversion['blocks'][2]['show_func'] = "b_VIDEO_top_show";
$modversion['blocks'][2]['edit_func'] = "b_VIDEO_top_edit";
$modversion['blocks'][2]['options'] = 'hits|10|19|1|1|100|100|0|0|1';
$modversion['blocks'][2]['template'] = 'video_block_top.html';

$modversion['blocks'][3]['file'] = "video_top.php";
$modversion['blocks'][3]['name'] = _MI_VIDEO_BNAME3;
$modversion['blocks'][3]['description'] = _MI_VIDEO_BNAMEDSC3;
$modversion['blocks'][3]['show_func'] = "b_VIDEO_top_show";
$modversion['blocks'][3]['edit_func'] = "b_VIDEO_top_edit";
$modversion['blocks'][3]['options'] = 'rating|10|19|1|1|100|100|0|0|1';
$modversion['blocks'][3]['template'] = 'video_block_rating.html';

$modversion['blocks'][4]['file'] = "video_top.php";
$modversion['blocks'][4]['name'] = _MI_VIDEO_BNAME4;
$modversion['blocks'][4]['description'] = _MI_VIDEO_BNAMEDSC4;
$modversion['blocks'][4]['show_func'] = "b_VIDEO_top_show";
$modversion['blocks'][4]['edit_func'] = "b_VIDEO_top_edit";
$modversion['blocks'][4]['options'] = 'random|10|19|1|1|100|100|0|0|1';
$modversion['blocks'][4]['template'] = 'video_block_random.html';

$modversion['blocks'][5]['file'] = "video_sel.php";
$modversion['blocks'][5]['name'] = _MI_VIDEO_BNAME5;
$modversion['blocks'][5]['description'] = _MI_VIDEO_BNAMEDSC5;
$modversion['blocks'][5]['show_func'] = "b_VIDEO_sel_show";
$modversion['blocks'][5]['edit_func'] = "b_VIDEO_sel_edit";
$modversion['blocks'][5]['options'] = 'random|100|100|0';
$modversion['blocks'][5]['template'] = 'video_block_sel.html';

$modversion['blocks'][6]['file'] = "video_show.php";
$modversion['blocks'][6]['name'] = _MI_VIDEO_BNAME6;
$modversion['blocks'][6]['description'] = _MI_VIDEO_BNAMEDSC6;
$modversion['blocks'][6]['show_func'] = "b_VIDEO_show_show";
$modversion['blocks'][6]['edit_func'] = "b_VIDEO_show_edit";
$modversion['blocks'][6]['options'] = 'random|100|100|0';
$modversion['blocks'][6]['template'] = 'video_block_show.html';

$modversion['blocks'][7]['file'] = "video_top.php";
$modversion['blocks'][7]['name'] = _MI_VIDEO_BNAME7;
$modversion['blocks'][7]['description'] = _MI_VIDEO_BNAMEDSC7;
$modversion['blocks'][7]['show_func'] = "b_VIDEO_top_show";
$modversion['blocks'][7]['edit_func'] = "b_VIDEO_top_edit";
$modversion['blocks'][7]['options'] = 'date|10|19|1|1|100|100|0|0|0|1';
$modversion['blocks'][7]['template'] = 'video_block_new_table.html';

$modversion['blocks'][8]['file'] = "video_top.php";
$modversion['blocks'][8]['name'] = _MI_VIDEO_BNAME8;
$modversion['blocks'][8]['description'] = _MI_VIDEO_BNAMEDSC8;
$modversion['blocks'][8]['show_func'] = "b_VIDEO_top_show";
$modversion['blocks'][8]['edit_func'] = "b_VIDEO_top_edit";
$modversion['blocks'][8]['options'] = 'spotlight|10|19|1|1|100|100|0|1';
$modversion['blocks'][8]['template'] = 'video_block_spotlight.html';

// Menu
$modversion['hasMain'] = 1;
$modversion['sub'][1]['name'] = _MI_VIDEO_SMNAME1;
$modversion['sub'][1]['url'] = "submit.php";
$modversion['sub'][2]['name'] = _MI_VIDEO_SMNAME2;
$modversion['sub'][2]['url'] = "search.php";
$modversion['sub'][3]['name'] = _MI_VIDEO_SMNAME3;
$modversion['sub'][3]['url'] = "channel.php";

// Recherche
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = "include/search.inc.php";
$modversion['search']['func'] = "video_search";

// Commentaires
$modversion['hasComments'] = 1;
$modversion['comments']['itemName'] = 'lid';
$modversion['comments']['pageName'] = 'singlefile.php';
$modversion['comments']['extraParams'] = array('cid');
$modversion['comments']['callbackFile'] = 'include/comment_functions.php';
$modversion['comments']['callback']['approve'] = 'video_com_approve';
$modversion['comments']['callback']['update'] = 'video_com_update';

// Templates
$modversion['templates'][1]['file'] = 'video_brokenfile.html';
$modversion['templates'][1]['description'] = '';
$modversion['templates'][2]['file'] = 'video_download.html';
$modversion['templates'][2]['description'] = '';
$modversion['templates'][3]['file'] = 'video_index.html';
$modversion['templates'][3]['description'] = '';
$modversion['templates'][4]['file'] = 'video_modfile.html';
$modversion['templates'][4]['description'] = '';
$modversion['templates'][5]['file'] = 'video_ratefile.html';
$modversion['templates'][5]['description'] = '';
$modversion['templates'][6]['file'] = 'video_singlefile.html';
$modversion['templates'][6]['description'] = '';
$modversion['templates'][7]['file'] = 'video_submit.html';
$modversion['templates'][7]['description'] = '';
$modversion['templates'][8]['file'] = 'video_viewcat.html';
$modversion['templates'][8]['description'] = '';
$modversion['templates'][9]['file'] = 'video_liste.html';
$modversion['templates'][9]['description'] = '';
$modversion['templates'][10]['file'] = 'video_rss.html';
$modversion['templates'][10]['description'] = '';
$modversion['templates'][11]['file'] = 'video_channel.html';
$modversion['templates'][11]['description'] = '';

// Préférences
$i = 1;
$modversion['config'][$i]['name']        = 'break' . $i;
$modversion['config'][$i]['title']       = '_MI_VIDEO_PREFERENCE_BREAK_SERIAL';
$modversion['config'][$i]['description'] = '';
$modversion['config'][$i]['formtype']    = 'line_break';
$modversion['config'][$i]['valuetype']   = 'textbox';
$modversion['config'][$i]['default']     = 'head';
$i++;
$modversion['config'][$i]['name'] = 'serial';
$modversion['config'][$i]['title'] = '_MI_VIDEO_SERIAL';
$modversion['config'][$i]['description'] = '_MI_VIDEO_SERIALDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'Enter Your Serial Number';
$i++;
$modversion['config'][$i]['name']        = 'break' . $i;
$modversion['config'][$i]['title']       = '_MI_VIDEO_PREFERENCE_BREAK_VIDEO';
$modversion['config'][$i]['description'] = '';
$modversion['config'][$i]['formtype']    = 'line_break';
$modversion['config'][$i]['valuetype']   = 'textbox';
$modversion['config'][$i]['default']     = 'head';
$i++;
$modversion['config'][$i]['name'] = 'ffmpeg';
$modversion['config'][$i]['title'] = '_MI_VIDEO_FFMPEG';
$modversion['config'][$i]['description'] = '_MI_VIDEO_FFMPEGDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'ffmpeg';
$i++;
$modversion['config'][$i]['name'] = 'overlogo';
$modversion['config'][$i]['title'] = '_MI_VIDEO_LOGO';
$modversion['config'][$i]['description'] = '_MI_VIDEO_LOGODSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'modules/video/images/logo.png';
$i++;
$modversion['config'][$i]['name'] = 'flvWidth';
$modversion['config'][$i]['title'] = '_MI_VIDEO_FLV_WIDTH';
$modversion['config'][$i]['description'] = '_MI_VIDEO_FLV_WIDTHDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 640;
$i++;
$modversion['config'][$i]['name'] = 'flvHeight';
$modversion['config'][$i]['title'] = '_MI_VIDEO_FLV_HEIGHT';
$modversion['config'][$i]['description'] = '_MI_VIDEO_FLV_HEIGTDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 480;
$i++;
$modversion['config'][$i]['name'] = 'playerWidth';
$modversion['config'][$i]['title'] = '_MI_VIDEO_PLAYER_WIDTH';
$modversion['config'][$i]['description'] = '_MI_VIDEO_PLAYER_WIDTHDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 640;
$i++;
$modversion['config'][$i]['name'] = 'playerHeight';
$modversion['config'][$i]['title'] = '_MI_VIDEO_PLAYER_HEIGHT';
$modversion['config'][$i]['description'] = '_MI_VIDEO_PLAYER_HEIGTDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 480;
$i++;
$modversion['config'][$i]['name'] = 'thumbWidth';
$modversion['config'][$i]['title'] = '_MI_VIDEO_THUMB_WIDTH';
$modversion['config'][$i]['description'] = '_MI_VIDEO_THUMB_WIDTHDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 320;
$i++;
$modversion['config'][$i]['name'] = 'thumbHeight';
$modversion['config'][$i]['title'] = '_MI_VIDEO_THUMB_HEIGHT';
$modversion['config'][$i]['description'] = '_MI_VIDEO_THUMB_HEIGTDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 240;
$i++;
$modversion['config'][$i]['name'] = 'acodec';
$modversion['config'][$i]['title'] = '_MI_VIDEO_ACODEC';
$modversion['config'][$i]['description'] = '_MI_VIDEO_ACODECDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'copy';
$i++;
$modversion['config'][$i]['name'] = 'vcodec';
$modversion['config'][$i]['title'] = '_MI_VIDEO_VCODEC';
$modversion['config'][$i]['description'] = '_MI_VIDEO_VCODECDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'copy';
$i++;
$modversion['config'][$i]['name'] = 'asamplerate';
$modversion['config'][$i]['title'] = '_MI_VIDEO_ASAMPLERATE';
$modversion['config'][$i]['description'] = '_MI_VIDEO_ASAMPLERATEDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 44000;
$i++;
$modversion['config'][$i]['name'] = 'abitrate';
$modversion['config'][$i]['title'] = '_MI_VIDEO_ABITRATE';
$modversion['config'][$i]['description'] = '_MI_VIDEO_ABITRATEDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 128000;
$i++;
$modversion['config'][$i]['name'] = 'vrate';
$modversion['config'][$i]['title'] = '_MI_VIDEO_VRATE';
$modversion['config'][$i]['description'] = '_MI_VIDEO_VRATEDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 29;
$i++;
$modversion['config'][$i]['name'] = 'vmaxrate';
$modversion['config'][$i]['title'] = '_MI_VIDEO_VMAXRATE';
$modversion['config'][$i]['description'] = '_MI_VIDEO_VMAXRATEDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 1000;
$i++;
$modversion['config'][$i]['name'] = 'vlogo';
$modversion['config'][$i]['title'] = '_MI_VIDEO_VLOGO';
$modversion['config'][$i]['description'] = '_MI_VIDEO_VLOGODSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '/modules/video/images/logo.png';
$i++;
$modversion['config'][$i]['name'] = 'overlayh';
$modversion['config'][$i]['title'] = '_MI_VIDEO_OVERLAYH';
$modversion['config'][$i]['description'] = '_MI_VIDEO_OVERLAYHDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 50;
$i++;
$modversion['config'][$i]['name'] = 'overlayw';
$modversion['config'][$i]['title'] = '_MI_VIDEO_OVERLAYW';
$modversion['config'][$i]['description'] = '_MI_VIDEO_OVERLAYWDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 50;
$i++;
$modversion['config'][$i]['name'] = 'convert_type';
$modversion['config'][$i]['title'] = '_MI_VIDEO_CONVERTTYPE';
$modversion['config'][$i]['description'] = '_MI_VIDEO_CONVERTTYPEDSC';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'normal';
$modversion['config'][$i]['options'] = array('_MI_VIDEO_TYPE_SHORT' => 'short', '_MI_VIDEO_TYPE_NORMAL' => 'normal', '_MI_VIDEO_TYPE_LOGO' => 'logo', '_MI_VIDEO_TYPE_LOCAL' => 'local');
$i++;
$modversion['config'][$i]['name']        = 'break' . $i;
$modversion['config'][$i]['title']       = '_MI_VIDEO_PREFERENCE_BREAK_DIS';
$modversion['config'][$i]['description'] = '';
$modversion['config'][$i]['formtype']    = 'line_break';
$modversion['config'][$i]['valuetype']   = 'textbox';
$modversion['config'][$i]['default']     = 'head';
$i++;
$modversion['config'][$i]['name'] = 'popular';
$modversion['config'][$i]['title'] = '_MI_VIDEO_POPULAR';
$modversion['config'][$i]['description'] = '_MI_VIDEO_POPULARDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 100;
$i++;
$modversion['config'][$i]['name'] = 'nbsouscat';
$modversion['config'][$i]['title'] = '_MI_VIDEO_SUBCATPARENT';
$modversion['config'][$i]['description'] = '_MI_VIDEO_SUBCATPARENTDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 5;
$i++;
$modversion['config'][$i]['name'] = 'nbbl';
$modversion['config'][$i]['title'] = '_MI_VIDEO_NBBL';
$modversion['config'][$i]['description'] = '_MI_VIDEO_NBBLDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 5;
$i++;
$modversion['config'][$i]['name'] = 'longbl';
$modversion['config'][$i]['title'] = '_MI_VIDEO_LONGBL';
$modversion['config'][$i]['description'] = '_MI_VIDEO_LONGBLDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 20;
$i++;
$modversion['config'][$i]['name'] = 'usetellafriend';
$modversion['config'][$i]['title'] = '_MI_VIDEO_USETELLAFRIEND';
$modversion['config'][$i]['description'] = '_MI_VIDEO_USETELLAFRIENDDSC';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 0;
$i++;
$modversion['config'][$i]['name'] = 'usetag';
$modversion['config'][$i]['title'] = '_MI_VIDEO_USETAG';
$modversion['config'][$i]['description'] = '_MI_VIDEO_USETAGDSC';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 0;
$i++;
$modversion['config'][$i]['name'] = 'shotwidth';
$modversion['config'][$i]['title'] = '_MI_VIDEO_SHOTWIDTH';
$modversion['config'][$i]['description'] = '_MI_VIDEO_SHOTWIDTHDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 90;
$i++;
$modversion['config'][$i]['name'] = 'check_host';
$modversion['config'][$i]['title'] = '_MI_VIDEO_CHECKHOST';
$modversion['config'][$i]['description'] = '_MI_VIDEO_CHECKHOSTDSC';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 0;
$i++;
$xoops_url = parse_url(XOOPS_URL);
$modversion['config'][$i]['name'] = 'referers';
$modversion['config'][$i]['title'] = '_MI_VIDEO_REFERERS';
$modversion['config'][$i]['description'] = '_MI_VIDEO_REFERERSDSC';
$modversion['config'][$i]['formtype'] = 'textarea';
$modversion['config'][$i]['valuetype'] = 'array';
$modversion['config'][$i]['default'] = array($xoops_url['host']);
$i++;
$modversion['config'][$i]['name'] = 'mimetype';
$modversion['config'][$i]['title'] = '_MI_VIDEO_MIMETYPE';
$modversion['config'][$i]['description'] = '_MI_VIDEO_MIMETYPE_DSC';
$modversion['config'][$i]['formtype'] = 'textarea';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'video/x-flv|video/mp4v-es|video/avi|video/msvideo|video/x-msvideo|video/xmpg2|application/x-troff-msvideo|video/x-ms-wmv|video/quicktime|video/x-quicktime|video/avi|video/mp4|image/mov|image/avi|audio/aiff|audio/x-midi|audio/x-wav|audio/mp4|audio/aiff|audio/avi|audio/mpeg|audio/ogg';
$i++;
$modversion['config'][$i]['name'] = 'plateform';
$modversion['config'][$i]['title'] = '_MI_VIDEO_PLATEFORM';
$modversion['config'][$i]['description'] = '_MI_VIDEO_PLATEFORM_DSC';
$modversion['config'][$i]['formtype'] = 'textarea';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'None|Video|Audio|Other';
$i++;
$modversion['config'][$i]['name'] = 'maxuploadsize';
$modversion['config'][$i]['title'] = '_MI_VIDEO_MAXUPLOAD_SIZE';
$modversion['config'][$i]['description'] = '_MI_VIDEO_MAXUPLOAD_SIZEDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 104857600;
$i++;
include_once XOOPS_ROOT_PATH . "/class/xoopslists.php";
$modversion["config"][$i]["name"]           = "editor";
$modversion["config"][$i]["title"]          = "_MI_VIDEO_FORM_OPTIONS";
$modversion["config"][$i]["description"]    = "_MI_VIDEO_FORM_OPTIONSDSC";
$modversion["config"][$i]["formtype"]       = "select";
$modversion["config"][$i]["valuetype"]      = "text";
$modversion["config"][$i]["default"]        = "dhtmltextarea";
$modversion["config"][$i]["options"]        = XoopsLists::getDirListAsArray(XOOPS_ROOT_PATH . "/class/xoopseditor");
$modversion["config"][$i]["category"]       = "global";
$i++;
$modversion['config'][$i]['name'] = 'toporder';
$modversion['config'][$i]['title'] = '_MI_VIDEO_TOPORDER';
$modversion['config'][$i]['description'] = '_MI_VIDEO_TOPORDERDSC';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 1;
$modversion['config'][$i]['options'] = array('_MI_VIDEO_TOPORDER1' => 1, '_MI_VIDEO_TOPORDER2' => 2, '_MI_VIDEO_TOPORDER3' => 3, '_MI_VIDEO_TOPORDER4' => 4, '_MI_VIDEO_TOPORDER5' => 5, '_MI_VIDEO_TOPORDER6' => 6, '_MI_VIDEO_TOPORDER7' => 7, '_MI_VIDEO_TOPORDER8' => 8);
$i++;
$modversion['config'][$i]['name'] = 'newdownloads';
$modversion['config'][$i]['title'] = '_MI_VIDEO_NEWDLS';
$modversion['config'][$i]['description'] = '_MI_VIDEO_NEWDLSDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 10;
$i++;
$modversion['config'][$i]['name'] = 'searchorder';
$modversion['config'][$i]['title'] = '_MI_VIDEO_SEARCHORDER';
$modversion['config'][$i]['description'] = '_MI_VIDEO_SEARCHORDERDSC';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 8;
$modversion['config'][$i]['options'] = array('_MI_VIDEO_TOPORDER1' => 1, '_MI_VIDEO_TOPORDER2' => 2, '_MI_VIDEO_TOPORDER3' => 3, '_MI_VIDEO_TOPORDER4' => 4, '_MI_VIDEO_TOPORDER5' => 5, '_MI_VIDEO_TOPORDER6' => 6, '_MI_VIDEO_TOPORDER7' => 7, '_MI_VIDEO_TOPORDER8' => 8);
$i++;
$modversion['config'][$i]['name'] = 'perpageliste';
$modversion['config'][$i]['title'] = '_MI_VIDEO_PERPAGELISTE';
$modversion['config'][$i]['description'] = '_MI_VIDEO_PERPAGELISTEDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 15;
$i++;
$modversion['config'][$i]['name'] = 'perpage';
$modversion['config'][$i]['title'] = '_MI_VIDEO_PERPAGE';
$modversion['config'][$i]['description'] = '_MI_VIDEO_PERPAGEDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 10;
$i++;
$modversion['config'][$i]['name'] = 'perpageadmin';
$modversion['config'][$i]['title'] = '_MI_VIDEO_PERPAGEADMIN';
$modversion['config'][$i]['description'] = '_MI_VIDEO_PERPAGEADMINDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 15;
$i++;
$modversion['config'][$i]['name'] = 'nbcolumn';
$modversion['config'][$i]['title'] = '_MI_VIDEO_NBCOLUM';
$modversion['config'][$i]['description'] = '_MI_VIDEO_NBCOLUMDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 2;
$i++;
$modversion['config'][$i]['name'] = 'newnamedownload';
$modversion['config'][$i]['title'] = "_MI_VIDEO_DOWNLOAD_NAME";
$modversion['config'][$i]['description'] = "_MI_VIDEO_DOWNLOAD_NAMEDSC";
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 1;
$i++;
$modversion['config'][$i]['name'] = 'prefixdownloads';
$modversion['config'][$i]['title'] = '_MI_VIDEO_DOWNLOAD_PREFIX';
$modversion['config'][$i]['description'] = '_MI_VIDEO_DOWNLOAD_PREFIXDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'video_';
$i++;
$modversion['config'][$i]['name'] = 'autosummary';
$modversion['config'][$i]['title'] = "_MI_VIDEO_AUTO_SUMMARY";
$modversion['config'][$i]['description'] = "_MI_VIDEO_AUTO_SUMMARYDSC";
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 0;
$i++;
$modversion['config'][$i]['name'] = 'showupdated';
$modversion['config'][$i]['title'] = '_MI_VIDEO_SHOW_UPDATED';
$modversion['config'][$i]['description'] = '_MI_VIDEO_SHOW_UPDATEDDSC';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 1;
$i++;
$modversion['config'][$i]['name'] = 'permission_download';
$modversion['config'][$i]['title'] = '_MI_VIDEO_PERMISSIONDOWNLOAD';
$modversion['config'][$i]['description'] = '_MI_VIDEO_PERMISSIONDOWNLOADDSC';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 1;
$modversion['config'][$i]['options'] = array('_MI_VIDEO_PERMISSIONDOWNLOAD1' => 1, '_MI_VIDEO_PERMISSIONDOWNLOAD2' => 2);
$i++;
$modversion['config'][$i]['name'] = 'use_paypal';
$modversion['config'][$i]['title'] = '_MI_VIDEO_USEPAYPAL';
$modversion['config'][$i]['description'] = '_MI_VIDEO_USEPAYPALDSC';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 0;
$i++;
$modversion['config'][$i]['name'] = 'currency_paypal';
$modversion['config'][$i]['title'] = '_MI_VIDEO_CURRENCYPAYPAL';
$modversion['config'][$i]['description'] = '_MI_VIDEO_CURRENCYPAYPALDSC';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'EUR';
$modversion['config'][$i]['options'] = array('AUD' => 'AUD', 'BRL' => 'BRL', 'CAD' => 'CAD', 'CHF' => 'CHF', 'CZK' => 'CZK', 'DKK' => 'DKK', 'EUR' => 'EUR', 'GBP' => 'GBP',
                                             'HKD' => 'HKD', 'HUF' => 'HUF', 'ILS' => 'ILS', 'JPY' => 'JPY', 'MXN' => 'MXN', 'NOK' => 'NOK', 'NZD' => 'NZD', 'PHP' => 'PHP',
                                             'PLN' => 'PLN', 'SEK' => 'SEK', 'SGD' => 'SGD', 'THB' => 'THB', 'TWD' => 'TWD', 'USD' => 'USD');
$i++;
$modversion['config'][$i]['name'] = 'image_paypal';
$modversion['config'][$i]['title'] = '_MI_VIDEO_IMAGEPAYPAL';
$modversion['config'][$i]['description'] = '_MI_VIDEO_IMAGEPAYPALDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';
$i++;
$modversion['config'][$i]['name'] = 'shwo_bookmark';
$modversion['config'][$i]['title'] = "_MI_VIDEO_BOOKMARK";
$modversion['config'][$i]['description'] = "_MI_VIDEO_BOOKMARK_DSC";
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 0;
$i++;
$modversion['config'][$i]['name'] = 'show_social';
$modversion['config'][$i]['title'] = "_MI_VIDEO_SOCIAL";
$modversion['config'][$i]['description'] = "_MI_VIDEO_SOCIAL_DSC";
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 0;
$i++;
$modversion['config'][$i]['name'] = 'whichfile';
$modversion['config'][$i]['title'] = "_MI_VIDEO_WHICHFILE";
$modversion['config'][$i]['description'] = "_MI_VIDEO_WHICHFILE_DSC";
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 1;
$i++;
$modversion['config'][$i]['name'] = 'shwo_extra';
$modversion['config'][$i]['title'] = "_MI_VIDEO_SHOW_EXTRA";
$modversion['config'][$i]['description'] = "_MI_VIDEO_SHOW_EXTRA_DSC";
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 0;
$i++;
$modversion['config'][$i]['name'] = 'video_related';
$modversion['config'][$i]['title'] = "_MI_VIDEO_RELATED";
$modversion['config'][$i]['description'] = "_MI_VIDEO_RELATED_DSC";
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 0;
$i++;
$modversion['config'][$i]['name']        = 'break' . $i;
$modversion['config'][$i]['title']       = '_MI_VIDEO_PREFERENCE_BREAK_RSS';
$modversion['config'][$i]['description'] = '';
$modversion['config'][$i]['formtype']    = 'line_break';
$modversion['config'][$i]['valuetype']   = 'textbox';
$modversion['config'][$i]['default']     = 'head';
$i++;
$modversion['config'][$i]['name']        = 'perpagerss';
$modversion['config'][$i]['title']       = '_MI_VIDEO_PERPAGERSS';
$modversion['config'][$i]['description'] = '_MI_VIDEO_PERPAGERSSDSC';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 10;
$i++;
$modversion['config'][$i]['name']        = 'timecacherss';
$modversion['config'][$i]['title']       = '_MI_VIDEO_TIMECACHERSS';
$modversion['config'][$i]['description'] = '_MI_VIDEO_TIMECACHERSSDSC';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 60;
$i++;
$modversion['config'][$i]['name']        = 'logorss';
$modversion['config'][$i]['title']       = '_MI_VIDEO_LOGORSS';
$modversion['config'][$i]['description'] = '';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = '/images/logo.png';
$i++;
$modversion['config'][$i]['name']        = 'break' . $i;
$modversion['config'][$i]['title']       = '_MI_VIDEO_PREFERENCE_BREAK_COMNOTI';
$modversion['config'][$i]['description'] = '';
$modversion['config'][$i]['formtype']    = 'line_break';
$modversion['config'][$i]['valuetype']   = 'textbox';
$modversion['config'][$i]['default']     = 'head';


// Notifications
$modversion['hasNotification'] = 1;
$modversion['notification']['lookup_file'] = 'include/notification.inc.php';
$modversion['notification']['lookup_func'] = 'video_notify_iteminfo';

$modversion['notification']['category'][1]['name'] = 'global';
$modversion['notification']['category'][1]['title'] = _MI_VIDEO_GLOBAL_NOTIFY;
$modversion['notification']['category'][1]['description'] = _MI_VIDEO_GLOBAL_NOTIFYDSC;
$modversion['notification']['category'][1]['subscribe_from'] = array('index.php','viewcat.php','singlefile.php');

$modversion['notification']['category'][2]['name'] = 'category';
$modversion['notification']['category'][2]['title'] = _MI_VIDEO_CATEGORY_NOTIFY;
$modversion['notification']['category'][2]['description'] = _MI_VIDEO_CATEGORY_NOTIFYDSC;
$modversion['notification']['category'][2]['subscribe_from'] = array('viewcat.php', 'singlefile.php');
$modversion['notification']['category'][2]['item_name'] = 'cid';
$modversion['notification']['category'][2]['allow_bookmark'] = 1;

$modversion['notification']['category'][3]['name'] = 'file';
$modversion['notification']['category'][3]['title'] = _MI_VIDEO_FILE_NOTIFY;
$modversion['notification']['category'][3]['description'] = _MI_VIDEO_FILE_NOTIFYDSC;
$modversion['notification']['category'][3]['subscribe_from'] = 'singlefile.php';
$modversion['notification']['category'][3]['item_name'] = 'lid';
$modversion['notification']['category'][3]['allow_bookmark'] = 1;

$modversion['notification']['event'][1]['name'] = 'new_category';
$modversion['notification']['event'][1]['category'] = 'global';
$modversion['notification']['event'][1]['title'] = _MI_VIDEO_GLOBAL_NEWCATEGORY_NOTIFY;
$modversion['notification']['event'][1]['caption'] = _MI_VIDEO_GLOBAL_NEWCATEGORY_NOTIFYCAP;
$modversion['notification']['event'][1]['description'] = _MI_VIDEO_GLOBAL_NEWCATEGORY_NOTIFYDSC;
$modversion['notification']['event'][1]['mail_template'] = 'global_newcategory_notify';
$modversion['notification']['event'][1]['mail_subject'] = _MI_VIDEO_GLOBAL_NEWCATEGORY_NOTIFYSBJ;

$modversion['notification']['event'][2]['name'] = 'file_modify';
$modversion['notification']['event'][2]['category'] = 'global';
$modversion['notification']['event'][2]['admin_only'] = 1;
$modversion['notification']['event'][2]['title'] = _MI_VIDEO_GLOBAL_FILEMODIFY_NOTIFY;
$modversion['notification']['event'][2]['caption'] = _MI_VIDEO_GLOBAL_FILEMODIFY_NOTIFYCAP;
$modversion['notification']['event'][2]['description'] = _MI_VIDEO_GLOBAL_FILEMODIFY_NOTIFYDSC;
$modversion['notification']['event'][2]['mail_template'] = 'global_filemodify_notify';
$modversion['notification']['event'][2]['mail_subject'] = _MI_VIDEO_GLOBAL_FILEMODIFY_NOTIFYSBJ;

$modversion['notification']['event'][3]['name'] = 'file_broken';
$modversion['notification']['event'][3]['category'] = 'global';
$modversion['notification']['event'][3]['admin_only'] = 1;
$modversion['notification']['event'][3]['title'] = _MI_VIDEO_GLOBAL_FILEBROKEN_NOTIFY;
$modversion['notification']['event'][3]['caption'] = _MI_VIDEO_GLOBAL_FILEBROKEN_NOTIFYCAP;
$modversion['notification']['event'][3]['description'] = _MI_VIDEO_GLOBAL_FILEBROKEN_NOTIFYDSC;
$modversion['notification']['event'][3]['mail_template'] = 'global_filebroken_notify';
$modversion['notification']['event'][3]['mail_subject'] = _MI_VIDEO_GLOBAL_FILEBROKEN_NOTIFYSBJ;

$modversion['notification']['event'][4]['name'] = 'file_submit';
$modversion['notification']['event'][4]['category'] = 'global';
$modversion['notification']['event'][4]['admin_only'] = 1;
$modversion['notification']['event'][4]['title'] = _MI_VIDEO_GLOBAL_FILESUBMIT_NOTIFY;
$modversion['notification']['event'][4]['caption'] = _MI_VIDEO_GLOBAL_FILESUBMIT_NOTIFYCAP;
$modversion['notification']['event'][4]['description'] = _MI_VIDEO_GLOBAL_FILESUBMIT_NOTIFYDSC;
$modversion['notification']['event'][4]['mail_template'] = 'global_filesubmit_notify';
$modversion['notification']['event'][4]['mail_subject'] = _MI_VIDEO_GLOBAL_FILESUBMIT_NOTIFYSBJ;

$modversion['notification']['event'][5]['name'] = 'new_file';
$modversion['notification']['event'][5]['category'] = 'global';
$modversion['notification']['event'][5]['title'] = _MI_VIDEO_GLOBAL_NEWFILE_NOTIFY;
$modversion['notification']['event'][5]['caption'] = _MI_VIDEO_GLOBAL_NEWFILE_NOTIFYCAP;
$modversion['notification']['event'][5]['description'] = _MI_VIDEO_GLOBAL_NEWFILE_NOTIFYDSC;
$modversion['notification']['event'][5]['mail_template'] = 'global_newfile_notify';
$modversion['notification']['event'][5]['mail_subject'] = _MI_VIDEO_GLOBAL_NEWFILE_NOTIFYSBJ;

$modversion['notification']['event'][6]['name'] = 'file_submit';
$modversion['notification']['event'][6]['category'] = 'category';
$modversion['notification']['event'][6]['admin_only'] = 1;
$modversion['notification']['event'][6]['title'] = _MI_VIDEO_CATEGORY_FILESUBMIT_NOTIFY;
$modversion['notification']['event'][6]['caption'] = _MI_VIDEO_CATEGORY_FILESUBMIT_NOTIFYCAP;
$modversion['notification']['event'][6]['description'] = _MI_VIDEO_CATEGORY_FILESUBMIT_NOTIFYDSC;
$modversion['notification']['event'][6]['mail_template'] = 'category_filesubmit_notify';
$modversion['notification']['event'][6]['mail_subject'] = _MI_VIDEO_CATEGORY_FILESUBMIT_NOTIFYSBJ;

$modversion['notification']['event'][7]['name'] = 'new_file';
$modversion['notification']['event'][7]['category'] = 'category';
$modversion['notification']['event'][7]['title'] = _MI_VIDEO_CATEGORY_NEWFILE_NOTIFY;
$modversion['notification']['event'][7]['caption'] = _MI_VIDEO_CATEGORY_NEWFILE_NOTIFYCAP;
$modversion['notification']['event'][7]['description'] = _MI_VIDEO_CATEGORY_NEWFILE_NOTIFYDSC;
$modversion['notification']['event'][7]['mail_template'] = 'category_newfile_notify';
$modversion['notification']['event'][7]['mail_subject'] = _MI_VIDEO_CATEGORY_NEWFILE_NOTIFYSBJ;

$modversion['notification']['event'][8]['name'] = 'approve';
$modversion['notification']['event'][8]['category'] = 'file';
$modversion['notification']['event'][8]['invisible'] = 1;
$modversion['notification']['event'][8]['title'] = _MI_VIDEO_FILE_APPROVE_NOTIFY;
$modversion['notification']['event'][8]['caption'] = _MI_VIDEO_FILE_APPROVE_NOTIFYCAP;
$modversion['notification']['event'][8]['description'] = _MI_VIDEO_FILE_APPROVE_NOTIFYDSC;
$modversion['notification']['event'][8]['mail_template'] = 'file_approve_notify';
$modversion['notification']['event'][8]['mail_subject'] = _MI_VIDEO_FILE_APPROVE_NOTIFYSBJ;

?>