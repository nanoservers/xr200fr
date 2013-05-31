<?php

$modversion = array(
    // Main setting
    'name' => _MI_TV_TITLE,
    'description' => _MI_TV_DESC,
    'version' => 1.1,
    'author' => 'Hossein Azizabadi',
    'credits' => 'MOHTAVA',
    'license' => 'GNU GPL 2.0',
    'license_url' => 'www.gnu.org/licenses/gpl-2.0.html/',
    'image' => 'images/logo.png',
    'dirname' => 'tv',
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
    'onUpdate' => 'include/update.php',
    // Main menu
    'hasMain' => 1,
    // Recherche
    'hasSearch' => 1,
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
$modversion['tables'][1] = "tv_item";
$modversion['tables'][2] = "tv_list";

// template
$modversion['templates'][] = array('file' => 'tv_index.html', 'description' => '');
$modversion['templates'][] = array('file' => 'tv_program.html', 'description' => '');

// block
$modversion['blocks'][] = array(
    'file' => 'tv.php',
    'name' => _MI_TV_BLOCK,
    'description' => '',
    'show_func' => 'tv_list_show',
    'edit_func' => 'tv_list_edit',
    'options' => '',
    'template' => 'tv.html');
    
// block
$modversion['blocks'][] = array(
    'file' => 'tv.php',
    'name' => _MI_TV_BLOCK_SELECT,
    'description' => '',
    'show_func' => 'tv_select_show',
    'edit_func' => 'tv_select_edit',
    'options' => '',
    'template' => 'select.html');    

// conf
$modversion['config'][] = array(
    'name' => 'img_mime',
    'title' => '_MI_TV_IMAGE_MIME',
    'description' => '',
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
    'title' => '_MI_TV_IMAGE_SIZE',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '5242880');
    
$modversion['config'][] = array(
    'name' => 'img_maxwidth',
    'title' => '_MI_TV_IMAGE_MAXWIDTH',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '700');

$modversion['config'][] = array(
    'name' => 'img_maxheight',
    'title' => '_MI_TV_IMAGE_MAXHEIGHT',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '700'); 
    
$modversion['config'][] = array(
    'name' => 'regular_expression',
    'title' => '_MI_TV_REG',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => _MI_TV_EXPRESSION_CONFIG);  
 
$modversion['config'][] = array(
    'name' => 'admin_perpage',
    'title' => '_MI_TV_PERPAGE',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '100'); 

$modversion['config'][] = array(
    'name' => 'form_editor',
    'title' => '_MI_TV_EDITOR',
    'description' => '_MI_TV_EDITOR_DESC',
    'formtype' => 'select',
    'valuetype' => 'text',
    'options' => XoopsLists::getDirListAsArray(XOOPS_ROOT_PATH . '/class/xoopseditor'),
    'default' => 'dhtmltextarea');
        
// start hidden    
$modversion['config'][] = array(
    'name' => 'situation',
    'title' => '_MI_TV_SITUATION',
    'description' => '',
    'formtype' => 'hidden',
    'valuetype' => 'text',
    'default' => 'Live|News|Sport');          
            
?>