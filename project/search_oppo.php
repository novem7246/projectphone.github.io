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
                <h1>OPPO</a></h1>
            </div>
        </div>
    </header>

    <section class="content">
        <div class="container">

            <h1>ผลการค้นหา : </h1>

            <?php { 
                
                
                if (isset($_GET['search'])) {
                    $search_value = $_REQUEST['value'];
                  
                }
                

                IF  ($search_value) {$search_query = "SELECT * FROM Oppo WHERE post_keywords LIKE '%$search_value%'";
    
                }
                
         
                        
                 ELSE {
    
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
