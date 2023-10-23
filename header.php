<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <title>C$Z shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <img src="img/logo.png" width="50px">
            <a href="Index.php" class="navbar-brand">Home</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navsupo">
                <span class=" navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navsupo">
                <!--left-->
             <div class="navbar-nav">
                <a href="cart.php" class="nav-link"> Cart</a>
                <div class="dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
                    <div class="dropdown-menu">
                       <a href="search.php"
                         class="dropdown-item">Search</a>
                          <a href="#"
                         class="dropdown-item">Toys</a>
                         <a href="productadd.php"
                         class=" dropdown-item">ADD</a> 
                        
                    </div>
                </div>
             </div>
             <!--right-->
             <div class="navbar-nav ms-auto">
                <?php 
                session_start();
                if (isset($_SESSION['user_name'])):
                ?>
                <a href="login.php" class="nav-item nav-link">Welcome,<?=$_SESSION['user_name']?> </a>
                <a href="logout.php" class="nav-item nav-link">logout</a>
                <?php
                else:
                ?>

                <a href="login.php" class="nav-link"> login </a>
                <a href="register.php" class="nav-link"> register</a>
                <?php
                endif;
                ?>
             </div>
            </div>
    </nav>
    
        <section class="py-5 text-center container"
            style="background-image:url ('https://thegioingoaingu.com/pic/New/pic-News-_636283624482057157.JPG'); height: 600px;">
        <div class="row py-ly-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light"> Zen Toys Store</h1>
                <p class="lead text-muted">A plaything or toy is an object employed for amusement, particularly a toy conceived for utilization. 
                    Engaging with playthings can be a pleasurable method of instructing young children about existence in a community. 
                    Assorted substances such as timber, clay, paper, and plastic are utilized to fabricate playthings. Numerous items are devised to serve as playthings,
                    but commodities manufactured for alternative intentions can also be employed. For instance, a tiny child can fold a standard sheet of paper into the form of an aircraft and "pilot" it. More contemporary variations of playthings encompass interactive digital amusement. 
                </p>
            </div>
        </div>
    </section>
     
</body>
</html>
