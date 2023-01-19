<?php 

        session_start();

        require_once "connect.php";

        

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert Post</title>
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
      
                <h3><a href="logout.php">Log out</a></h3>
            </div>
            <div class="showinfo">
               <center> <h1>Insert Post</h1></center>
                <div class="sidebar">
                
                <h3><a href="Iphone/insert_apple.php">Apple</a></h3>
                 <h3><a href="Samsung/insert_samsung.php">Samsung</a></h3>
                 <h3><a href="Oppo/insert_oppo.php">Oppo</a></h3>
            
                     </div>
           

             
            </form>

            </div>
        </div>
    </section>

</body>
</html>

