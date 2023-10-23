<?php
require_once('header.php');
require_once('connect.php');

if (isset($_POST['btnLogin'])){
    if(isset($_POST['user']) &&isset($_POST['pass'])){
       
        $user = $_POST['user'];
        $pass = $_POST ['pass'];
        // echo $user;
        $c = new connect();
        $dbLink = $c->connectTOPDO();
        $spl = "SELECT * FROM customer WHERE Name = ? and pass =?";
        $stmt = $dbLink->prepare($spl);
        $re = $stmt->execute (array ("$user", "$pass"));
        $numrow = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_BOTH);
        if ($numrow==1){
            echo "Login successfully";
            $_SESSION['user_name'] =$row ['Name'];
            header("Location: Index.php");
        }else{
            echo"Something wrong with your info<br>";

        }

    }else{
        echo"Please enter your information";
    }
}
?>

<div class="d-md-flex half">
    <div class="bg"></div>
</div>
<div class="container">
            <form action="#" class="form form-vertical" name="formlogin" role="form" method="POST" enctype="multipart/form-data"> 
                <div class="row mb-3 ">
                    <div class="col-sm-4 mx-auto">
                        <div class="form-group">
                         <label for="name" class="col-sm-2"> customername</label>
                         <input id="name" type="name" name="user" class="form-control" placeholder="name">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 mx-auto">
                        <div class="form-group">
                         <label for="pass" class="col-sm-2"> Password</label>
                         <input id="pass" type="password" name="pass" class="form-control" placeholder="password">
                        </div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-4 mx-auto">
                        <div class="form-group">
                            <label for="remember me " class="col-sm-3">Remember me</label>
                            <input type="checkbox" name="rmbme" id="rmb" checked="checked">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 mx-auto">
                        <div class="form-group">
                        <a href="#" class="col-sm-3">Forget password?</a>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-1 mx-auto">
                        <div class="form-group">
                           <input type="submit" value="Log In" class="btn btn-info" name="btnLogin">
                        </div>
                    </div>
                </div>
            </form>
</div>
<?php
require_once('footer.php');
?>