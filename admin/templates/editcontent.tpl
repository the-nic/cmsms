<script type="text/javascript">
// <![CDATA[
$(document).ready(function(){ 
  {if $content_obj->HasPreview()}
  $('#_preview_').click(function(){
    // serialize the form data
    {$wysiwyg_submit_script|default:''}
    var data = $('#Edit_Content').find('input:not([type=submit]), select, textarea').serializeArray();
    data.push({ 'name': 'preview', 'value': 1});
    data.push({ 'name': 'ajax', 'value': 1});
    $.post('{$smarty.server.REQUEST_URI}&showtemplate=false',data,function(resultdata,text){
        $('#previewframe').attr('src','{$preview_url}');
    });
  });
  {/if}

  $('#template_id').live('change',function(){
    $(this).closest('form').submit();
  });

  $('[name=cancel]').click(function(){
    var tmp = $(this).val();
    if( tmp == '{lang('close')}' ) {
      return true;
    }
    else {
      return confirm('{lang('cancel')}');
    }
  });

  $('[name=apply]').live('click',function(){
    {$wysiwyg_submit_script}
    var data = $('#Edit_Content').find('input:not([type=submit]), select, textarea').serializeArray();
    data.push({ 'name': 'ajax', 'value': 1});
    data.push({ 'name': 'apply', 'value': 1 });
    $.post('{$smarty.server.REQUEST_URI}&showtemplate=false',data,function(data,text){
       var event = $.Event('cms_ajax_apply');
       event.response = data.response;
       event.details = data.details;
       event.close = 'close';
       $('body').trigger(event);
    },'json');
    return false;
  });

  jQuery('body').on('cms_ajax_apply',function(e){
    var htmlShow = '';
    if( e.response == 'Success' ) {
      // here we could fire a custom event, give the details and let something else handle it.
      htmlShow = '<div class="pagemcontainer"><p class="pagemessage">' + e.details + '<\/p><\/div>';
      jQuery('[name=cancel]').fadeOut();
      jQuery('[name=cancel]').attr('value','{lang('close')}');
      jQuery('[name=cancel]').fadeIn();
    }
    else {
      htmlShow = '<div class="pageerrorcontainer"><ul class="pageerror">';
      htmlShow += e.details;
      htmlShow += '<\/ul><\/div>';
    }
    jQuery('#Edit_Content_Result').html(htmlShow);
  });
});
// ]]>
</script>

{function submit_buttons}
<p class="pagetext"></p>
<p class="pageinput">
  <input type="submit" name="submitbutton" value="{lang('submit')}" class="pagebutton" title="{lang('submitdescription')}"/>
  <input type="submit" name="cancel" value="{lang('cancel')}" class="pagebutton" title="{lang('canceldescription')}"/>
  {if $content_id != ''}
    <input type="submit" name="apply" value="{lang('apply')}" class="pagebutton" title="{lang('applydescription')}"/>
  {/if}
  {if $content_obj->IsViewable() && $content_obj->Active()}
    <a rel="external" href="{$content_obj->GetURL()}">{admin_icon icon='view.gif' alt='view_page'|lang}</a>
  {/if}
</p>
{/function}

<div class="pagecontainer">
  <div class="pageheader">
  {if $content_id > 0}
    {lang('editcontent')} :: {$content_id}
  {else}
    {lang('addcontent')}
  {/if}
  </div>

<div id="Edit_Content_Result"></div>
<div id="Edit_Content">
{form_start url=$smarty.server.REQUEST_URI content_id=$content_obj->Id() orig_content_type=$cur_content_type }
{foreach from=$tabnames item='tabname' name='tabs'} 
  {assign var='tmp' value='tab_'|cat:$smarty.foreach.tabs.index}
  {tab_header name=$tmp label=$tabname}
{/foreach}  
{if $content_obj->HasPreview()}
  {tab_header name='_preview_' label='preview'|lang}
{/if}
{foreach from=$tabnames item='tabname' name='tabs'} 
  {assign var='idx' value=$smarty.foreach.tabs.index}
  {assign var='tmp' value='tab_'|cat:$smarty.foreach.tabs.index}
  {tab_start name=$tmp}
    {if $smarty.foreach.tabs.index == 0}
      {submit_buttons}
    {/if}
    {if isset($tab_contents_array[$idx])}
      {foreach from=$tab_contents_array[$idx] item='fld'}
      <div class="pageoverflow">
        <p class="pagetext">{$fld[0]}</p>
        <p class="pageinput">{$fld[1]}{if count($fld) == 3}<br/>{$fld[2]}{/if}</p>
      </div>
      {/foreach}
    {/if}
    {submit_buttons}
{/foreach}
{if $content_obj->HasPreview()}
  {tab_start name='_preview_'}
    <div class="pagewarning">{lang('info_preview_notice')}</div>
    <iframe name="previewframe" class="preview" id="previewframe"></iframe>
{/if}
{tab_end}
{form_end}
</div>