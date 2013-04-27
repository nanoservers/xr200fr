<?php

include 'admin_header.php';

//On recupere la valeur de l'argument op dans l'URL$
$op = audio_CleanVars($_REQUEST, 'op', 'list', 'string');

//Les valeurs de op qui vont permettre d'aller dans les differentes parties de la page
switch ($op)
{
	// Vue liste
	case "list":
		//Affichage de la partie haute de l'administration de Xoops
		xoops_cp_header();
if (audio_checkModuleAdmin()){
            $broken_admin = new ModuleAdmin();
            echo $broken_admin->addNavigation('broken.php');
        }
		$criteria = new CriteriaCompo();
		if (isset($_REQUEST['limit'])) {
			$criteria->setLimit($_REQUEST['limit']);
			$limit = $_REQUEST['limit'];
		} else {
			$criteria->setLimit($xoopsModuleConfig['perpageadmin']);
			$limit = $xoopsModuleConfig['perpageadmin'];
		}
		if (isset($_REQUEST['start'])) {
			$criteria->setStart($_REQUEST['start']);
			$start = $_REQUEST['start'];
		} else {
			$criteria->setStart(0);
			$start = 0;
		}
		$criteria->setSort('reportid');
		$criteria->setOrder('ASC');
		//pour faire une jointure de table
		$downloadsbroken_Handler->table_link = $downloadsbroken_Handler->db->prefix("audio_downloads"); // Nom de la table en jointure
		$downloadsbroken_Handler->field_link = "lid"; // champ de la table en jointure
		$downloadsbroken_Handler->field_object = "lid"; // champ de la table courante
		$downloadsbroken_arr = $downloadsbroken_Handler->getByLink($criteria);
		$numrows = $downloadsbroken_Handler->getCount($criteria);
		if ( $numrows > $limit ) {
			$pagenav = new XoopsPageNav($numrows, $limit, $start, 'start', 'op=list&limit=' . $limit);
			$pagenav = $pagenav->renderNav(4);
		} else {
			$pagenav = '';
		}
		//Affichage du tableau des téléchargements brisés
		if ($numrows > 0) {
			echo '<table width="100%" cellspacing="1" class="outer">';
			echo '<tr>';
			echo '<th align="center" width="10%">'._AM_AUDIO_FORMFILE.'</th>';
			echo '<th align="center">' . _AM_AUDIO_FORMTITLE . '</th>';
			echo '<th align="center" width="20%">' . _AM_AUDIO_BROKEN_SENDER . '</th>';
			echo '<th align="center" width="15%">'._AM_AUDIO_FORMACTION.'</th>';
			echo '</tr>';
			$class = 'odd';
			foreach (array_keys($downloadsbroken_arr) as $i) {
				$class = ($class == 'even') ? 'odd' : 'even';
				$downloads_lid = $downloadsbroken_arr[$i]->getVar('lid');
				$downloads_reportid = $downloadsbroken_arr[$i]->getVar('reportid');
				$downloads_title = $downloadsbroken_arr[$i]->getVar('title');
				$downloads_cid = $downloadsbroken_arr[$i]->getVar('cid');
				$downloads_poster = XoopsUser::getUnameFromId($downloadsbroken_arr[$i]->getVar('sender'));
				$downloads_poster_ip = $downloadsbroken_arr[$i]->getVar('ip');
				echo '<tr class="'.$class.'">';
				echo '<td align="center">';
				echo '<a href="../visit.php?cid=' . $downloads_cid . '&lid=' . $downloads_lid . '" target="_blank"><img src="../images/icon/download.png" alt="Download ' . $downloads_title . '" title="Download ' . $downloads_title . '"></a>';
				echo '</td>';
				echo '<td align="center">' . $downloads_title . '</td>';
				echo '<td align="center"><b>' . $downloads_poster . '</b> (' . $downloads_poster_ip . ')</td>';
				echo '<td align="center" width="15%">';
				echo '<a href="downloads.php?op=view_downloads&downloads_lid=' . $downloads_lid . '"><img src="../images/icon/view_mini.png" alt="' . _AM_AUDIO_FORMDISPLAY . '" title="' . _AM_AUDIO_FORMDISPLAY . '"></a> ';
				echo '<a href="downloads.php?op=edit_downloads&downloads_lid=' . $downloads_lid . '"><img src="../images/icon/edit_mini.gif" alt="' . _AM_AUDIO_FORMEDIT . '" title="' . _AM_AUDIO_FORMEDIT . '"></a> ';
				echo '<a href="broken.php?op=del_brokendownloads&broken_id=' . $downloads_reportid . '"><img src="../images/icon/ignore_mini.png" alt="' . _AM_AUDIO_FORMIGNORE . '" title="' . _AM_AUDIO_FORMIGNORE . '"></a>';
				echo '</td>';
			}
			echo '</table><br />';
			echo '<br /><div align=right>' . $pagenav . '</div><br />';
		}else{
			echo '<div class="errorMsg" style="text-align: center;">' . _AM_AUDIO_ERREUR_NOBROKENDOWNLOADS . '</div>';
		}
		break;

		// permet de suprimmer le rapport de téléchargment brisé
	case "del_brokendownloads":
		$obj =& $downloadsbroken_Handler->get($_REQUEST['broken_id']);
		if (isset($_REQUEST['ok']) && $_REQUEST['ok'] == 1) {
			if (!$GLOBALS['xoopsSecurity']->check()) {
				redirect_header('downloads.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
			}
			if ($downloadsbroken_Handler->delete($obj)) {
				redirect_header('broken.php', 1, _AM_AUDIO_REDIRECT_DELOK);
			}
			echo $objvotedata->getHtmlErrors();
		} else {
			//Affichage de la partie haute de l'administration de Xoops
			xoops_cp_header();
if (audio_checkModuleAdmin()){
                $broken_admin = new ModuleAdmin();
                $broken_admin->addItemButton(_MI_AUDIO_ADMENU4, 'broken.php', 'list');
                echo $broken_admin->renderButton();
            }
			xoops_confirm(array('ok' => 1, 'broken_id' => $_REQUEST['broken_id'], 'op' => 'del_brokendownloads'), $_SERVER['REQUEST_URI'], _AM_AUDIO_BROKEN_SURDEL . '<br>');
		}
		break;
}
//Affichage de la partie basse de l'administration de Xoops
xoops_cp_footer();
?>