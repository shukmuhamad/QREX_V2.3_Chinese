<?php


include 'includes/database_connection.php';

if (isset($_POST['PalletID'])) {
    $PalletID = $_POST['PalletID'];

    $query = "SELECT LotIDKey FROM T_Lot_FG WHERE PalletID = ?";
    $stmt = $connect->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->bindParam(1, $PalletID);
    $stmt->execute();
    $row = $stmt->rowCount();



    // Check username

    if ($row > 0)
    {
        echo "Already exist";
    } else {
        echo "Available";
    }
}

?>
