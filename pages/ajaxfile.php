<?php


include 'includes/database_connection.php';

if (isset($_POST['BatchNumber'])) {
    $BatchNumber = $_POST['BatchNumber'];

    $query = "SELECT LotIDKey FROM T_Lot_FG WHERE BatchNumber = ?";
    $stmt = $connect->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->bindParam(1, $BatchNumber);
    $stmt->execute();
    $row = $stmt->rowCount();

    $query2 = "SELECT LotIDKey FROM T_Lot_SFG WHERE BatchNumber = ?";
    $stmt2 = $connect->prepare($query2, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt2->bindParam(1, $BatchNumber);
    $stmt2->execute();
    $row2 = $stmt2->rowCount();

    // Check username

    if ($row > 0)
    {
        echo "Already exist";
    } elseif ($row2 > 0 ){
        echo "Already exist";
    } else {
        echo "Available";
    }
}

?>
