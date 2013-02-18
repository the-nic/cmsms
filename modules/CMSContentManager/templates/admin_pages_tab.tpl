{if $ajax == 0}
{* pages tab *}
<script type="text/javascript">
//<![CDATA[
function setup_js() {
  $('#multiaction').attr('disabled','disabled');
  $('#multisubmit').attr('disabled','disabled');

  $('a.tooltip').mouseover(function(){
    $('span',this).css('width', '250px');
    $('span',this).css('display', 'inline-block');
  });
  $('a.tooltip').mouseout(function(){
    $('span',this).hide();
  });
  $('.multicontent').on('click',function(){
    $('#selectall').removeAttr('checked');
    if( $('.multicontent:checked').length > 0 ) {
      $('#multiaction').removeAttr('disabled');
      $('#multisubmit').removeAttr('disabled');
      $('#multisubmit[class*=ui-button]').button('enable');
    }
    else {
      $('#multiaction').attr('disabled','disabled');
      $('#multisubmit').attr('disabled','disabled');
      $('#multisubmit[class*=ui-button]').button('disable');
    }
  });
  $('#selectall').on('click',function(){
    if( $(this).is(':checked') ) {
      $('.multicontent').attr('checked','checked');
    } else {
      $('.multicontent').removeAttr('checked');
    }
    if( $('.multicontent:checked').length > 0 ) {
      $('#multiaction').removeAttr('disabled');
      $('#multisubmit').removeAttr('disabled');
      $('#multisubmit[class*=ui-button]').button('enable');
    }
    else {
      $('#multiaction').attr('disabled','disabled');
      $('#multisubmit').attr('disabled','disabled');
      $('#multisubmit[class*=ui-button]').button('disable');
    }
  });
  $('a.expandall').on('click',function(){
    var url = $(this).attr('href')+'&showtemplate=false&{$actionid}ajax=1';
    $('#contentlist').load(url,function(){
      setup_js();
    });
    return false;
  });
  $('a.collapseall').on('click',function(){
    var url = $(this).attr('href')+'&showtemplate=false&{$actionid}ajax=1';
    $('#contentlist').load(url,function(){
      setup_js();
    });
    return false;
  });
  $('a.page_expand').on('click',function(){
    var url = $(this).attr('href')+'&showtemplate=false&{$actionid}ajax=1';
    $('#contentlist').load(url,function(){
      setup_js();
    });
    return false;
  });
  $('a.page_collapse').on('click',function(){
    var url = $(this).attr('href')+'&showtemplate=false&{$actionid}ajax=1';
    $('#contentlist').load(url,function(){
      setup_js();
    });
    return false;
  });
  $('a.page_setinactive').on('click',function(){
    if( !confirm('{$mod->Lang('confirm_setinactive')}') ) return false;
    var url = $(this).attr('href')+'&showtemplate=false&{$actionid}ajax=1';
    $('#contentlist').load(url,function(){
      setup_js();
    });
    return false;
  });
  $('a.page_setactive').on('click',function(){
    var url = $(this).attr('href')+'&showtemplate=false&{$actionid}ajax=1';
    $('#contentlist').load(url,function(){
      setup_js();
    });
    return false;
  });
  $('a.page_setdefault').on('click',function(){
    if( !confirm('{$mod->Lang('confirm_setdefault')}') ) return false;
    var url = $(this).attr('href')+'&showtemplate=false&{$actionid}ajax=1';
    $('#contentlist').load(url,function(){
      setup_js();
    });
    return false;
  });
  $('a.page_view').on('click',function(){
    return confirm('{$mod->Lang('confirm_viewpage')}');   
  });
  $('a.page_sortup').on('click',function(){
    var url = $(this).attr('href')+'&showtemplate=false&{$actionid}ajax=1';
    $('#contentlist').load(url,function(){
      setup_js();
    });
    return false;
  });
  $('a.page_sortdown').on('click',function(){
    var url = $(this).attr('href')+'&showtemplate=false&{$actionid}ajax=1';
    $('#contentlist').load(url,function(){
      setup_js();
    });
    return false;
  });
}

$(document).ready(function(){
  $('#ordercontent').on('click',function(){
    $('table#contenttable tbody.contentrows').sortable();
    $('table#contenttable tbody.contentrows').disableSelection();
    $('#reorderbox').dialog({
      resizable: false,
      modal: false,
      buttons: {
        '{$mod->Lang('submit')}': function() {
          alert('submit');
          $(this).dialog('close');
        },
        '{$mod->Lang('cancel')}': function() {
          $(this).dialog('close');
          location.reload();
        },
      }
    });
    return false;
  });
  setup_js();
});
//]]>
</script>

