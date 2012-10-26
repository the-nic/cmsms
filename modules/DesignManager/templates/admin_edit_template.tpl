<script type="text/javascript">
$(document).ready(function(){
  $('.helpicon').click(function(){
    var x = $(this).attr('name');
    $('#'+x).dialog();
  });
});
</script>

{if !$template->get_id()}
<h3>{$mod->Lang('create_template')}</h3>
{else}
<h3>{$mod->Lang('edit_template')}: {$template->get_name()} ({$template->get_id()})</h3>
{/if}

{form_start extraparms=$extraparms}
<fieldset class="pagecontainer">
  <div class="pageoverflow">
    <p class="pagetext"><label for="tpl_name">*{$mod->Lang('prompt_name')}:</label></p>
    <p class="pageinput">
      <input id="tpl_name" type="text" name="{$actionid}name" size="50" maxlength="50" value="{$template->get_name()}" {if !$has_manage_right}readonly="readonly"{/if}/>&nbsp;{admin_icon name='help_template_name' icon='info.gif' class='helpicon'}
    </p>
  </div>

  {if $has_manage_right && isset($type_list)}
    <div class="pageoverflow">
      <p class="pagetext"><label for="tpl_type">{$mod->Lang('prompt_type')}:</label></p>
      <p class="pageinput">
        <select id="tpl_type" name="{$actionid}type"{if $type_is_readonly} readonly="readonly"{/if}>
          {html_options options=$type_list selected=$template->get_type_id()}
        </select>&nbsp;{admin_icon name='help_template_type' icon='info.gif' class='helpicon'}
      </p>
    </div>
    {if $type_obj->get_dflt_flag()}
      <div class="pageoverflow">
        <p class="pagetext"><label for="tpl_dflt">{$mod->Lang('prompt_default')}:</label></p>
        <p class="pageinput">
          <input type="hidden" name="{$actionid}default" value="0"/>
          <input id="tpl_dflt" type="checkbox" name="{$actionid}default" value="1" {if $template->get_type_dflt()}checked="checked" disabled="disabled"{/if}/>&nbsp;{admin_icon name='help_template_dflt' icon='info.gif' class='helpicon'}
      </p>
      </div>
    {/if}
  {/if}

  {if $has_manage_right && isset($category_list)}
  <div class="pageoverflow">
    <p class="pagetext"><label for="tpl_category">{$mod->Lang('prompt_category')}:</label></p>
    <p class="pageinput">
      <select id="tpl_category" name="{$actionid}category_id">
        {html_options options=$category_list selected=$template->get_category_id()}
      </select>&nbsp;{admin_icon name='help_template_category' icon='info.gif' class='helpicon'}
    </p>
  </div>
  {/if}
</fieldset>

{tab_header name='template' label=$mod->Lang('prompt_template')}
{tab_header name='description' label=$mod->Lang('prompt_description')}
{if $has_manage_right}
{tab_header name='designs' label=$mod->Lang('prompt_designs')}
{/if}
{if $template->get_owner_id() == get_userid() or $has_manage_right}
{tab_header name='permissions' label=$mod->Lang('prompt_permissions')}
{/if}

{tab_start name='template'}
{syntax_area prefix=$actionid name=contents value=$template->get_content()}&nbsp;
{admin_icon name='help_template_contents' icon='info.gif' class='helpicon'}

{tab_start name='description'}
<textarea name="{$actionid}description" {if !$has_manage_right}readonly="readonly"{/if}>{$template->get_description()}</textarea>&nbsp;
{admin_icon name='help_template_description' icon='info.gif' class='helpicon'}

{if $has_manage_right}
{tab_start name='designs'}
<select name="{$actionid}design_list[]" multiple="multiple" size="5">
  {html_options options=$design_list selected=$template->get_designs()}
</select>&nbsp;{admin_icon icon='info.gif' class='helpicon' name='help_template_designs'}
{/if}

{if $template->get_owner_id() == get_userid() or $has_manage_right}
{tab_start name='permissions'}
{if isset($user_list)}
<div class="pageoverflow">
  <p class="pagetext"><label for="tpl_owner">{$mod->Lang('prompt_owner')}:</label></p>
  <p class="pageinput">
    <select id="tpl_owner" name="{$actionid}owner_id">
    {html_options options=$user_list selected=$template->get_owner_id()}
    </select>&nbsp;{admin_icon icon='info.gif' class='helpicon' name='help_template_addteditors'}
  </p>
</div>
{/if}
{if isset($addt_editor_list)}
<div class="pageoverflow">
  <p class="pagetext"><label for="tpl_addeditor">{$mod->Lang('prompt_owner')}:</label></p>
  <p class="pageinput">
    <select id="tpl_addeditor" name="{$actionid}addt_editors[]" multiple="multiple" size="5">
    {html_options options=$addt_editor_list selected=$template->get_additional_editors()}
    </select>&nbsp;{admin_icon icon='info.gif' class='helpicon' name='help_template_addteditors'}
  </p>
</div>
{/if}
{/if}
{tab_end}

<div class="pageoverflow">
  <p class="pagetext"></p>
  <p class="pageinput">
    <input type="submit" name="{$actionid}submit" value="{$mod->Lang('submit')}"/>
    <input type="submit" name="{$actionid}cancel" value="{$mod->Lang('cancel')}"/>
  </p>
</div>
{form_end}

<div style="display: none;">{strip}
  <div id="help_template_name" title="{$mod->Lang('prompt_help')}">{$mod->Lang('help_template_name')}</div>
  <div id="help_template_design" title="{$mod->Lang('prompt_help')}">{$mod->Lang('help_template_design')}</div>
  <div id="help_template_type" title="{$mod->Lang('prompt_help')}">{$mod->Lang('help_template_type')}</div>
  <div id="help_template_dflt" title="{$mod->Lang('prompt_help')}">{$mod->Lang('help_template_dflt')}</div>
  <div id="help_template_category" title="{$mod->Lang('prompt_help')}">{$mod->Lang('help_template_category')}</div>
  <div id="help_template_contents" title="{$mod->Lang('prompt_help')}">{$mod->Lang('help_template_contents')}</div>
  <div id="help_template_description" title="{$mod->Lang('prompt_help')}">{$mod->Lang('help_template_description')}</div>
  <div id="help_template_designs" title="{$mod->Lang('prompt_help')}">{$mod->Lang('help_template_designs')}</div>
{/strip}</div>