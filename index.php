<?php
require("connect.php");

$sql = "SELECT * FROM ampoules";
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);


if ($_POST) {
    if (
        isset($_POST['date_amp'])


    ) {

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
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
    <title>Bienvenue sur AmpOwl !</title>
</head>

<body>
    <div class="modal hidden">
        <h1>Ajouter une ampoule</h1>
        <form method="post">
            <div class="form_container">
                <div class="date">
                    <label for="date_amp">Date de changement</label>

                    <input type="date" name="date_amp" required>
                </div>
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
    <div class="overlay hidden"></div>

    <div class="suppr hidden" id="supp">

        <h3>Voulez-vous vraiment supprimer cette ampoule ?</h3>
        <div class="btn-sup-container">
            <a data-id="" class="confirmDel">Supprimer</a>
            <a class="cancel">Annuler</a>
        </div>
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
            <svg width="30" height="30" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z"></path>
                <path d="M12 8v8"></path>
                <path d="M8 12h8"></path>
            </svg>
            <h3>Ajouter une ampoule</h3>
        </div>
        <!-- </a> -->


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
                                <svg width="30" height="30" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg></a>
                            <a data-id="<?= $ampoule['id'] ?>" class="cross">
                                <svg width="30" height="30" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </a>
                        </td>
                    </tr>

                <?php
                };

                ?>
            </tbody>

        </table>

    </main>

    <footer>

    </footer>

</body>

<script src="index.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>