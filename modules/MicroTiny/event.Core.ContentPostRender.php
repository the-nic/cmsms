<?php
/*
 * Do nothing
 *
 * if (!isset($gCms)) exit;

$content = $params["content"];

if (version_compare('1.9.9', CMS_VERSION, '>'))
{
	$gCms = cmsms();
	if (CmsApplication::get_preference('frontendwysiwyg', '') != '')
		return;

	if (CmsApplication::get_preference('frontendwysiwyg', '') != $this->GetName())
		return;
}
else
{
	$gCms = cmsms();
	if (!isset($gCms->siteprefs['frontendwysiwyg'])) return;
	if ($gCms->siteprefs['frontendwysiwyg']!=$this->GetName()) return;
}

$pos = strpos(strtolower($content), "</head");

if ($pos === false)
	return;

$content = substr($content, 0, $pos).$this->WYSIWYGGenerateHeader("", true) . substr($content,$pos);
$params["content"] = $content;
*/
?>