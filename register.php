
<?php
require_once('header.php');
?>
<?php
require_once('header.php');
require_once('connect.php');
if (isset($_POST['btnRegister'])){
    $c = new connect();
    $dbLink = $c->connectTOPDO();
    $Name =$_POST['Name'];
    $phone =$_POST['Phone'];
    $pass =$_POST['pass'];
    $email = $_POST['email'];
    
   

    $spl ="INSERT INTO `customer`( `Name`, `Phone`, `pass`, `email`) VALUES(?,?,?,?)";
    $re = $dbLink->prepare($spl);
    $valueArray = [  "$Name", "$phone","$pass", "$email"];
    $stmt = $re->execute($valueArray);
    if ($stmt){
        echo "Register Successfully";
    }else{
        echo "Failed";
    }
}
?>
   <div class="container">
        <h2>Member Reistration</h2>
        <form id="formreg" class="formreg" name="formreg" role="form" method="POST">

            <div class="row mb-3">
                <label for="Name" class="col-sm-2">Customer name :</label>
                <div class="col-sm-10">
                    <input id="Name" type="text" name="Name" class="form-control" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label for="pass" class="col-sm-2">Password:</label>
                <div class="col-sm-10">
                    <input id="pass" type="password" name="pass" class="form-control" value="">
                </div>  
            </div>

            

            <div class="row mb-3">
                <label for="phone" class="col-sm-2">Phone:</label>
                <div class="col-sm-10">
                    <input id="phone" type="text" name=" Phone" class="form-control" value="">
                </div>
            </div>
              
            <div class="row mb-3">
                <label for="email" class="col-sm-2">Email:</label>
                <div class="col-sm-10">
                    <input id="email" type="text" name="email" class="form-control" value="">
                </div>
            </div>
            <div class="row mb-3">
                <!--<div class="col-sm-10 ms-auto">-->
                <div class="d-grid col-2 mx-auto">
                    <input type="submit" name="btnRegister" value="Register" class="btn btn-primary">
                </div>
            </div>

        </form>
    </div>


    <?php
    require_once('footer.php');
    ?>



