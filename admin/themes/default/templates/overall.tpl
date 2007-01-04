<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta name="Generator" content="CMS Made Simple - Copyright (C) 2004-2007 Ted Kulp. All rights reserved." />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex, nofollow" />
	<title>Tags</title>
	<link rel="stylesheet" type="text/css" href="style.php" />

	{literal}
	<script type="text/javascript" src="themes/default/includes/standard.js"></script>
	<script type="text/javascript" src="../lib/scriptaculous/prototype.js"></script>
	<script type="text/javascript" src="../lib/scriptaculous/scriptaculous.js"></script>
	<script type="text/javascript" src="../lib/scriptaculous/cmsext.js"></script>
	<script type="text/javascript">
		var djConfig = {  parseWidgets: false, baseScriptUri: '../lib/dojo/'};
	</script>
	<script type="text/javascript" src="../lib/dojo/dojo.js"></script>
	<script type="text/javascript" src="../lib/dojo/src/widget/PageContainer.js"></script>
	<script type="text/javascript" src="../lib/dojo/src/widget/html/layout.js"></script>
	<script type="text/javascript" src="../lib/dojo/src/widget/TabContainer.js"></script>
	<script type="text/javascript" src="../lib/dojo/src/widget/ContentPane.js"></script>
	<script type="text/javascript">
		dojo.require("dojo.widget.TabContainer");
		dojo.require("dojo.widget.ContentPane");
    		dojo.require("dojo.event.*");
    		dojo.require("dojo.io.*");
		dojo.require("dojo.lfx.html");
		dojo.require("dojo.widget.*");
		dojo.require("dojo.widget.Button");
      function modifyPage(action, page_id)
      {
		// Make the call and update the content list
		dojo.io.updateNode(dojo.byId("contentlist"), {sync: true,  url: 'listcontent.php', content: {action: action, page_id: page_id, ajax_request: 1 }, cacheContent: false});
 		// and the fancy fading effect
        	dojo.lfx.html.highlight('tr_' + page_id, [255, 151, 58], 700).play(300);
      }
	</script>

	{/literal}
	
	{$headtext}
	
	<base href="{$baseurl}" />

</head>
<body>
	
<div>

	{$admin_topmenu}

	<div id="MainContent">
		<div class="navt_menu">
			<div id="navt_display" class="navt_show" onclick="change('navt_display', 'navt_hide', 'navt_show'); change('navt_container', 'invisible', 'visible');"></div>
			<div id="navt_container" class="invisible">
				<div id="navt_tabs">
					<div id="navt_bookmarks">Shortcuts</div>
				</div>

				<div style="clear: both;"></div>
				<div id="navt_content">
					<div id="navt_bookmarks_c">
						<a href="makebookmark.php?title=Tags">1. Add Shortcut</a><br />
						<a href="listbookmarks.php">2. Manage Shortcuts</a><br />
					</div>
				</div>
			</div>
			<div style="clear: both;"></div>
		</div>

		<div>
			{$admin_content}
			<div class="clearb"></div>
		</div>

	</div>
	

</div><!-- end MainContent -->

<p class="footer">
	<a class="footer" href="http://www.cmsmadesimple.org">CMS Made Simple</a> {cms_version} "{cms_versionname}"<br />
	<a class="footer" href="http://www.cmsmadesimple.org">CMS Made Simple</a> is free software released under the General Public Licence.
</p>
</body>
</html>