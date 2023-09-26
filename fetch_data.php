<?php
require("connect.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM ampoules WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $ampoule = $query->fetch(PDO::FETCH_ASSOC);

    if ($ampoule) {
        echo json_encode($ampoule);
    } else {
        echo json_encode(array());
    }
} else {
    echo json_encode(array());
}
?>
