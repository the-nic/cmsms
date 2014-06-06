<style type="text/css">
#status_area,#searchresults_cont,#workarea {
  display: none;
}
#searchresults {
  max-height: 25em;
  overflow:   auto;
  cursor: pointer;
}
.search_oneresult {
  color: red;
}
</style>

<script type="text/javascript">
 var ajax_url = '{$ajax_url}';
 var clickthru_msg = '{$mod->Lang('warn_clickthru')|escape:'javascript'}';
 {if isset($saved_search.slaves) && in_array(-1,$saved_search.slaves)}
 var sel_all = 1;
 {/if}

 $(document).on('click','#searchbtn',function(){
   var l = $('#filter_box :checkbox.filter_toggle:checked').length;
   if( l == 0 ) {
     alert('{$mod->Lang('error_select_slave')|escape:'javascript'}');
     return false;
   }
   $('#searchresults').html('');
 });
</script>
<script type="text/javascript" src="{$js_url}"></script>

<div id="adminsearchform">
{$formstart}

<table class="pagetable" cellspacing="0">
<tr valign="top">
<td width="50%">
<div class="pageoverflow">
  <p class="pagetext"><label for="searchtext">{$mod->Lang('search_text')}:</label></p>
  <p class="pageinput">
    <input id="searchtext" type="text" name="{$actionid}search_text" value="{$saved_search.search_text|default:''}" size="80" maxlength="80" id="searchtext"/>
  </p>
</div>
<div class="pageoverflow">
  <p class="pagetext"></p>
  <p class="pageinput">
    <input type="submit" name="{$actionid}submit" value="{$mod->Lang('search')}" id="searchbtn" />
  </p>
</div>
</td>
<td width="50%">
<div class="pageoverflow" id="filter_box">
  <p class="pagetext">{$mod->Lang('filter')}:</p>
  <p class="pageinput">
    <input id="filter_all" type="checkbox" name="{$actionid}slaves[]" value="-1"/>&nbsp;<label for="filter_all" title="{$mod->Lang('desc_filter_all')}">{$mod->Lang('all')}</label><br />
    {foreach from=$slaves item='slave' name='slaves'}
      <input class="filter_toggle" id="{$slave.class}" type="checkbox" name="{$actionid}slaves[]" value="{$slave.class}" {if isset($saved_search.slaves) && in_array($slave.class,$saved_search.slaves)}checked="checked"{/if}/>&nbsp;<label for="{$slave.class}" title="{$slave.description}">{$slave.name}</label>{if !$smarty.foreach.slaves.last}<br/>{/if}
    {/foreach}
    <br /><br />
    <input type="checkbox" id="search_desc" name="{$actionid}search_descriptions" value="1">&nbsp;<label for="search_desc">{$mod->lang('lbl_search_desc')}</label>
  </p>
  <br />
</div>
</td>
</tr>
</table>

<div class="pageoverflow" id="progress_area"></div>
<div class="pageoverflow" id="status_area"></div>
<fieldset id="searchresults_cont">
  <legend>{$mod->Lang('search_results')}:</legend>
  <div id="searchresults_cont2">
    <ul id="searchresults">
    </ul>
  </div>
</fieldset>
{$formend}
</div>

<iframe id="workarea" name="workarea"></iframe>