<?php

$error_msg = "";

if(isset($_POST['first_submit']) && ($_POST['first_submit'] == "xxx")) {
    if ($_POST['first_input'] != "111") {
        $error_msg = "This is the Error!";
    } else {
        header('location: second.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="first_input" value="" required>
        <p><?php echo (!empty($error_msg)) ? $error_msg: ""; ?></p>
        <input type="hidden" name="first_submit" value="xxx">
        <button type="submit">Submit</button>
    </form>
</body>
</html>