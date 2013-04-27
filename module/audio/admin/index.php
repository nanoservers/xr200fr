<?php

include 'admin_header.php';
xoops_cp_header();
// compte le nombre de catégories
$criteria = new CriteriaCompo();
$nb_categories = $downloadscat_Handler->getCount($criteria);
// compte le nombre de téléchargements
$criteria = new CriteriaCompo();
$criteria->add(new Criteria('status', 0, '!='));
$nb_downloads = $downloads_Handler->getCount($criteria);
// compte le nombre de téléchargements en attente de validation
$criteria = new CriteriaCompo();
$criteria->add(new Criteria('status', 0));
$nb_downloads_waiting = $downloads_Handler->getCount($criteria);
// compte le nombre de rapport de téléchargements brisés
$nb_broken = $downloadsbroken_Handler->getCount();
// compte le nombre de demande de modifications
$nb_modified = $downloadsmod_Handler->getCount();
// dossier dans uploads
$folder = array(XOOPS_ROOT_PATH . '/uploads/audio/', XOOPS_ROOT_PATH . '/uploads/audio/downloads', XOOPS_ROOT_PATH . '/uploads/audio/images', XOOPS_ROOT_PATH . '/uploads/audio/mp3',
               XOOPS_ROOT_PATH . '/uploads/audio/images/cats', XOOPS_ROOT_PATH . '/uploads/audio/images/field', XOOPS_ROOT_PATH . '/uploads/audio/images/shots');

if (audio_checkModuleAdmin()){
    $index_admin = new ModuleAdmin();
    $index_admin->addInfoBox(_MI_AUDIO_ADMENU1);
    $index_admin->addInfoBoxLine(_MI_AUDIO_ADMENU1, _AM_AUDIO_INDEX_CATEGORIES, $nb_categories);
    $index_admin->addInfoBoxLine(_MI_AUDIO_ADMENU1, _AM_AUDIO_INDEX_DOWNLOADS, $nb_downloads);
    if ($nb_downloads_waiting == 0){
        $index_admin->addInfoBoxLine(_MI_AUDIO_ADMENU1, _AM_AUDIO_INDEX_DOWNLOADSWAITING, $nb_downloads_waiting, 'Green');
    }else{
        $index_admin->addInfoBoxLine(_MI_AUDIO_ADMENU1, _AM_AUDIO_INDEX_DOWNLOADSWAITING, $nb_downloads_waiting, 'Red');
    }
    if ($nb_broken == 0){
        $index_admin->addInfoBoxLine(_MI_AUDIO_ADMENU1, _AM_AUDIO_INDEX_BROKEN, $nb_broken, 'Green');
    }else{
        $index_admin->addInfoBoxLine(_MI_AUDIO_ADMENU1, _AM_AUDIO_INDEX_BROKEN, $nb_broken, 'Red');
    }
    if ($nb_modified == 0){
        $index_admin->addInfoBoxLine(_MI_AUDIO_ADMENU1, _AM_AUDIO_INDEX_MODIFIED, $nb_modified, 'Green');
    }else{
        $index_admin->addInfoBoxLine(_MI_AUDIO_ADMENU1, _AM_AUDIO_INDEX_MODIFIED, $nb_modified, 'Red');
    }
    $index_admin->addInfoBoxLine(_MI_AUDIO_ADMENU1, _AM_AUDIO_INDEX_MAXVIDEOSIZE . (int)($xoopsModuleConfig['maxuploadsize']/(1024*1024)) . 'M');
    $index_admin->addInfoBoxLine(_MI_AUDIO_ADMENU1, _AM_AUDIO_INDEX_MAXFILESIZE . get_cfg_var('upload_max_filesize'));
    $index_admin->addInfoBoxLine(_MI_AUDIO_ADMENU1, _AM_AUDIO_INDEX_POSTMAXSIZE . get_cfg_var('post_max_size'));
    
    
    foreach (array_keys( $folder) as $i) {
        $index_admin->addConfigBoxLine($folder[$i], 'folder');
        $index_admin->addConfigBoxLine(array($folder[$i], '777'), 'chmod');
    }
    echo $index_admin->addNavigation('index.php');
    echo $index_admin->renderIndex();
}
xoops_cp_footer();
?>