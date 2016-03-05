<html >
	<body>
		<form action="" method="post" name="form1" enctype="multipar	t/form-data">
			<table width="405" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#999999">
				<tr bgcolor="#FFCC33">
					<td width="103" height="25" align="right">name: </td>
					<td width="144" height="25"><input name="user" type="text" id="user" size="20" maxlength="100"></td>
				</tr>
				<tr bgcolor="#FFCC33">
					<td width="103" height="25" align="right">password: </td>
					<td width="144" height="25"><input type="password" name="pwd" id="pwd" size="20" maxlength="100"></td>
				</tr>

				<tr bgcolor="#FFCC33">
					<td height="25" align="right">个人简介: </td>
					<td height="25" colspan="2"><textarea name="intro" id="intro" cols="28" rows="4"></textarea></td>
				</tr>

				<tr bgcolor="#FFCC33">
					<td width="80" height="25" align="right"><span class="style2">意见主题：</span></td>
					<td width="140">
						<select name="select" id="select" size="1">
							<option value="吞吞吐吐">公司发展</option>
							<option value="1234">管理制度</option>
							<option value="1235">后勤服务</option>
							<option value="1236">员工工资</option>	
						</select>
					</td>
				</tr>

				<tr align="center" bgcolor="#FFCC33">
					<td height="25" colspan="3"><input type="submit" name="submit" value="submit">
					<input type="reset" name="submit2" value="reset"></td>
				</tr>
			</table>
		</form>
		<?php if($_POST["submit"] == "submit"){ 
			//echo "name:" . $_POST['user'] . " password: " . $_POST['pwd'] . "\n";
			echo "意见主题：";
			for($i=0; $i<count($_POST['select']); $i++){
				echo count($_POST['select']) . "\n";
				echo $_POST['select'];
			}
			}
		?>
	</body>
</html>