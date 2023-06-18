<?php
require_once('../function2.php');

?>
<!doctype html>
<html lang="en">

<head>
    <?= style(); ?>
</head>

<body data-layout="detached" data-topbar="colored">
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->
    <div class="container-fluid">
        <!-- Begin page -->
        <div id="layout-wrapper">
            <header id="page-topbar">
                <div class="navbar-header">
                    <?= headerbar(); ?>
                </div>
            </header> <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">
                <div class="h-100">
                    <div class="user-wid text-center py-4">
                        <div class="user-img">
                            <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-md mx-auto rounded-circle">
                        </div>
                        <div class="mt-3">
                            <a href="#" class="text-reset fw-medium font-size-16">Patrick Becker</a>
                            <p class="text-muted mt-1 mb-0 font-size-13">UI/UX Designer</p>
                        </div>
                    </div>
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <?= sidebar(); ?>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="page-title mb-0 font-size-18">Sliders </h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                        <li class="breadcrumb-item active">Form Repeater</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    product_namear title -->
            <?php 
   if(isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $proudct_namear = $_POST['proudct_namear'];
    $image = $_FILES['proudct_img']['name'];
    $image_temp = $_FILES['proudct_img']['tmp_name'];
    $detail = $_POST['detail'];
    $detailsar = $_POST['detailsar'];
    $price = $_POST['price'];
    $product_discount = $_POST['product_discount'];
    $subcat_id = $_POST['subcat_id'];

    move_uploaded_file($image_temp, "/images/$image");

    

// Closing brace for the if statement

     if($product_name == "" || empty($product_name)) {
  echo "this filed cant be empty" ;
    } else {
 $query = "INSERT INTO product(product_name, proudct_namear, proudct_img, detail, detailsar, price, product_discount, subcat_id) ";
$query .= "VALUES('$product_name', '$proudct_namear', '$image', '$detail', '$detailsar', '$price', '$product_discount', '$subcat_id')";

  
  $add_pro = mysqli_query($connection , $query) ;
 if(!$add_pro) {
   die('Query filed' . mysqli_error($connection) );
 }
}
}
 
    
    ?>
                    <div class="row"> 
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4"> Sliders</h4>
      <form action="" method="post" class="repeater" enctype="multipart/form-data">
<div data-repeater-list="group-a">
 <div data-repeater-item class="row">
         <div class="mb-3 col-lg-2">
     <label class="form-label" for="name">Name english </label>
    <input value=" " type="text" id="name" name="product_name" class="form-control" />  </div>
        <div class="mb-3 col-lg-2">
        <label class="form-label" for="email">Name arabic</label>
     <input value="" type="text" name="product_namear" id="email" class="form-control" /></div>
     <div class="mb-3 col-lg-2">
     <label class="form-label" for="subject">Price</label>
     <input value="" type="text" name="price" id="subject" class="form-control" /> </div>
    <div class="mb-3 col-lg-2">
     <label class="form-label" for="message">Detail english</label>
     <textarea value id="message" name="detail" class="form-control"></textarea>  </div>
                                                <div class="mb-3 col-lg-2">
 <label class="form-label" for="message">Detail arabic</label>
<textarea id="message" name="detailsar" class="form-control"></textarea>
                                                </div>
</div>
<div data-repeater-item class="row">
    <div class="mb-3 col-lg-2">
        <label class="form-label" for="name">Count</label>
        <input value="" type="text" id="name" name="count" class="form-control" /> </div>
    <div class="mb-3 col-lg-2">
        <label class="form-label" for="email">Hide</label>
        <input value="" type="text" name="hide" id="email" class="form-control" /></div>
    <div class="mb-3 col-lg-2">
        <label class="form-label" for="subject">Discount</label>
        <input value="" type="text" name="product_discount" id="subject" class="form-control" /> </div>
         <div class="mb-3 col-lg-2">
          <label class="form-label" for="resume">Image</label>
          <input value="" type="file" class="form-control-file" name="proudct_img" id="resume">
                                                </div>
                               <div class="form-group ">
                                                    <label for="name">Category</label>
                  <select name="cat_id" id="">
                                                        <?php
                    $qury = ("SELECT * FROM subcategory ");
                $cat_pr = mysqli_query($connection, $qury);
                while ($row = mysqli_fetch_assoc($cat_pr)) {
               $id = $row['sub_id'];
          $cat_name = $row['subcat_name'];                                     
             echo "<option value='{$id}'> $id _ {$cat_name}</option>";
                   }  ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
    <input data-repeater-create  class="btn btn-success mt-3 mt-lg-0" type="submit" value="Add" name="submit" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <!-- end row -->
                </div>
                <!-- End Page-content -->
                <footer class="footer">
                    <?= footer() ?>
                </footer>
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->
    </div>
    <!-- end container-fluid -->
    <!-- Right Sidebar -->
    
    <!-- /Right-bar -->
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    <!-- JAVASCRIPT -->
    <!-- JAVASCRIPT -->
    <=?scripts();?>
</body>

</html>