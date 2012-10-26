{if isset($templates)}
{form_start}{strip}
  {assign var='ntemplates' value=count($templates)}
  <div class="pageoptions" style="text-align: right;">
    <label for="filter_tpl">{$mod->Lang('prompt_filter')}:</label>
    &nbsp;<select id="filter_tpl" name="{$actionid}filter_tpl">{html_options options=$filter_options selected=$filter.tpl}</select>&nbsp;
    <label for="filter_limit">{$mod->Lang('prompt_limit')}:</label>
    &nbsp;<select id="filter_limit" name="{$actionid}filter_limit">
      <option value="2"{if $filter.limit == 2} selected="selected"{/if}>2</option>
      <option value="5"{if $filter.limit == 5} selected="selected"{/if}>5</option>
      <option value="10"{if $filter.limit == 10} selected="selected"{/if}>10</option>
      <option value="25"{if $filter.limit == 25} selected="selected"{/if}>25</option>
      <option value="50"{if $filter.limit == 50} selected="selected"{/if}>50</option>
      <option value="100"{if $filter.limit == 100} selected="selected"{/if}>100</option>
    </select>
    <input type="submit" name="{$actionid}dofilter" value="{$mod->Lang('submit')}"/>
  </div>
  {if isset($tpl_nav)}
  <div class="pageoptions" style="text-align: right;">
  {if $tpl_nav.curpage > 1}
    {cms_action_url action='defaultadmin' tpl_page=1 assign='fp_url'}
    <a href="{$fp_url}" title="{$mod->Lang('prompt_firstpage')}">&lt;&lt;</a>&nbsp;
    {cms_action_url action='defaultadmin' tpl_page=$tpl_nav.curpage-1 assign='pp_url'}
    <a href="{$pp_url}" title="{$mod->Lang('prompt_prevpage')}">&lt;</a>&nbsp;
    &nbsp;
  {/if}
  {$mod->Lang('prompt_page')}&nbsp;{$tpl_nav.curpage}&nbsp;{$mod->Lang('prompt_of')}&nbsp;{$tpl_nav.numpages}
  {if $tpl_nav.curpage < $tpl_nav.numpages}
    &nbsp;
    {cms_action_url action='defaultadmin' tpl_page=$tpl_nav.curpage+1 assign='np_url'}
    <a href="{$np_url}" title="{$mod->Lang('prompt_nextpage')}">&gt;</a>&nbsp;
    {cms_action_url action='defaultadmin' tpl_page=$tpl_nav.numpages assign='lp_url'}
    <a href="{$lp_url}" title="{$mod->Lang('prompt_lastpage')}">&gt;&gt;</a>
  {/if}
  </div>
  {/if}

  <table class="pagetable" cellspacing="0">
    <thead>
      <tr>
        <th width="5%">{$mod->Lang('prompt_id')}</th>
        <th>{$mod->Lang('prompt_name')}</th>
        <th>{$mod->Lang('prompt_type')}</th>
        <th>{$mod->Lang('prompt_design')}</th>
        <th>{$mod->Lang('prompt_owner')}</th>
        <th>{$mod->Lang('prompt_modified')}</th>
        <th class="pageicon">{$mod->Lang('prompt_dflt')}</th>{* dflt *}
        <th class="pageicon"></th>{* edit *}
	{if $has_add_right}
        <th class="pageicon"></th>{* copy *}
        {/if}
        <th class="pageicon"></th>{* delete *}
        <th class="pageicon"><input type="checkbox" id="tpl_selall" title="{$mod->Lang('prompt_select_all')}" class="tpl_select"/></th>{* checkbox *}
      </tr>
    </thead>
    <tbody>
    {foreach from=$templates item='template'}
     {cycle values="row1,row2" assign='rowclass'}
     <tr class="{$rowclass}" onmouseover="this.className='{$rowclass}hover';" onmouseout="this.className='{$rowclass}';">
        {cms_action_url action='admin_edit_template' tpl=$template->get_id() assign='edit_tpl'}
	{if $has_add_right}
          {cms_action_url action='admin_copy_template' tpl=$template->get_id() assign='copy_tpl'}
        {/if}
        {cms_action_url action='admin_delete_template' tpl=$template->get_id() assign='delete_tpl'}
        <td><a href="{$edit_tpl}" title="{$mod->Lang('edit_template')}">{$template->get_id()}</a></td>
        <td><a href="{$edit_tpl}" title="{$mod->Lang('edit_template')}">{$template->get_name()}</a></td>
        <td>{assign var='n' value=$template->get_type_id()}{$list_types.$n}</td>
        <td>
          {assign var='t1' value=$template->get_designs()}
          {if count($t1) == 1}
  	    {assign var='t1' value=$t1[0]}
            {assign var='hn' value=$design_names.$t1}
            {if $manage_designs}
              {cms_action_url action=admin_edit_design design=$t1 assign='edit_design_url'}
              <a href="{$edit_design_url}" title="{$mod->Lang('edit_design')}">{$hn}</a>
            {else}
              {$hn}        
            {/if}
          {else}<span title="{$mod->Lang('help_template_multiple_designs')}">({count($t1)})</span>{/if}
        </td>
        <td>{if isset($list_users)}{assign var='u' value=$template->get_owner_id()}{$list_users.$u}{else}n/a{/if}</td>
	<td>{$template->get_modified()|date_format:'%x %X'}</td>
        <td>
	 {assign var='the_type' value=$list_all_types.$n}
         {if $the_type->get_dflt_flag()}
           {if $template->get_type_dflt()}{admin_icon icon='true.gif' title=$mod->Lang('prompt_dflt')}{else}{admin_icon icon='false.gif' title=$mod->Lang('prompt_notdflt')}{/if}
         {else}
           {$mod->Lang('prompt_na')}
         {/if}
        </td>
        <td><a href="{$edit_tpl}" title="{$mod->Lang('edit_template')}">{admin_icon icon='edit.gif' title=$mod->Lang('prompt_edit')}</a></td>
	{if $has_add_right}
        <td><a href="{$copy_tpl}" title="{$mod->Lang('copy_template')}">{admin_icon icon='copy.gif' title=$mod->Lang('prompt_copy')}</a></td>
        {/if}
        <td>
         {if $template->get_owner_id() == get_userid()}
           <a href="{$delete_tpl}" title="{$mod->Lang('delete_template')}">{admin_icon icon='delete.gif' title=$mod->Lang('delete_template')}</a>
         {/if}
        </td>
        <td><input type="checkbox" class="tpl_select" name="tpl_select[]" value="{$template->get_id()}"/></td>
      </tr>
    {/foreach}
    </tbody>
  </table>
{/strip}{form_end}
{else}
  {page_warning msg=$mod->Lang('warning_no_templates_available')}
{/if}

