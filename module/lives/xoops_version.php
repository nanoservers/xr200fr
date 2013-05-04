<?php

$modversion = array(
    // Main setting
    'name' => _MI_LIVES_TITLE,
    'description' => _MI_LIVES_DESC,
    'version' => 1,
    'author' => 'Hossein Azizabadi',
    'credits' => 'MOHTAVA',
    'license' => 'GNU GPL 2.0',
    'license_url' => 'www.gnu.org/licenses/gpl-2.0.html/',
    'image' => 'images/logo.png',
    'dirname' => 'lives',
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
    // Modules scripts
    'onInstall' => 'include/install.php',
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
$modversion['tables'][1] = "lives_channel";
  
// template
$modversion['templates'][] = array('file' => 'lives_index.html', 'description' => '');
  
// conf
$modversion['config'][] = array(
    'name' => 'img_mime',
    'title' => '_MI_LIVES_IMAGE_MIME',
    'description' => '_MI_LIVES_IMAGE_MIME_DESC',
    'formtype' => 'select_multi',
    'valuetype' => 'array',
    'default' => array("image/gif", "image/jpeg", "image/png"),
    'options' => array(
        "bmp" => "image/bmp",
        "gif" => "image/gif",
        "jpeg" => "image/pjpeg",
        "jpeg" => "image/jpeg",
        "jpg" => "image/jpeg",
        "jpe" => "image/jpeg",
        "png" => "image/png"));
        
$modversion['config'][] = array(
    'name' => 'img_size',
    'title' => '_MI_LIVES_IMAGE_SIZE',
    'description' => '_MI_LIVES_IMAGE_SIZE_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '5242880');
    
$modversion['config'][] = array(
    'name' => 'img_maxwidth',
    'title' => '_MI_LIVES_IMAGE_MAXWIDTH',
    'description' => '_MI_LIVES_IMAGE_MAXWIDTH_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '700');

$modversion['config'][] = array(
    'name' => 'img_maxheight',
    'title' => '_MI_LIVES_IMAGE_MAXHEIGHT',
    'description' => '_MI_LIVES_IMAGE_MAXHEIGHT_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '700');      
    
$modversion['config'][] = array(
    'name' => 'player_logo',
    'title' => '_MI_LIVES_LOGO',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '/images/logo.png');    
                  
$modversion['config'][] = array(
    'name' => 'fplw',
    'title' => '_MI_LIVES_FPLW',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '320');  
    
$modversion['config'][] = array(
    'name' => 'fplh',
    'title' => '_MI_LIVES_FPLH',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '220'); 
   
$modversion['config'][] = array(
    'name' => 'fpmw',
    'title' => '_MI_LIVES_FPMW',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '384');  
    
$modversion['config'][] = array(
    'name' => 'fpmh',
    'title' => '_MI_LIVES_FPMH',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '264'); 
    
$modversion['config'][] = array(
    'name' => 'fphw',
    'title' => '_MI_LIVES_FPHW',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '580');  
    
$modversion['config'][] = array(
    'name' => 'fphh',
    'title' => '_MI_LIVES_FPHH',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '380');     
   
$modversion['config'][] = array(
    'name' => 'wmsw',
    'title' => '_MI_LIVES_WMSW',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '480');  
    
$modversion['config'][] = array(
    'name' => 'wmsh',
    'title' => '_MI_LIVES_WMSH',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '320'); 
           
?>