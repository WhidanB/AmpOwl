<?php
require_once("connect.php");

$sql = "SELECT * FROM ampoules";
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
require_once('close.php');

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

    <header>

        <div class="logo">
            <img src="logo.png" alt="Une chouette, logo d'AmpOwl">
            <h1>AmpOwl</h1>
        </div>

    </header>

    <main>
        <h1>Mes ampoules</h1>

        <div class="add">
            <ion-icon name="add-circle"></ion-icon>
            <h3>Ajouter une ampoule</h3>
        </div>

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
                        <td><?= $ampoule['date'] ?></td>
                        <td><?= $ampoule['floor'] ?></td>
                        <td><?= $ampoule['side'] ?></td>
                        <td><?= $ampoule['price'] . ' ' . "€" ?></td>
                        <td>
                            <a href="delete.php?id=<?= $ampoule['id'] ?>">Supprimer</a>
                            <a href="edit.php?id=<?= $ampoule['id'] ?>">Modifier</a>
                        </td>
                    </tr>

                <?php
                };

                ?>
            </tbody>

        </table>

    </main>

</body>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>