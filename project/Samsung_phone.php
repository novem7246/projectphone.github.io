<?php 

    require_once "connect.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Samsung</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    

    <header>
        <div class="container">
            <div class="logo">
                <h1><a href=>Samsung</a></h1>
            </div>

            <form action="search_samsung.php" method="get" enctype="multipart/form-data">
                <input type="text" name="value" placeholder="ป้อนข้อมูล" size="25">
                <input type="submit" name="search" value="Search">
            </form>
            
        </div>
    </header>

    <section class="content">
        <div class="container">
          


            <?php 

                $select_posts = "SELECT * FROM Samsung";

                $run_posts = mysqli_query($conn, $select_posts);

                while ($row = mysqli_fetch_array($run_posts)) {

                    $post_id = $row['post_id'];
                    $post_date = $row['post_date'];
                    $post_price = $row['post_price'];
                    $post_title = $row['post_title'];
                    $post_image = $row['post_image'];
                    $post_url = substr($row['post_url'], 0 , 300);
                    
            ?>

           <figure>
               <center> <h1><?php echo $post_title; ?></a></h1>
                <img width="500" height="400" src="img/<?php echo $post_image; ?>" alt=""></center>
               <figcaption>
                    <center><p>ราคา <strong><?php echo $post_price; ?></strong> บาท </p></center>
                    <p></p>
                    
                    <a href="<?php echo $post_url; ?>"><strong><font size=3><center>คลิก</center></strong></a>
                </figcaption>
            </figure>

            <?php } ?>
        </div>
    </section>

</body>
</html>