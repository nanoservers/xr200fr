<?php
// index.php
define('_AM_VIDEO_INDEX_BROKEN',"There are %s broken files reports");
define('_AM_VIDEO_INDEX_CATEGORIES',"There are %s categories");
define('_AM_VIDEO_INDEX_DOWNLOADS',"There are %s files in our database");
define('_AM_VIDEO_INDEX_DOWNLOADSWAITING',"There are %s video waiting for approval");
define('_AM_VIDEO_INDEX_MODIFIED',"There are %s video info modification requests");
define('_AM_VIDEO_INDEX_MAXFILESIZE',"Upload max filesize ( server ) ");
define('_AM_VIDEO_INDEX_POSTMAXSIZE',"Post max size ");
define('_AM_VIDEO_INDEX_MAXVIDEOSIZE',"Upload max filesize ( module ) ");

//category.php
define("_AM_VIDEO_CAT_NEW","New category");
define("_AM_VIDEO_CAT_LIST","Categories List");
define("_AM_VIDEO_DELDOWNLOADS","with the following videos:");
define("_AM_VIDEO_DELSOUSCAT","The following categories will be totally deleted:");

//downloads.php
define('_AM_VIDEO_DOWNLOADS_LISTE',"Videos List");
define('_AM_VIDEO_DOWNLOADS_NEW',"New Video");
define("_AM_VIDEO_DOWNLOADS_NEWUPLOAD","Upload Video");
define("_AM_VIDEO_DOWNLOADS_NEWCONVERT","Convert Video");
define("_AM_VIDEO_DOWNLOADS_NEWCOPY","Copy Video");
define('_AM_VIDEO_DOWNLOADS_SEARCH',"Search");
define('_AM_VIDEO_DOWNLOADS_VOTESANONYME',"Votes by anonymous (total of votes : %s)");
define('_AM_VIDEO_DOWNLOADS_VOTESUSER',"Votes by users (total of votes : %s)");
define('_AM_VIDEO_DOWNLOADS_VOTE_USER',"Users");
define('_AM_VIDEO_DOWNLOADS_VOTE_IP',"IP Address");
define('_AM_VIDEO_DOWNLOADS_WAIT',"Waiting for validation");
define("_AM_VIDEO_DOWNLOADS_EDITFORM","Input video nubmer for edit");

//broken.php
define("_AM_VIDEO_BROKEN_SENDER","Report Author");
define("_AM_VIDEO_BROKEN_SURDEL","Are you sure you want to delete this report?");

//modified.php
define("_AM_VIDEO_MODIFIED_MOD","Submited by;");
define("_AM_VIDEO_MODIFIED_ORIGINAL","Original");
define("_AM_VIDEO_MODIFIED_SURDEL","Are you sure you want to delete this video modification request?");

//field.php
define("_AM_VIDEO_DELDATA","with the following data:");
define("_AM_VIDEO_FIELD_LIST","Fields List");
define("_AM_VIDEO_FIELD_NEW","New fields");

//permissions.php
define("_AM_VIDEO_PERMISSIONS_4","Submit a video");
define("_AM_VIDEO_PERMISSIONS_8","Submit a modification");
define("_AM_VIDEO_PERMISSIONS_16","note a video");
define("_AM_VIDEO_PERMISSIONS_32","Upload files");
define("_AM_VIDEO_PERMISSIONS_64","Auto approve proposals files");
define("_AM_VIDEO_PERMISSIONS_128","View user channel");
define("_AM_VIDEO_PERM_AUTRES", "Other permissions");
define("_AM_VIDEO_PERM_AUTRES_DSC", "Select groups that can:");
define("_AM_VIDEO_PERM_DOWNLOAD", "Downloads Permissions");
define("_AM_VIDEO_PERM_DOWNLOAD_DSC", "Select groups that can download in the categories");
define("_AM_VIDEO_PERM_DOWNLOAD_DSC2", "Select groups that can download files");
define("_AM_VIDEO_PERM_SUBMIT", "Submit Permission");
define("_AM_VIDEO_PERM_SUBMIT_DSC", "Choose groups that can submit files to categories");
define("_AM_VIDEO_PERM_VIEW", "View Permission");
define("_AM_VIDEO_PERM_VIEW_DSC", "Choose group than can view files in categories");

//Pour les options de filtre
define("_AM_VIDEO_ORDER"," order: ");
define("_AM_VIDEO_TRIPAR","sorted by: ");

