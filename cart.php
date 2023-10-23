<?php
include_once("header.php");
include_once("connect.php");
$c = new connect();
$dbLink = $c->connectTOPDO();
if (isset($_SESSION['user_name'])){ //check if user logged into wensite
    $user =$_SESSION['user_name'];
    
    if (isset($_GET['pid'])){ //when user add an item to shopping cart
        $p_id =$_GET['pid'];
        $splSelect1 = "SELECT pid FROM cart WHERE user_id=? AND pid=?";
        $re = $dbLink->prepare($splSelect1);
        $re->execute(array("$user", "$p_id"));

        //check if the item has been added 
        if($re->rowCount() == 0) {// the item could not be found in user's cart
         $query = "INSERT INTO `cart`(`user_id`, `pid`, `pCount`, `data`) VALUES(?, ?, 1, CURDATE())";
        } else{ //add  by user
           $query = "UPDATE cart SET pCount = pCount + 1 where user_id=? and pid=?";
        }
        $stmt = $dbLink->prepare($query);
        $stmt->execute(array("$user", "$p_id"));

    }else if (isset($_GET['del_id'])) { //when user want to delete an item to shopping cart 9
       $cart_del =$_GET['del_id'];
       $query = "DELETE FROM cart WHERE cart_id=?";
       $stmt = $dbLink->prepare($query);
       $stmt ->execute(array($cart_del));

    }
    //show a list  of  shopping cary
    $splSelect  ="SELECT * FROM cart c, product p WHERE c.pid  = p.pid and user_id=?";
    $stmt1 = $dbLink->prepare($splSelect);
    $stmt1 ->execute(array($user));
    $rows = $stmt1->fetchAll(PDO:: FETCH_BOTH);

}else {
    header("Loction: login.php");
}
?>
<div class="container">
    <h1 class="fw-bold mb-0 text-black" >Shopping cart</h1>
    <h6 class="mb-0 text-muted"><?=$stmt1->rowCount()?>item(s)</h6>
    <table class="table">
        <tr>
            <th>Productname</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>

        </tr>
        <?php
        foreach($rows as $row){
            ?>
            <tr>
                <td><?=$row['pname']?></td>
                <td> <input id="form1" min="0" name="quantity" value="<?=$row['pCount']?>" type="number" class="form-control form-control-sm"></td>
                <td><h6 class="mb-0"><span>&#8363;</span> <?=$row['pCount']?> * <?=$row['pprice'] ?> </h6></td>
                <td><a href="cart.php? del_id<?=$row['pCount']?>" class="text-muted text-decoration-none">x</a></td>
            </tr>
        <?php  
        }
        ?>
        <hr class="my-4">

        <div class="pt-5">
            <h6 class="mb-0"><a href="home.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>

        </div>
    </table>
</div>
