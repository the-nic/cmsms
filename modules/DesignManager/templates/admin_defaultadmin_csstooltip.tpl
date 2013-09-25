{strip}{if $css->locked()}
  {$lock=$css->get_lock()}
  {if $css->lock_expired()}<strong style="color: red;">{$mod->Lang('msg_steal_lock')}</strong><br/>{/if}
  <strong>{$mod->Lang('prompt_lockedby')}:</strong> {cms_admin_user uid=$lock.uid}<br/>
  <strong>{$mod->Lang('prompt_lockedsince')}:</strong> {$lock.created|date_format:'%x %H:%M'}<br/>
  {if $lock.expires < $smarty.now}
    <strong>{$mod->Lang('prompt_lockexpired')}:</strong> <span style="color: red;">{$lock.expires|relative_time}</span>
  {else}
    <strong>{$mod->Lang('prompt_lockexpires')}:</strong> {$lock.expires|relative_time}
  {/if}
{else}
  <strong>{$mod->Lang('prompt_name')}:</strong> {$css->get_name()} <em>({$css->get_id()})</em><br/>
  <strong>{$mod->Lang('prompt_created')}:</strong> {$css->get_created()|cms_date_format}<br/>
  <strong>{$mod->Lang('prompt_modified')}:</strong> {$css->get_modified()|relative_time}
  {$tmp=$css->get_description()}
  {if $tmp != ''}<br/><strong>{$mod->Lang('prompt_description')}:</strong> {$tmp|strip_tags|cms_escape|summarize}{/if}
{/if}{/strip}