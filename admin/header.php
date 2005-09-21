<?php

@ob_start();

include_once("../lib/classes/class.admintheme.inc.php");

$themeName=get_preference(get_userid(), 'admintheme', 'default');
$themeObjectName = $themeName."Theme";
$userid = get_userid();

if (file_exists(dirname(__FILE__)."/themes/${themeName}/${themeObjectName}.php"))
{
	include(dirname(__FILE__)."/themes/${themeName}/${themeObjectName}.php");
    $themeObject = new $themeObjectName($gCms, $userid, $themeName);
}
else
{
    $themeObject = new AdminTheme($gCms, $userid, $themeName);
}

$gCms->variables['admintheme']=&$themeObject;
$themeObject->SendHeaders(isset($charsetsent), get_encoding());
$themeObject->PopulateAdminNavigation(isset($CMS_ADMIN_SUBTITLE)?$CMS_ADMIN_SUBTITLE:'');

$themeObject->DisplayDocType();
$themeObject->DisplayHTMLStartTag();
$themeObject->DisplayHTMLHeader();
$themeObject->DisplayBodyTag();
$themeObject->DoTopMenu();
$themeObject->DisplayMainDivStart();
// we've removed the Recent Pages stuff, but other things could go in this box
// so I'll leave some of the logic there. We can remove it later if it makes sense. SjG
$marks = get_preference($userid, 'bookmarks');
if ($marks)
    {
    $themeObject->StartRighthandColumn();
    if ($marks)
        {
        $themeObject->DoBookmarks();
        }

    $themeObject->EndRighthandColumn();
    }
?>