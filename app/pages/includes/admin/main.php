<div class="main">
  <?php
  if (isset($_GET['action'])) {
    $action = $_GET['action'];
  }else{
    $action="";
  }
  if ($action == "magiamgia") {
    include("discount/add_coupons.php");
    include("discount/list_coupons.php");
  }elseif($action=="nhacungcap"){
    include("supplier/add_supplier.php");
    include("supplier/list_supplier.php");
  }elseif($action=="phieunhap"){
    include("enter_coupon/add_enter_coupon.php");
  }
  ?>
</div>