<?php 

    require_once "connect.php";

    if (isset($_GET['del'])) {
        $delete_id = $_GET['del'];
        
        $delete_query = "DELETE FROM Samsung WHERE post_id = '$delete_id'";

      
        
        if (mysqli_query($conn, $delete_query)) {
            echo "<script>alert('Post Has been Deleted')</script>";
           // header("location: Samsung.php");
           echo "<script>window.open('https://unacademic-night.000webhostapp.com/admin/index.php', '_self')</script>";
        }
    }
    
       

?>