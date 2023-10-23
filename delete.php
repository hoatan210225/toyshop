<?php
require_once('header.php');
include_once('connect.php');
$c = new connect();
$blink = $c->connectToMySQL();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['Id'];
    
    $sql = "DELETE FROM product WHERE Id = $product_id";

    if ($blink->query($sql) === true) {
        echo "Delete product successfully.";
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . $blink->error;
    }
}

$product_id = $_GET['Id'];
$sql = "SELECT * FROM product WHERE Id = $product_id";
$result = $blink->query($sql);
$row = $result->fetch_assoc();

?>


<div class="container">
    <h2>Product Delete</h2>

    <form class="form form-vertical" method="POST" action="#" enctype="multipart/form-data">
            
            
            <div class="row mb-3">
                <div class="col-12">
                    <label for="storeID" class="col-sm-2">Product ID </label>
                    <div class="col-sm-10">
                        <input id="productID" type="text" name="Id" class="form-control" value="<?= $row['Id'] ?>" require>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <label for="storeID" class="col-sm-2">StoreID </label>
                    <div class="col-sm-10">
                        <input id="productID" type="text" name="StoreID" class="form-control" value="<?= $row['Store_ID'] ?>" require>
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-12">
                    <label for="proName" class="col-sm-2">Product Name</label>
                    <div class="col-sm-10">
                        <input id="pname" type="text" name="productname" class="form-control" value="<?= $row['ProductName'] ?>" require>
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-12">
                    <label for="price" class="col-sm-2">Price</label>
                    <div class="col-sm-10">
                        <input id="pprice" type="text" name="price" class="form-control" value="<?= $row['Price'] ?>" require>
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-12">
                    <label for="quantity" class="col-sm-2">Quantity</label>
                    <div class="col-sm-10">
                        <input id="pquan" type="text" name="quantity" class="form-control" value="<?= $row['Quantity'] ?>" require>
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-12">
                    <label for="proDate" class="col-sm-2">Product Date</label>
                    <div class="col-sm-10">
                        <input id="date" type="text" name="date" class="form-control" value="<?= $row['Date'] ?>" require>
                    </div>
                </div>
            </div>

         
            
            <div class="row mb-3">
                <div class="col-12">
                    <label for="employee" class="col-sm-2">EmployeeID</label>
                    <div class="col-sm-10">
                    <input id="employeeid" type="number" name="employeeid" class="form-control" value="<?= $row['Employee_Id'] ?>" require>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <label for="supID" class="col-sm-2">SupplierID</label>
                    <div class="col-sm-10">
                        <input id="supplierID" type="number" name="supplierID" class="form-control" value="<?= $row['Supplier_Id'] ?>" require>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <label for="image" class="col-sm-2">Image</label>
                    <div class="col-sm-10">
<input id="image" type="text" name="image" class="form-control" value="<?= $row['image'] ?>" require>
                    </div>
                </div>
            </div> 


            <div class="row mb-3">
                <div class="col-2 ms-auto row">
                    <div class="col-6 d-grid mx-auto">
                        <button type="submit" name="DELETE" class="btn btn-primary">Delete</button>
                    </div>
                </div>
            </div>

        </form>
    </div>



<?php
require_once('footer.php');
?>

<button type="button" class="btn btn-primary">Primary</button>