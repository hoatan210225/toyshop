<?php
require_once('header.php');
include_once('connect.php');
$c = new Connect();
$blink = $c->ConnectToMySQL();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['Id'];
    $product_name = $_POST['ProductName'];
    $price = $_POST['Price'];
    $quantity = $_POST['Quantity'];
    $date = $_POST['Date'];
    $employ_id = $_POST['employeeID'];
    $supplier_id = $_POST['supplierID'];
    $image = $_POST['img'];
  
    $sql = "UPDATE product SET 
            Id = '$product_id',
            ProductName = '$product_name',
            Price = '$price',
            Quantity = '$quantity',
            Date = '$date',
            Employee_Id = '$employ_id',
            Supplier_Id= '$supplier_id',
            image = '$image' 

            WHERE Id = $product_id";

    if ($blink->query($sql) === true) {
        echo "Edit Successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $blink->error;
    }
}

$product_id = $_GET['id'];
$sql = "SELECT * FROM product WHERE Id = $product_id";
$result = $blink->query($sql);
$row = $result->fetch_assoc();

?>

<div class="container">
    <h2>Product Update</h2>

    <form class="form form-vertical" method="POST" action="#" enctype="multipart/form-data">
            
            
            <div class="row mb-3">
                <div class="col-12">
                    <label for="storeID" class="col-sm-2">Store ID</label>
                    <div class="col-sm-10">
                        <input id="productId" type="text" name="Id" class="form-control" value="<?= $row['Id'] ?>" required>
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-12">
                    <label for="proName" class="col-sm-2">Product Name</label>
                    <div class="col-sm-10">
                        <input id="pname" type="text" name="ProductName" class="form-control" value="<?= $row['ProductName'] ?>" required>
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-12">
                    <label for="price" class="col-sm-2">Price</label>
                    <div class="col-sm-10">
                        <input id="pprice" type="text" name="Price" class="form-control" value="<?= $row['Price'] ?>" required>
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-12">
                    <label for="quantity" class="col-sm-2">Quantity</label>
                    <div class="col-sm-10">
                        <input id="pquan" type="text" name="Quantity" class="form-control" value="<?= $row['Quantity'] ?>" required>
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-12">
                <label for="proDate" class="col-sm-2">Product Date</label>
                    <div class="col-sm-10">
                        <input id="date" type="text" name="Date" class="form-control" value="<?= $row['Date'] ?>" required>
                    </div>
                </div>
            </div>

         
            
            <div class="row mb-3">
                <div class="col-12">
                    <label for="employee" class="col-sm-2">EmployeeID</label>
                    <div class="col-sm-10">
                        <input id="employeeid" type="text" name="employeeID" class="form-control" value="<?= $row['Employee_Id'] ?>" required>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <label for="supID" class="col-sm-2">SupplierID</label>
                    <div class="col-sm-10">
                        <input id="supplierID" type="text" name="supplierID" class="form-control" value="<?= $row['Supplier_Id'] ?>" required>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <label for="image" class="col-sm-2">Image</label>
                    <div class="col-sm-10">
               <input id="image" type="text" name="img" class="form-control" value="<?= $row['image'] ?>" required>
                    </div>
                </div>
            </div>



            <div class="row mb-3">
                <div class="col-2 ms-auto row">
                    <div class="col-6 d-grid mx-auto">
                        <button type="submit" name="UPDATE" class="btn btn-warning">Edit</button>
                    </div>
                </div>
            </div>

        </form>
    </div>


<?php
require_once('footer.php');
?>