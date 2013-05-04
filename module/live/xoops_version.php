<?php

$modversion = array(
    // Main setting
    'name' => _MI_LIVE_TITLE,
    'description' => _MI_LIVE_DESC,
    'version' => 1,
    'author' => 'Hossein Azizabadi',
    'credits' => 'MOHTAVA',
    'license' => 'GNU GPL 2.0',
    'license_url' => 'www.gnu.org/licenses/gpl-2.0.html/',
    'image' => 'images/logo.png',
    'dirname' => 'live',
    'release_date' => '2011/11/2',
    'module_website_url' => "http://www.mohtava.com/",
    'module_website_name' => "MOHTAVA",
    'help' => 'help',
    'module_status' => "Final",
    // Admin things
    'system_menu' => 1,
    'hasAdmin' => 1,
    'adminindex' => 'admin/index.php',
    'adminmenu' => 'admin/menu.php',
    // Main menu
    'hasMain' => 1,
    // Recherche
    'hasSearch' => 0,
    // Commentaires 
    'hasComments' => 0,
    // for module admin class
    'min_php' => '5.2',
    'min_xoops' => '2.5',
    'dirmoduleadmin' => 'Frameworks/moduleclasses',
	 'icons16' => 'Frameworks/moduleclasses/icons/16',
	 'icons32' => 'Frameworks/moduleclasses/icons/32'
);

// sql
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][1] = "live_channel";

// template
$modversion['templates'][] = array('file' => 'live_index.html', 'description' => '');


// conf
$modversion['config'][] = array(
    'name' => 'live_wms',
    'title' => '_MI_LIVE_WMS',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => 'mohtava');
    
$modversion['config'][] = array(
    'name' => 'live_fpl',
    'title' => '_MI_LIVE_FPL',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => 'mohtava64');    
    
$modversion['config'][] = array(
    'name' => 'live_fpm',
    'title' => '_MI_LIVE_FPM',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => 'mohtava128');

$modversion['config'][] = array(
    'name' => 'live_fph',
    'title' => '_MI_LIVE_FPH',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => 'mohtava256');  
 
$modversion['config'][] = array(
    'name' => 'live_rtmpurl',
    'title' => '_MI_LIVE_RTMPURL',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => 'rtmp://live.mohtava.com:1935/live');  
    
$modversion['config'][] = array(
    'name' => 'live_rtspurl',
    'title' => '_MI_LIVE_RTSPURL',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => 'rtsp://mob.mohtava.com:1935/live');  
    
$modversion['config'][] = array(
    'name' => 'live_httpurl',
    'title' => '_MI_LIVE_HTTPURL',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => 'http://live.mohtava.com:1935/live'); 
    
$modversion['config'][] = array(
    'name' => 'live_wmsurl',
    'title' => '_MI_LIVE_WMSURL',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => 'mms://wms.mohtava.com/mohtava');          
    
$modversion['config'][] = array(
    'name' => 'player_logo',
    'title' => '_MI_LIVE_LOGO',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '/images/logo.png');    
                  
$modversion['config'][] = array(
    'name' => 'fplw',
    'title' => '_MI_LIVE_FPLW',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '320');  
    
$modversion['config'][] = array(
    'name' => 'fplh',
    'title' => '_MI_LIVE_FPLH',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '220'); 
   
$modversion['config'][] = array(
    'name' => 'fpmw',
    'title' => '_MI_LIVE_FPMW',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '384');  
    
$modversion['config'][] = array(
    'name' => 'fpmh',
    'title' => '_MI_LIVE_FPMH',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '264'); 
    
$modversion['config'][] = array(
    'name' => 'fphw',
    'title' => '_MI_LIVE_FPHW',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '580');  
    
$modversion['config'][] = array(
    'name' => 'fphh',
    'title' => '_MI_LIVE_FPHH',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '380');     
   
$modversion['config'][] = array(
    'name' => 'wmsw',
    'title' => '_MI_LIVE_WMSW',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '480');  
    
$modversion['config'][] = array(
    'name' => 'wmsh',
    'title' => '_MI_LIVE_WMSH',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '320'); 
  
$modversion['config'][] = array(
    'name' => 'title',
    'title' => '_MI_LIVE_PAGETITLE',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => 'Play live');
    
$modversion['config'][] = array(
    'name' => 'desc',
    'title' => '_MI_LIVE_PAGEDESC',
    'description' => '',
    'formtype' => 'textarea  ',
    'valuetype' => 'text');                               
?>