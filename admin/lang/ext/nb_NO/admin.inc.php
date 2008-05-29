<?php
$lang['admin']['contenttype_separator'] = 'Adskiller';
$lang['admin']['contenttype_sectionheader'] = 'Seksjonshode';
$lang['admin']['contenttype_link'] = 'Ekstern lenke';
$lang['admin']['contenttype_content'] = 'Innhold';
$lang['admin']['contenttype_pagelink'] = 'Intern sidelenke';
$lang['admin']['nogcbwysiwyg'] = 'Ikke tillat WYSIWYG redigerer p&aring; Globale innholdsblokker(GCB)';
$lang['admin']['destination_page'] = 'M&aring;l side';
$lang['admin']['additional_params'] = 'Tilleggsparametere';
$lang['admin']['help_function_current_date'] = '	<h3>What does this do?</h3>
	<p>Prints the current date and time.  If no format is given, it will default to a format similar to &#039;Jan 01, 2004&#039;.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{current_date format=&quot;%A %d-%b-%y %T %Z&quot;}</code></p>
	<h3>What parameters does it take?</h3>
	<ul>
		<li><em>(optional)</em>format - Date/Time format using parameters from php&#039;s strftime function.  See <a href=&quot;http://php.net/strftime&quot; target=&quot;_blank&quot;>here</a> for a parameter list and information.</li>
		<li><em>(optional)</em>ucword - If true return uppercase the first character of each word.</li>
	</ul>
	</p>';
$lang['admin']['help_function_valid_xhtml'] = '<h3>What does this do?</h3>
<p>Returns a link to the w3c HTML validator.</p>
<h3>How do I use it?</h3>
<p>Just insert the tag into your template/page like: <code>{valid_xhtml}</code></p>
<h3>What parameters does it take?</h3>
<p>
    <ul>
	<li><em>(optional)</em> url         (string)     - The URL used for validation, if none is given http://validator.w3.org/check/referer is used.</li>
	<li><em>(optional)</em> class       (string)     - If set, this will be used as class attribute for the link (a) element</li>
	<li><em>(optional)</em> target      (string)     - If set, this will be used as target attribute for the link (a) element</li>
	<li><em>(optional)</em> image       (true/false) - If set to false, a text link will be used instead of an image/icon.</li>
	<li><em>(optional)</em> text        (string)     - If set, this will be used for the link text or alternate text for the image. Default is &#039;valid XHTML 1.0 Transitional&#039;.<br /> When an image is used, the given string will also be used for the image alt attribute (by default, this can be overridden by using the &#039;alt&#039; parameter).</li>
	<li><em>(optional)</em> image_class (string)     - Only if &#039;image&#039; is not set to false. If set, this will be used as class attribute for the image (img) element</li>
	<li><em>(optional)</em> src         (string)     - Only if &#039;image&#039; is not set to false. The icon to show. Default is http://www.w3.org/Icons/valid-xhtml10</li>
	<li><em>(optional)</em> width       (string)     - Only if &#039;image&#039; is not set to false. The image width. Default is 88 (width of http://www.w3.org/Icons/valid-xhtml10)</li>
	<li><em>(optional)</em> height      (string)     - Only if &#039;image&#039; is not set to false. The image height. Default is 31 (height of http://www.w3.org/Icons/valid-xhtml10)</li>
	<li><em>(optional)</em> alt         (string)     - Only if &#039;image&#039; is not set to false. The alternate text (&#039;alt&#039; attribute) for the image (element). If none is given the link text will be used.</li>
    </ul>
</p>';
$lang['admin']['help_function_valid_css'] = '<h3>What does this do?</h3>
<p>Returns a link to the w3c CSS validator.</p>
<h3>How do I use it?</h3>
<p>Just insert the tag into your template/page like: <code>{valid_css}</code></p>
<h3>What parameters does it take?</h3>
<p>
    <ul>
        <li><em>(optional)</em> url         (string)     - The URL used for validation, if none is given http://jigsaw.w3.org/css-validator/check/referer is used.</li>
	<li><em>(optional)</em> class       (string)     - If set, this will be used as class attribute for the link (a) element</li>
	<li><em>(optional)</em> target      (string)     - If set, this will be used as target attribute for the link (a) element</li>
	<li><em>(optional)</em> image       (true/false) - If set to false, a text link will be used instead of an image/icon.</li>
	<li><em>(optional)</em> text        (string)     - If set, this will be used for the link text or alternate text for the image. Default is &#039;Valid CSS 2.1&#039;.<br /> When an image is used, the given string will also be used for the image alt attribute (by default, this can be overridden by using the &#039;alt&#039; parameter).</li>
	<li><em>(optional)</em> image_class (string)     - Only if &#039;image&#039; is not set to false. If set, this will be used as class attribute for the image (img) element</li>
        <li><em>(optional)</em> src         (string)     - Only if &#039;image&#039; is not set to false. The icon to show. Default is http://jigsaw.w3.org/css-validator/images/vcss</li>
        <li><em>(optional)</em> width       (string)     - Only if &#039;image&#039; is not set to false. The image width. Default is 88 (width of http://jigsaw.w3.org/css-validator/images/vcss)</li>
        <li><em>(optional)</em> height      (string)     - Only if &#039;image&#039; is not set to false. The image height. Default is 31 (height of http://jigsaw.w3.org/css-validator/images/vcss)</li>
	<li><em>(optional)</em> alt         (string)     - Only if &#039;image&#039; is not set to false. The alternate text (&#039;alt&#039; attribute) for the image (element). If none is given the link text will be used.</li>
    </ul>
</p>';
$lang['admin']['help_function_title'] = '	<h3>What does this do?</h3>
	<p>Prints the title of the page.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{title}</code></p>
	<h3>What parameters does it take?</h3>
	<p><em>(optional)</em> assign (string) - Assign the results to a smarty variable with that name.</p>';
$lang['admin']['help_function_stylesheet'] = '	<h3>What does this do?</h3>
	<p>Gets stylesheet information from the system.  By default, it grabs all of the stylesheets attached to the current template.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page&#039;s head section like: <code>{stylesheet}</code></p>
	<h3>What parameters does it take?</h3>
	<ul>
		<li><em>(optional)</em>name - Instead of getting all stylesheets for the given page, it will only get one spefically named one, whether it&#039;s attached to the current template or not.</li>
		<li><em>(optional)</em>media - If name is defined, this allows you set a different media type for that stylesheet.</li>
	</ul>
	</p>';
$lang['admin']['help_function_stopexpandcollapse'] = '	<h3>What does this do?</h3>
	<p>Enables content to be expandable and collapsable. Like the following:<br />
	<a href=&quot;#expand1&quot; onClick=&quot;expandcontent(&#039;expand1&#039;)&quot; style=&quot;cursor:hand; cursor:pointer&quot;>Click here for more info</a><span id=&quot;expand1&quot; class=&quot;expand&quot;><a name=&quot;help&quot;></a> - Here is all the info you will ever need...</a></span></p>

	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like:<br />
	<br />
	<code>{startExpandCollapse id=&quot;name&quot; title=&quot;Click Here&quot;}<br />
	This is all the content the user will see when they click the title &quot;Click Here&quot; above. It will display all the content that is between the {startExpandCollapse} and {stopExpandCollapse} when clicked.<br />
	{stopExpandCollapse}
	</code>
	<br />
	<br />
	Note: If you intend to use this multiple times on a single page each startExpandCollapse tag must have a unique id.</p>
	<h3>What if I want to change the look of the title?</h3>
	<p>The look of the title can be changed via css. The title is wrapped in a div with the id you specify.</p>

	<h3>What parameters does it take?</h3>
	<p>
	<i>startExpandCollapse takes the following parameters</i><br />
	&nbsp; &nbsp;id - A unique id for the expand/collapse section.<br />
	&nbsp; &nbsp;title - The text that will be displayed to expand/collapse the content.<br />
	<i>stopExpandCollapse takes no parameters</i><br />
	</p>';
$lang['admin']['help_function_startexpandcollapse'] = '	<h3>What does this do?</h3>
	<p>Enables content to be expandable and collapsable. Like the following:<br />
	<a href=&quot;#expand1&quot; onClick=&quot;expandcontent(&#039;expand1&#039;)&quot; style=&quot;cursor:hand; cursor:pointer&quot;>Click here for more info</a><span id=&quot;expand1&quot; class=&quot;expand&quot;><a name=&quot;help&quot;></a> - Here is all the info you will ever need...</a></span></p>

	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{startExpandCollapse id=&quot;name&quot; title=&quot;Click Here&quot;}</code>. Also, you must use the {stopExpandCollapse} at the end of the collapseable content. Here is an example:<br />
	<br />
	<code>{startExpandCollapse id=&quot;name&quot; title=&quot;Click Here&quot;}<br />
	This is all the content the user will see when they click the title &quot;Click Here&quot; above. It will display all the content that is between the {startExpandCollapse} and {stopExpandCollapse} when clicked.<br />
	{stopExpandCollapse}
	</code>
	<br />
	<br />
	Note: If you intend to use this multiple times on a single page each startExpandCollapse tag must have a unique id.</p>
	<h3>What if I want to change the look of the title?</h3>
	<p>The look of the title can be changed via css. The title is wrapped in a div with the id you specify.</p>

	<h3>What parameters does it take?</h3>
	<p>
	<i>startExpandCollapse takes the following parameters</i><br />
	&nbsp; &nbsp;id - A unique id for the expand/collapse section.<br />
	&nbsp; &nbsp;title - The text that will be displayed to expand/collapse the content.<br />
	<i>stopExpandCollapse takes no parameters</i><br />
	</p>';
$lang['admin']['help_function_sitemap'] = '    <h3>Notice</h3>
    <p>This plugin is deprecated.  Users should now see the <code>{site_mapper}</code> plugin.</p>
    <h3>What does this do?</h3>
    <p>Prints out a sitemap.</p>
    <h3>How do I use it?</h3>
    <p>Just insert the tag into your template/page like: <code>{sitemap}</code></p>
    <h3>What parameters does it take?</h3>
    <p>
        <ul>
            <li><em>(optional)</em> <tt>class</tt> - A css_class for the ul-tag which includes the complete sitemap.</li>
            <li><em>(optional)</em> <tt>start_element</tt> - The hierarchy of your element (ie : 1.2 or 3.5.1 for example). This parameter sets the root of the menu. You can use the page alias instead of hierarchy.</li>
            <li><em>(optional)</em> <tt>number_of_levels</tt> - An integer, the number of levels you want to show in your menu. Should be set to 2 using a delimiter.</li>
            <li><em>(optional)</em> <tt>delimiter</tt> - Text to separate entries not on depth 1 of the sitemap (i.e. 1.1, 1.2). This is helpful for showing entries on depth 2 beside each other (using css display:inline).</li>
            <li><em>(optional)</em> <tt>initial 1/0</tt> - If set to 1, begin also the first entries not on depth 1 with a delimiter (i.e. 1.1, 2.1).</li>
            <li><em>(optional)</em> <tt>relative 1/0</tt> - We are not going to show current page (with the sitemap) - we&#039;ll show only his childs.</li>
            <li><em>(optional)</em> <tt>showall 1/0</tt> - We are going to show all pages if showall is enabled, else we&#039;ll only show pages with active menu entries.</li>
            <li><em>(optional)</em> <tt>add_elements</tt> - A comma separated list of alias names which will be added to the shown pages with active menu entries (showall not enabled).</li>
        </ul>
        </p>';
