
</div>

<div id="footer" class="footer">

</div>

<div id="footer1"></div>
<div id="footer2"><a href="http://www.cmsmadesimple.org">CMS made simple</a> is Free Software released under the GNU/GPL License</div>

<?php
if ($config["debug"] == true)
{
	echo '<div id="debugfooter">';
	global $sql_queries;
	echo "<div>".$sql_queries."</div>\n";
	foreach ($gCms->errors as $error)
	{
		echo $error;
	}
	echo '</div>';
}
?>
</body>
</html>

<?php

#Pull the stuff out of the buffer...
$htmlresult = @ob_get_contents();
@ob_end_clean();

#Do any header replacements (this is for WYSIWYG stuff)
$footertext = '';
$formtext = '';
$bodytext = '';

$userid = get_userid();
$wysiwyg = get_preference($userid, 'wysiwyg');

foreach($gCms->modules as $key=>$value)
{
	if ($gCms->modules[$key]['installed'] == true &&
		$gCms->modules[$key]['active'] == true &&
		$gCms->modules[$key]['object']->IsWYSIWYG())
	{
		@ob_start();
		#call_user_func_array($gCms->modules[$wysiwyg]['wysiwyg_body_function'], array(&$gCms));
		$gCms->modules[$key]['object']->WYSIWYGGenerateBody();
		$bodytext .= @ob_get_contents();
		@ob_end_clean();
		@ob_start();
		#call_user_func_array($gCms->modules[$wysiwyg]['wysiwyg_header_function'], array(&$gCms));
		$gCms->modules[$key]['object']->WYSIWYGGenerateHeader();
		$footertext .= @ob_get_contents();
		@ob_end_clean();
		@ob_start();
		#call_user_func_array($gCms->modules[$wysiwyg]['wysiwyg_form_function'], array(&$gCms));
		$gCms->modules[$key]['object']->WYSIWYGPageForm();
		$formtext .= @ob_get_contents();
		@ob_end_clean();
	}
}

$htmlresult = str_replace('<!-- THIS IS WHERE HEADER STUFF SHOULD GO -->', $footertext, $htmlresult);
$htmlresult = str_replace('##FORMSUBMITSTUFFGOESHERE##', ' '.$formtext, $htmlresult);
$htmlresult = str_replace('##BODYSUBMITSTUFFGOESHERE##', ' '.$bodytext, $htmlresult);

echo $htmlresult;

?>
