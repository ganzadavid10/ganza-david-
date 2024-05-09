<?php 

    include_once "./config.php";

    if(!isset($_GET['id'])){
        header("Location: ./stckin.php");
    }

    $sql = mysqli_query($conn, " DELETE FROM stock_in WHERE Product_Id = '{$id}' " );
    if($sql == true){
        header("Location: ./stockin.php");
    }else{
        echo "Not Deleted!";
    }

?>
