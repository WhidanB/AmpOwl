<?php
require("connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $date_amp = $_POST['date_amp'];
    $floor = $_POST['floor'];
    $side = $_POST['side'];
    $price = $_POST['price'];

    $sql = "UPDATE ampoules SET date_amp = :date_amp, floor = :floor, side = :side, price = :price WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->bindParam(':date_amp', $date_amp, PDO::PARAM_STR);
    $query->bindParam(':floor', $floor, PDO::PARAM_STR);
    $query->bindParam(':side', $side, PDO::PARAM_STR);
    $query->bindParam(':price', $price, PDO::PARAM_STR);

    if ($query->execute()) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false));
    }
}
?>
