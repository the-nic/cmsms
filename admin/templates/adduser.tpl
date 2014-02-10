<div class="pagecontainer">

{form_start url='adduser.php'}
{tab_header name='user' label=lang('profile')}
{if isset($groups)}{tab_header name='groups' label=lang('groups')}{/if}
{tab_header name='settings' label=lang('settings')}

{tab_start name='user'}
<div class="pageoverflow">
  <p class="pagetext"><label for="username">*{lang('name')}:</label>{cms_help realm='admin' key='info_adduser_username' title=lang('name')}</p>
  <p class="pageinput">
    <input id="username" type="text" name="user" maxlength="255" value="{$user}" class="standard"/>
  </p>
</div>
<div class="pageoverflow">
  <p class="pagetext"><label for="password">*{lang('password')}:</label>{cms_help realm='admin' key='info_edituser_password' title=lang('password')}</p>
  <p class="pageinput">
    <input type="password" id="password" name="password" maxlength="100" value="{$password}" class="standard"/>
  </p>
</div>
<div class="pageoverflow">
  <p class="pagetext"><label for="passwordagain">*{lang('passwordagain')}:</label>{cms_help realm='admin' key='info_edituser_passwordagain' title=lang('passwordagain')}</p>
  <p class="pageinput">
    <input type="password" id="passwordagain" name="passwordagain" maxlength="100" value="{$passwordagain}" class="standard"/>
  </p>
</div>
<div class="pageoverflow">
  <p class="pagetext"><label for="firstname">{lang('firstname')}:</label></p>
  <p class="pageinput">
    <input type="text" id="firstname" name="firstname" maxlength="50" value="{$firstname}" class="standard"/>
  </p>
</div>
<div class="pageoverflow">
  <p class="pagetext"><label for="lastname">{lang('lastname')}:</label></p>
  <p class="pageinput">
    <input type="text" id="lastname" name="lastname" maxlength="50" value="{$lastname}" class="standard"/>
  </p>
</div>
<div class="pageoverflow">
  <p class="pagetext"><label for="email">{lang('email')}:</label></p>
  <p class="pageinput">
    <input type="text" id="email" name="email" maxlength="255" value="{$email}" class="standard"/>
  </p>
</div>
<div class="pageoverflow">
  <p class="pagetext">{lang('active')}:{cms_help realm='admin' key='info_user_active' title=lang('active')}</p>
  <p class="pageinput">
    <input type="checkbox" class="pagecheckbox" name="active" value="1"{if $active == 1} checked="checked"{/if}/>
  </p>
</div>

{if isset($groups)}
  {tab_start name='groups'}
  <div class="pageverflow">
    <p class="pagetext">{lang('groups')}:{cms_help realm='admin' key='info_membergroups' title=lang('groups')}</p>
    <div class="pageinput">
      <div class="group_memberships clear">
        <table class="pagetable" cellspacing="0">
        <thead>
          <tr>
            <th class="pageicon"></th>
            <th>{lang('name')}</th>
            <th>{lang('description')}</th>
          </tr>
        </thead>
        <tbody>
        {foreach from=$groups item='onegroup'}
          <tr>
            <td>
              <input type="checkbox" name="sel_groups[]" id="g{$onegroup->id}" value="{$onegroup->id}" {if in_array($onegroup->id,$sel_groups)}checked="checked"{/if}/>
            </td>
            <td>
              <label for="g{$onegroup->id}">{$onegroup->name}</label>
            </td>
            <td>{$onegroup->description}</td>
          </tr>
        {/foreach}
        </tbody>
        </table>
      </div>
    </div>
  </div>
{/if}

{tab_start name='settings'}
<div class="pageoverflow">
  <p class="pagetext">{lang('copyusersettings')}:{cms_help realm='admin' key='info_copyusersettings' title=lang('copyusersettings')}</p>
  <p class="pageinput">
    <select name="copyusersettings">
      {html_options options=$users}
    </select>
  </p>
</div>
{tab_end}

<div class="pageoverflow">
  <p class="pagetext"></p>
  <p class="pageinput">
    <input type="submit" id="submit" name="submit" value="{lang('submit')}"/>
    <input type="submit" name="cancel" value="{lang('cancel')}"/>
  </p>
</div>
{form_end}
</div>