
<?php
require_once('function2.php');

 ?>

<!doctype html>
<html lang="en" >

<head>
<?=style();?>
<style>
  table {
    border-collapse: collapse;
  }
  
  td, th {
    text-align: justify-all;
  
    min-width: 150px;
  }
  
  td:before {
    content: "";
    display: block;
    height: 100%;
    
    margin-left: -1px;
  }
  
  th:before {
    content: "";
    display: block;
    height: 100%;
    border-right: 1px solid black;
    margin-left: -1px;
  }
  button {
    width: 60px;

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

                            <h4 class="page-title mb-0 font-size-18"> Products </h4>

                            <button class="btn btn-light">
  <a href="add-product.php">Add</a>
</button>


                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="card"></div>
                    <div class="col-12"> 

                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Table Edits</h4>  
                                <p class="card-title-desc">Table Edits is a lightweight jQuery plugin for making table
                                    rows editable.</p>
                              

                              <?php
    $qury = ( "SELECT * FROM product");
    $pro = mysqli_query($connection ,$qury);
   
?>
                                <div class="table-responsive">
                                    <table class="table table-editable table-nowrap align-middle table-edits">
                                        <thead>
                                            <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th> Price </th>
                        <th> Details </th>
                        <th>Image</th>
                        <th>Discount</th>
                        <th>Edit</th>
                       <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                     <?php  while($row = mysqli_fetch_assoc($pro)){

                    $pro_id = $row['product_id'];
                     $pro_name = $row['product_name'];
                      $pro_price = $row['price'];
                        $pro_detail = $row['detail'];
                       $pro_image = $row['proudct_img'];
                       $pro_discount = $row['product_discount'];
              
                                        
                                           echo"<tr>";
        echo "<td > {$pro_id} </td>  ";                  
        echo "  <td > {$pro_name} </td> " ;
        echo "  <td > {$pro_price} </td> " ;
        echo "  <td >  {$pro_detail}  </td>  " ;
        echo "<td> <img width=100 src='/images/$pro_image' alt='image'> </td>"; 
        echo " <td >  $pro_discount  </td>";   
        echo"<td> <a href='edit-product.php?edit&p_id={$pro_id}'> Edit</a></td>";
        echo"<td> <a href='user.php?delete={$pro_id}'> Delete</a></td>";
                                           
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