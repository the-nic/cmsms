{if isset($list_designs)}
<table class="pagetable">
  <thead>
    <tr>
      <th width="5%">{$mod->Lang('prompt_id')}</th>
      <th>{$mod->Lang('prompt_name')}</th>
      <th class="pageicon"><span title="{$mod->Lang('title_designs_default')}">{lang('default')}</span></th>
      <th class="pageicon"></th>
      <th class="pageicon"></th>
      <th class="pageicon"></th>
    </tr>
  </thead>
  <tbody>
  {foreach from=$list_designs item='design'}
    {cycle values="row1,row2" assign='rowclass'}
    {cms_action_url action=admin_edit_design design=$design->get_id() assign='edit_url'}
    {cms_action_url action=admin_delete_design design=$design->get_id() assign='delete_url'}
    {cms_action_url action=admin_export_design design=$design->get_id() assign='export_url'}
    <tr class="{$rowclass}" onmouseover="this.className='{$rowclass}hover';" onmouseout="this.className='{$rowclass}';">
      <td><a href="{$edit_url}" title="{$mod->Lang('edit_design')}">{$design->get_id()}</a></td>
      <td><a href="{$edit_url}" title="{$mod->Lang('edit_design')}">{$design->get_name()}</a></td>
      <td>{if $design->get_default()}{admin_icon icon='true.gif' title=$mod->Lang('prompt_dflt')}{else}{admin_icon icon='false.gif' title=$mod->Lang('prompt_notdflt')}{/if}</td>
      <td><a href="{$edit_url}" title="{$mod->Lang('edit_design')}">{admin_icon icon='edit.gif'}</a></td>
      <td><a href="{$export_url}" title="{$mod->Lang('export_design')}">{admin_icon icon='export.gif'}</a></td>
      <td><a href="{$delete_url}" title="{$mod->Lang('delete_design')}">{admin_icon icon='delete.gif'}</a></td>
    </tr>
  {/foreach}
  </tbody>
</table>
{/if}

<div class="pagecontainer">
{cms_action_url action='admin_edit_design' assign='url'}
<a href="{$url}" title="{$mod->Lang('create_design')}">{admin_icon icon='newobject.gif'}</a>&nbsp;
<a href="{$url}" title="{$mod->Lang('create_design')}">{$mod->Lang('create_design')}</a>
&nbsp;&nbsp;
{cms_action_url action='admin_import_design' assign='url'}
<a href="{$url}" title="{$mod->Lang('import_design')}">{admin_icon icon='import.gif'}</a>&nbsp;
<a href="{$url}" title="{$mod->Lang('import_design')}">{$mod->Lang('import_design')}</a>
</div>