<?php
// $Id: welcome.php 5529 2010-10-18 02:16:05Z beckmi $
// _LANGCODE: en
// _CHARSET : UTF-8
// Translator: XOOPS Translation Team

$content .= '
<h3>Requirements</h3>
<ul>
    <li>WWW Server (<a href="http://www.apache.org/" rel="external">Apache</a>, IIS, Roxen, etc)</li>
    <li><a href="http://www.php.net/" rel="external">PHP</a> 5.2 or higher </li>
    <li><a href="http://www.mysql.com/" rel="external">MySQL</a> 5.1 or higher </li>
</ul>
<h3>Before you install</h3>
<ol>
    <li>Setup WWW server, PHP and database server properly.</li>
    <li>Prepare a database for your site.</li>
    <li>Prepare user account and grant the user the access to the database.</li>
    <li>Make the directories and the files writable: %s</li>
    <li>For security considerations, you are strongly advised to move the two directories below out of <a href="http://phpsec.org/projects/guide/3.html" rel="external">document root</a> and change the folder names: %s</li>
    <li>Create (if not already present) and make the directories writable: %s</li>
    <li>Turn cookie and JavaScript of your browser on.</li>
</ol>
';
?>