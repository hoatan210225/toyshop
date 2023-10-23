<?php
require_once('header.php');
include_once('connect.php');
?>

<div class="container">
        <div class="row d-flex justify-content-center align-items-center p-3">
            <div class="col-md-8">

                <div class="search">
                <form class="example1" action="search.php">     
                    <input type="text" class="form-control" placeholder="Search..."  name="search">
                    <button class="btn btn-primary" name="btnSearch">Search</button>
                </form>  
                </div>
            </div>
        </div>
     <h2>Result for</h2>    
    <div class="row">
            <?php
            $c = new connect();
            $dbLink = $c ->connectTOPDO();
            $nameP = $_GET['search'];
            if(isset($_GET['search'])){
                $nameP =$_GET['search'];
    
            }else{
                $nameP ="";
            }
            $sql ="SELECT * FROM product WHERE ProductName LIKE ?";
            $re =$dbLink->prepare($sql);
            $valueArray = ["%$nameP%"];
            $re->execute($valueArray);
            $rows = $re->fetchAll(PDO::FETCH_BOTH);
            foreach($rows as $row):

            ?>
            <div class="col-4 ">
            <div class="card">       
                    <img src="image/<?=$row ['image']?>"
                    calss="card-img-top" alt="product" style="margin: auto; width: 300px;"
                    >
                    <div class="card-body">
                    <a href="detail.php?id=<?=$row ['id']?> "class="text-decoration-none"><h5 class="card-title"><?=$row['ProductName']?></h5></a>
                    
                    
                   
            
              <h6 class="card-subtitle mb-2 text-muted"><span></span> <?=$row['Price']?></h6>

                </div>  
            </div>
        </div>
            <?php
               endforeach;
            ?>
            
    
           
</div>
<?
require_once('footer.php');
?>
