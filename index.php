<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}




require("connect.php");
$sql = "SELECT * FROM ampoules";
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

@$_GET["id"];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    require("connect.php");

    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM ampoules WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $stp = $query->fetch();
    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";
    require('close.php');
}



if ($_POST) {
    if (
        isset($_POST['date_amp'])
    ) {
        require("connect.php");
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

        //au lieu de rediriger vers index, rediriger vers une page add avec une session add
    }
    if (
        isset($_POST['date_amp1'])
    ) {
        require("connect.php");
        $id1 = $_POST['id1'];
        $date_amp1 = $_POST['date_amp1'];
        $floor1 = $_POST['floor1'];
        $side1 = $_POST['side1'];
        $price1 = $_POST['price1'];
        $sql = "UPDATE ampoules SET date_amp = :date_amp1, floor = :floor1, side = :side1, price = :price1  WHERE id = :id1";
        $query = $db->prepare($sql);
        $query->bindValue(':id1', $id1, PDO::PARAM_INT);
        $query->bindValue(':date_amp1', $date_amp1);
        $query->bindValue(':floor1', $floor1);
        $query->bindValue(':side1', $side1);
        $query->bindValue(':price1', $price1);
        $query->execute();
        $modif = $query->fetch();
        require('close.php');
        header('Location: index.php');
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <div class="overlay2 hidden" id="overlay2"></div>

    <div class="suppr hidden" id="supp">
        <h3>Voulez-vous vraiment supprimer cette ampoule ?</h3>
        <div class="btn-sup-container">
            <a data-id="" class="confirmDel">Supprimer</a>
            <a class="cancel">Annuler</a>
        </div>
    </div>


    <div id="myModal" class="edit hidden">

        <h2>Modifier une ampoule</h2>
        <form id="editForm">
            <input type="hidden" id="editId" name="id" value="">
            <div class="date">

                <label for="editDate">Date du changement:</label>
                <input type="date" id="editDate" name="date_amp" required>
            </div>
            <div class="select">

                <label for="editFloor">Étage:</label>
                <select name="floor" id="editFloor" required>
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

                <label for="editSide">Position:</label>
                <select name="side" id="editSide" required>
                    <option value="Nord">Nord</option>
                    <option value="Sud">Sud</option>
                    <option value="Est">Est</option>
                    <option value="Ouest">Ouest</option>
                </select>
            </div>
<div class="prix">

    <label for="editPrice">Prix:</label>
    <input type="text" id="editPrice" name="price" required>
</div>

            <input type="submit" value="Modifier" class="sub">
        </form>

    </div>




    <header>

        <div class="logo">
            <img src="logo.png" alt="Une chouette, logo d'AmpOwl">
            <h1>AmpOwl</h1>
        </div>
        <div class="perso">
            <div class="perso_container">

                <svg width="30" height="30" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <path d="M12 3a4 4 0 1 0 0 8 4 4 0 1 0 0-8z"></path>

                </svg>
                <p><?= $_SESSION["user"]["pseudo"] ?></p>
            </div>
            <div class="disco">
                <a href="disconnect.php">Déconnexion</a>
            </div>
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
                <th>Date du changement</th>
                <th>Étage</th>
                <th>Position</th>
                <th>Prix</th>
                <th>Actions</th>
            </thead>

            <tbody id="tableBody">
                <?php
                //pour chaque résultat de $result, on affiche une ligne dans le tableau
                foreach ($result as $ampoule) {
                    // print_r($stagiaire);
                ?>

                    <tr>
                        <td><?= $ampoule['date_amp'] ?></td>
                        <td><?= $ampoule['floor'] ?></td>
                        <td><?= $ampoule['side'] ?></td>
                        <td><?= $ampoule['price'] . ' ' . "€" ?></td>
                        <td>

                            <a href="#" data-id="<?= $ampoule['id'] ?>" class="modif">
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

        <div class="toast hidden">
            <h3>Suppression confirmée</h3>
        </div>
        <?php
        if (isset($_SESSION["Delete"]["on"])) {

            if ($_SESSION["Delete"]["on"] == 1) {

                echo '<script type="text/javascript" src="toast.js">
                </script>';
            }
            unset($_SESSION["Delete"]["on"]);
        }
        ?>

    </main>

    <footer>

    </footer>

</body>

<script src="index.js"></script>
<script src="script.js"></script>
<script src="editModalClose.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>