<?php

if (isset($_POST['submit']) && !empty($_POST['submit'])) {

    var_dump($_FILES);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>upload</title>
</head>
<body>
    <p>file upload...</p>
    <form action="" method="post"
    enctype="multipart/form-data">
    <label for="file">Filename:</label>
    <input type="file" name="file" id="file" />
    <br />
    <input type="submit" name="submit" value="Submit" />
</form>
</body>
</html>



