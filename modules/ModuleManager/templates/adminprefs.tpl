<script type="text/javascript">
$(document).ready(function(){
  $(document).on('click','#reseturl',function(){
    return confirm('{$ModuleManager->Lang('confirm_reseturl')|escape:'javascript'}');
  });
  $(document).on('click','#settings_submit',function(){
    return confirm('{$ModuleManager->Lang('confirm_settings')|escape:'javascript'}');
  });
});
</script>
{if isset($message)}<p>{$message}</p>{/if}

{form_start action='setprefs'}
{if isset($module_repository)}
  <div class="pageoverflow">
    <p class="pagetext"><label for="mr_url">{$ModuleManager->Lang('prompt_repository_url')}:</label></p>
    <p class="pageinput">
      <input type="text" name="{$actionid}url" id="mr_url" maxlength="255" value="{$module_repository}"/>
      <input type="submit" id="reseturl" name="{$actionid}reseturl" value="{$ModuleManager->Lang('reset')}"/>
    </p>
  </div>

   <div class="pageoverflow">
    <p class="pagetext"><label for="allowuninstall">{$ModuleManager->Lang('allowuninstall')}:</label>&nbsp;{cms_help key2='help_allowuninstall' title=$ModuleManager->Lang('allowuninstall')}</p>
    <p class="pageinput">
      <select id="allowuninstall" name="{$actionid}allowuninstall">{cms_yesno selected=$allowuninstall}</select>
    </p>
  </div>
{/if}

  <div class="pageoverflow">
    <p class="pagetext"><label>{$ModuleManager->Lang('prompt_dl_chunksize')}:</label>&nbsp;{cms_help key2='help_dl_chunksize' title=$ModuleManager->Lang('prompt_dl_chunksize')}</p>
    <p class="pageinput">
      <input type="text" name="{$actionid}dl_chunksize" value="{$dl_chunksize}" size="3" maxlength="3"/>
    </p>
  </div>

  <div class="pageoverflow">
    <p class="pagetext"><label for="latestdepends">{$ModuleManager->Lang('latestdepends')}:</label>&nbsp;{cms_help key2='help_latestdepends' title=$ModuleManager->Lang('latestdepends')}</p>
    <p class="pageinput">
      <select id="latestdepends" name="{$actionid}latestdepends">{cms_yesno selected=$latestdepends}</select>
    </p>
  </div>

{if isset($developer_mode)}
  <div class="pageoverflow">
    <p class="pagetext"><label for="allowuninstall">{$ModuleManager->Lang('allowuninstall')}:</label>&nbsp;{cms_help key2='help_allowuninstall' title=$ModuleManager->Lang('allowuninstall')}</p>
    <p class="pageinput">
      <select id="allowuninstall" name="{$actionid}allowuninstall">{cms_yesno selected=$allowuninstall}</select>
    </p>
  </div>
{/if}

{if isset($disable_caching)}
  <div class="pageoverflow">
    <p class="pagetext"><label for="disable_caching">{$ModuleManager->Lang('prompt_disable_caching')}:</label></p>
    <p class="pageinput">
      <select id="disable_caching" name="{$actionid}disable_caching">{cms_yesno selected=$disable_caching}</select>
    </p>
  </div>
{/if}

  <div class="pageoverflow">
    <p class="pagetext"></p>
    <p class="pageinput">
      <input type="submit" id="settings_submit" name="{$actionid}submit" value="{$ModuleManager->Lang('submit')}"/>
    </p>
  </div>
{form_end}