$lang['admin']['help_function_adsense'] = '	<h3>What does this do?</h3>
	<p>Google adsense is a popular advertising program for websites.  This tag will take the basic parameters that would be provided by the adsense program and puts them in a easy to use tag that makes your templates look much cleaner.  See <a href=&quot;http://www.google.com/adsense&quot; target=&quot;_blank&quot;>here</a> for more details on adsense.</p>
	<h3>How do I use it?</h3>
	<p>First, sign up for a google adsense account and get the parameters for your ad.  Then just use the tag in your page/template like so: <code>{adsense ad_client=&quot;pub-random#&quot; ad_width=&quot;120&quot; ad_height=&quot;600&quot; ad_format=&quot;120x600_as&quot;}</code>
	<h3>What parameters does it take?</h3>
	<p>All parameters are optional, though skipping one might not necessarily made the ad work right.  Options are:
	<ul>
		<li>ad_client - This would be the pub_random# id that would represent your adsense account number</li>
		<li>ad_width - width of the ad</li>
		<li>ad_height - height of the ad</li>
		<li>ad_format - &quot;format&quot; of the ad <em>e.g. 120x600_as</em></li>
		<li>ad_channel - channels are an advanced feature of adsense.  Put it here if you use it.</li>
		<li>ad_type - possible options are text, image or text_image.</li>
		<li>color_border - the color of the border. Use HEX color or type the color name (Ex. Red)</li>
		<li>color_link - the color of the linktext. Use HEX color or type the color name (Ex. Red)</li>
		<li>color_url - the color of the URL. Use HEX color or type the color name (Ex. Red)</li>
		<li>color_text - the color of the text. Use HEX color or type the color name (Ex. Red)</li>
	</ul>
	</p>';
$lang['admin']['help_function_sitename'] = '        <h3>What does this do?</h3>
        <p>Shows the name of the site.  This is defined during install and can bbe modified in the Global Settings section of the admin panel.</p>
        <h3>How do I use it?</h3>
        <p>Just insert the tag into your template/page like: <code>{sitename}</code></p>
        <h3>What parameters does it take?</h3>
	<p><em>(optional)</em> assign (string) - Assign the results to a smarty variable with that name.</p>';
$lang['admin']['help_function_search'] = '	<h3>What does this do?</h3>
	<p>This is actually just a wrapper tag for the <a href=&quot;listmodules.php?action=showmodulehelp&amp;module=Search&quot;>Search module</a> to make the tag syntax easier. 
	Instead of having to use <code>{cms_module module=&#039;Search&#039;}</code> you can now just use <code>{search}</code> to insert the module in a template.
	</p>
	<h3>How do I use it?</h3>
	<p>Just put <code>{search}</code> in a template where you want the search input box to appear. For help about the Search module, please refer to the <a href=&quot;listmodules.php?action=showmodulehelp&amp;module=Search&quot;>Search module help</a>.';
$lang['admin']['help_function_root_url'] = '	<h3>What does this do?</h3>
	<p>Prints the root url location for the site.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{root_url}</code></p>
	<h3>What parameters does it take?</h3>
	<p>None at this time.</p>';
$lang['admin']['help_function_repeat'] = '  <h3>What does this do?</h3>
  <p>Repeats a specified sequence of characters, a specified number of times</p>
  <h3>How do I use it?</h3>
  <p>Insert a tag similar to the following into your template/page, like this: <code>{recently_updated string=&#039;repeat this &#039; times=&#039;3&#039;}</code>
  <h3>What parameters does it take?</h3>
  <ul>
  <li>string=&#039;text&#039; - The string to repeat</li>
  <li>times=&#039;num&#039; - The number of times to repeat it.</li>
  </ul>';
$lang['admin']['help_function_recently_updated'] = '	<h3>What does this do?</h3>
	<p>Outputs a list of recently updated pages.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{recently_updated}</code></p>
	<h3>What parameters does it take?</h3>
	<ul>
											 <li><p><em>(optional)</em> number=&#039;10&#039; - Number of updated pages to show.</p><p>Example: <pre>{recently_updated number=&#039;15&#039;}</pre></p></li>
											 	<li><p><em>(optional)</em> leadin=&#039;Last changed&#039; - Text to show left of the modified date.</p><p>Example: <pre>{recently_updated leadin=&#039;Last Changed&#039;}</pre></p></li>
											 	<li><p><em>(optional)</em> showtitle=&#039;true&#039; - Shows the titleattribute if it exists as well (true|false).</p><p>Example: <pre>{recently_updated showtitle=&#039;true&#039;}</pre></p></li>											 	
											 	<li><p><em>(optional)</em> css_class=&#039;some_name&#039; - Warp a div tag with this class around the list.</p><p>Example: <pre>{recently_updated css_class=&#039;some_name&#039;}</pre></p></li>											 	
											 		<li><p><em>(optional)</em> dateformat=&#039;d.m.y h:m&#039; - default is d.m.y h:m , use the format you whish (php -date- format)</p><p>Example: <pre>{recently_updated dateformat=&#039;D M j G:i:s T Y&#039;}</pre></p></li>											 	
	</ul>
	<p>or combined:</p>
	<pre>{recently_updated number=&#039;15&#039; showtitle=&#039;false&#039; leadin=&#039;Last Change: &#039; css_class=&#039;my_changes&#039; dateformat=&#039;D M j G:i:s T Y&#039;}</pre>';
$lang['admin']['help_function_print'] = '	<h3>What does this do?</h3>
	<p>This is actually just a wrapper tag for the <a href=&quot;listmodules.php?action=showmodulehelp&amp;module=Printing&quot;>Printing module</a> to make the tag syntax easier. 
	Instead of having to use <code>{cms_module module=&#039;Printing&#039;}</code> you can now just use <code>{print}</code> to insert the module on pages and templates.
	</p>
	<h3>How do I use it?</h3>
	<p>Just put <code>{print}</code> on a page or in a template. For help about the Printing module, what parameters it takes etc., please refer to the <a href=&quot;listmodules.php?action=showmodulehelp&amp;module=Printing&quot;>Printing module help</a>.';
$lang['admin']['help_function_oldprint'] = '	<h3>What does this do?</h3>
	<p>Creates a link to only the content of the page.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{print}</code><br></p>
        <h3>What parameters does it take?</h3>
        <ul>
                <li><em>(optional)</em> goback - Set to &quot;true&quot; to show a &quot;Go Back&quot; link on the page to print.</li>
                <li><em>(optional)</em> popup - Set to &quot;true&quot; and page for printing will by opened in new window.</li>
                <li><em>(optional)</em> script - Set to &quot;true&quot; and in print page will by used java script for run print of page.</li>
                <li><em>(optional)</em> showbutton - Set to &quot;true&quot; and will show a printer graphic instead of a text link.</li>
                <li><em>(optional)</em> class - class for the link, defaults to &quot;noprint&quot;.</li>
                <li><em>(optional)</em> text - Text to use instead of &quot;Print This Page&quot; for the print link.
                <li><em>(optional)</em> title - Text to show for title attribute. If blank show text parameter.</li>
                <li><em>(optional)</em> more - Place additional options inside the <a> link.</li>
                <li><em>(optional)</em> src_img - Show this image file. Default images/cms/printbutton.gif.</li>
                <li><em>(optional)</em> class_img - Class of <img> tag if showbutton is sets.</li>

                    <p>Example:</p>
                     <pre>{print text=&quot;Printable Page&quot;}</pre>      
                     </li>
        </ul>';
$lang['admin']['login_info_title'] = 'Informasjon';
$lang['admin']['login_info'] = 'Fra dette punkt b&oslash;r ta med i betraktning f&oslash;lgende parametere';
$lang['admin']['login_info_params'] = '<ol> 
  <li>Cookies tillatt i din nettleser</li> 
  <li>Javascript tillatt i din nettleser </li> 
  <li>Windows popup tillatt for f&oslash;lgende adresse:</li> 
</ol>';
$lang['admin']['help_function_news'] = '	<h3>What does this do?</h3>
	<p>This is actually just a wrapper tag for the <a href=&quot;listmodules.php?action=showmodulehelp&amp;module=News&quot;>News module</a> to make the tag syntax easier. 
	Instead of having to use <code>{cms_module module=&#039;News&#039;}</code> you can now just use <code>{news}</code> to insert the module on pages and templates.
	</p>
	<h3>How do I use it?</h3>
	<p>Just put <code>{news}</code> on a page or in a template. For help about the News module, what parameters it takes etc., please refer to the <a href=&quot;listmodules.php?action=showmodulehelp&amp;module=News&quot;>News module help</a>.';
$lang['admin']['help_function_modified_date'] = '        <h3>What does this do?</h3>
        <p>Prints the date and time the page was last modified.  If no format is given, it will default to a format similar to &#039;Jan 01, 2004&#039;.</p>
        <h3>How do I use it?</h3>
        <p>Just insert the tag into your template/page like: <code>{modified_date format=&quot;%A %d-%b-%y %T %Z&quot;}</code></p>
        <h3>What parameters does it take?</h3>
        <ul>
                <li><em>(optional)</em>format - Date/Time format using parameters from php&#039;s strftime function.  See <a href=&quot;http://php.net/strftime&quot; target=&quot;_blank&quot;>here</a> for a parameter list and information.</li>
        </ul>';
$lang['admin']['help_function_metadata'] = '	<h3>What does this do?</h3>
	<p>Displays the metadata for this page. Both global metdata from the global settings page and metadata for each page will be shown.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template like: <code>{metadata}</code></p>
	<h3>What parameters does it take?</h3>
	<ul>
		<li><em>(optional)</em>showbase (true/false) - If set to false, the base tag will not be sent to the browser.  Defaults to true if use_hierarchy is set to true in config.php.</li>
	</ul>';
$lang['admin']['help_function_menu_text'] = '	<h3>What does this do?</h3>
	<p>Prints the menu text of the page.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{menu_text}</code></p>
	<h3>What parameters does it take?</h3>
	<p>None at this time.</p>';
$lang['admin']['help_function_menu'] = '	<h3>What does this do?</h3>
	<p>This is actually just a wrapper tag for the <a href=&quot;listmodules.php?action=showmodulehelp&amp;module=MenuManager&quot;>Menu Manager module</a> to make the tag syntax easier. 
	Instead of having to use <code>{cms_module module=&#039;MenuManager&#039;}</code> you can now just use <code>{menu}</code> to insert the module on pages and templates.
	</p>
	<h3>How do I use it?</h3>
	<p>Just put <code>{menu}</code> on a page or in a template. For help about the Menu Manager module, what parameters it takes etc., please refer to the <a href=&quot;listmodules.php?action=showmodulehelp&amp;module=MenuManager&quot;>Menu Manager module help</a>.';
$lang['admin']['help_function_last_modified_by'] = '        <h3>What does this do?</h3>
        <p>Prints last person that edited this page.  If no format is given, it will default to a ID number of user .</p>
        <h3>How do I use it?</h3>
        <p>Just insert the tag into your template/page like: <code>{last_modified_by format=&quot;fullname&quot;}</code></p>
        <h3>What parameters does it take?</h3>
        <ul>
                <li><em>(optional)</em>format - id, username, fullname</li>
        </ul>';
$lang['admin']['help_function_iamge'] = '  <h3>What does this do?</h3>
  <p>Creates an image tag to an image stored within your images directory</p>
  <h3>How do I use it?</h3>
  <p>Just insert the tag into your template/page like: <code>{image src=&quot;something.jpg&quot;}</code></p>
  <h3>What parameters does it take?</h3>
  <ul>
     <li><em>(required)</em>  <tt>src</tt> - Image filename within your images directory.</li>
     <li><em>(optional)</em>  <tt>width</tt> - Width of the image within the page. Defaults to true size.</li>
     <li><em>(optional)</em>  <tt>height</tt> - Height of the image within the page. Defaults to true size.</li>
     <li><em>(optional)</em>  <tt>alt</tt> - Alt text for the image -- needed for xhtml compliance. Defaults to filename.</li>
     <li><em>(optional)</em>  <tt>class</tt> - CSS class for the image.</li>
     <li><em>(optional)</em>  <tt>title</tt> - Mouse over text for the image. Defaults to Alt text.</li>
     <li><em>(optional)</em>  <tt>addtext</tt> - Additional text to put into the tag</li>
  </ul>';
$lang['admin']['help_function_imagegallery'] = '	<h3>What does this do?</h3>
	<p>Creates a gallery out of a folder of images (.gif, .jpg or .png). 
	You can click on a thumbnail image to view the bigger image. It can use 
	captions which are based on the image name, minus the file extension. It 
	follows web standards and uses CSS for formatting. There are classes 
	for various elements and for the surrounding &#039;div&#039;. Check out the CSS below for
	more information.</p>

	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template or page like: </p>
	<code>{ImageGallery picFolder=&quot;uploads/images/yourfolder/&quot;}</code>
	<p>Where picFolder is the folder where your images are stored.</p>
	
    <h3>What parameters does it take?</h3>
    <p>It can take quite a few parameters, but the example above is probably 
good for most people :) </p>
        <ol>
		<li><strong>picFolder e.g. picFolder=&quot;uploads/images/yourfolder/&quot;</strong><br/>
		Is the path to the gallery (yourfolder) ending in&#039;/&#039;. So you can have 
		lots of directories and lots of galleries.</li>

		<li><strong>type e.g. type=&quot;click&quot; or type=&quot;popup&quot;</strong><br/>
		For the &quot;popup&quot; function to work you need to include the popup javascript into
		the head of your template e.g. &quot;<head></head>&quot;. The javascript is at
		the bottom of this page! <em>The default is &#039;click&#039;.</em></li>

		<li><strong>divID e.g. divID =&quot;imagegallery&quot;</strong><br/>
		Sets the wrapping &#039;div id&#039; around your gallery so that you can have 
		different CSS for each gallery. <em>The default is &#039;imagegallery&#039;.</em></li>

		<li><strong>sortBy e.g. sortBy = &quot;name&quot; or sortBy = &quot;date&quot;</strong><br/>
		Sort images by &#039;name&#039; OR &#039;date&#039;. <em>No default.</em></li>

		<li><strong>sortByOrder e.g. sortByOrder = &quot;asc&quot; or sortByOrder = &quot;desc&quot;</strong><br/> 
		 <em>No default.</em>.</li>

		<li>This sets caption above the big (clicked on) image<br/>
		<strong>bigPicCaption = &quot;name&quot; </strong>(filename excluding extension)<em> or </em><br/>
		<strong>bigPicCaption = &quot;file&quot; </strong>(filename including extension)<em> or </em><br/>
		<strong>bigPicCaption = &quot;number&quot; </strong>(a number sequence)<em> or </em><br/>
		<strong>bigPicCaption = &quot;none&quot; </strong>(No caption)<br/>
		<em>The Default is &quot;name&quot;. </em></li>

		<li>This sets the caption below the small thumbnail<br/>
		<strong>thumbPicCaption = &quot;name&quot;</strong> (filename excluding extension)<em> or </em><br/>
		<strong>thumbPicCaption = &quot;file&quot;</strong> (filename including extension)<em> or </em><br/>
		<strong>thumbPicCaption = &quot;number&quot; </strong>(a number sequence)<em> or </em><br/>
		<strong>thumbPicCaption = &quot;none&quot; </strong>(No caption)<br/>
		<em>The Default is &quot;name&quot;.</em></li>

		<li>Sets the &#039;alt&#039; tag for the big image - compulsory.<br/>
		<strong>bigPicAltTag = &quot;name&quot; </strong>(filename excluding extension)<em> or </em><br/>
		<strong>bigPicAltTag = &quot;file&quot; </strong>(filename including extension)<em> or </em><br/>
		<strong>bigPicAltTag = &quot;number&quot; </strong>(a number sequence)<br/>
		<em>The Default is &quot;name&quot;.</em></li>

		<li> Sets the &#039;title&#039; tag for the big image. <br/>
		<strong>bigPicTitleTag = &quot;name&quot; </strong>(filename excluding extension)<em> or </em><br/>
		<strong>bigPicTitleTag = &quot;file&quot; </strong>(filename including extension)<em> or </em><br/>
		<strong>bigPicTitleTag = &quot;number&quot; </strong>(a number sequence)<em> or </em><br/>
		<strong>bigPicTitleTag = &quot;none&quot; </strong>(No title)<br/>
		<em>The Default is &quot;name&quot;.</em></li>

		<li><strong>thumbPicAltTag</strong><br/>
		<em>Is the same as bigPicAltTag, but for the small thumbnail images.<em></li>

		<li><strong>thumbPicTitleTag *</strong><br/>
		<em>Is the same as bigPicTitleTag but for the small thumbnail images.<br/>
		<strong>*Except that after the options you have &#039;... click for a bigger image&#039; 
		or if you do not set this option then you get the default of 
		&#039;Click for a bigger image...&#039;</em></strong></li>
        </ol>
  <p>A More Complex Example</p>
        <p>&#039;div id&#039; is &#039;cdcovers&#039;, no Caption on big images, thumbs have default caption. 
        &#039;alt&#039; tags for the big image are set to the name of the image file without the extension 
        and the big image &#039;title&#039; tag is set to the same but with an extension. 
        The thumbs have the default &#039;alt&#039; and &#039;title&#039; tags. The default being the name 
        of the image file without the extension for &#039;alt&#039; and &#039;Click for a bigger image...&#039; for the &#039;title&#039;,
		would be:</p>
		<code>{ImageGallery picFolder=&quot;uploads/images/cdcovers/&quot; divID=&quot;cdcovers&quot; bigPicCaption=&quot;none&quot;  bigPicAltTag=&quot;name&quot; bigPicTitleTag=&quot;file&quot;}</code>
        <br/>
		<p>It&#039;s got lots of options but I wanted to keep it very flexible and you don&#039;t have to set them, the defaults are sensible.</p>
		
  <br/>
	<h4>Example CSS</h4>
<pre>
	/* Image Gallery - Small Thumbnail Images */
	.thumb {
		margin: 1em 1em 1.6em 0; /* Space between images */
		padding: 0;
		float: left;
		text-decoration: none;
		line-height: normal;
		text-align: left;
	}

	.thumb img, .thumb a img, .thumb a:link img{ /* Set link formatting*/
		width: 100px; /* Image width*/
		height: 100px; /* Image height*/
		display: inline;
		padding: 12px; /* Image padding to form photo frame */
		/* You can set the above to 0px = no frame - but no hover indication! Adjust other widths ot text!*/
		margin: 0;
		background-color: white; /*Background of photo */ 
		border-top: 1px solid #eee; /* Borders of photo frame */
		border-right: 2px solid #ccc;
		border-bottom: 2px solid #ccc;
		border-left: 1px solid #eee;
		text-decoration: none;
	}

	.thumb a:visited img {
		background-color: #eee; /*Background of photo on hover - sort of a light grey */
	}

	.thumb a:hover img {
		background-color: #dae6e4; /*Background of photo on hover - sort of light blue/green */
	}

	.thumbPicCaption {
		text-align: center;
		font-size: smaller;
		margin: 0 1px 0 0;
		padding: 0;
		width: 124px; /* Image width plus 2 x padding for image (photo frame) - to center text on image */
		/* display: none;  if you do not want to display this text */
	}

	/* Image Gallery - Big Images */
	.bigPic {
		margin: 10px 0 5px 0;
		padding: 0;
		line-height: normal;
	}

	.bigPicCaption { /*Big Image Name - above image above .bigpicImageFileName (Without extension) */
		text-align: center;
		font-weight: bold;
		font-variant: small-caps;
		font-weight: bold;
		margin: 0 1px 0 0;
		padding: 0;
		width: 386px; /* Image width plus 2 x padding for image (photo frame) - to center text on image */
		/* display: none;  if you do not want to display this text */
	}

	.bigPic img{ /* Big Image settings */
		width: 350px; /* Width of Big Image */
			height: auto;
		display: inline;
		padding: 18px; /* Image padding to form photo frame. */
		/* You can set the above to 0px = no frame - but no hover indication! Adjust other widths ot text!*/
		margin: 0;
		background-color: white; /* Background of photo */ 
		border-top: 1px solid #eee; /* Borders of photo frame */
		border-right: 2px solid #ccc; 
		border-bottom: 2px solid #ccc;
		border-left: 1px solid #eee;
		text-decoration: none; 
		text-align: left;
	}

	.bigPicNav { /* Big Image information: &#039;Image 1 of 4&#039; and gallery navigation */
		margin: 0;
		width: 386px; /* Image width plus 2 x padding for image (photo frame) - to center text on image */
		padding: 0;
		color: #000;
		font-size: smaller;
		line-height: normal;
		text-align: center;
		/* display: none;  if you do not want to display this text. Why? You Lose Navigation! */
	}

</pre>
<br/>

	<h4>The popup javascript is now included in plugin code and will be generated automatically if you still have javascript in your template please remove it.</h4>';
$lang['admin']['help_function_html_blob'] = '	<h3>What does this do?</h3>
	<p>See the help for global_content for a description.</p>';
$lang['admin']['help_function_googlepr'] = '	<h3>What does this do?</h3>
	<p>Display&#039;s a number that represents your google pagerank.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{googlepr}</code><br>
	<br>

	<h3>What parameters does it take?</h3>
	<ul>
		<li><em>(optional)</em> domain - The website to display the pagerank for.</li>
	</ul>
	</p>';
$lang['admin']['help_function_google_search'] = '	<h3>What does this do?</h3>
	<p>Search&#039;s your website using Google&#039;s search engine.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{google_search}</code><br>
	<br>
	Note: Google needs to have your website indexed for this to work. You can submit your website to google <a href=&quot;http://www.google.com/addurl.html&quot;>here</a>.</p>
	<h3>What if I want to change the look of the textbox or button?</h3>
	<p>The look of the textbox and button can be changed via css. The textbox is given an id of textSearch and the button is given an id of buttonSearch.</p>

	<h3>What parameters does it take?</h3>
	<ul>
		<li><em>(optional)</em> domain - This tells google the website domain to search. This script tries to determine this automatically.</li>
		<li><em>(optional)</em> buttonText - The text you want to display on the search button. The default is &quot;Search Site&quot;.</li>
	</ul>
	</p>';
$lang['admin']['help_function_global_content'] = '	<h3>What does this do?</h3>
	<p>Inserts a global content block into your template or page.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{global_content name=&#039;myblob&#039;}</code>, where name is the name given to the block when it was created.</p>
	<h3>What parameters does it take?</h3>
	<ul>
		<li>name - The name of the global content block to display.</li>
	</ul>';
$lang['admin']['help_function_get_template_vars'] = '	<h3>What does this do?</h3>
	<p>Dumps all the known smarty variables into your page</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{get_template_vars}</code></p>
	<h3>What parameters does it take?</h3>
											  <p>None at this time</p>';
$lang['admin']['help_function_embed'] = '	<h3>What does this do?</h3>
	<p>Enable inclusion (embeding) of any other application into the CMS. The most usual use could be a forum. 
	This implementation is using IFRAMES so older browsers can have problems. Sorry bu this is the only known way 
	that works without modifing the embeded application.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{embed url=http://www.google.com/}</code><br></p>
        <h4>Example to make the iframe larger</h4>
	<p>Add the following to your style sheet:</p>
        <pre>#myframe { height: 600px; }</pre>
        <h3>What parameters does it take?</h3>
        <ul>
               <li><em>(required)</em>url - the url to be included 
               <li><em>(optional)</em>header=true - this will generate the header code for good resizing of the IFRAME.</li>

        </ul>
       <p>You must include in your page content {embed url=..} and in the &quot;Metadata:&quot; section (advanced tab) you must put {embed header=true}. Also be sure to put this in between the &quot;head&quot; tags of your template: {metadata}</p>';
$lang['admin']['help_function_edit'] = '	<h3>What does this do?</h3>
	<p>Creates a link to edit the page</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{edit}</code><br></p>
        <h3>What parameters does it take?</h3>
        <ul>
                <li><em>(optional)</em>showbutton - Set to &quot;true&quot; and will show a edit graphic instead of a text link.</li>
        </ul>';
$lang['admin']['help_function_description'] = '	<h3>What does this do?</h3>
	<p>Prints the description (title attribute) of the page.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{description}</code></p>
	<h3>What parameters does it take?</h3>
	<p>None at this time.</p>';
$lang['admin']['help_function_created_date'] = '        <h3>What does this do?</h3>
        <p>Prints the date and time the page was created.  If no format is given, it will default to a format similar to &#039;Jan 01, 2004&#039;.</p>
        <h3>How do I use it?</h3>
        <p>Just insert the tag into your template/page like: <code>{created_date format=&quot;%A %d-%b-%y %T %Z&quot;}</code></p>
        <h3>What parameters does it take?</h3>
        <ul>
                <li><em>(optional)</em>format - Date/Time format using parameters from php&#039;s strftime function.  See <a href=&quot;http://php.net/strftime&quot; target=&quot;_blank&quot;>here</a> for a parameter list and information.</li>
        </ul>';
$lang['admin']['help_function_content'] = '	<h3>What does this do?</h3>
	<p>This is where the content for your page will be displayed.  It&#039;s inserted into the template and changed based on the current page being displayed.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template like: <code>{content}</code>.</p>
	<h3>What parameters does it take?</h3>
	<ul>
		<li><em>(optional)</em>block - Allows you to have more than one content block per page.  When multiple content tags are put on a template, that number of edit boxes will be displayed when the page is edited.
<p>Example:</p>
<pre>{content block=&quot;Second Content Block&quot;}</pre>
<p>Now, when you edit a page there will a textarea called &quot;Second Content Block&quot;.</li>
		<li><em>(optional)</em>wysiwyg (true/false) - If set to false, then a wysiwyg will never be used while editing this block.  If true, then it acts as normal.  Only works when block parameter is used.</li>
		<li><em>(optional)</em>oneline (true/false) - If set to true, then only one edit line will be shown while editing this block.  If false, then it acts as normal.  Only works when block parameter is used.</li>
		<li><em>(optional)</em>assign - Assigns the content to a smarty parameter, which you can then use in other areas of the page, or use to test whether content exists in it or not.
<p>Example of passing page content to a User Defined Tag as a parameter:</p>
<pre>
         {content assign=pagecontent}
         {table_of_contents thepagecontent=&quot;$pagecontent&quot;}
</pre>
</li>
	</ul>';
$lang['admin']['help_function_contact_form'] = '  <h2>NOTE: This plugin is deprecated</h2>
    <p>This smarty plugin is deprecated, and may not be included with further versions of CMS Made Simple.  We recommend you use the formbuilder module and it&#039;s included contact form.</p>
	<h3>What does this do?</h3>
	<p>Display&#039;s a contact form. This can be used to allow others to send an email message to the address specified.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{contact_form email=&quot;yourname@yourdomain.com&quot;}</code><br>
	<br>
	If you would like to send an email to multiple adresses, seperate each address with a comma.</p>
	<h3>What parameters does it take?</h3>
	<ul>
		<li>email - The email address that the message will be sent to.</li>
		<li><em>(optional)</em>style - true/false, use the predefined styles. Default is true.</li>
		<li><em>(optional)</em>subject_get_var - string, allows you to specify which _GET var to use as the default value for subject.
               <p>Example:</p>
               <pre>{contact_form email=&quot;yourname@yourdomain.com&quot; subject_get_var=&quot;subject&quot;}</pre>
             <p>Then call the page with the form on it like this: /index.php?page=contact&amp;subject=test+subject</p>
             <p>And the following will appear in the &quot;Subject&quot; box: &quot;test subject&quot;
           </li>
		<li><em>(optional)</em>captcha - true/false, use Captcha response test (Captcha module must be installed). Default is false.</li>
	</ul>
	</p>';
$lang['admin']['help_function_cms_versionname'] = '<h3>Hva gj&oslash;r denne?</h3>
	<p>Denne taggen benyttes for &aring; sette inn gjeldende versjonsnavn for CMSMS inn i din mal eller innhold. Denne viser ingenting ekstra foruten versjonsnavnet.</p>
<h3>Hvordan bruker jeg denne?</h3>
	<p>Dette er kun en grunnleggende tagg plugin. Du setter den inn i din mal eller innhold som dette: <code>{cms_versionname}</code>
	<h3>Hvilke parameter tar denne?</h3>
	<p>Denne tar ingen parametere.</p>';
$lang['admin']['help_function_cms_version'] = '<h3>Hva gj&oslash;r denne?</h3>
	<p>Denne taggen benyttes for &aring; sette inn gjeldende versjonsnummer for CMSMS inn i din mal eller innhold. Denne viser ingenting ekstra foruten versjonsnummeret.</p>
<h3>Hvordan bruker jeg denne?</h3>
	<p>Dette er kun en grunnleggende tagg plugin. Du setter den inn i din mal eller innhold som dette: <code>{cms_version}</code>
	<h3>Hvilke parameter tar denne?</h3>
	<p>Denne tar ingen parametere.</p>';
$lang['admin']['about_function_cms_selflink'] = '		<p>Author: Ted Kulp <tedkulp@users.sf.net></p>
		<p>Version: 1.1</p>
		<p>Modified: Martin B. Vestergaard <mbv@nospam.dk></p>
		<p>Version: 1.41</p>
		<p>Modified: Russ Baldwin</p>
		<p>Version: 1.42</p>
		<p>Modified: Marcus Bointon <coolbru@users.sf.net></p>
		<p>Version: 1.43</p>
		<p>Modified: Tatu Wikman <tsw@backspace.fi></p>
		<p>Version: 1.44</p>
		<p>Modified: Hans Mogren <http://hans.bymarken.net/></p>
		<p>Version: 1.45</p>

		<p>
		Change History:<br/>
		1.46 - Fixes a problem with too many queries when using the dir=start option.<br/>
		1.45 - Added a new option for &amp;quot;dir&amp;quot;, &amp;quot;up&amp;quot;, for links to the parent page e.g. dir=&amp;quot;up&amp;quot; (Hans Mogren).<br />
		1.44 - Added new parameters &amp;quot;ext&amp;quot; and &amp;quot;ext_info&amp;quot; to allow external links with class=&amp;quot;external&amp;quot; and info text after the link, ugly hack but works thinking about rewriting this(Tatu Wikman)<br />
		1.43 - Added new parameters &amp;quot;image&amp;quot; and &amp;quot;imageonly&amp;quot; to allow attachment of images to be used for page links, either instead of or in addition to text links. (Marcus Bointon)<br />
		1.42 - Added new parameter &amp;quot;anchorlink&amp;quot; and a new option for &amp;quot;dir&amp;quot; namely, &amp;quot;anchor&amp;quot;, for internal page links. e.g. dir=&amp;quot;anchor&amp;quot; anchorlink=&amp;quot;internal_link&amp;quot;. (Russ)<br />
		1.41 - added new parameter &amp;quot;href&amp;quot; (LeisureLarry)<br />
		1.4 - fixed bug next/prev linking to non-content pages. (Thanks Teemu Koistinen for this fix)<br />
		1.3 - added option &amp;quot;more&amp;quot;<br />
		1.2 - by Martin B. Vestergaard
		<ul>
		<li>changed default text to Page Name (was Page Alias)</li>
		<li>added option dir=next/prev to display next or previous item in the hirachy - thanks to 100rk</li>
		<li>added option class to add a class= statement to the a-tag.</li>
		<li>added option menu to display menu-text in sted of Page Name</li>
		<li>added option lang to display link-labels in different languages</li>
		</ul>
		1.1 - Changed to new content system<br />
		1.0 - Initial release
		</p>';
$lang['admin']['help_function_cms_selflink'] = '		<h3>What does this do?</h3>
		<p>Creates a link to another CMSMS content page inside your template or content. Can also be used for external links with the ext parameter.</p>
		<h3>How do I use it?</h3>
		<p>Just insert the tag into your template/page like: <code>{cms_selflink page=&quot;1&quot;}</code> or  <code>{cms_selflink page=&quot;alias&quot;}</code></p>
		<h3>What parameters does it take?</h3>
		<p>
		<ul>
		<li><em>(optional)</em> <tt>page</tt> - Page ID or alias to link to.</li>
		<li><em>(optional)</em> <tt>dir anchor (internal links)</tt> - New option for an internal page link. If this is used then <tt>anchorlink</tt> should be set to your link. </li> <!-- Russ - 25-04-2006 -->
		<li><em>(optional)</em> <tt>anchorlink</tt> - New paramater for an internal page link. If this is used then <tt>dir =&quot;anchor&quot;</tt> should also be set. No need to add the #, because it is added automatically.</li> <!-- Russ - 25-04-2006 -->
		<li><em>(optional)</em> <tt>urlparam</tt> - Specify additional parameters to the URL.  <strong>Do not use this in conjunction with the <em>anchorlink</em> parameter</em></strong>
		<li><em>(optional)</em> <tt>tabindex =&quot;a value&quot;</tt> - Set a tabindex for the link.</li> <!-- Russ - 22-06-2005 -->
		<li><em>(optional)</em> <tt>dir start/next/prev/up (previous)</tt> - Links to the default start page or the next or previous page, or the parent page (up). If this is used <tt>page</tt> should not be set.</li> <!-- mbv - 21-06-2005 -->
		<B>Note!</B> Only one of the above may be used in the same cms_selflink statement!!
		<li><em>(optional)</em> <tt>text</tt> - Text to show for the link.  If not given, the Page Name is used instead.</li>
		<li><em>(optional)</em> <tt>menu 1/0</tt> - If 1 the Menu Text is used for the link text instead of the Page Name</li> <!-- mbv - 21-06-2005 -->
		<li><em>(optional)</em> <tt>target</tt> - Optional target for the a link to point to.  Useful for frame and javascript situations.</li>
		<li><em>(optional)</em> <tt>class</tt> - Class for the <a> link. Useful for styling the link.</li> <!-- mbv - 21-06-2005 -->
		<li><em>(optional)</em> <tt>lang</tt> - Display link-labels  (&quot;Next Page&quot;/&quot;Previous Page&quot;) in different languages (0 for no label.) Danish (dk), English (en) or French (fr), for now.</li> <!-- mbv - 21-06-2005 -->
		<li><em>(optional)</em> <tt>id</tt> - Optional css_id for the <a> link.</li> <!-- mbv - 29-06-2005 -->
		<li><em>(optional)</em> <tt>more</tt> - place additional options inside the <a> link.</li> <!-- mbv - 29-06-2005 -->
		<li><em>(optional)</em> <tt>label</tt> - Label to use in with the link if applicable.</li>
		<li><em>(optional)</em> <tt>label_side left/right</tt> - Side of link to place the label (defaults to &quot;left&quot;).</li>
		<li><em>(optional)</em> <tt>title</tt> - Text to use in the title attribute.  If none is given, then the title of the page will be used for the title.</li>
		<li><em>(optional)</em> <tt>rellink 1/0</tt> - Make a relational link for accessible navigation.  Only works if the dir parameter is set and should only go in the head section of a template.</li>
		<li><em>(optional)</em> <tt>href</tt> - If href is used only the href value is generated (no other parameters possible). <strong>Example:</strong> <a href=&quot;{cms_selflink href=&quot;alias&quot;}&quot;><img src=&quot;&quot;></a></li>
		<li><em>(optional)</em> <tt>image</tt> - A url of an image to use in the link. <strong>Example:</strong> {cms_selflink dir=&quot;next&quot; image=&quot;next.png&quot; text=&quot;Next&quot;}</li>
		<li><em>(optional)</em> <tt>alt</tt> - Alternative text to be used with image (alt=&quot;&quot; will be used if no alt parameter is given).</li>
		<li><em>(optional)</em> <tt>imageonly</tt> - If using an image, whether to suppress display of text links. If you want no text in the link at all, also set lang=0 to suppress the label. <B>Example:</B> {cms_selflink dir=&quot;next&quot; image=&quot;next.png&quot; text=&quot;Next&quot; imageonly=1}</li>
		<li><em>(optional)</em> <tt>ext</tt> - For external links, will add class=&quot;external and info text. <strong>warning:</strong> only text, target and title parameters are compatible with this parameter</li>
		<li><em>(optional)</em> <tt>ext_info</tt> - Used together with &quot;ext&quot; defaults to (external link)</li>
		</ul>
		</p>';
$lang['admin']['about_function_cms_module'] = '	<p>Author: Ted Kulp<tedkulp@users.sf.net></p>
	<p>Version: 1.0</p>
	<p>
	Change History:<br/>
	None
	</p>';
$lang['admin']['help_function_cms_module'] = '	<h3>What does this do?</h3>
	<p>This tag is used to insert modules into your templates and pages.  If a module is created to be used as a tag plugin (check it&#039;s help for details), then you should be able to insert it with this tag.</p>
	<h3>How do I use it?</h3>
	<p>It&#039;s just a basic tag plugin.  You would insert it into your template or page like so: <code>{cms_module module=&quot;somemodulename&quot;}</code>
	<h3>What parameters does it take?</h3>
	<p>There is only one required parameter.  All other parameters are passed on to the module.
	<ul>
		<li>module - Name of the module to insert.  This is not case sensitive.</li>
	</ul>
	</p>';
$lang['admin']['about_function_breadcrumbs'] = '<p>Author: Marcus Deglos <<a href=&quot;mailto:md@zioncore.com&quot;>md@zioncore.com</a>></p>
<p>Version: 1.7</p>
<p>
Change History:<br/>
1.1 - Modified to use new content rewrite (wishy)<br />
1.2 - Added parameters: delimiter, initial, and root (arl)<br />
1.3 - Added parameter: classid (tdh / perl4ever)<br />
1.4 - Added parameter currentclassid and fixed some bugs (arl)<br />
1.5 - Modified to use new hierarchy manager<br />
1.6 - Modified to skip any parents that are marked to be &quot;not shown in menu&quot; except for root<br />
1.7 - Added root_url parameter (elijahlofgren)<br />
</p>';
$lang['admin']['help_function_breadcrumbs'] = '<h3>What does this do?</h3>
<p>Prints a breadcrumb trail .</p>
<h3>How do I use it?</h3>
<p>Just insert the tag into your template/page like: <code>{breadcrumbs}</code></p>
<h3>What parameters does it take?</h3>
<p>
<ul>
<li><em>(optional)</em> <tt>delimiter</tt> - Text to seperate entries in the list (default &quot;>>&quot;).</li>
<li><em>(optional)</em> <tt>initial</tt> - 1/0 If set to 1 start the breadcrumbs with a delimiter (default 0).</li>
<li><em>(optional)</em> <tt>root</tt> - Page alias of a page you want to always appear as the first page in
    the list. Can be used to make a page (e.g. the front page) appear to be the root of everything even though it is not.</li>
<li><em>(optional)</em> <tt>root_url</tt> - Override the URL of the root page. Useful for making link be to &#039;/&#039; instead of &#039;/home/&#039;. This requires that the root page be set as the default page.</li>

<li><em>(optional)</em> <tt>classid</tt> - The CSS class for the non current page names, i.e. the first n-1 pages in the list. If the name is a link it is added to the <a href> tags, otherwise it is added to the <span> tags.</li>
<li><em>(optional)</em> <tt>currentclassid</tt> - The CSS class for the <span> tag surrounding the current page name.</li>
<li><em>(optional)</em> <tt>starttext</tt> - Text to append to the front of the breadcrumbs list, something like &quot;You are here&quot;.</li>
</ul>
</p>';
$lang['admin']['about_function_anchor'] = '	<p>Author: Ted Kulp<tedkulp@users.sf.net></p>
	<p>Version: 1.1</p>
	<p>
	Change History:<br/>
	<strong>Update to version 1.1 from 1.0</strong> <em>2006/07/19</em><br/>
	Russ added the means to insert a title, a tabindex and a class for the anchor link. Westis added accesskey and changed parameter names to not include &#039;anchorlink&#039;.<br/>
	</hr>
	</p>';
$lang['admin']['help_function_anchor'] = '	<h3>What does this do?</h3>
	<p>Makes a proper anchor link.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{anchor anchor=&#039;here&#039; text=&#039;Scroll Down&#039;}</code></p>
	<h3>What parameters does it take?</h3>
	<p>
	<ul>
	<li><tt>anchor</tt> - Where we are linking to.  The part after the #.</li>
	<li><tt>text</tt> - The text to display in the link.</li>
	<li><tt>class</tt> - The class for the link, if any</li>
	<li><tt>title</tt> - The title to display for the link, if any.</li>
	<li><tt>tabindex</tt> - The numeric tabindex for the link, if any.</li>
	<li><tt>accesskey</tt> - The accesskey for the link, if any.</li>
	<li><em>(optional)</em> <tt>onlyhref</tt> - Only display the href and not the entire link. No other options will work</li>
	</ul>
	</p>';
$lang['admin']['help_function_site_mapper'] = '<h3>What does this do?</h3>
  <p>This is actually just a wrapper tag for the <a href=&quot;listmodules.php?action=showmodulehelp&amp;module=MenuManager&quot;>Menu Manager module</a> to make the tag syntax easier, and to simplify creating a sitemap.</p>
<h3>How do I use it?</h3>
  <p>Just put <code>{site_mapper}</code> on a page or in a template. For help about the Menu Manager module, what parameters it takes etc., please refer to the <a href=&quot;listmodules.php?action=showmodulehelp&amp;module=MenuManager&quot;>Menu Manager module help</a>.</p>
  <p>By default, if no template option is specified the minimal_menu.tpl file will be used.</p>
  <p>Any parameters used in the tag are available in the menumanager template as <code>{$menuparams.paramname}</code></p>';
$lang['admin']['help_function_redirect_url'] = '<h3>Hva gj&oslash;r denne?</h3>
  <p>Denn plugginn tillater deg &aring; enkelt omdirigere til en spesifik url. Den er hendig inne i en smarty conditional logikk (for eksempel, omdiriger til en splash side om nettstedet enn&aring; ikke er oppe og kj&oslash;rer).</p>
<h3>Hvordan bruker jeg denne?</h3>
<p>Du rett og slett setter denne taggen inn i din side eller mal: <code>{redirect_url urle=&#039;www.cmsmadesimple.org&#039;}</code></p>';
$lang['admin']['help_function_redirect_page'] = '<h3>Hva gj&oslash;r denne?</h3>
 <p>Denne pluggin tillater deg &aring; lett omdirigere til en annen side. Dette er nyttig inn ei en smarty conditional logikk (for eksempel: omdiriger til en innloggingside om brukeren ikke er innlogget.)</p>
<h3>Hvordan bruker jeg denne?</h3>
<p>Du setter rett og slett inn denne taggen i din side eller mal: <code>{redirect_page page=&#039;some-page-alias&#039;}</code></p>';
$lang['admin']['of'] = 'av';
$lang['admin']['first'] = 'F&oslash;rste';
$lang['admin']['last'] = 'Siste';
$lang['admin']['adminspecialgroup'] = 'Advarsel: Medlemmer av denne brukergruppen har automatisk alle rettigheter';
$lang['admin']['disablesafemodewarning'] = 'Sl&aring; av Safe-mode advarsel i adminpanelet';
$lang['admin']['allowparamcheckwarnings'] = 'Tillat at parametertester lager advarsel meldinger';
$lang['admin']['date_format_string'] = 'Dato formatstreng';
$lang['admin']['date_format_string_help'] = '<em>strftime</em> formattert date formatstreng. Fors&oslash;k &aring; google etter &#039;strftime&#039;';
$lang['admin']['last_modified_at'] = 'Sist endret den';
$lang['admin']['last_modified_by'] = 'Sist endret av';
$lang['admin']['read'] = 'Lese';
$lang['admin']['write'] = 'Skrive';
$lang['admin']['execute'] = 'Utf&oslash;re';
$lang['admin']['group'] = 'Gruppe';
$lang['admin']['other'] = 'Annet';
$lang['admin']['event_desc_moduleupgraded'] = 'Sendt etter en modul er oppgradert';
$lang['admin']['event_desc_moduleinstalled'] = 'Sendt etter en modul er installert';
$lang['admin']['event_desc_moduleuninstalled'] = 'Sendt etter en modul er avinstallert';
$lang['admin']['event_desc_edituserdefinedtagpost'] = 'Sendt etter en brukerdefinert tagg er oppdatert';
$lang['admin']['event_desc_edituserdefinedtagpre'] = 'Sendt f&oslash;r oppdatering av brukerdefinert tagg';
$lang['admin']['event_desc_deleteuserdefinedtagpre'] = 'Sendt f&oslash;r sletting av en brukerdefinert tagg';
$lang['admin']['event_desc_deleteuserdefinedtagpost'] = 'Sendt etter en brukerdefinert tagg er slettet';
$lang['admin']['event_desc_adduserdefinedtagpost'] = 'Sendt etter en brukerdefinert tagg er satt inn';
$lang['admin']['event_desc_adduserdefinedtagpre'] = 'Sendt f&oslash;r en brukerdefinert tagg blir satt inn';
$lang['admin']['global_umask'] = 'Fil opprettelse maske (umask)';
$lang['admin']['errorcantcreatefile'] = 'Kunne ikke opprette fil (rettighetsproblem?)';
$lang['admin']['errormoduleversionincompatible'] = 'Modulen er ikke kompatibel med denne CMS versjonen';
$lang['admin']['errormodulenotloaded'] = 'Intern feil, modulen har ikke blitt opprettet';
$lang['admin']['errormodulenotfound'] = 'Intern feil, kunne ikke finne eksemplaret av denne modulen';
$lang['admin']['errorinstallfailed'] = 'Installasjon av modulen feilet';
$lang['admin']['errormodulewontload'] = 'Problem med &aring; opprette en tilgjengelig modul';
$lang['admin']['frontendlang'] = 'Standard spr&aring;k for frontend';
$lang['admin']['info_edituser_password'] = 'Endre dette feltet for &aring; endre brukerens passord';
$lang['admin']['info_edituser_passwordagain'] = 'Endre dette feltet for &aring; endre brukerens passord';
$lang['admin']['originator'] = 'Opprinnelse';
$lang['admin']['module_name'] = 'Modulnavn';
$lang['admin']['event_name'] = 'Hendelsesnavn';
$lang['admin']['event_description'] = 'Hendelsesbeskrivelse';
$lang['admin']['error_delete_default_parent'] = 'Du kan ikke slette foreldren til standardsiden.';
$lang['admin']['jsdisabled'] = 'Beklager, denne funksjonen krever at du tillater Javascript i din nettleser.';
$lang['admin']['order'] = 'Sortering';
$lang['admin']['reorderpages'] = 'Omsorter sider';
$lang['admin']['reorder'] = 'Omsorter';
$lang['admin']['page_reordered'] = 'Siden ble omsortert';
$lang['admin']['pages_reordered'] = 'Sidene ble omsortert';
$lang['admin']['sibling_duplicate_order'] = 'To s&oslash;sken-sider kan ikke ha den samme posisjon. Sidene ble ikke omsortert.';
$lang['admin']['no_orders_changed'] = 'Du valgte &aring; sortere sider p&aring; ny, men du har ikke endret rekkef&oslash;lge p&aring; dem. Sidene ble derfor ikke sortert p&aring; nytt.';
$lang['admin']['order_too_small'] = 'En sideposisjon kan ikke v&aelig;re null. Sidene ble ikke omsortert.';
$lang['admin']['order_too_large'] = 'En sideposisjon kan ikke v&aelig;re st&oslash;rre enn antall sider p&aring; samme niv&aring;. Sidene ble ikke sortert p&aring; ny.';
$lang['admin']['user_tag'] = 'Brukerdefinert tag';
$lang['admin']['add'] = 'Legg til';
$lang['admin']['CSS'] = 'CSS/stilsett';
$lang['admin']['about'] = 'Om';
$lang['admin']['action'] = 'Iverksett';
$lang['admin']['actionstatus'] = 'Iverksett/Status';
$lang['admin']['active'] = 'Aktiv';
$lang['admin']['addcontent'] = 'Legg til innhold';
$lang['admin']['cantremove'] = 'Kan ikke fjerne';
$lang['admin']['changepermissions'] = 'Endre rettigheter';
$lang['admin']['changepermissionsconfirm'] = 'V&AElig;R FORSIKTIG\n\nDenne handlingen vil pr&oslash;ve &aring; sikre at alle filene som utgj&oslash;r denne modulen er skrivbare for webserveren..\nEr du sikker p&aring; du vil fortsette?';
$lang['admin']['contentadded'] = 'Innholdet ble lagt til databasen.';
$lang['admin']['contentupdated'] = 'Innholdet ble oppdatert.';
$lang['admin']['contentdeleted'] = 'Innholdet ble fjernet fra databasen.';
$lang['admin']['success'] = 'Vellykket';
$lang['admin']['addcss'] = 'Legg til CSS/stilsett';
$lang['admin']['addgroup'] = 'Legg til gruppe';
$lang['admin']['additionaleditors'] = '&Oslash;vrige redigerere';
$lang['admin']['addtemplate'] = 'Legg til mal';
$lang['admin']['adduser'] = 'Legg til bruker';
$lang['admin']['addusertag'] = 'Legg til brukerdefinert tagg';
$lang['admin']['adminaccess'] = 'Tillatelse til &aring; logge inn til admin';
$lang['admin']['adminlog'] = 'Admin logg';
$lang['admin']['adminlogcleared'] = 'Admin loggen ble t&oslash;mt';
$lang['admin']['adminlogempty'] = 'Admin loggen er tom';
$lang['admin']['adminsystemtitle'] = 'CMS admin system';
$lang['admin']['adminpaneltitle'] = 'Administrasjonskonsollen';
$lang['admin']['advanced'] = 'Avansert';
$lang['admin']['aliasalreadyused'] = 'Alias er allerede brukt p&aring; en annen side. Endre  &#039;Side alias&#039; i &#039;Innstillinger&#039; fanen til noe annet';
$lang['admin']['aliasmustbelettersandnumbers'] = 'Alias m&aring; kun inneholde bokstaver og tall';
$lang['admin']['aliasnotaninteger'] = 'Alias kan ikke v&aelig;re en integer';
$lang['admin']['allpagesmodified'] = 'Alle sider endret!';
$lang['admin']['assignments'] = 'Tilegne brukere';
$lang['admin']['associationexists'] = 'Denne koblingen eksisterer allerede';
$lang['admin']['autoinstallupgrade'] = 'Installer eller oppgrader automatisk';
$lang['admin']['back'] = 'Tilbake til meny';
$lang['admin']['backtoplugins'] = 'Tilbake til pluginlisten (utvidelser)';
$lang['admin']['cancel'] = 'Avbryt';
$lang['admin']['cantchmodfiles'] = 'Kunne ikke endre rettigheter p&aring; noen av filene';
$lang['admin']['cantremovefiles'] = 'Problem med &aring; fjerne filer (rettigheter?)';
$lang['admin']['confirmcancel'] = 'Er du sikker p&aring; du vil angre endringene? Klikk OK for &aring; Angre endringer. Klikk Avbryt for &aring; fortsette redigeringen.';
$lang['admin']['canceldescription'] = 'Angre endringene';
$lang['admin']['clearadminlog'] = 'Nullstill adminloggen';
$lang['admin']['code'] = 'Kode';
$lang['admin']['confirmdefault'] = 'Vil du virkelige sette - %s - som standard side for nettstedet?';
$lang['admin']['confirmdeletedir'] = 'Vil du virkelig slette denne katalogen og alt innhold?';
$lang['admin']['content'] = 'Innhold';
$lang['admin']['contentmanagement'] = 'Innholdsadministrasjon';
$lang['admin']['contenttype'] = 'Innholdstype';
$lang['admin']['copy'] = 'Kopier';
$lang['admin']['copytemplate'] = 'Kopier mal';
$lang['admin']['create'] = 'Opprett';
$lang['admin']['createnewfolder'] = 'Opprett ny katalog';
$lang['admin']['cssalreadyused'] = 'CSS navn er allerede i bruk';
$lang['admin']['cssmanagement'] = 'CSS administrasjon';
$lang['admin']['currentassociations'] = 'Gjeldende forbindelser';
$lang['admin']['currentdirectory'] = 'Gjeldende katalog';
$lang['admin']['currentgroups'] = 'Gjeldende grupper';
$lang['admin']['currentpages'] = 'Gjeldende sider';
$lang['admin']['currenttemplates'] = 'Gjeldende maler';
$lang['admin']['currentusers'] = 'Gjeldende brukere';
$lang['admin']['custom404'] = 'Egenspesifisert 404 feilmelding';
$lang['admin']['database'] = 'Database ';
$lang['admin']['databaseprefix'] = 'Database forstavelse(prefix)';
$lang['admin']['databasetype'] = 'Database type';
$lang['admin']['date'] = 'Dato';
$lang['admin']['default'] = 'Standard';
$lang['admin']['delete'] = 'Slett';
$lang['admin']['deleteconfirm'] = 'Vil du virkelig slette - %s - ?';
$lang['admin']['deleteassociationconfirm'] = 'Er du sikker p&aring; at du vil slette koblingen til - %s - ?';
$lang['admin']['deletecss'] = 'Slett CSS';
$lang['admin']['dependencies'] = 'Avhengigheter';
$lang['admin']['description'] = 'Beskrivelse';
$lang['admin']['directoryexists'] = 'Katalogen eksisterer allerede.';
$lang['admin']['down'] = 'Ned';
$lang['admin']['edit'] = 'Rediger';
$lang['admin']['editconfiguration'] = 'Rediger konfigurasjon';
$lang['admin']['editcontent'] = 'Rediger innhold';
$lang['admin']['editcss'] = 'Rediger CSS/stilark';
$lang['admin']['editcsssuccess'] = 'Stilark/CSS oppdatert';
$lang['admin']['editgroup'] = 'Rediger gruppe';
$lang['admin']['editpage'] = 'Rediger side';
$lang['admin']['edittemplate'] = 'Rediger mal';
$lang['admin']['edittemplatesuccess'] = 'Mal oppdatert';
$lang['admin']['edituser'] = 'Rediger bruker';
$lang['admin']['editusertag'] = 'Rediger brukerdefinert tagg';
$lang['admin']['usertagadded'] = 'Brukerdefinert tagg ble lagt til.';
$lang['admin']['usertagupdated'] = 'Brukerdefinert tagg ble oppdatert.';
$lang['admin']['usertagdeleted'] = 'Brukerdefinert tagg ble fjernet.';
$lang['admin']['email'] = 'Epostadresse';
$lang['admin']['errorattempteddowngrade'] = 'Installering av denne modulen ville resultere i en nedgradering. Handlingen ble avbrutt';
$lang['admin']['errorchildcontent'] = 'Denne siden har underliggende sider. Vennligst fjern dem f&oslash;rst.';
$lang['admin']['errorcopyingtemplate'] = 'Feil ved kopiering av mal';
$lang['admin']['errorcouldnotparsexml'] = 'Feil ved parsing av XML filen. Kontroller at du laster opp en .xml fil og ikke en .tar.gz eller zip fil.';
$lang['admin']['errorcreatingassociation'] = 'Feil ved opprettelse av forbindelse.';
$lang['admin']['errorcssinuse'] = 'Dette CSS stilsettet er i bruk av en mal(er) eller side(r). Vennligst fjern disse forbindelsene f&oslash;rst.';
$lang['admin']['errordefaultpage'] = 'Kan ikke slette gjeldende standard side. Vennligst velg en ny f&oslash;rst.';
$lang['admin']['errordeletingassociation'] = 'Feil ved sletting av koblingen.';
$lang['admin']['errordeletingcss'] = 'Feil ved sletting av CSS';
$lang['admin']['errordeletingdirectory'] = 'Ikke mulig &aring; slette katalogen. Tilgangsproblemer?';
$lang['admin']['errordeletingfile'] = 'Ikke mulig &aring; slette fila. Tilgangsproblemer?';
$lang['admin']['errordirectorynotwritable'] = 'Ingen rettigheter til &aring; skrive til mappe. Dette kan for&aring;rsakes av filrettigheter og eierskap. Safe-mode kan ogs&aring; v&aelig;re satt p&aring;.';
$lang['admin']['errordtdmismatch'] = 'XML filen mangler DTD versjon eller er ikke kompatibel';
$lang['admin']['errorgettingcssname'] = 'Feil ved henting av stilsett-navn';
$lang['admin']['errorgettingtemplatename'] = 'Feil ved henting av mal-navn';
$lang['admin']['errorincompletexml'] = 'XML Filen er ufullstendig eller validerer ikke';
$lang['admin']['uploadxmlfile'] = 'Installer modul via XML fil';
$lang['admin']['cachenotwritable'] = 'Cache mappa er ikke skrivbar. &Aring; t&oslash;mme cache vil ikke fungere. Vennligst gi tmp/cache mappa fulle lese/skrive/kj&oslash;re(read/write/execute) tillatelser (chmod 777). Du m&aring; muligens ogs&aring; sl&aring; av Safe-mode.';
$lang['admin']['modulesnotwritable'] = 'Modul-mappen er ikke skrivbar. Om du &oslash;nsker &aring; installere moduler ved &aring; laste opp XML-fil s&aring; m&aring; du sette modul-mappen til &aring; ha fulle lese/skrive/kj&oslash;re(read/write/execute) rettigheter (chmod 777). Safe-mode kan ogs&aring; v&aelig;re satt p&aring;.';
$lang['admin']['noxmlfileuploaded'] = 'Ingen fil ble lastet opp. For &aring; installere en modul via XML m&aring; du finne og s&aring; laste opp en modul .xml fil fra din datamaskin.';
$lang['admin']['errorinsertingcss'] = 'Feil ved innlegging av CSS';
$lang['admin']['errorinsertinggroup'] = 'Feil ved oppretting av gruppe';
$lang['admin']['errorinsertingtag'] = 'Feil ved innlegging av brukertagg';
$lang['admin']['errorinsertingtemplate'] = 'Feil ved innlegging av mal';
$lang['admin']['errorinsertinguser'] = 'Feil ved opprettelse av bruker';
$lang['admin']['errornofilesexported'] = 'Feil ved eksport av filer til XML';
$lang['admin']['errorretrievingcss'] = 'Feil ved henting av CSS/stilsett';
$lang['admin']['errorretrievingtemplate'] = 'Feil ved henting av mal';
$lang['admin']['errortemplateinuse'] = 'Denne malen er fremdeles i bruk av en side. Vennligst fjern siden f&oslash;rst.';
$lang['admin']['errorupdatingcss'] = 'Feil ved oppdatering av CSS/stilsett';
$lang['admin']['errorupdatinggroup'] = 'Feil ved oppdatering av gruppe';
$lang['admin']['errorupdatingpages'] = 'Feil ved oppdatering av sider';
$lang['admin']['errorupdatingtemplate'] = 'Feil ved oppdatering av mal';
$lang['admin']['errorupdatinguser'] = 'Feil ved oppdatering av bruker';
$lang['admin']['errorupdatingusertag'] = 'Feil ved oppdatering av brukertagg';
$lang['admin']['erroruserinuse'] = 'Denne brukeren eier fremdeles innholdssider. Vennligst flytt eierrettighetene til en annen bruker f&oslash;r sletting.';
$lang['admin']['eventhandlers'] = 'Hendelser';
$lang['admin']['editeventhandler'] = 'Rediger Hendelsesbehandleren(Event Handler)';
$lang['admin']['eventhandlerdescription'] = 'Samle brukerdefinert tagger med hendelser';
$lang['admin']['export'] = 'Eksporter';
$lang['admin']['event'] = 'Hendelse';
$lang['admin']['false'] = 'Usann';
$lang['admin']['settrue'] = 'Sett sann';
$lang['admin']['filecreatedirnodoubledot'] = 'Katalognavnet kan ikke innholde &#039;..&#039;.';
$lang['admin']['filecreatedirnoname'] = 'Kan ikke opprette katalog uten navn.';
$lang['admin']['filecreatedirnoslash'] = 'Katalognavnet kan ikke innholde &#039;/&#039; eller &#039;\&#039;.';
$lang['admin']['filemanagement'] = 'Filbehandling';
$lang['admin']['filename'] = 'Filnavn';
$lang['admin']['filenotuploaded'] = 'Feil ved opplasting av fil. Dette kan v&aelig;re rettighet eller Safe mode problem?';
$lang['admin']['filesize'] = 'Filst&oslash;rrelse';
$lang['admin']['firstname'] = 'Fornavn';
$lang['admin']['groupmanagement'] = 'Gruppe-administrasjon';
$lang['admin']['grouppermissions'] = 'Grupperettigheter';
$lang['admin']['handler'] = 'H&aring;ndterer (brukerdefinert tag)';
$lang['admin']['headtags'] = 'Head-tagger';
$lang['admin']['help'] = 'Hjelp';
$lang['admin']['new_window'] = 'nytt vindu';
$lang['admin']['helpwithsection'] = '%s Hjelp';
$lang['admin']['helpaddtemplate'] = '<p>En mal er det som kontrollerer utseendet til din nettsides innhold.</p><p>Opprett layouten her og legg ogs&aring; til din CSS i Stilsett seksjonen for &aring; kontrollere utseendet til dine forskjellige elementer.</p>';
$lang['admin']['helplisttemplate'] = '<p>Denne siden tillater deg &aring; redigere, slette, og opprette maler.</p><p>For &aring; opprette en ny mal, klikk p&aring; <u>Legg til Ny Mal</u> knappen.</p><p>Hvis du &oslash;nsker &aring; sette det slik at alle sidene skal bruke samme malene, klikk p&aring; <u>Sett alt Innhold</u> lenken.</p><p>Hvis du &oslash;nsker &aring; kopiere en mal, klikk p&aring; <u>Kopier</u> ikonet og du vil bli bedt om &aring; navngi den nye kopien av malen.</p>';
$lang['admin']['home'] = 'Forsiden';
$lang['admin']['homepage'] = 'Hjemmeside';
$lang['admin']['hostname'] = 'Vertsnavn';
$lang['admin']['idnotvalid'] = 'Denne ID er ikke gyldig';
$lang['admin']['imagemanagement'] = 'Bildebehandler';
$lang['admin']['informationmissing'] = 'Mangler informasjon';
$lang['admin']['install'] = 'Installer';
$lang['admin']['invalidcode'] = 'Ugyldig kode oppgitt.';
$lang['admin']['illegalcharacters'] = 'Ugyldige bokstaver i felt %s.';
$lang['admin']['invalidcode_brace_missing'] = 'Ulik antall av klammer';
$lang['admin']['invalidtemplate'] = 'Malen er ikke gyldig';
$lang['admin']['itemid'] = 'Artikkel ID';
$lang['admin']['itemname'] = 'Artikkelnavn';
$lang['admin']['language'] = 'Spr&aring;k';
$lang['admin']['lastname'] = 'Etternavn';
$lang['admin']['logout'] = 'Logg ut';
$lang['admin']['loginprompt'] = 'Skriv inn brukernavn og passord for administrasjonskonsollen.';
$lang['admin']['logintitle'] = 'CMS Made Simple Admin.innlogging';
$lang['admin']['menutext'] = 'Menytekst';
$lang['admin']['missingparams'] = 'Noen parametre var utelatt eller de er ikke gyldige';
$lang['admin']['modifygroupassignments'] = 'Endre Gruppetilh&oslash;righet';
$lang['admin']['moduleabout'] = 'Om %s modulen';
$lang['admin']['modulehelp'] = 'Hjelp for %s modulen';
$lang['admin']['msg_defaultcontent'] = 'Legg til kode her som skal opptre som standard innhold for alle nye sider';
$lang['admin']['msg_defaultmetadata'] = 'Legg til kode her som skal opptre i metadata seksjonen p&aring; alle nye sider';
$lang['admin']['wikihelp'] = 'Hjelp fra fellesskapet';
$lang['admin']['moduleinstalled'] = 'Modulen er allerede installert';
$lang['admin']['moduleinterface'] = '%s Grensesnitt';
$lang['admin']['modules'] = 'Moduler';
$lang['admin']['move'] = 'Flytt';
$lang['admin']['name'] = 'Navn';
$lang['admin']['needpermissionto'] = 'Du trenger &#039;%s&#039; tillatelse for &aring; utf&oslash;re den funksjonen.';
$lang['admin']['needupgrade'] = 'Trenger oppgradering';
$lang['admin']['newtemplatename'] = 'Nytt Malnavn';
$lang['admin']['next'] = 'Neste';
$lang['admin']['noaccessto'] = 'Ingen Tilgang til %s';
$lang['admin']['nocss'] = 'Ingen CSS/stilsett';
$lang['admin']['noentries'] = 'Ingen Innlegg';
$lang['admin']['nofieldgiven'] = 'Ingen %s er gitt!';
$lang['admin']['nofiles'] = 'Ingen Filer';
$lang['admin']['nopasswordmatch'] = 'Passordene stemmer ikke overens';
$lang['admin']['norealdirectory'] = 'Ingen eksisterende katalog er oppgitt.';
$lang['admin']['norealfile'] = 'Ingen eksisterende fil er oppgitt.';
$lang['admin']['notinstalled'] = 'Ikke Installert';
$lang['admin']['overwritemodule'] = 'Overskriv eksisterende moduler';
$lang['admin']['owner'] = 'Eier';
$lang['admin']['pagealias'] = 'Side Alias';
$lang['admin']['pagedefaults'] = 'Side Standarder';
$lang['admin']['pagedefaultsdescription'] = 'Sett standardverdier for nye sider';
$lang['admin']['parent'] = 'Foreldre';
$lang['admin']['password'] = 'Passord';
$lang['admin']['passwordagain'] = 'Passord (igjen)';
$lang['admin']['permission'] = 'Tillatelse';
$lang['admin']['permissions'] = 'Tillatelser';
$lang['admin']['permissionschanged'] = 'Rettigheter har blitt oppdatert.';
$lang['admin']['pluginabout'] = 'Om %s taggen';
$lang['admin']['pluginhelp'] = 'Hjelp for %s taggen';
$lang['admin']['pluginmanagement'] = 'Pluginbehandling';
$lang['admin']['prefsupdated'] = 'Innstillinger har blitt oppdatert.';
$lang['admin']['preview'] = 'Forh&aring;ndsvisning';
$lang['admin']['previewdescription'] = 'Forh&aring;ndsvis endringene';
$lang['admin']['previous'] = 'Forrige';
$lang['admin']['remove'] = 'Fjern';
$lang['admin']['removeconfirm'] = 'Denne handling vil permanent fjerne filene som utgj&oslash;r denne modulen fra denne installasjonen.\nEr du sikker p&aring; at du vil fortsette?';
$lang['admin']['removecssassociation'] = 'Fjern CSS kobling';
$lang['admin']['saveconfig'] = 'Lagre konfig.';
$lang['admin']['send'] = 'Send ';
$lang['admin']['setallcontent'] = 'Bruk p&aring; alle sider';
$lang['admin']['setallcontentconfirm'] = 'Vil du virkelig at alle sidene skal bruke denne malen?';
$lang['admin']['showinmenu'] = 'Vis i Meny';
$lang['admin']['showsite'] = 'Vis nettsted';
$lang['admin']['sitedownmessage'] = 'Nettsted nede melding';
$lang['admin']['siteprefs'] = 'Globale innstillinger';
$lang['admin']['status'] = 'Status ';
$lang['admin']['stylesheet'] = 'CSS/Stilsett';
$lang['admin']['submit'] = 'Utf&oslash;r';
$lang['admin']['submitdescription'] = 'Lagre endringene';
$lang['admin']['tags'] = 'Systemtagger';
$lang['admin']['template'] = 'Mal';
$lang['admin']['templateexists'] = 'Malnavnet eksisterer allerede';
$lang['admin']['templatemanagement'] = 'Mal Administrasjon';
$lang['admin']['title'] = 'Tittel';
$lang['admin']['tools'] = 'Verkt&oslash;y';
$lang['admin']['true'] = 'Sann';
$lang['admin']['setfalse'] = 'Sett usann';
$lang['admin']['type'] = 'Type ';
$lang['admin']['typenotvalid'] = 'Typen er ikke gyldig';
$lang['admin']['uninstall'] = 'Avinstaller';
$lang['admin']['uninstallconfirm'] = 'Vil du virkelig avinstallere denne modulen? Navn:';
$lang['admin']['up'] = 'Opp';
$lang['admin']['upgrade'] = 'Oppgrader';
$lang['admin']['upgradeconfirm'] = 'Vil du virkelig oppgradere denne?';
$lang['admin']['uploadfile'] = 'Last opp fil';
$lang['admin']['url'] = 'URL ';
$lang['admin']['useadvancedcss'] = 'Bruk avansert CSS/stilsett behandling';
$lang['admin']['user'] = 'Bruker';
$lang['admin']['userdefinedtags'] = 'Brukerdefinerte tagger (UDT)';
$lang['admin']['usermanagement'] = 'Brukeradministrasjon';
$lang['admin']['username'] = 'Brukernavn';
$lang['admin']['usernameincorrect'] = 'Brukernavn eller passord er feil';
$lang['admin']['userprefs'] = 'Brukerinnstillinger';
$lang['admin']['usersassignedtogroup'] = 'Brukere lagt til Gruppe %s';
$lang['admin']['usertagexists'] = 'En tagg med dette navnet eksisterer allerede. Vennligst velg annet navn.';
$lang['admin']['usewysiwyg'] = 'Bruk WYSIWYG tekstbehandler for innhold';
$lang['admin']['version'] = 'Versjon';
$lang['admin']['view'] = 'Vis';
$lang['admin']['welcomemsg'] = 'Velkommen %s';
$lang['admin']['directoryabove'] = 'katalog over gjeldende niv&aring;';
$lang['admin']['nodefault'] = 'Ingen standard valgt';
$lang['admin']['blobexists'] = 'Navn p&aring; Global innholdsblokk (GCB) er allerede i bruk';
$lang['admin']['blobmanagement'] = 'Administrasjon av Global innholdsblokk (GCB)';
$lang['admin']['errorinsertingblob'] = 'Det oppstod en feil under innlegg av Global innholdsblokk (GCB).';
$lang['admin']['addhtmlblob'] = 'Legg til Global innholdsblokk (GCB)';
$lang['admin']['edithtmlblob'] = 'Rediger Global innholdsblokk (GCB)';
$lang['admin']['edithtmlblobsuccess'] = 'Global Innholdsblokk (GCB) oppdatert';
$lang['admin']['tagtousegcb'] = 'Tagg for &aring; benytte denne Blokken';
$lang['admin']['gcb_wysiwyg'] = 'Sl&aring; p&aring; WYSIWYG for GCB';
$lang['admin']['gcb_wysiwyg_help'] = 'Sl&aring; p&aring; WYSIWYG editoren for redigering av Global Innholdsblokker (GCB)';
$lang['admin']['filemanager'] = 'Filbehandler';
$lang['admin']['imagemanager'] = 'Bildebehandler';
$lang['admin']['encoding'] = 'Encoding ';
$lang['admin']['clearcache'] = 'T&oslash;m mellomlager';
$lang['admin']['clear'] = 'T&oslash;m';
$lang['admin']['cachecleared'] = 'Mellomlager er t&oslash;mt';
$lang['admin']['apply'] = 'Bruk';
$lang['admin']['applydescription'] = 'Lagre endringer og fortsett redigering';
$lang['admin']['none'] = 'Ingen';
$lang['admin']['wysiwygtouse'] = 'Velg WYSIWYG editor';
$lang['admin']['syntaxhighlightertouse'] = 'Velg syntaksuthever';
$lang['admin']['cachable'] = 'Kan mellomlagres';
$lang['admin']['hasdependents'] = 'Har bindinger';
$lang['admin']['missingdependency'] = 'Mangler avhengighet';
$lang['admin']['minimumversion'] = 'Minimum versjon';
$lang['admin']['minimumversionrequired'] = 'Minimum CMSMS versjon krevd';
$lang['admin']['maximumversion'] = 'Maksimum versjon';
$lang['admin']['maximumversionsupported'] = 'Maksimum CMSMS versjon som st&oslash;ttes';
$lang['admin']['depsformodule'] = 'Bindinger for %s modulen';
$lang['admin']['installed'] = 'Installert';
$lang['admin']['author'] = 'Forfatter';
$lang['admin']['changehistory'] = 'Endringslogg';
$lang['admin']['moduleerrormessage'] = 'Feilmelding for %s modulen';
$lang['admin']['moduleupgradeerror'] = 'Det skjedde en feil under oppgradering av modulen.';
$lang['admin']['moduleinstallmessage'] = 'Installasjonsmelding for %s Modul';
$lang['admin']['moduleuninstallmessage'] = 'Avinstallasjonsmelding for %s Modul';
$lang['admin']['admintheme'] = 'Mal for administrasjonssider';
$lang['admin']['addstylesheet'] = 'Legg til stilsett';
$lang['admin']['editstylesheet'] = 'Rediger stilsett';
$lang['admin']['addcssassociation'] = 'Legg til stilsett forbindelse';
$lang['admin']['attachstylesheet'] = 'Bruk dette stilsettet';
$lang['admin']['attachtemplate'] = 'Tilknytt til denne malen';
$lang['admin']['main'] = 'Hovedmeny';
$lang['admin']['pages'] = 'Sider';
$lang['admin']['page'] = ' Side';
$lang['admin']['files'] = 'Filer';
$lang['admin']['layout'] = 'Utseende';
$lang['admin']['usersgroups'] = 'Brukere/Grupper';
$lang['admin']['extensions'] = 'Utvidelser';
$lang['admin']['preferences'] = 'Innstillinger';
$lang['admin']['admin'] = 'Nettstedsadmin.';
$lang['admin']['viewsite'] = 'Vis nettsted';
$lang['admin']['templatecss'] = 'Knytt maler til stilsettet';
$lang['admin']['plugins'] = 'Plugin';
$lang['admin']['movecontent'] = 'Flytt sider';
$lang['admin']['module'] = 'Modul';
$lang['admin']['usertags'] = 'Brukerdefinerte tagger';
$lang['admin']['htmlblobs'] = 'Globale innholdsblokker(GCB)';
$lang['admin']['adminhome'] = 'Administrasjon Hjem';
$lang['admin']['liststylesheets'] = 'Stilsett';
$lang['admin']['preferencesdescription'] = 'Her settes systeminnstillinger som ber&oslash;rer hele nettstedet.';
$lang['admin']['adminlogdescription'] = 'Viser logg over hvem som gjorde hva i administrasjonssystemet.';
$lang['admin']['mainmenu'] = 'Hovedmeny';
$lang['admin']['users'] = 'Brukere';
$lang['admin']['usersdescription'] = 'Dette er siden hvor du administrerer brukere.';
$lang['admin']['groups'] = 'Grupper';
$lang['admin']['groupsdescription'] = 'Dette er siden hvor du administrerer grupper.';
$lang['admin']['groupassignments'] = 'Gruppetilh&oslash;righet';
$lang['admin']['groupassignmentdescription'] = 'Her kan du legge brukere til grupper.';
$lang['admin']['groupperms'] = 'Grupperettigheter';
$lang['admin']['grouppermsdescription'] = 'Sett rettigheter og tilgangsniv&aring;er for grupper.';
$lang['admin']['pagesdescription'] = 'Funksjoner for &aring; legge til, redigere og slette innhold.';
$lang['admin']['htmlblobdescription'] = 'Globale innholdsblokker(GCB) er blingser med innhold som du kan plassere p&aring; dine sider eller i maler.';
$lang['admin']['templates'] = 'Maler';
$lang['admin']['templatesdescription'] = 'Dette er hvor vi legger til og endrer maler. Malene definerer hvordan sidene dine presenteres.';
$lang['admin']['stylesheets'] = 'Stilsett';
$lang['admin']['stylesheetsdescription'] = 'Administrasjon av stilsett er en avansert m&aring;te &aring; h&aring;ndtere stilsett (CSS) separat fra maler.';
$lang['admin']['filemanagerdescription'] = 'Last opp og administrer filer.';
$lang['admin']['imagemanagerdescription'] = 'Last opp, rediger og slett bilder.';
$lang['admin']['moduledescription'] = 'Moduler brukes til &aring; legge til ekstra funksjonalitet i CMS Made Simple';
$lang['admin']['tagdescription'] = 'Systemtagger er sm&aring; programfunksjoner som kan bli lagt til i ditt innhold og/eller mal.';
$lang['admin']['usertagdescription'] = 'Brukerdefinerte tagger er programfunksjoner som man har definert selv. I likhet med systemtagger s&aring; kan disse benyttes i b&aring;de innhold og/eller maler. ';
$lang['admin']['installdirwarning'] = '<em><strong>Advarsel:</strong></em> mappen med installasjonsfiler eksisterer fremdeles. V&aelig;r vennlig &aring; slett denne helt.';
$lang['admin']['subitems'] = 'Underartikler';
$lang['admin']['extensionsdescription'] = 'Moduler, tagger, og annen kode for ekstra funksjonalitet.';
$lang['admin']['usersgroupsdescription'] = 'Bruker- og grupperelaterte funksjoner.';
$lang['admin']['layoutdescription'] = 'Nettsted layout innstillinger.';
$lang['admin']['admindescription'] = 'Nettsted administrasjon funksjoner.';
$lang['admin']['contentdescription'] = 'Det er her vi legger til og endrer innhold.';
$lang['admin']['enablecustom404'] = 'Aktiver egendefinert 404 melding';
$lang['admin']['enablesitedown'] = 'Aktiver nettsted nede melding';
$lang['admin']['bookmarks'] = 'Bokmerker';
$lang['admin']['user_created'] = 'Personlige snarveier';
$lang['admin']['forums'] = 'Forum';
$lang['admin']['wiki'] = 'Wiki ';
$lang['admin']['irc'] = 'IRC ';
$lang['admin']['module_help'] = 'Hjelp for Modul';
$lang['admin']['managebookmarks'] = 'Ordne bokmerker';
$lang['admin']['editbookmark'] = 'Rediger bokmerke';
$lang['admin']['addbookmark'] = 'Legg til bokmerke';
$lang['admin']['recentpages'] = 'Nylig viste sider';
$lang['admin']['groupname'] = 'Gruppenavn';
$lang['admin']['selectgroup'] = 'Velg gruppe';
$lang['admin']['updateperm'] = 'Oppdater rettigheter';
$lang['admin']['admincallout'] = 'Administrative snarveier';
$lang['admin']['showbookmarks'] = 'Vis Admin bokmerker';
$lang['admin']['hide_help_links'] = 'Skjul hjelpelenker';
$lang['admin']['hide_help_links_help'] = 'Hak av i denne boksen for &aring; sl&aring; av wiki og modul-hjelp lenker i side header&#039;ene.';
$lang['admin']['showrecent'] = 'Vis nylig benyttede sider';
$lang['admin']['attachtotemplate'] = 'Knytt stilsett til mal';
$lang['admin']['attachstylesheets'] = 'Legg til stilsett';
$lang['admin']['indent'] = 'Bruk innrykk i siderlisten for &aring; fremheve hierarkiet';
$lang['admin']['adminindent'] = 'Innholdsoversikt';
$lang['admin']['contract'] = 'Skjul underliggende';
$lang['admin']['expand'] = 'Vis underliggende';
$lang['admin']['expandall'] = 'Vis alle underliggende';
$lang['admin']['contractall'] = 'Skjul alle underliggende';
$lang['admin']['menu_bookmarks'] = '[+] ';
$lang['admin']['globalconfig'] = 'Globale innstillinger';
$lang['admin']['adminpaging'] = 'Antall innholdselementer som skal vises samtidig i sideoversikten.';
$lang['admin']['nopaging'] = 'Vis alle elementer';
$lang['admin']['myprefs'] = 'Mine innstillinger';
$lang['admin']['myprefsdescription'] = 'Det er her du kan tilpasse nettsted administrasjonsomr&aring;det s&aring; det virker slik du vil.';
$lang['admin']['myaccount'] = 'Min konto';
$lang['admin']['myaccountdescription'] = 'Det er her du kan oppdatere informasjonen i din personlige konto.';
$lang['admin']['adminprefs'] = 'Bruker innstillinger';
$lang['admin']['adminprefsdescription'] = 'Konfigurer utseendet, spr&aring;k og andre innstillinger for brukergrensesnittet.';
$lang['admin']['managebookmarksdescription'] = 'Her kan du behandle administrative snarveier.';
$lang['admin']['options'] = 'Innstillinger';
$lang['admin']['langparam'] = 'Parameteren brukes til &aring; velge hvilket spr&aring;k som skal vises p&aring; frontend(for sluttbrukeren). Ikke alle moduler st&oslash;tter, eller trenger dette.';
$lang['admin']['parameters'] = 'Parametre';
$lang['admin']['mediatype'] = 'Mediatype';
$lang['admin']['mediatype_'] = 'Ingen valgt : vill innvirke overalt';
$lang['admin']['mediatype_all'] = 'alle : Passende for alle enheter.';
$lang['admin']['mediatype_aural'] = 'aural : Ment for tale synthesizere.';
$lang['admin']['mediatype_braille'] = 'braille : Ment for blindeskrift/braille taktile enheter.';
$lang['admin']['mediatype_embossed'] = 'embossed : Ment for blindeskrift/braille skrivere.';
$lang['admin']['mediatype_handheld'] = 'handheld : Ment for h&aring;ndholdte enheter.';
$lang['admin']['mediatype_print'] = 'print : Ment for sidedelt, ugjennomsiktig materiale og for dokumenter vist p&aring; skjerm i utskrift forh&aring;ndsvisnings modus.';
$lang['admin']['mediatype_projection'] = 'projection : Ment for projiserte presentasjoner, for eksempel projektorer eller utskrift til lysark/transparenter.';
$lang['admin']['mediatype_screen'] = 'screen : Ment prim&aelig;rt for data fargeskjermer.';
$lang['admin']['mediatype_tty'] = 'tty : Ment for media som bruker et fiksert-pitch bokstavnett, for eksempel teletype og teminaler.';
$lang['admin']['mediatype_tv'] = 'tv : Ment for tv-lignende enheter.';
$lang['admin']['assignmentchanged'] = 'Gruppetilh&oslash;righet har blitt oppdatert.';
$lang['admin']['stylesheetexists'] = 'Stilsettet eksisterer fra f&oslash;r';
$lang['admin']['errorcopyingstylesheet'] = 'Feil ved kopiering av stilsettet';
$lang['admin']['copystylesheet'] = 'Kopier stilsett';
$lang['admin']['newstylesheetname'] = 'Nytt navn p&aring; stilsett';
$lang['admin']['target'] = 'M&aring;l';
$lang['admin']['xml'] = 'XML ';
$lang['admin']['xmlmodulerepository'] = 'URL til soap server for ModuleRepository';
$lang['admin']['metadata'] = 'Metadata ';
$lang['admin']['globalmetadata'] = 'Globale Metadata';
$lang['admin']['titleattribute'] = 'Beskrivelse (Tittelatributt)';
$lang['admin']['tabindex'] = 'Tabindex';
$lang['admin']['accesskey'] = 'Tilgangsn&oslash;kkel';
$lang['admin']['sitedownwarning'] = '<strong>Advarsel:</strong> Din nettside viser en &quot;Siden er nede for vedlikehold&quot; melding.  For &aring; rette opp dette fjern filen %s .';
$lang['admin']['deletecontent'] = 'Slett innhold';
$lang['admin']['deletepages'] = 'Slette disse sidene?';
$lang['admin']['selectall'] = 'Velg alle';
$lang['admin']['selecteditems'] = 'Valgte artikler ';
$lang['admin']['inactive'] = 'Inaktiv';
$lang['admin']['deletetemplates'] = 'Slett maler';
$lang['admin']['templatestodelete'] = 'Disse malene vil bli slettet';
$lang['admin']['wontdeletetemplateinuse'] = 'Disse malene er i bruk og vil ikke bli slettet';
$lang['admin']['deletetemplate'] = 'Slett stilsett';
$lang['admin']['stylesheetstodelete'] = 'Disse stilsettene vil bli slettet';
$lang['admin']['sitename'] = 'Navn p&aring; nettstedet';
$lang['admin']['siteadmin'] = 'Nettstedadmin.';
$lang['admin']['images'] = 'Bildebehandler';
$lang['admin']['blobs'] = 'Globale innholdsblokker';
$lang['admin']['groupmembers'] = 'Grupperettigheter';
$lang['admin']['troubleshooting'] = '(Probleml&oslash;sning)';
$lang['admin']['event_desc_loginpost'] = 'Sendt etter en bruker logger seg inn p&aring; admin panelet';
$lang['admin']['event_desc_logoutpost'] = 'Sendt etter en bruker logger seg ut av admin panelet';
$lang['admin']['event_desc_adduserpre'] = 'Sendt f&oslash;r en ny bruker opprettes';
$lang['admin']['event_desc_adduserpost'] = 'Sendt etter en ny bruker ble opprettet';
$lang['admin']['event_desc_edituserpre'] = 'Sendt f&oslash;r redigering av en bruker lagres';
$lang['admin']['event_desc_edituserpost'] = 'Sendt etter redigering av en bruker er lagret';
$lang['admin']['event_desc_deleteuserpre'] = 'Sendt f&oslash;r en bruker slettes fra systemet';
$lang['admin']['event_desc_deleteuserpost'] = 'Sendt etter en bruker er slettet fra systemet';
$lang['admin']['event_desc_addgrouppre'] = 'Sendt f&oslash;r en ny gruppe opprettes';
$lang['admin']['event_desc_addgrouppost'] = 'Sendt etter en ny gruppe ble opprettet';
$lang['admin']['event_desc_changegroupassignpre'] = 'Sendt f&oslash;r gruppetildelinger lagres';
$lang['admin']['event_desc_changegroupassignpost'] = 'Sendt etter gruppetildelinger er lagret';
$lang['admin']['event_desc_editgrouppre'] = 'Sendt f&oslash;r redigering av en gruppe lagres';
$lang['admin']['event_desc_editgrouppost'] = 'Sendt etter redigering av en gruppe ble lagret';
$lang['admin']['event_desc_deletegrouppre'] = 'Sendt f&oslash;r en gruppe slettes fra systemet';
$lang['admin']['event_desc_deletegrouppost'] = 'Sendt etter en gruppe er slettet fra systemet';
$lang['admin']['event_desc_addstylesheetpre'] = 'Sendt f&oslash;r et nytt stilsett lagres';
$lang['admin']['event_desc_addstylesheetpost'] = 'Sendt etter et nytt stilsett ble lagret';
$lang['admin']['event_desc_editstylesheetpre'] = 'Sendt f&oslash;r redigering av et stilsett lagres';
$lang['admin']['event_desc_editstylesheetpost'] = 'Sendt etter redigering av et stilsett ble lagret';
$lang['admin']['event_desc_deletestylesheetpre'] = 'Sendt f&oslash;r et stilsett slettes fra systemet';
$lang['admin']['event_desc_deletestylesheetpost'] = 'Sendt etter et stilsett ble slettet fra systemet';
$lang['admin']['event_desc_addtemplatepre'] = 'Sendt f&oslash;r en ny mal opprettes';
$lang['admin']['event_desc_addtemplatepost'] = 'Sendt etter en ny mal ble opprettet';
$lang['admin']['event_desc_edittemplatepre'] = 'Sendt f&oslash;r redigering av en mal lagres';
$lang['admin']['event_desc_edittemplatepost'] = 'Sendt etter redigering av en mal ble lagret';
$lang['admin']['event_desc_deletetemplatepre'] = 'Sendt f&oslash;r en mal slettes fra systemet';
$lang['admin']['event_desc_deletetemplatepost'] = 'Sendt etter en mal er slettet fra systemet';
$lang['admin']['event_desc_templateprecompile'] = 'Sendt f&oslash;r en mal blir sendt til smarty for prosessering';
$lang['admin']['event_desc_templatepostcompile'] = 'Sendt etter en mal har blitt prosessert av smarty';
$lang['admin']['event_desc_addglobalcontentpre'] = 'Sendt f&oslash;r en ny global innholdsblokk opprettes';
$lang['admin']['event_desc_addglobalcontentpost'] = 'Sendt etter en ny global innholdsblokk ble opprettet';
$lang['admin']['event_desc_editglobalcontentpre'] = 'Sendt f&oslash;r redigering av en global innholdsblokk lagres';
$lang['admin']['event_desc_editglobalcontentpost'] = 'Sendt etter redigering av en global innholdsblokk ble lagret';
$lang['admin']['event_desc_deleteglobalcontentpre'] = 'Sendt f&oslash;r en global innholdsblokk slettes fra systemet';
$lang['admin']['event_desc_deleteglobalcontentpost'] = 'Sendt etter en global innholdsblokk ble slettet fra systemet';
$lang['admin']['event_desc_globalcontentprecompile'] = 'Sendt f&oslash;r en global innholdsblokk sendes til smarty for prosessering';
$lang['admin']['event_desc_globalcontentpostcompile'] = 'Sendt etter en global innholdsblokk har blitt prosessert av smarty';
$lang['admin']['event_desc_contenteditpre'] = 'Sendt f&oslash;r redigering av innhold lagres';
$lang['admin']['event_desc_contenteditpost'] = 'Sendt etter redigering av innhold ble lagret';
$lang['admin']['event_desc_contentdeletepre'] = 'Sendt f&oslash;r innhold slettes fra systemet';
$lang['admin']['event_desc_contentdeletepost'] = 'Sendt etter innhold er slettet fra systemet';
$lang['admin']['event_desc_contentstylesheet'] = 'Sendt f&oslash;r stilsettet sendes til nettleseren';
$lang['admin']['event_desc_contentprecompile'] = 'Sendt etter stilsettet er sendt til smarty for prosessering';
$lang['admin']['event_desc_contentpostcompile'] = 'Sendt etter innhold har blitt prosessert av smarty';
$lang['admin']['event_desc_contentpostrender'] = 'Sendt f&oslash;r innhold sendes til nettleseren';
$lang['admin']['event_desc_smartyprecompile'] = 'Sendt f&oslash;r noe sendes smarty for prosessering';
$lang['admin']['event_desc_smartypostcompile'] = 'Sendt etter noe har blitt prosessert av smarty';
$lang['admin']['event_help_loginpost'] = '<p>Sendt etter en bruker logger inn i administrasjonspanelet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;user&#039; - Referanse til det ber&oslash;rte bruker objektet.</li>
</ul>';
$lang['admin']['event_help_logoutpost'] = '<p>Sendt etter en bruker logger seg ut fra administrasjonpanelet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;user&#039; - Referanse til det ber&oslash;rte bruker objektet.</li>
</ul>';
$lang['admin']['event_help_adduserpre'] = '<p>Sendt f&oslash;r en ny bruker blir opprettet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;user&#039; - Referanse til det ber&oslash;rte bruker objektet.</li>
</ul>';
$lang['admin']['event_help_adduserpost'] = '<p>Sendt etter en ny bruker er opprettet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;user&#039; - Referanse til det ber&oslash;rte bruker objektet.</li>
</ul>';
$lang['admin']['event_help_edituserpre'] = '<p>Sendt f&oslash;r endring av en bruker blir lagret.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;user&#039; - Referanse til det ber&oslash;rte bruker objektet.</li>
</ul>';
$lang['admin']['event_help_edituserpost'] = '<p>Sendt etter endring av en bruker blir lagret.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;user&#039; - Referanse til det ber&oslash;rte bruker objektet.</li>
</ul>';
$lang['admin']['event_help_deleteuserpre'] = '<p>Sendt f&oslash;r en bruker blir slettet fra systemet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;user&#039; - Referanse til det ber&oslash;rte bruker objektet.</li>
</ul>';
$lang['admin']['event_help_deleteuserpost'] = '<p>Sendt etter en bruker er slettet fra systemet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;user&#039; - Referanse til det ber&oslash;rte bruker objekett.</li>
</ul>';
$lang['admin']['event_help_addgrouppre'] = '<p>Sendt f&oslash;r en ny gruppe blir opprettet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;group&#039; - Referanse til det ber&oslash;rte gruppe objektet.</li>
</ul>';
$lang['admin']['event_help_addgrouppost'] = '<p>Sendt etter en ny gruppe er opprettet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;group&#039; - Referanse til det ber&oslash;rte gruppe objektet.</li>
</ul>';
$lang['admin']['event_help_changegroupassignpre'] = '<p>Sendt etter gruppetildeling lagres.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;group&#039; - Referanse til gruppe objektet.</li>
<li>&#039;users&#039; - Utvalg av referanser til bruker objekter tilh&oslash;rende til gruppen.</li>
';
$lang['admin']['event_help_changegroupassignpost'] = '<p>Sendt etter gruppetildeling er lagret.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;group&#039; - Referanse til det affiserte gruppe objektet.</li>
<li>&#039;users&#039; - Utvalg av referanser til bruker objekter som n&aring; tilh&oslash;rer den ber&oslash;rte gruppen.</li>
';
$lang['admin']['event_help_editgrouppre'] = '<p>Sendt f&oslash;r endring av en gruppe blir lagret.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;group&#039; - Referanse til det ber&oslash;rte gruppe objektet.</li>
</ul>';
$lang['admin']['event_help_editgrouppost'] = '<p>Sendt etter endring av en gruppe er lagret.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;group&#039; - Referanse til det ber&oslash;rte gruppe objektet.</li>
</ul>';
$lang['admin']['event_help_deletegrouppre'] = '<p>Sendt f&oslash;r en gruppe blir slettet fra systemet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;group&#039; - Referanse til det ber&oslash;rte gruppe objektet.</li>
</ul>';
$lang['admin']['event_help_deletegrouppost'] = '<p>Sendt etter en gruppe ble slettet fra systemet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;group&#039; - Referanse til det ber&oslash;rte gruppe objektet.</li>
</ul>';
$lang['admin']['event_help_addstylesheetpre'] = '<p>Sendt f&oslash;r et nytt stilsett blir opprettet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;stylesheet&#039; - Referanse til det ber&oslash;rte stilsett objektet.</li>
</ul>';
$lang['admin']['event_help_addstylesheetpost'] = '<p>Sendt etter et nytt stilsett er opprettet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;stylesheet&#039; - Referanse til det ber&oslash;rte stilsett objektet.</li>
</ul>';
$lang['admin']['event_help_editstylesheetpre'] = '<p>Sendt f&oslash;r endring av et stilsett blir lagret.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;stylesheet&#039; - Referanse til det ber&oslash;rte stilsett objektet.</li>
</ul>';
$lang['admin']['event_help_editstylesheetpost'] = '<p>Sendt etter endring av et stilsett ble lagret.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;stylesheet&#039; - Referanse til det ber&oslash;rte stilsett objektet.</li>
</ul>';
$lang['admin']['event_help_deletestylesheetpre'] = '<p>Sendt f&oslash;r et stilsett blir slettet fra systemet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;stylesheet&#039; - Referanse til det ber&oslash;rte stilsett objektet.</li>
</ul>';
$lang['admin']['event_help_deletestylesheetpost'] = '<p>Sendt etter et stilsett er slettet fra systemet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;stylesheet&#039; - Referanse til det ber&oslash;rte stilsett objektet.</li>
</ul>';
$lang['admin']['event_help_addtemplatepre'] = '<p>Sendt f&oslash;r en ny mal blir opprettet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;template&#039; - Referanse til det ber&oslash;rte mal objektet.</li>
</ul>';
$lang['admin']['event_help_addtemplatepost'] = '<p>Sendt etter en ny mal er opprettet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;template&#039; - Referanse til det ber&oslash;rte mal objektet.</li>
</ul>';
$lang['admin']['event_help_edittemplatepre'] = '<p>Sendt f&oslash;r endring av en mal blir lagret.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;template&#039; - Referanse til det ber&oslash;rte mal objektet.</li>
</ul>';
$lang['admin']['event_help_edittemplatepost'] = '<p>Sendt etter endring av en mal ble lagret.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;template&#039; - Referanse til det ber&oslash;rte mal objektet.</li>
</ul>';
$lang['admin']['event_help_deletetemplatepre'] = '<p>Sendt f&oslash;r en mal blir slettet fra systemet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;template&#039; - Referanse til det ber&oslash;rte mal objektet.</li>
</ul>';
$lang['admin']['event_help_deletetemplatepost'] = '<p>Sendt etter en mal ble slettet fra systemet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;template&#039; - Referanse til det ber&oslash;rte mal objektet.</li>
</ul>';
$lang['admin']['event_help_templateprecompile'] = '<p>Sendt f&oslash;r en mal blir sendt til smarty for prosessering.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;template&#039; - Referanse til den ber&oslash;rte mal teksten.</li>
</ul>';
$lang['admin']['event_help_templatepostcompile'] = '<p>Sendt etter en mal har blitt prosessert av smarty.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;template&#039; - Referanse til den ber&oslash;rrte mal teksten.</li>
</ul>';
$lang['admin']['event_help_addglobalcontentpre'] = '<p>Sendt f&oslash;r en ny global innholdsblokk blir opprettet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;global_content&#039; - Referanse til det ber&oslash;rte globale  innholdsblokk objektet.</li>
</ul>';
$lang['admin']['event_help_addglobalcontentpost'] = '<p>Sendt etter en ny global innholdsblokk har blitt opprettet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;global_content&#039; - Referanse til det ber&oslash;rte globale innholdsblokk objektet.</li>
</ul>';
$lang['admin']['event_help_editglobalcontentpre'] = '<p>Sendt f&oslash;r endring av en global innholdsblokk blir lagret.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;global_content&#039; - Referanse til det ber&oslash;rte globale innholdsblokk objektet.</li>
</ul>';
$lang['admin']['event_help_editglobalcontentpost'] = '<p>Sendt etter endring av en global innholdsblokk ble lagret.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;global_content&#039; - Referanse til det ber&oslash;rte globale innholdsblokk objektet.</li>
</ul>';
$lang['admin']['event_help_deleteglobalcontentpre'] = '<p>Sendt f&oslash;r en global innholdsblokk blir slettet fra systemet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;global_content&#039; - Referanse til detber&oslash;rte globale innholdsblokk objektet.</li>
</ul>';
$lang['admin']['event_help_deleteglobalcontentpost'] = '<p>Sendt etter en global innholdsblokk ble slettet fra systemet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;global_content&#039; - Referanse til det ber&oslash;rte globale innholdsblokk objektet.</li>
</ul>';
$lang['admin']['event_help_globalcontentprecompile'] = '<p>Sendt f&oslash;r en global innholdsblokk blir sendt til smarty for prosessering.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;global_content&#039; - Referanse til den ber&oslash;rte globale innholdsblokk teksten.</li>
</ul>';
$lang['admin']['event_help_globalcontentpostcompile'] = '<p>Sendt etter en global innholdsblokk har blitt prosessert av smarty.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;global_content&#039; - Referanse til den ber&oslash;rte globale innholdsblokk teksten.</li>
</ul>';
$lang['admin']['event_help_contenteditpre'] = '<p>Sendt f&oslash;r endring av innhold blir lagret.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;global_content&#039; - Referanse til det ber&oslash;rte innholds objektet.</li>
</ul>';
$lang['admin']['event_help_contenteditpost'] = '<p>Sendt etter endring av innhold ble lagret.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;content&#039; - Referanse til det ber&oslash;rte innholds objektet.</li>
</ul>';
$lang['admin']['event_help_contentdeletepre'] = '<p>Sendt f&oslash;r innhold blir slettet fra systemet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;content&#039; - Referanse til det ber&oslash;rte innholds objektet.</li>
</ul>';
$lang['admin']['event_help_contentdeletepost'] = '<p>Sendt etter innhold ble slettet fra systemet.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;content&#039; - Referanse til det ber&oslash;rte innholds objektet.</li>
</ul>';
$lang['admin']['event_help_contentstylesheet'] = '<p>Sendt f&oslash;r et stilsett blir sendt til nettlseseren.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;content&#039; - Referanse til det ber&oslash;rte stilsett objektet.</li>
</ul>';
$lang['admin']['event_help_contentprecompile'] = '<p>Sendt f&oslash;r innhold sendes smarty for prosessering.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;content&#039; - Referanse til den ber&oslash;rte innholdsteksten.</li>
</ul>';
$lang['admin']['event_help_contentpostcompile'] = '<p>Sendt etter innhold har blitt prosessert av smarty.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;content&#039; - Referanse til den ber&oslash;rte innholdsteksten.</li>
</ul>';
$lang['admin']['event_help_contentpostrender'] = '<p>Sendt f&oslash;r den kombinerte html blir sendt nettleseren.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;content&#039; - Referanse til den ber&oslash;rte html teksten.</li>
</ul>';
$lang['admin']['event_help_smartyprecompile'] = '<p>Sendt f&oslash;r innhold ment for smarty blir sendt til prosessering.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;content&#039; - Referanse til den ber&oslash;rte teksten.</li>
</ul>';
$lang['admin']['event_help_smartypostcompile'] = '<p>Sendt etter at innhold ment for smarty har blitt prosessert.</p>
<h4>Parametere</h4>
<ul>
<li>&#039;content&#039; - Referanse til den ber&oslash;rte teksten.</li>
</ul>';
$lang['admin']['filterbymodule'] = 'Filtrer etter Modul';
$lang['admin']['showall'] = 'Vis alle';
$lang['admin']['core'] = 'Kjerne';
$lang['admin']['defaultpagecontent'] = 'Plassholder sideinnhold (blah blah tekst)';
$lang['admin']['file_url'] = 'Lenke til fil (i stedet for URL)';
$lang['admin']['no_file_url'] = 'Ingen (Benytt URL&#039;en ovenfor)';
$lang['admin']['defaultparentpage'] = 'Standard foreldre side';
$lang['admin']['error_udt_name_whitespace'] = 'Feil: Brukerdefinerte Tagger(UDT) kan ikke ha mellomrom i navnet.';
$lang['admin']['warning_safe_mode'] = '<strong><em>ADVARSEL:</em></strong> PHP Safe mode er p&aring;sl&aring;tt.  Dette medf&oslash;rer problemer med filer som lastes opp via nettleser grensesnittet, inkludert bilder, tema og modul XML-pakker.  Du r&aring;des til &aring; kontakte din nettstedsadministrator for &aring; h&oslash;re om safe mode kan sl&aring;s av.';
$lang['admin']['test'] = 'Test ';
$lang['admin']['results'] = 'Resultater';
$lang['admin']['untested'] = 'Ikke testet';
$lang['admin']['unknown'] = 'Ukjent';
$lang['admin']['download'] = 'Last ned';
$lang['admin']['frontendwysiwygtouse'] = 'Frontend WYSIWYG';
$lang['admin']['utma'] = '156861353.179052623084110100.1210423577.1211728039.1211737219.34';
$lang['admin']['utmz'] = '156861353.1211581132.26.3.utmccn=(referral)|utmcsr=cmstest2.helminikon.no|utmcct=/admin/listcontent.php|utmcmd=referral';
$lang['admin']['utmc'] = '156861353';
$lang['admin']['utmb'] = '156861353';
?>