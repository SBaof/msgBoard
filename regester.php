<html >
<head>
    <meta charset="UTF-8">
    <title>留言板注册</title>
</head>
    <body>
        <form action="controllers/RegesterController.php" method="post" name="form1" enctype="multipar	t/form-data">
            <table width="405" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#999999">
                <tr>
                    <td width="103" height="25" align="right">name: </td>
                    <td width="200" height="25"><input name="user" type="text" id="user" size="20" maxlength="100"></td>
                </tr>

                <tr>
                    <td width="103" height="25" align="right">password: </td>
                    <td width="200" height="25"><input type="password" name="pwd" id="pwd" size="20" maxlength="100"></td>
                </tr>

                <tr>
                    <td height="25" align="right">selfIntro: </td>
                    <td height="25" colspan="2"><textarea name="intro" id="intro" cols="28" rows="4"></textarea></td>
                </tr>

                <tr>
                    <td width="103" height="25" align="right">photo: </td>
                    <td width="200" height="25"><input type="file" name="file" id="file"></td>
                </tr>

                    <tr align="center">
                    <td height="25" colspan="3"><input type="submit" name="submit" value="regester">
                    <input type="reset" name="reset" value="cancle"></td>
                </tr>
            </table>
        </form>
        </body>
</html>
