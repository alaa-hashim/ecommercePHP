
<?php
require_once('function2.php');

 ?>

<!doctype html>
<html lang="en" >

<head>
<?=style();?>
</head>

<body data-layout="detached" data-topbar="colored">



    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

<div class="container-fluid">
    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <?=headerbar();?>
            </div>
        </header> <!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div class="h-100">

        <?=user();?>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <?=sidebar();?>
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
                            <h4 class="page-title mb-0 font-size-18"> Users Table</h4>

                            <div class="page-title-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    Add
                                 </button>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Table Edits</h4>
                                <p class="card-title-desc">Table Edits is a lightweight jQuery plugin for making table
                                    rows editable.</p>
                              

                              <?php
    $qury = ( "SELECT * FROM categories");
    
    $cat = mysqli_query($connection ,$qury);
   
?>
                                <div class="table-responsive">
                                    <table class="table table-editable table-nowrap align-middle table-edits">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Arabic name</th>
                                                <th>Image</th>
                                                <th>Hide</th>
                                                <th>Date</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                     <?php  while($row = mysqli_fetch_assoc($cat)){

                                        $cat_id = $row['category_id'];
                                        $cat_name = $row['category_name'];
                                        $cat_namear = $row['category_namear'];
                                        $cat_image = $row['img'];
                                        $cat_hide = $row['hide'];
                                        $cat_date = $row['date'];
                                        
                                           echo"<tr>";
        echo "<td > {$cat_id} </td>  ";                  
        echo "  <td > {$cat_name} </td> " ;
        echo "  <td > {$cat_namear} </td> " ;
        echo "<td> <img width=100 src='/images/$cat_image' alt='image'> </td>"; 
        echo " <td >  $cat_hide  </td>"; 
        echo " <td >  $cat_date  </td>";   
        echo"<td> <a href='editproduct.php?edit&p_id={$cat_id}'> Edit</a></td>";
        echo"<td> <a href='user.php?delete={$cat_id}'> Delete</a></td>";
                                           
                                           echo "</tr>";
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <?=footer();?>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

</div>
<div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Dialog</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
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

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
<!-- end container-fluid -->

<!-- Right Sidebar -->

<div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body rightbar">
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title px-3 py-4">
                    <a href="javascript:void(0);" class="right-bar-toggle float-end" data-bs-dismiss="offcanvas" aria-label="Close" >
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                    <h5 class="m-0">Settings</h5>
                </div>
        
                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>
        
                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
        
                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked />
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>
        
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
        
                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch"  />
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
        
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>
        
                </div>
        
            </div>
            <!-- end slimscroll-menu-->
        </div>
    </div>
   
</div>


<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<!-- JAVASCRIPT -->
<?=scripts();?>

</body>

</html>