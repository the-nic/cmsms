<html>
<head>
<title>��ʾTinyMCE�����</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<body>

<h2>post������HTML���</h2>

<table border="1" width="100%">
	<tr bgcolor="#CCCCCC"><td width="1%" nowrap="nowrap"><strong>�����</strong></td><td><strong>HTML���</strong></td></tr>
	<? foreach ($_POST as $name => $value) { ?>
		<tr><td width="1%" nowrap="nowrap"><?=$name?></td><td><?=stripslashes($value)?></td></tr>
	<? } ?>
</table>

<h2>post������Դ�ļ�</h2>

<table border="1" width="100%">
	<tr bgcolor="#CCCCCC"><td width="1%" nowrap="nowrap"><strong>�����</td><td><strong>Source���</strong></td></tr>
	<? foreach ($_POST as $name => $value) { ?>
		<tr><td width="1%" nowrap="nowrap"><?=$name?></td><td><?=htmlentities(stripslashes($value))?></td></tr>
	<? } ?>
</table>

</body>
</html>

