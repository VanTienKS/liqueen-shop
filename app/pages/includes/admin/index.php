<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="admincss/admincss.css">
  <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
</head>

<body>
  <div class="wrapper">
    <?php
    include("../connectdb/connect.php");
    include("side_bar.php");
    include("main.php");
    ?>
  </div>
  <script src="js/coupons.js"></script>
  <script src="js/supplier.js"></script>
  <script src="js/enter_coupon.js"></script>
</body>

</html>