<div id="reorderbox" style="display: none;" title="{$mod->Lang('prompt_ordercontent')}">
  <p>Testing 123</p>
</div>

<div class="pageoptions" style="float: left">
{if $can_add_content}
  <a href="{cms_action_url action=admin_editcontent}" accesskey="n" title="{$mod->Lang('addcontent')}" class="pageoptions">{admin_icon icon='newobject.gif' alt=$mod->Lang('addcontent')}&nbsp;{$mod->Lang('addcontent')}</a>&nbsp;
{/if}
<a class="expandall" href="{cms_action_url action='admin_pages_tab' expandall=1}" accesskey="e" title="{$mod->Lang('prompt_expandall')}" class="pageoptions">{admin_icon icon='expandall.gif' alt=$mod->Lang('expandall')}&nbsp;{$mod->Lang('expandall')}</a>&nbsp;
<a class="collapseall" href="{cms_action_url action='admin_pages_tab' collapseall=1}" accesskey="c" title="{$mod->Lang('prompt_collapseall')}" class="pageoptions">{admin_icon icon='contract.gif' alt=$mod->Lang('contractall')}&nbsp;{$mod->Lang('contractall')}</a>&nbsp;
{if $can_reorder_content}
  <a id="ordercontent" href="{cms_action_url action=ordercontent}" accesskey="r" title="{$mod->Lang('prompt_ordercontent')}" class="pageoptions">{admin_icon icon='reorder.gif' alt=$mod->Lang('reorderpages')}&nbsp;{$mod->Lang('reorderpages')}</a>&nbsp;
{/if}
</div>

{form_start action='admin_pages_tab'}
{/if} {* ajax *}

