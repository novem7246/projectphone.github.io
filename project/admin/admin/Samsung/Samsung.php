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
           <center> <h1>Samsung</h1></center>
        </div>
    </header>

    <section class="content">
        <div class="content__grid">
         
            <div class="showinfo">
               

                <center>       <table border="1">
                    
                    <tr>
                        <th>Post No</th>
                        <th>Post Date</th>
                        <th>Post Price</th>
                        <th>Post Title</th>
                        <th>Post Post image</th>
                        <th>Post Url</th>
                        <th>Delete Post</th>
                        <th>Edit Post</th>
                    </tr>

                    <?php 
                    
                        $select_post = "SELECT * FROM Samsung order by 1 DESC";

                        $query_post = mysqli_query($conn, $select_post);

                        while ($row = mysqli_fetch_array($query_post)) {
                            $post_id = $row['post_id'];
                            $post_date = $row['post_date'];
                            $post_price = $row['post_price'];
                            $post_title = $row['post_title'];
                            $post_image = $row['post_image'];
                            $post_url = substr($row['post_url'], 0 , 100);
                    ?>

                    <tr>
                        <td><?php echo $post_id; ?></td>
                        <td><?php echo $post_date; ?></td>
                        <td><?php echo $post_price; ?></td>
                        <td><?php echo $post_title; ?></td>
                        <td><img width="80" height="80" src="../img/<?php echo $post_image; ?>"></td>
                        <td><?php echo $post_url; ?></td>
                        <td><a href="delete_samsung.php?del=<?php echo $post_id; ?>">Delete</a></td>
                        <td><a href="edit_samsung.php?edit=<?php echo $post_id; ?>">Edit</a></td>
                    </tr>


                    <?php } ?>
                </table></center>

            </div>
        </div>
    </section>

</body>
</html>