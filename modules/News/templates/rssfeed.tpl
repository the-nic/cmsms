<?xml version='1.0'?>
<rss version='2.0'>
	<channel>
		<title>CMS Made Simple News Feed</title>
		<link>{$root_url}</link>
		<description>Current News entries</description>
		{foreach from=$items item=entry}
		<item>
			<title>{$entry->title}</title>
			<pubDate>{$entry->gmdate}</pubDate>
			<category>{$entry->category}</category>
			<description>{$entry->data}
			{$entry->content}</description>
		</item>
		{/foreach}
	</channel>
</rss> 
