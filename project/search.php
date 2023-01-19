<?php 

    require_once "connect.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Phone</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header>
        <div class="container">
            <div class="logo">
                <h1>PHONE</a></h1>
            </div>
        </div>
    </header>

    <section class="content">
        <div class="container">

            <h1>ผลการค้นหา : </h1>

                <?php
// edited code starts here

if (isset($_GET['search'])) {
    $search_value = $_REQUEST['value'];
    $selected_price = $_GET['selected_price'];

   /* switch ($selected_price) {
        case 1:
            $min_price = 0;
            $max_price = 5000;
            
        break;    
        case 2:
            $min_price = 5001;
            $max_price = 10000;
         
        break;    
        case 3:
            $min_price = 10001;
            $max_price = 15000;
        
        break;    
        case 4:
            $min_price = 15001;
            $max_price = 20000;
        
        break;   
        case 5:
            $min_price = 20001;
            $max_price = 999999;
            
        // additional cases as needed
    }
*/
/*
$options = [
    [0, 5000],
    [5001, 10000],
    [10001, 15000],
    [15001, 20000],
    [20001, 999999]
];

for ($i = 0; $i < count($options); $i++) {
    switch($i+1) {
        case $selected_price:
            $min_price = $options[$i][0];
            $max_price = $options[$i][1];
            
           // break 2;
    }
}

*/

$min_price = 0;
$max_price = 0;
$i = 1;
while ($i <= 5) {
    if ($selected_price == $i) {
        if ($i == 1) {
            $min_price = 0;
            $max_price = 5000;
        } else if ($i == 2) {
            $min_price = 5001;
            $max_price = 10000;
        } else if ($i == 3) {
            $min_price = 10001;
            $max_price = 15000;
        } else if ($i == 4) {
            $min_price = 15001;
            $max_price = 20000;
        } else if ($i == 5) {
            $min_price = 20001;
            $max_price = 999999;
        }
    //    break;
    }
    $i++;
}
    if ($selected_price ==""){
        $search_query = "SELECT * FROM Apple WHERE post_keywords LIKE '%$search_value%' 
                 UNION 
                 SELECT * FROM Samsung WHERE post_keywords LIKE '%$search_value%' 
                 UNION 
                 SELECT * FROM Oppo WHERE post_keywords LIKE '%$search_value%' ";
    }

    else if ($search_value) {
        $search_query = "SELECT * FROM Apple WHERE post_keywords LIKE '%$search_value%' AND post_price BETWEEN $min_price AND $max_price
                 UNION 
                 SELECT * FROM Samsung WHERE post_keywords LIKE '%$search_value%' AND post_price BETWEEN $min_price AND $max_price
                 UNION 
                 SELECT * FROM Oppo WHERE post_keywords LIKE '%$search_value%' AND post_price BETWEEN $min_price AND $max_price";
    } 
    
 /*   if ($search_value) {
        $search_query = "SELECT * FROM Apple WHERE post_keywords LIKE '%$search_value%' 
                 UNION 
                 SELECT * FROM Samsung WHERE post_keywords LIKE '%$search_value%' 
                 UNION 
                 SELECT * FROM Oppo WHERE post_keywords LIKE '%$search_value%' ";
    }
    
    */
    else {
        echo "<h3 style='margin-top:2rem; text-align: center; color:red;'>กรุณากรอกข้อมูล</h3>";
    }

    $run_query = mysqli_query($conn,$search_query);
                  
                                                
                    while ($search_row = mysqli_fetch_array($run_query)) {
                        
                        $post_id = $search_row['post_id'];
                        $post_price = $search_row['post_price'];
                        $post_date = date('y-m-d');
                        $post_title = $search_row['post_title'];
                        $post_image = $search_row['post_image'];
                        $post_url = substr($search_row['post_url'], 0, 150);
                    
            ?>

            <figure>
               <center> <h1><?php echo $post_title; ?></a></h1>
                <img width="500" height="400" src="img/<?php echo $post_image; ?>" alt=""></center>
               <figcaption>
                    <center><p>ราคา <strong><?php echo $post_price; ?> บาท</strong> </p></center>
                    <p></p>
                    
                    <a href="<?php echo $post_url; ?>"><strong><font size=3><center>คลิก</center></strong></a>
                </figcaption>
            </figure>

        <?php 
        
                }
            }        

        ?>


    </section>
    
</body>
</html>
<section class="breadcrumbs">
        <div class="breadcrumbs_title">
            
            <ul class="bread-list">
                <br>
                
                <li><a href="https://novem7246.github.io/projectphone.github.io/index.html"><center>กลับหน้าหลัก</center></a></li>
                <p><br></p>
            </ul>
        </div>
    </section>
