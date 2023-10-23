<?php
require_once('header.php');
include_once('connect.php');
$c = new Connect();
$dbLink = $c->connectToMySQL();
$spl ='SELECT * FROM product';
$re=$dbLink->query($spl);

if($re->num_rows>0){
?>
<div class="container">
    <div class="row">
      
        <?php
             while ($row=$re->fetch_assoc()){
        ?>
        <!--html div col-->
        <div class="col-4 ">
            <div class="card">       
                    <img src="image/<?=$row ['pimage']?>"
                    calss="card-img-top" alt="product" style="margin: auto; width: 300px;"
                    >
                    <div class="card-body">
                    <a href="detail.php?id=<?=$row ['pid']?> "class="text-decoration-none"><h5 class="card-title"><?=$row['pname']?></h5></a>
                   
            
              <h6 class="card-subtitle mb-2 text-muted"><span></span> <?=$row['pprice']?></h6>

                </div>  
            </div>
        </div>
    <?php
   // while
             }
            }
   //if
    ?>

    </div>
</div>
<h2>All product</h2>
<?
require_once('footer.php')
?>