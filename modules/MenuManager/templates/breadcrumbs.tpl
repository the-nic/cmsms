{if isset($nodelist)}
{strip}
<div class="breadcrumbs">
{$starttext}:&nbsp;
{foreach from=$nodelist item='node'}
  {assign var='spanclass' value='crumb'}
  {assign var='extraspanclass' value=''}
  {if $node->current == true}
    {assign var='extraspanclass' value=' current'}
  {/if}

  <span class="{$spanclass|cat:$extraspanclass}">
    {if $node->current == true}
       {$node->menutext}&nbsp;
    {elseif $node->url == '' or $node->url == '#'}
       &raquo;&nbsp;
    {else}
       <a href="{$node->url}" title="{$node->menutext}">{$node->menutext}</a>&nbsp;
    {/if}
  </span>
{/foreach}
</div>
{/strip}
{/if}