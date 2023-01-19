<?php 

        session_start();

        require_once "connect.php";

        if (!isset($_SESSION['username'])) {
            header("location: login.php");
        }

        if (isset($_POST['submit'])) {  
        $post_title = $_POST['title'];
        $post_date = date('y-m-d');
        $post_price = $_POST['price'];
        $post_keywords = $_POST['keywords'];
        $post_url = $_POST['url'];
        $post_image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_tmp, "../img/$post_image");

        $insert_query = "INSERT INTO Samsung (post_title, post_date, post_price, post_image, post_keywords, post_url) 
                        VALUES ('$post_title','$post_date','$post_price','$post_image','$post_keywords','$post_url')";
    
        if (mysqli_query($conn, $insert_query)) {
            echo "<script>alert('Post published successfully');</script>";
            echo "<script>window.open('https://unacademic-night.000webhostapp.com/admin/index.php', '_self')</script>";
        }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert Samsung</title>
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
                <h3><a href="https://unacademic-night.000webhostapp.com/admin/index.php">Home</a></h3>
        
                <h3><a href="https://unacademic-night.000webhostapp.com/admin/logout.php">Log out</a></h3>
            </div>
            <div class="showinfo">
                <h1>Insert Post</h1>

                <form method="post" action="insert_samsung.php" enctype="multipart/form-data">

                <table width="100%" align="center" border="1">
                    
                    <tr>
                        <td align="center" colspan="6">
                        <h1>เพิ่มข้อมูล Samsung</h1>
                    </tr>
                    
                    <tr>
                        <td align="right">ชื่อ:</td>
                        <td><input type="text" name="title" size="50"></td>
                    </tr>
                    
                    <tr>
                        <td align="right">ราคา :</td>
                        <td><input type="text" name="price" size="50"></td>
                    </tr>
                    
                    <tr>
                        <td align="right">Post Keywords:</td>
                        <td><input type="text" name="keywords" size="50"></td>
                    </tr>
                    
                    <tr>
                        <td align="right">Post Image:</td>
                        <td><input type="file" name="image"></td>
                    </tr>
                    
                    <tr>
                        <td align="right">Post Url:</td>
                        <td><textarea name="url" cols="50" rows="15"></textarea></td>
                    </tr>
                    
                    <tr>
                        <td align="center" colspan="6"><input type="submit" name="submit" value="Publish Now"></td>
                    </tr>

                </table>
                <div class="sidebar">
                
             
             
            </div>
            </form>

            </div>
        </div>
    </section>

</body>
</html>

