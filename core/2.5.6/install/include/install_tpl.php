<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/
/**
 * Installer template file
 *
 * See the enclosed file license.txt for licensing information.
 * If you did not receive this file, get it at http://www.fsf.org/copyleft/gpl.html
 *
 * @copyright   The XOOPS project http://www.xoops.org/
 * @license     http://www.fsf.org/copyleft/gpl.html GNU General Public License (GPL)
 * @package     installer
 * @since       2.3.0
 * @author      Haruki Setoyama  <haruki@planewave.org>
 * @author      Kazumi Ono <webmaster@myweb.ne.jp>
 * @author      Skalpa Keo <skalpa@xoops.org>
 * @author      Taiwen Jiang <phppp@users.sourceforge.net>
 * @author      Kris <kris@frxoops.org>
 * @author      DuGris (aka L. JEN) <dugris@frxoops.org>
 * @version     $Id: install_tpl.php 10997 2013-02-06 08:37:08Z beckmi $
**/

defined('XOOPS_INSTALL') or die('XOOPS Installation wizard die');
include_once '../language/' . $wizard->language . '/global.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo _LANGCODE; ?>" lang="<?php echo _LANGCODE; ?>">

<head>
    <title>
        <?php echo XOOPS_VERSION . ' : ' . XOOPS_INSTALL_WIZARD; ?>
        (<?php echo ($wizard->pageIndex + 1) . '/' . count($wizard->pages); ?>)
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo _INSTALL_CHARSET ?>" />
    <link rel="shortcut icon" type="image/ico" href="../favicon.ico" />
    <link charset="UTF-8" rel="stylesheet" type="text/css" media="all" href="css/style.css" />
    <?php
        if (file_exists('language/' . $wizard->language . '/style.css')) {
            echo '<link charset="UTF-8" rel="stylesheet" type="text/css" media="all" href="language/' . $wizard->language . '/style.css" />';
        }
    ?>
    
    <script type="text/javascript" src="./js/prototype-1.6.0.3.js"></script>
    <script type="text/javascript" src="./js/xo-installer.js"></script>
</head>

<body>
    <div id="xo-header">
        <div id="xo-banner" class="commercial">
            <img id="xo-main-logo" src="img/logo.png" alt="XOOPS" />
            <div id="xo-version">
                <?php
                $version = './img/' . str_replace(" ", "_", strtolower(XOOPS_VERSION)) . '.png' ;
                if (file_exists($version)) {
                    echo '<img src="' . $version . '" alt="' . XOOPS_VERSION . '" />';
                } else {
                    echo XOOPS_VERSION ;
                }
                ?>
            </div>

                <div id="xo-support">
                <select id="support" onchange="javascript:window.open(this.value);">
                <option value='#'><?php echo SUPPORT; ?></option>
                <?php
                @include_once './language/' . $wizard->language . '/support.php';
                foreach ($supports as $lang => $support) {
                    echo "<option value='" . $support['url'] . "'";
                    if (file_exists('./language/' . $lang . '/support.png')) {
                        echo " class='option' style='background-image:url(./language/" . $lang . "/support.png); background-repeat: no-repeat;'";
                    }
                    echo ">" . $support['title'] . "</option>";
                }
                ?>
                </select>
                </div>
        </div>
    </div>

    <div id="xo-globalnav" class="x2-nl x2-navigation"></div>

    <div id="xo-content">
        <div class="tagsoup1">
            <div class="tagsoup2">
                <div id="wizard">
                    <form id='<?php echo $wizard->pages[$wizard->currentPage]['name']; ?>' action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>

                        <div id="header">
                            <div id="title" class="title">
                                <span id="step">
                                    <?php echo ($wizard->pageIndex + 1) . '/' . count($wizard->pages); ?>
                                </span>
                                <span id="step2">
                                    <?php echo XOOPS_INSTALL_WIZARD; ?>
                                </span>
                            </div>
                        </div>

                        <ul id="pageslist" class="x2-navigation">
                        <?php
                        foreach (array_keys($wizard->pages) as $k => $page) {
                            $class = '';
                            if ($k == $wizard->pageIndex) {
                                $class = ' class="current"';
                            } else if ($k > $wizard->pageIndex) {
                                $class = ' class="disabled"';
                            }
                            if (empty($class)) {
                                $li = '<a href="' . $wizard->pageURI($page) . '">' . $wizard->pages[$page]['name'] . '</a>';
                            } else {
                                $li = $wizard->pages[$page]['name'];
                            }
                            echo "<li$class>$li</li>\n";
                        }
                        ?>
                        </ul>

                        <div class="page" id="<?php echo $wizard->pages[$wizard->currentPage]['name']; ?>">
                            <?php if ($pageHasHelp) { ?>
                                <img id="help_button" src="img/help.png" alt="help" title="<?php echo SHOW_HIDE_HELP; ?>" class="off" onclick="showHideHelp(this)" />
                            <?php } ?>

                            <h2><?php echo $wizard->pages[$wizard->currentPage]['title'] ; ?></h2>
                            <?php echo $content; ?>
                        </div>

                        <div id="buttons">
                            <?php if ($wizard->pageIndex != 0) { ?>
                                <button type="button" onclick="history.back()">
                                <?php echo BUTTON_PREVIOUS; ?>
                                </button>
                            <?php } ?>

                            <?php if (@$pageHasForm) { ?>
                                <button type="submit">
                            <?php } else { ?>
                                <button type="button" accesskey="n" onclick="location.href='<?php echo $wizard->pageURI('+1'); ?>'">
                            <?php } ?>
                            <?php echo BUTTON_NEXT; ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    /**
     * Checking url in browser
     * if page is install/page_end.php
     * use folder rename variables from
     * page_end.php to fetch js and css
    **/
    var pathArray = window.location.pathname.split( '/' );
    var filename = location.pathname.substring(location.pathname.lastIndexOf('/')+1);
    var chkUrl = pathArray[2]+"/"+filename;
    if (chkUrl === 'install/page_end.php'){
        //window.location = newinstallurl;
        loadjscssfile(newPro, 'js');
        loadjscssfile(newINST, 'js');
        loadjscssfile(newCSS, 'css');
    } else {
        // Do nothing
    }
    
/**
 * Load js and css files to header
 *
 * @param   filename   Filename based on var using $installer_modified if folder is renamed
 *
 * @param   filetype   js=javascript css=cascading style sheat
 *
 * @return  boolean  always true
 */
function loadjscssfile(filename, filetype) {
                if (filetype == "js") { //if filename is a external JavaScript file
                   // alert('called');
                    var fileref = document.createElement('script');
                    fileref.setAttribute("type", "text/javascript");
                    fileref.setAttribute("src", filename);
                }
                else if (filetype == "css") { //if filename is an external CSS file
                    var fileref = document.createElement("link");
                    fileref.setAttribute("rel", "stylesheet");
                    fileref.setAttribute("type", "text/css");
                    fileref.setAttribute("href", filename);
                }
                if (typeof fileref != "undefined")
                    document.getElementsByTagName("head")[0].appendChild(fileref);
            } 
</script>