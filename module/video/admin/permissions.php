<?php
include 'admin_header.php';

xoops_cp_header();
if (video_checkModuleAdmin()){
    $permissions_admin = new ModuleAdmin();
    echo $permissions_admin->addNavigation('permissions.php');
}

			'128' => _AM_VIDEO_PERMISSIONS_128

$permissionsForm = new XoopsGroupPermForm($formTitle, $moduleId, $permissionName, $permissionDescription, 'admin/permissions.php');