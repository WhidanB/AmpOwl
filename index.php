<?php
require("connect.php");

$sql = "SELECT * FROM ampoules";
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
require('close.php');

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
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="logo.png" type="image/png" sizes="32x32">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bowlby+One&family=Bowlby+One+SC&display=swap" rel="stylesheet">
    <title>Bienvenue sur AmpOwl !</title>
</head>

<body>
    <div class="overlay hidden"></div>
    <div class="modal hidden">


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
    </div>

    <div class="suppr hidden">
        <h3>Voulez-vous vraiment supprimer cette ampoule ?</h3>
        <a href="delete.php?id=<?= $ampoule['id'] ?>">Supprimer</a>
    </div>

    <header>

        <div class="logo">
            <img src="logo.png" alt="Une chouette, logo d'AmpOwl">
            <h1>AmpOwl</h1>
        </div>

    </header>

    <main>
        <h1>Mes ampoules</h1>
        <!-- <a href="add.php"> -->
        <div class="add">
            <img src="plus-circle.svg" height="30px" width="30px" alt="Bouton Plus">
            <h3>Ajouter une ampoule</h3>
        </div>
        <!-- </a> -->

        <h1>Ajouter une ampoule</h1>

        <table>
            <thead>
                <th>Numéro</th>
                <th>Date du changement</th>
                <th>Étage</th>
                <th>Position</th>
                <th>Prix</th>
                <th>Actions</th>
            </thead>

            <tbody>
                <?php
                //pour chaque résultat de $result, on affiche une ligne dans le tableau
                foreach ($result as $ampoule) {
                    // print_r($stagiaire);
                ?>

                    <tr>
                        <td><?= $ampoule['id'] ?></td>
                        <td><?= $ampoule['date_amp'] ?></td>
                        <td><?= $ampoule['floor'] ?></td>
                        <td><?= $ampoule['side'] ?></td>
                        <td><?= $ampoule['price'] . ' ' . "€" ?></td>
                        <td>
                            <a href="edit.php?id=<?= $ampoule['id'] ?>">
                                <img src="edition.png" alt=""></a>

                            <img src="fermer.png" alt="">
                        </td>
                    </tr>

                <?php
                };

                ?>
            </tbody>

        </table>

    </main>

</body>

<script src="index.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>