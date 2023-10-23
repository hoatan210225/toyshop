<?php
require_once('header.php');
require_once('connect.php');
if (isset($_POST['Add'])){
    $c = new connect();
    $dbLink = $c->connectTOPDO();

    //
    
    $storeID =$_POST['storeID'];
    $name =$_POST['pname'];
    $price =$_POST['price'];
    $quantity = $_POST['quantity'];
    $Date ='2023-04-14';
    $type =$_POST['type'];
    $employeeID =$_POST['employeeID'];
    $supplierID =$_POST['supplierID'];

    

    $img = str_replace(' ','-',$_FILES['Pro_image'] ['name']);
    //auto upload
    $imgdir = './image/';
    $flag = move_uploaded_file(
        $_FILES['Pro_image'] ['tmp_name'], 
        $imgdir.$img //creat treet to
    );
  if ($flag) {
    $spl = " INSERT INTO `product`( `Store_ID`, `ProductName`, `Price`, `Quantity`, `Date`, `Type`, `Employee_Id`, `Supplier_Id`, `image`) VALUES(?,?,?,?,?,?,?,?,?)";
    $re = $dbLink->prepare($spl);
    $v = [$storeID, $name, $price, $quantity, $Date, $type, $employeeID, $supplierID ,$img ];

    $stmt = $re->execute($v);
       if ($stmt){
        echo "Congrats";
       }
        
    }else{
        echo "Failed";
    }


}
?>
<div class="container">
 <form class="form form-vertical" method="POST" action="#" enctype="multipart/form-data">
    <h2>Product Manage</h2>
    <div class="row-mb-3">
        <!-- add-->
      
        <div class="row mb-3">
                <label for="storeID" class="col-12">Store_id </label>
                <div class="col-12">
                    <input id="storeID" type="text" name="storeID" pclass="form-control" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label for="productName" class="col-12">Product Name</label>
                <div class="col-12">
                    <input id="productName" type="text" name="pname" class="form-control" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label for="price" class="col-12">Price</label>
                <div class="col-12">
                    <input id="price" type="price" name="price" class="form-control" value="">
                </div>  
            </div>
            
            <div class="row mb-3">
                <label for="productDes" class="col-12">Quantity</label>
                <div class="col-12">
                    <input id="productDes" type="text" name="quantity" class="form-control" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label for="productdate" class="col-12">Product Date</label>
                <div class="col-12">
                    <input id="productdate" type="date" name="date" class="form-control" value="">
                </div>  
            </div>

            <div class="row mb-3">
                <label for="quantity" class="col-12">Type</label>
                <div class="col-12">
                    <input id="quantity" type="number" name="type" class="form-control" value="">
                </div>  
            </div>
        <div class="row mb-3">
                <label for="employeeID" class="col-12">employeeID</label>
                <div class="col-12">
                    <input id="employeeID" type="number" name="employeeID" class="form-control" value="">
                </div>
        </div>   
        <div class="row mb-3">
                <label for="supplierID" class="col-12">SupplierID</label>
                <div class="col-12">
                    <input id="supplierID" type="number" name="supplierID" class="form-control" value="">
                </div>
        </div>  
        <div class="col-12">
           <div class="form-group">
            <label for="image-vertical">Image</label>
            <input type="file" name="Pro_image" id="Pro_image" class="form-control" value="">
           </div>
        </div>
        

         <!-- button-->
         <div class="row mb-3">
                <div class="col-2 ms-auto row">
                    <div class="col-6 d-grid mx-auto">
                        <button type="submit" name="Add" class="btn btn-warning">Submit</button>
                    </div>
                    <div class="col-6 d-grid mx-auto">
                        <button type="reset" name="btnReset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
            </div>
 </form>
</div>
<?php
require_once('footer.php');
?>