<?php

if ($_POST) {
    if (
        isset($_POST['date_amp'])


    ) {
        print_r($_POST);
        require('connect.php');
        $date_amp = strip_tags($_POST['date_amp']);
        $floor = $_POST['floor'];
        $side = $_POST['side'];
        $price = strip_tags($_POST['price']);
        $sql = "INSERT INTO ampoules (date_amp, floor, side, price) VALUES (:date_amp, :floor, :side, :price)";
        $query = $db->prepare($sql);
        $query->bindValue(':date_amp', $date_amp);
        $query->bindValue(':floor', $floor);
        $query->bindValue(':side', $side);
        $query->bindValue(':price', $price);
        $query->execute();
        require('close.php');
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
    <header>

        <div class="logo">
            <img src="logo.png" alt="Une chouette, logo d'AmpOwl">
            <h1>AmpOwl</h1>
        </div>

    </header>

    <main>


        <h1>Ajouter une ampoule</h1>
        <form method="post">
            <div>
                <label for="date_amp">Date de changement</label>
                <input type="date" name="date_amp" required>
                <div class="select">

                    <label for="floor">Étage</label>
                    <select name="floor" required>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                    <label for="side">Position</label>
                    <select name="side" required>
                        <option value="Nord">Nord</option>
                        <option value="Sud">Sud</option>
                        <option value="Est">Est</option>
                        <option value="Ouest">Ouest</option>
                    </select>
                </div>
                <div class="prix">

                    <label for="price">Prix</label>
                    <input type="text" name="price" required>
                </div>

            </div>
            <input type="submit" value="Ajouter" class="sub">
        </form>
    </main>
</body>

</html>