<?php 

    require_once "connect.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header>
        <div class="container">
            <div class="logo">
                <h1><a href="index.php">MilerCMS</a></h1>
            </div>
        </div>
    </header>

    <section class="content">
        <div class="container">

            <h1>Search Result : </h1>

            <?php 

                if (isset($_GET['search'])) {
                    $search_value = $_REQUEST['value'];
                } 

                if (empty($search_value)) {
                    echo "<h3 style='margin-top:2rem; text-align: center; color:red;'>Oops!!, can not find any data type someting</h3>";
                } else {
                    $search_query = "SELECT * FROM posts WHERE post_keywords LIKE '%$search_value%'";

                    $run_query = mysqli_query($conn, $search_query);

                    while ($search_row = mysqli_fetch_array($run_query)) {
                        
                        $post_id = $search_row['post_id'];
                        $post_author = $search_row['post_author'];
                        $post_date = date('y-m-d');
                        $post_title = $search_row['post_title'];
                        $post_image = $search_row['post_image'];
                        $post_content = substr($search_row['post_content'], 0, 150);
                    
            ?>

            <figure>
                <h1><a href="pages.php?id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></h1>
                <img width="900" height="2000" src="img/<?php echo $post_image; ?>" alt="">
                <figcaption>
                    <p>Posted By <strong><?php echo $post_author; ?></strong> | Published on <strong><?php echo $post_date; ?></strong></p>
                    <p><?php echo $post_content; ?></p>
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
            <h2 class="hidden">test</h2>
            <ul class="bread-list">
                <li><a href="index.html">หน้าแรก <i class="fas fa-angle-right"></i></a></li>
                <li><a href="index.html">บริการของเรา</a></li>
            </ul>
        </div>
    </section>