//Formulaire et tableau
define("_AM_VIDEO_FORMADD","Add");
define("_AM_VIDEO_FORMACTION","Action");
define("_AM_VIDEO_FORMAFFICHE","Display the field?");
define("_AM_VIDEO_FORMAFFICHESEARCH","Search field?");
define("_AM_VIDEO_FORMAPPROVE","Approve");
define("_AM_VIDEO_FORMCAT","Category");
define("_AM_VIDEO_FORMCOMMENTS","Number of comments");
define("_AM_VIDEO_FORMDATE","Date");
define("_AM_VIDEO_FORMDATEUPDATE","Update the date");
define("_AM_VIDEO_FORMDATEUPDATE_NO","No");
define("_AM_VIDEO_FORMDATEUPDATE_YES","Yes -->");
define("_AM_VIDEO_FORMDEL","Delete");
define("_AM_VIDEO_FORMDISPLAY","Display");
define("_AM_VIDEO_FORMEDIT","Edit");
define("_AM_VIDEO_FORMFILE","File");
define("_AM_VIDEO_FORMHITS","Hits");
define("_AM_VIDEO_FORMHOMEPAGE","Home Page");
define("_AM_VIDEO_FORMLOCK","desactivate the video");
define("_AM_VIDEO_FORMIGNORE","Ignore");
define("_AM_VIDEO_FORMINCAT","in the category");
define("_AM_VIDEO_FORMIMAGE","Image");
define("_AM_VIDEO_FORMFRAME","Seconds - frames of the film");
define("_AM_VIDEO_FORMIMG","Logo");
define("_AM_VIDEO_FORMPAYPAL","Paypal address for donation");
define("_AM_VIDEO_FORMPATH","Files exist in: %s");
define("_AM_VIDEO_FORMPLATFORM","Plateform");
define("_AM_VIDEO_FORMPOSTER","Posted by ");
define("_AM_VIDEO_FORMRATING","Note");
define("_AM_VIDEO_FORMSIZE","File size");
define("_AM_VIDEO_FORMSTATUS","Video Status");
define("_AM_VIDEO_FORMSTATUS_OK","Approved");
define("_AM_VIDEO_FORMSUBMITTER","Posted by");
define("_AM_VIDEO_FORMSUREDEL", "Are you sure you want to delete : <b><span style='color : Red'> %s </span></b>");
define("_AM_VIDEO_FORMTEXT","Description");
define("_AM_VIDEO_FORMTEXTDOWNLOADS","Description : <br><br>Use the delimiter '<b>[pagebreak]</b>' to define the size of the short description.");
define("_AM_VIDEO_FORMTITLE","Title");
define("_AM_VIDEO_FORMUPLOAD","Upload");
define("_AM_VIDEO_FORMURL","Video URL");
define("_AM_VIDEO_FORM_FLVURL","Video name");
define("_AM_VIDEO_FORMVALID","Activate the video");
define("_AM_VIDEO_FORMVERSION","Version");
define("_AM_VIDEO_FORMVOTE","Votes");
define("_AM_VIDEO_FORMWEIGHT","Weight");
define("_AM_VIDEO_FORMWITHFILE","With the file: ");
define("_AM_VIDEO_DURATION","Duration");
define("_AM_VIDEO_TOP","Selected");
define("_AM_VIDEO_FORMTAB","Select tab");
define("_AM_VIDEO_NEWIMG","New Image");

define("_AM_VIDEO_FORMTABACTION","Action");
define("_AM_VIDEO_FORMTABINFO","Information");
define("_AM_VIDEO_FORMTABDESC", "Description");
define("_AM_VIDEO_FORMTABEMBED","Embed code");
define("_AM_VIDEO_FORMTABMORE","More");

//Message d'erreur
define("_AM_VIDEO_ERREUR_CAT","You can not use this category (looping on itself)");
define("_AM_VIDEO_ERREUR_NOBMODDOWNLOADS","there is not any modified videos");
define("_AM_VIDEO_ERREUR_NOBROKENDOWNLOADS","there is not any broken videos");
define("_AM_VIDEO_ERREUR_NOCAT","You have to choose a category!");
define("_AM_VIDEO_ERREUR_NODESCRIPTION","you have to write a description");
define("_AM_VIDEO_ERREUR_NODOWNLOADS","there is no video to download");
define("_AM_VIDEO_ERREUR_SIZE","the file size must be a number");
define("_AM_VIDEO_ERREUR_WEIGHT","weight must be a number");

//Message de redirection
define("_AM_VIDEO_REDIRECT_DELOK","Successfully deleted ");
define("_AM_VIDEO_REDIRECT_NOCAT","You have to create a category");
define("_AM_VIDEO_REDIRECT_NODELFIELD","You can not delete this field (Basic Field)");
define("_AM_VIDEO_REDIRECT_SAVE","Successffuly registered");

define("_REGISTER_ERROR","Please re inter licence.");

define("_AM_VIDEO_MB"," MB ");
define("_AM_VIDEO_KB"," KB ");

//Mail
define("_AM_VIDEO_MAIL_SUBJECT","Verification submited video");
define("_AM_VIDEO_MAIL_TITLE","Hello %s");
define("_AM_VIDEO_MAIL_MSG","Your submitted video Approved on %s.");
define("_AM_VIDEO_MAIL_URL","Click on link below for see video");

//version 1.25
define("_AM_VIDEO_FORMEXTRATEXT","Extra information");
define("_AM_VIDEO_FORMRELATED","Related video");

// version 1.30
define('_AM_VIDEO_FORM_MP4URL', 'Video name');
?>