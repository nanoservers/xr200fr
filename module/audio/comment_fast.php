<?php
include_once 'header.php';
$lid = isset($_GET['lid']) ? intval($_GET['lid']) : 0;
if ($lid > 0) {
    $content = $downloads_Handler->get ( $lid );
    $com_replytitle = $content->getVar('title');
}
?>