<div style="width: 100%;">
{if $has_add_right}
  {form_start action='admin_edit_template'}
  <div style="float: left; width: 49%;>
  <p>
    <label for="tpl_import_type">{$mod->Lang('create_template')}:</label>&nbsp;
    <select name="{$actionid}import_type" id="tpl_import_type">
      {html_options options=$list_types}
    </select>
    <input type="submit" name="{$actionid}submit" value="{$mod->Lang('create')}"/>&nbsp;{admin_icon name="help_create" class="viewhelp" icon='info.gif' title=$mod->Lang('prompt_help')}
  </p>
  </div>
  {form_end}
{/if}
<div style="float: right; width: 48%; text-align: right;>
  {form_start action='admin_bulk_template'}
  <p class="pageinput" style="text-align: right;">
    <label for="tpl_bulk_action">{$mod->Lang('prompt_with_selected')}:</label>&nbsp;
    <select name="{$actionid}bulk_action" id="tpl_bulk_action" class="tpl_bulk_action">
      <option value="delete" title="{$mod->Lang('title_delete')}">{$mod->lang('prompt_delete')}</option>
    </select>
    <input class="tpl_bulk_action" type="submit" name="{$actionid}submit" value="{$mod->Lang('submit')}"/>&nbsp;{admin_icon name="help_bulk" class="viewhelp" icon='info.gif' title=$mod->Lang('prompt_help')}
  </p>
  {form_end}
</div>
<div class="clearb"></div>
</div>