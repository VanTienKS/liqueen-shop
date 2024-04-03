<?php
include("../../connectdb/connect.php");
//Sửa nhà cung cấp
if(isset($_POST['id_edit2'])){
  $id_edit=$_POST['id_edit2'];
  $name_supplier_edit = $_POST['name_supplier2'];
  $address_supplier_edit = $_POST['address_supplier2'];
  $shipping_fee_edit = $_POST['shipping_fee2'];
  $discount_percent_edit = $_POST['discount_percent2'];
  $category_id_edit = $_POST['category_id2'];
  $sql_editsupplier = "UPDATE supplier set name='".$name_supplier_edit."', address='".$address_supplier_edit."', shipping_fee='".$shipping_fee_edit."', discount='".$discount_percent_edit."', category_id='".$category_id_edit."' where id='$id_edit'";
  $query_edit = mysqli_query($mysqli, $sql_editsupplier);
}
//Xóa nhà cung cấp
if(isset($_POST['id_supplier'])){
  $id=$_POST['id_supplier'];
  $sql_delsupplier="DELETE from supplier where id=$id";
  $query_delsupplier=mysqli_query($mysqli,$sql_delsupplier);
}
// Hiển thị id danh mục sản phẩm trong thẻ select
if (isset($_POST['pull_select2'])) {
  $sql_select2 = "SELECT * from category order by id asc";
  $query2 = mysqli_query($mysqli, $sql_select2);
  $result2 = [];
  $index2 = 0;
  while ($row2= $query2->fetch_assoc()) {
    $result2[$index2++] = $row2;
  }
  header("Content-Type: application/json");
  echo json_encode($result2, JSON_UNESCAPED_UNICODE);
}
if (isset($_POST['pull_select'])) {
  $sql_select = "SELECT * from category order by id asc";
  $query = mysqli_query($mysqli, $sql_select);
  $result = [];
  $index = 0;
  while ($row = $query->fetch_assoc()) {
    $result[$index++] = $row;
  }
  header("Content-Type: application/json");
  echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
// Thêm nhà cung cấp
if (isset($_POST['name_supplier'])) {
  $name_supplier = $_POST['name_supplier'];
  $address_supplier = $_POST['address_supplier'];
  $shipping_fee = $_POST['shipping_fee'];
  $discount_percent = $_POST['discount_percent'];
  $category_id = $_POST['category_id'];
  $sql_addsupplier = "INSERT into supplier(name,address,shipping_fee,discount,category_id) value('$name_supplier','$address_supplier','$shipping_fee','$discount_percent','$category_id')";
  $query_add = mysqli_query($mysqli, $sql_addsupplier);
}
// Hiển thị danh sách nhà cung cấp
if (isset($_POST['accept'])) {
  $sql_display = "SELECT * from supplier order by id desc";
  $query_display = mysqli_query($mysqli, $sql_display);
  $result_display = [];
  $index_display = 0;
  while ($row_display = $query_display->fetch_assoc()) {
    $result_display[$index_display++] = $row_display;
  }
  header("Content-Type: application/json");
  echo json_encode($result_display, JSON_UNESCAPED_UNICODE);
}
