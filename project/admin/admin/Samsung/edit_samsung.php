<?php 
session_start();
include "connect.php";

if(isset($_GET['edit'])){
    $edit_id = $_GET['edit'];
    $select_query = "SELECT * FROM Samsung WHERE post_id = '$edit_id'";
    $select_result = mysqli_query($conn, $select_query);
    while($row = mysqli_fetch_array($select_result)){
        $post_title = $row['post_title'];
        $post_price = $row['post_price'];
        $post_image = $row['post_image'];
        $post_keywords = $row['post_keywords'];
        $post_url = $row['post_url'];
    }
}

if(isset($_POST['update'])){
    $update_id = $_POST['update_id'];
    $post_title = $_POST['post_title'];
    $post_price = $_POST['post_price'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_tmp = $_FILES['post_image']['tmp_name'];
    move_uploaded_file($post_image_tmp, "images/$post_image");
    $post_keywords = $_POST['post_keywords'];
    $post_url = $_POST['post_url'];

    $update_query = "UPDATE Samsung SET post_title = '$post_title', post_price = '$post_price',
                            post_image = '$post_image', post_keywords = '$post_keywords', post_url = '$post_url' WHERE post_id = '$update_id'";
    $update_result = mysqli_query($conn, $update_query);
    if($update_result){
        echo "<script>alert('Data Updated Successfully')</script>";
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
    <title>Update Samsung</title>
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
                <h1>Edit Post</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <table align="center" width="700" border="2">
            <tr>
                <td colspan="7" align="center"><h2>แก้ไขข้อมูล Samsung</h2></td>
            </tr>
            <tr>
                <td align="right">Post Title:</td>
                <td><input type="text" name="post_title" value="<?php echo $post_title; ?>"></td>
            </tr>
            <tr>
                <td align="right">Post Price:</td>
<td><input type="text" name="post_price" value="<?php echo $post_price; ?>"></td>
</tr>
<tr>
<td align="right">Post Image:</td>
<td><input type="file" name="post_image"></td>
</tr>
<tr>
<td align="right">Post Keywords:</td>
<td><input type="text" name="post_keywords" value="<?php echo $post_keywords; ?>"></td>
</tr>
<tr>
<td align="right">Post URL:</td>
<td><input type="text" name="post_url" value="<?php echo $post_url; ?>"></td>
</tr>
<tr>
<td align="center" colspan="7"><input type="submit" name="update" value="Update"></td>
<input type="hidden" name="update_id" value="<?php echo $edit_id; ?>">
</tr>
</table>
</form>

</body>
</html>