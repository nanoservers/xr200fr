<?php

$dir = XOOPS_ROOT_PATH."/uploads/tv";
if(!is_dir($dir)) {
	mkdir($dir, 0777);   chmod($dir, 0777);
}

?>