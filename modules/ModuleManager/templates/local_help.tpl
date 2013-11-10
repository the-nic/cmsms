{if isset($force_english)}
<div class="pagewarning">{$mod->Lang('help_forceenglish')}</div>
{/if}
<div class="pageoptions" style="text-align: right; float: right; margin-right: 3%;">
{if isset($englang_url)}
  <a href="{$englang_url}">{$englang_text}</a>&nbsp;
{elseif isset($mylang_url)}
  <a href="{$mylang_url}">{$mylang_text}</a>&nbsp;
{/if}
  <a href="{$back_url}">{admin_icon icon='back.gif'}&nbsp;{$mod->Lang('back')}</a>
</div>

{if isset($friendly_name) && $friendly_name != ''}
<h1>{$friendly_name} <em>({$module_name})</em></h1>
{else}
<h1>{$module_name}</h1>
{/if}

{$help_page}