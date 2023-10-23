<?php
require_once('header.php');
?>
<div class= "container px-4 py-5">
       <?php
       if (isset ($_GET['id'])):
        $pid = $_GET['id'];
        require_once('connect.php');
        $conn = new connect();
        $dbLink = $conn->connectTOPDO();
        $sql ="select * from product where pid =?";
        $stmt = $dbLink->prepare($sql);
        $stmt->execute(array($pid));
        $re =$stmt->fetch(PDO::FETCH_BOTH);
       ?>  
         <h2><?=$re['pname']?></h2>
            <ul styple="list-type: none; " class="list-gruop"> 
               Price: <li class="list-group-item"><?=$re['pprice']?> </li>
               Quantity: <li class="list-group-item"><?=$re['pquan']?></li>
               Description: <li class="list-group-item"><?=$re['pdesc']?></li>
            </ul>
            <form action="cart.php" method="GET">
               <div class="col-lg-9">
                  <input type="hidden" name="pid" value="<?=$pid?>">
                  <input type="submit" class="btn btn-primary shop-button" name="btnAdd" value="Add to cart">
            </form>
         <?php
         else: 
            ?>
            <h2> Nothing to show</h2>
         <?php
          endif;
           ?>

</div>
