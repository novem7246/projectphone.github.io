<?php 

    require_once "connect.php";

    session_start();

    if (!isset($_SESSION['username'])) {
        header("location: login.php");
    } else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Post</title>
    <link rel="stylesheet" href="css/adminstyle.css">
</head>
<body>
    
    <header>
        <div class="container">
            <h1>Welcome to Admin Page Mr. <?php echo $_SESSION['username']; ?> </h1>
        </div>
    </header>

    <section class="content">
        <div class="content__grid">
            <div class="sidebar">
                <h1>Welcome : </h1>
                <h3><a href="index.php">Home</a></h3>
                <h3><a href="view_posts.php">View Posts</a></h3>
                <h3><a href="insert_post.php">Insert Post</a></h3>
                <h3><a href="logout.php">Log out</a></h3>
            </div>
            <div class="showinfo">
                <h1>View All Post</h1>

                <table border="1">
                    <tr>
                        <th>Post No</th>
                        <th>Post Date</th>
                        <th>Post Author</th>
                        <th>Post Title</th>
                        <th>Post Post image</th>
                        <th>Post Content</th>
                        <th>Delete Post</th>
                        <th>Edit Post</th>
                    </tr>

                    <?php 
                    
                        $select_post = "SELECT * FROM posts order by 1 DESC";

                        $query_post = mysqli_query($conn, $select_post);

                        while ($row = mysqli_fetch_array($query_post)) {
                            $post_id = $row['post_id'];
                            $post_date = $row['post_date'];
                            $post_author = $row['post_author'];
                            $post_title = $row['post_title'];
                            $post_image = $row['post_image'];
                            $post_content = substr($row['post_content'], 0 , 100);
                    ?>

                    <tr>
                        <td><?php echo $post_id; ?></td>
                        <td><?php echo $post_date; ?></td>
                        <td><?php echo $post_author; ?></td>
                        <td><?php echo $post_title; ?></td>
                        <td><img width="80" height="80" src="../img/<?php echo $post_image; ?>"></td>
                        <td><?php echo $post_content; ?></td>
                        <td><a href="delete.php?del=<?php echo $post_id; ?>">Delete</a></td>
                        <td><a href="edit_posts.php?edit=<?php echo $post_id; ?>">Edit</a></td>
                    </tr>


                    <?php } ?>
                </table>

            </div>
        </div>
    </section>

</body>
</html>

<?php } ?>