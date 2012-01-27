<div class="pagecontainer">
{if empty($smarty.get.cleanreport)}
	<p class="pageshowrows"><a href="{$systeminfo_cleanreport}">{si_lang a=copy_paste_forum}</a></p>
{/if}
{$showheader}

<div class="pageoverflow">
	<div class="pageoverflow">
		<p>{si_lang a=help_systeminformation}</p>
	</div>
<hr/>
<table class="pagetable" cellspacing="0" summary="{si_lang a=cms_install_information}">
    <thead> 
       <tr>
         <th colspan="3">{si_lang a=cms_install_information}</th>
       </tr>
    </thead> 
	<tbody>
		<tr class="{cycle values='row1,row2'}">
  			<td width="45%">{si_lang a=cms_version}</td>
			<td width="5%"></td>
  			<td width="50%">{$cms_version}</td>
  		</tr>
	</tbody>
</table>
<br /><br />
<table class="pagetable" cellspacing="0" summary="{si_lang a=installed_modules}">
    <thead> 
       <tr>
         <th colspan="3">{si_lang a=installed_modules}</th>
       </tr>
    </thead> 
	<tbody>
  		{foreach from=$installed_modules item='module'}
  		<tr class="{cycle values='row1,row2'}">
    		<td width="45%">{$module.module_name}</td>
			<td width="5%"></td>
    		<td width="50%">{$module.version}</td>
  		</tr>
  		{/foreach}
	</tbody>
</table>
<br /><br />
<table class="pagetable" cellspacing="0" summary="{si_lang a=config_information}">
    <thead> 
       <tr>
         <th colspan="3">{si_lang a=config_information}</th>
       </tr>
    </thead> 
	<tbody>
  	{foreach from=$config_info key='view' item='tmp'}
  		{foreach from=$tmp key='key' item='test'}
		<tr class="{cycle values='row1,row2'}">
    		<td width="45%">{$test->title}</td>
			<td width="5%">{if isset($test->res)}<img class="systemicon" src="themes/{$themename}/images/icons/extra/{$test->res}.gif" title="{$test->res_text}" alt="{$test->res_text}" />{/if}</td>
			<td width="50%">
	{if isset($test->value)}{$test->value|default:"&nbsp;"}{/if}
	{if isset($test->secondvalue)}({$test->secondvalue|default:"&nbsp;"}){/if}
	{if isset($test->error_fragment)}<a class="external" rel="external" href="{$cms_install_help_url}#{$test->error_fragment}"><img src="themes/{$themename}/images/icons/system/info-external.gif" title="?" alt="?" /></a>{/if}
	{if isset($test->message)}<br />{$test->message}{/if}
			</td>
		</tr>
  		{/foreach}
	{/foreach}
	</tbody>
</table>
<br /><br />
<table class="pagetable" cellspacing="0" summary="{si_lang a=php_information}">
    <thead> 
       <tr>
         <th colspan="3">{si_lang a=php_information}</th>
       </tr>
    </thead> 
	<tbody>
	{foreach from=$php_information key='view' item='tmp'}
  		{foreach from=$tmp key='key' item='test'}
		<tr class="{cycle values='row1,row2'}">
    		<td width="45%">{si_lang a=$key} ({$key})</td>
			<td width="5%">{if isset($test->res)}<img class="systemicon" src="themes/{$themename}/images/icons/extra/{$test->res}.gif" title="{$test->res_text}" alt="{$test->res_text}" />{/if}</td>
			<td width="50%">
	{if isset($test->value) && $test->display_value != 0}&nbsp;{$test->value}{/if}
	{if isset($test->secondvalue)}({$test->secondvalue}){/if}
	{if isset($test->error_fragment)}<a class="external" rel="external" href="{$cms_install_help_url}#{$test->error_fragment}"><img src="themes/{$themename}/images/icons/system/info-external.gif" title="?" alt="?" /></a>{/if}
	{if isset($test->message)}{$test->message}{/if}
	{if isset($test->opt)}
		{foreach from=$test->opt key='key' item='opt'}
			<br />{$key}: {$opt.message} <img class="systemicon" src="themes/{$themename}/images/icons/extra/{$opt.res}.gif" alt="{$opt.res_text}" title="{$opt.res_text}" />
		{/foreach}
	{/if}
			</td>
		</tr>
  		{/foreach}
	{/foreach}
	</tbody>
</table>
<br /><br />
<table class="pagetable" cellspacing="0" summary="{si_lang a=server_information}">
    <thead> 
       <tr>
         <th colspan="3">{si_lang a=server_information}</th>
       </tr>
    </thead> 
	<tbody>
	{foreach from=$server_info key='view' item='tmp'}
  		{foreach from=$tmp key='key' item='test'}
		<tr class="{cycle values='row1,row2'}">
			<td width="45%">{si_lang a=$key} ({$key})</td>
			<td width="5%">{if isset($test->res)}<img class="systemicon" src="themes/{$themename}/images/icons/extra/{$test->res|default:"space"}.gif" title="{$test->res_text|default:""}" alt="{$test->res_text|default:""}" />{/if}</td>
			<td width="50%">
			{if isset($test->value)}{$test->value|lower}{/if}
			{if isset($test->secondvalue)}({$test->secondvalue}){/if}
			{if isset($test->message)}<br />{$test->message}{/if}
			</td>
		</tr>
  		{/foreach}
	{/foreach}
	</tbody>
</table>
<br /><br />
<table class="pagetable" cellspacing="0" summary="{si_lang a=permission_information}">
    <thead> 
       <tr>
         <th colspan="3">{si_lang a=permission_information}</th>
       </tr>
    </thead> 
	<tbody>
	{foreach from=$permission_info key='view' item='tmp'}
  		{foreach from=$tmp key='key' item='test'}
	<tr class="{cycle values='row1,row2'}">
		<td width="45%">{$key}</td>
		<td width="5%">{if isset($test->res)}<img class="systemicon" src="themes/{$themename}/images/icons/extra/{$test->res}.gif" title="{$test->res_text}" alt="{$test->res_text}" />{/if}</td>
		<td width="50%">
		{if isset($test->value)}{$test->value}{/if}
		{if isset($test->secondvalue)}({$test->secondvalue}){/if}
		{if isset($test->message)}<br />{$test->message}{/if}
		</td>
	</tr>
  		{/foreach}
	{/foreach}
	</tbody>
</table>
<br />
<p class="pageback"><a class="pageback" href="{$backurl}">&#171; {si_lang a=back}</a></p>

	</div>
</div>