<div id="contentlist">
{if isset($content_list)}
{function do_content_row}
  {foreach from=$columns key='column' item='flag'}
    {if $flag == 0} {continue} {/if}

    <td>
    {if $column == 'expand'}
      {if $row.expand == 'open'}
        <a href="{cms_action_url action='admin_pages_tab' collapse=$row.id}" class="page_collapse" accesskey="C" title="{$mod->Lang('prompt_page_collapse')}">{admin_icon icon='contract.gif' class="hier_contract"}</a>
      {elseif $row.expand == 'closed'}
        <a href="{cms_action_url action='admin_pages_tab' expand=$row.id}" class="page_expand" accesskey="c" title="{$mod->Lang('prompt_page_expand')}">{admin_icon icon='expand.gif' class="hier_expand"}</a>
      {/if}
    {elseif $column == 'hier'}
      {$row.hier}
    {elseif $column == 'page'}
      {if $row.can_edit}
	{repeat string='-&nbsp;&nbsp;' times=$row.depth-2}
        <a href="{cms_action_url action='admin_editcontent' content_id=$row.id}" class="page_edit tooltip" accesskey="e" title="{$mod->Lang('prompt_page_edit')}">
           <span style="display: none;">
              <strong>{$mod->Lang('prompt_content_id')}:</strong> {$row.id}<br/>
              <strong>{$mod->Lang('prompt_title')}:</strong> {$row.title}<br/>
              <strong>{$mod->Lang('prompt_name')}:</strong> {$row.menutext}<br/>
              <strong>{$mod->Lang('prompt_alias')}:</strong> {$row.alias}<br/>
           </span>
          {$row.page}
        </a>
      {else}
        {$row.page}
      {/if}
    {elseif $column == 'alias'}
      {$row.alias}
    {elseif $column == 'url'}
      {if $prettyurls_ok}
        {$row.url}
      {else}
        <span style="color: red;">{$row.url}</span>
      {/if}
    {elseif $column == 'template'}
      {if $row.can_edit_tpl}
        <a href="{cms_action_url module='DesignManager' action='admin_edit_template' tpl=$row.template_id}" class="page_template" title="{$mod->Lang('prompt_page_template')}">{$row.template}</a>
      {else}
        {$row.template}
      {/if}
    {elseif $column == 'friendlyname'}
      {$row.friendlyname}
    {elseif $column == 'owner'}
      {$row.owner}
    {elseif $column == 'active'}
      {if $row.active == 'inactive'}
        <a href="{cms_action_url action='admin_pages_tab' setactive=$row.id}" class="page_setactive" accesskey="a">{admin_icon icon='false.gif' title=$mod->Lang('prompt_page_setactive')}</a>
      {else if $row.active != 'default'}
        <a href="{cms_action_url action='admin_pages_tab' setinactive=$row.id}" class="page_setinactive" accesskey="a">{admin_icon icon='true.gif' title=$mod->Lang('prompt_page_setinactive')}</a>
      {/if}
    {elseif $column == 'default'}
      {if $row.default == 'yes'}
        {admin_icon icon='true.gif' class='page_default' title=$mod->Lang('prompt_page_default')}
      {else if $row.default == 'no'}
        <a href="{cms_action_url action='admin_pages_tab' setdefault=$row.id}" class="page_setdefault" accesskey="d">{admin_icon icon='false.gif' class='page_setdefault' title=$mod->Lang('prompt_page_setdefault')}</a>
      {/if}
    {elseif $column == 'move'}
      {if isset($row.move)}
      {if $row.move == 'up'}
        <a href="{cms_action_url action='admin_pages_tab' moveup=$row.id}" class="page_sortup" accesskey="m">{admin_icon icon='sort_up.gif' title=$mod->Lang('prompt_page_sortup')}</a>
      {elseif $row.move == 'down'}
        <a href="{cms_action_url action='admin_pages_tab' movedown=$row.id}" class="page_sortdown" accesskey="m">{admin_icon icon='sort_down.gif' title=$mod->Lang('prompt_page_sortdown')}</a>
      {elseif $row.move == 'both'}
        <a href="{cms_action_url action='admin_pages_tab' moveup=$row.id}" class="page_sortup" accesskey="m">{admin_icon icon='sort_up.gif' title=$mod->Lang('prompt_page_sortup')}</a>
        <a href="{cms_action_url action='admin_pages_tab' movedown=$row.id}" class="page_sortdown" accesskey="m">{admin_icon icon='sort_down.gif' title=$mod->Lang('prompt_page_sortdown')}</a>
      {/if}
      {/if}
    {elseif $column == 'view'}
      {if $row.view != ''}
	<a class="page_view" target="_blank" href="{$row.view}" accesskey="v">{admin_icon icon='view.gif' title=$mod->Lang('prompt_page_view')}</a>
      {/if}
    {elseif $column == 'copy'}
      {if $row.copy != ''}
	{admin_icon icon='copy.gif' class='page_copy' title=$mod->Lang('prompt_page_copy')}
      {/if}
    {elseif $column == 'edit'}
      {if $row.can_edit}
	<a href="{cms_action_url action=admin_editcontent}" accesskey="e" title="{$mod->Lang('addcontent')}">{admin_icon icon='edit.gif' class='page_edit' title=$mod->Lang('prompt_page_edit')}</a>
      {/if}
    {elseif $column == 'delete'}
      {if $row.delete != ''}
	{admin_icon icon='delete.gif' class='page_delete' title=$mod->Lang('prompt_page_delete')}
      {/if}
    {elseif $column == 'multiselect'}
      {if $row.multiselect != ''}
        <label class="invisible" for="multicontent-{$row.id}">{$mod->Lang('prompt_multiselect_toggle')}</label>
        <input type="checkbox" class="multicontent" name="multicontent-{$row.id}" value="1" title="{$mod->Lang('prompt_multiselect_toggle')}"/>
      {/if}
    {else}
      {* unknown column *}
    {/if}
    </td>
  {/foreach}
{/function}

<table id="contenttable" cellspacing="0" class="pagetable" width="100%">
  <thead>
    <tr>
      {foreach from=$columns key='column' item='flag'}
        {if $flag}
        <th>
          {if $column == 'expand' or $column == 'hier' or $column == 'view' or $column == 'copy' or $column == 'edit' or $column == 'delete'}
            {* no colum header *}
          {elseif $column == 'multiselect'}
            <input type="checkbox" id="selectall" value="1" title="{$mod->Lang('select_all')}"/>
          {else}
            {$mod->Lang("colhdr_{$column}")}
          {/if}
        </th>
        {/if}
      {/foreach}
    </tr>
  </thead>
  <tbody class="contentrows">
  {foreach from=$content_list item='row'}
    {cycle values="row1,row2" assign='rowclass'}
    <tr class="{$rowclass}" onmouseover="this.className='{$rowclass}hover';" onmouseout="this.className='{$rowclass}';">
    {do_content_row row=$row columns=$columns}
    </tr>
  {/foreach}
  </tbody>
</table>
{/if}
</div>{* #contentlist *}

{if $ajax == 0}
<div class="pageoptions" style="float: right">
  <label for="multiaction">{$mod->Lang('prompt_withselected')}:</label>&nbsp;&nbsp;
  <select name="{$actionid}multiaction" id="multiaction">
    {html_options options=$bulk_options}
  </select>
  <input type="submit" id="multisubmit" name="{$actionid}multisubmit" accesskey="s" value="{$mod->Lang('submit')}"/>
</div>
<div class="clearb"></div>
{form_end}
{/if}