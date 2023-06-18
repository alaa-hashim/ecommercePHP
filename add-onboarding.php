<?php
require_once('function2.php');

?>
<!doctype html>
<html lang="en">

<head>
 

    <?= style(); ?>

    <style type="text/css">
        
.snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 14px;
  transition: visibility 0.3s, opacity 0.3s, bottom 0.3s;
}

.show {
  visibility: visible !important;
  opacity: 1 !important;
  bottom: 30px !important;
}
        
    </style>
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
                     
    <?php
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $name_ar = $_POST['name_ar'];
    $detail = $_POST['detail'];
    $detail_ar = $_POST['detail_ar'];
    $img = $_FILES['img']['name'];
    $image_temp = $_FILES['img']['tmp_name'];
    $hide = $_POST['hide'];

    $destinationDirectory = 'images/onboarding/';
    if (!is_dir($destinationDirectory)) {
        mkdir($destinationDirectory, 0777, true);
    }

    $imageDestination = $destinationDirectory . $img;
    move_uploaded_file($image_temp, $imageDestination);

    if ($name == "" || empty($name)) {
        echo "This field can't be empty";
    } else {
        $query = "INSERT INTO onboarding(name, name_ar, detail , detail_ar , img, hide) ";
        $query .= "VALUES('$name', '$name_ar', '$detail','$detail_ar', '$img', '$hide')";

        $add_slider = mysqli_query($connection, $query);
        if ($add_slider) {
            // Show success message
            echo '<script>alert("Record added successfully!");</script>';
        } else {
            die('Query failed' . mysqli_error($connection));
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
    <input value=" " type="text" id="name" name="name" class="form-control" />  </div>
        <div class="mb-3 col-lg-2">
        <label class="form-label" for="email">Name arabic</label>
     <input value="" type="text" name="name_ar" id="email" class="form-control" /></div>
     <div class="mb-3 col-lg-2">
        <label class="form-label" for="email">Detail</label>
     <input value="" type="text" name="detail" id="email" class="form-control" /></div>
     <div class="mb-3 col-lg-2">
        <label class="form-label" for="email">Detail arabic</label>
     <input value="" type="text" name="detail_ar" id="email" class="form-control" /></div>

<div data-repeater-item class="row">
    <div class="mb-3 col-lg-2">
        <label class="form-label" for="email">Hide</label>
        <input value="" type="text" name="hide" id="email" class="form-control" /></div>
         <div class="mb-3 col-lg-2">
          <label class="form-label" for="resume">Image</label>
          <input value="" type="file" class="form-control-file" name="img" id="resume"> </div>
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
    <?=scripts();?>
        <script>
function showSnackbar() {
  var snackbar = document.getElementById("snackbar");
  snackbar.className = "snackbar show";
  setTimeout(function(){
    snackbar.className = snackbar.className.replace("show", "");
  }, 3000);
}
</script>
</body>

</html>