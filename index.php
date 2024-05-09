<?php 

include "./config.php";

$sql = mysqli_query($conn, " SELECT * FROM products " );
$tbody = '';
if($sql ==  true){
    $num_rows = mysqli_num_rows($sql);

    if($num_rows > 0){
        $a = 0;
        while($fetch = mysqli_fetch_assoc($sql)){
            $a++;
            $tbody .= '<tr>
                            <td>'.$a.'</td>
                            <td>'.$fetch['ProductId'].'</td>
                            <td>'.$fetch['Product_Name'].'</td>
                            <td><a href="./p_update.php?id='.$fetch['ProductId'].'">Update</a></td>
                            <td><a href="./p_delete.php?id='.$fetch['ProductId'].'">Delete</a></td>
                            <td><a href="./i_add.php?id='.$fetch['ProductId'].'">Import</a></td>
                        </tr>';
        }
    }else{
        $tbody .= '<tr> <td> No Products </td> </tr>';
    }
}else{
    echo " Not selected ";
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Page</title>
    <link rel="stylesheet" href="./index.css">
</head>
<body> 


    <header>
        <h1>ECOLE Saint_Anne</h1>
        <h2>STOCK</h2>
        <div class="links">
            <a href="./index.php">Home</a>
            <a href="./stockin.php">Stock In</a>
            <a href="./stockout.php">Stock Out</a>
            <a href="./report.php">Generate Report</a>
            <a href="./logout.php">logout</a>
        </div>
    </header>

    <H1>Welcome</H1>

    <h2>Products</h2> <a href="./p_add.php">Add</a>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Product ID</th>
                <th>Product name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $tbody; ?>           
        </tbody>
    </table>
    <div class="left-content">
    <div class="activities">
                <h1>Gallery</h1>
                <div class="activity-container">
                  <div class="image-container img-one">
                    <img src="./images/beans.jpeg"  />
                    
                  </div>
    
                  <div class="image-container img-two">
                    <img src="./images/riceand vegetables.jpeg" />
                    
                  </div>
    
                  <div class="image-container img-three">
                  <video autoplay loop muted plays video src="./images/vlc-record-2024-05-07-16h25m34s-Oskido's Candy Tsa Mandebele kids.mp4-.mp4" type="MP4 Video File (VLC) (.mp4)">

                  </video>
                  </div>
    
                  <div class="image-container img-four">
                    <img src="./images/maize.jpeg" />
                    
                  </div>
    
                  <div class="image-container img-five">
                    <img src="./images/mixed.jpeg"  />
                    
                  </div>
    
                  <div class="image-container img-six">
                    <img src="./images/students.jpg"  />
              
                  </div>
                </div>
              </div>
              </div>
              <footer>
              <p>&copy; Copyright Rwanda driving license . all rights reserved</p> 
        <p>Done By Ganza David in 2024</p>
              </footer>
</body>
</html>