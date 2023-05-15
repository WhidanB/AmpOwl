<?php

if ($_POST) {
    if (
        isset($_POST['first_name'])
        && isset($_POST['last_name'])
    ) {
        // print_r($_POST);
        require_once('connect.php');
        $first_name = strip_tags($_POST['first_name']);
        $last_name = strip_tags($_POST['last_name']);
        $sql = "INSERT INTO stagiaire (first_name, last_name) VALUES (:first_name, :last_name)";
        $query = $db->prepare($sql);
        $query->bindValue(':first_name', $first_name, PDO::PARAM_STR_CHAR);
        $query->bindValue(':last_name', $last_name, PDO::PARAM_STR_CHAR);
        $query->execute();
        require_once('close.php');
        header("Location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <h1>Ajouter un stagiaire</h1>
    <form method="post">
        <div>
            <label for="first_name">First name</label>
            <input type="text" name="first_name" required>
            <label for="last_name">Last name</label>
            <input type="text" name="last_name" required>
        </div>
        <input type="submit" value="send">
    </form>
</body>

</html>