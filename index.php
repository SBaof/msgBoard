<html >
<head>
    <meta charset="UTF-8">
    <title>登录</title>
</head>
	<body>
		<form action="Controllers/IndexController.php" method="post" name="form1" enctype="multipart/form-data">
			<table width="405" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#999999">
				<tr>
					<td width="103" height="25" align="right">name: </td>
					<td width="144" height="25"><input name="user" type="text" id="user" size="20" maxlength="100"></td>
				</tr>
				<tr>
					<td width="103" height="25" align="right">password: </td>
					<td width="144" height="25"><input type="password" name="pwd" id="pwd" size="20" maxlength="100"></td>
				</tr>
				<tr align="center">
					<td height="25" colspan="3"><input type="submit" name="submit" value="signin">
					<input type="submit" name="signup" value="signup"></td>
				</tr>
			</table>
		</form>
	</body>
</html>
