<?php
require_once('function2.php');

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
                    <?=user();?>
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
                                <h4 class="page-title mb-0 font-size-18">Form Repeater</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                        <li class="breadcrumb-item active">Form Repeater</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                     title -->
                 <?php
if (isset($_GET['p_id'])) {
    $the_pro_id = $_GET['p_id'];
    $query = "SELECT * FROM product WHERE product_id = $the_pro_id";
    $editpro = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($editpro)) {
        $pro_name = $row['product_name'];
        $pro_namear = $row['proudct_namear'];
        $pro_detail = $row['detail'];
        $pro_detailsar = $row['details_ar'];
        $pro_date = $row['date'];
        $pro_hide = $row['hide'];
        $pro_discount = $row['product_discount'];
        $pro_count = $row['count'];

        $pro_id = $row['product_id'];
        $pro_price = $row['price'];
        
    }
}
?>

<div class="row">
    <?php
    if (isset($_POST['Update'])) {
        $product_name = $_POST['product_name'];
        $proudct_namear = $_POST['proudct_namear'];
        $proudct_img = $_POST['proudct_img'];
        $detail = $_POST['detail'];
        $details_ar = $_POST['details_ar'];
        $date = $_POST['date'];
        $hide = $_POST['hide'];
        $product_discount = $_POST['product_discount'];
        $count = $_POST['count'];
        $price = $_POST['price'];
        $subcat_id = $_POST['subcat_id'];

        $query = "UPDATE product SET ";
        $query .= "product_name = '$product_name', ";
        $query .= "proudct_namear = '$proudct_namear', ";
        $query .= "proudct_img = '$proudct_img', ";
        $query .= "detail = '$detail', ";
        $query .= "details_ar = '$details_ar', ";
        $query .= "hide = '$hide', ";
        $query .= "date = '$date', ";
        $query .= "product_discount = '$product_discount', ";
        $query .= "count = '$count', ";
        $query .= "price = '$price', ";
        $query .= "sucat_id = '$subcat_id' ";
        $query .= "WHERE product_id = $the_pro_id";

        $upd_pro = mysqli_query($connection, $query);
        if (!$upd_pro) {
            die('Query failed' . mysqli_error($connection));
        }
    }
    ?>
</div>

</div>

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Edit Product</h4>
      <form action="" method="post" class="repeater" enctype="multipart/form-data">
<div data-repeater-list="group-a">
 <div data-repeater-item class="row">
         <div class="mb-3 col-lg-2">
     <label class="form-label" for="name">Name english </label>
    <input value=" <?php echo $pro_name; ?> " type="text" id="name" name="product_name" class="form-control" />  </div>
        <div class="mb-3 col-lg-2">
        <label class="form-label" for="email">Name arabic</label>
     <input value="<?php echo $pro_namear; ?>" type="text" name="product_namear" id="email" class="form-control" /></div>
     <div class="mb-3 col-lg-2">
     <label class="form-label" for="subject">Price</label>
     <input value="<?php echo $pro_price; ?>" type="text" name="price" id="subject" class="form-control" /> </div>
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
        <input value="<?php echo $pro_count; ?>" type="text" id="name" name="count" class="form-control" /> </div>
    <div class="mb-3 col-lg-2">
        <label class="form-label" for="email">Hide</label>
        <input value="<?php echo $pro_hide; ?>" type="text" name="hide" id="email" class="form-control" /></div>
    <div class="mb-3 col-lg-2">
        <label class="form-label" for="subject">Discount</label>
        <input value="<?php echo $pro_discount; ?>" type="text" name="product_discount" id="subject" class="form-control" /> </div>
         <div class="mb-3 col-lg-2">
          <label class="form-label" for="resume">Image</label>
          <input value="<?php echo $pro_image; ?>" type="file" class="form-control-file" name="proudct_img" id="resume">
                                                </div>
                               <div class="form-group ">
                                                    <label for="name">Category</label>
                  <select name="cat_id" id="">
                                                        <?php
                    $qury = ("SELECT * FROM subcategory ");
                $subcat_id = mysqli_query($connection, $qury);
                while ($row = mysqli_fetch_assoc($subcat_id)) {
               $id = $row['sub_id'];
          $cat_name = $row['subcat_name'];                                     
             echo "<option value='{$id}'> $id _ {$cat_name}</option>";
                   }  ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
    <input data-repeater-create  class="btn btn-success mt-3 mt-lg-0" type="submit" value="Update" name="Update" />
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
                    <?=footer(); ?>
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
    <?=scripts();?>
</body>

</html>