<?php
			$objMP3->convert ( $obj->getVar('filename'), $obj->getVar('filename').".mp3");
         $duration = $objMP3->duration($obj->getVar('filename'));
         $obj->setVar('duration', $duration);
						Audio_Updateposts($obj->getVar('submitter'), intval($_POST['status']), 'add');
         // Pour l'image
	      include_once XOOPS_ROOT_PATH . "/class/uploader.php";
