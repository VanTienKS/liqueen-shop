<?php
require_once('../../database/Database.php');
require_once('../../utils/App.php');

class Supplier extends App
{
     function __construct()
     {
          parent::__construct();
     }

     public function getList()
     {
          $out_put = "";
          $query = "SELECT * from supplier order by id desc";
          $sql_select = Database::getInstance()->execute($query);
          $query1 = "SELECT * from supplier_category order by id asc";
          $sql_select1 = Database::getInstance()->execute($query1);
          $out_put .= "
    <div>
      <table border=1 width=100%>
        <tr>
            <td>STT</td>
            <td>ID Nhà cung cấp</td>
            <td>Tên nhà cung cấp</td>
            <td>Địa chỉ</td>
            <td>Phí vận chuyển</td>
            <td>Giảm giá</td>
            <td>ID danh mục sản phẩm</td>
            <td>Quản lý</td>
        </tr>
  ";
          if (mysqli_num_rows($sql_select) > 0) {
               $i = 0;
               while ($row = mysqli_fetch_array($sql_select)) {
                    $i++;
                    $out_put .= "
                         <tr>
                              <td>" . $i . "</td>
                              <td>" . $row['id'] . "</td>
                              <td>" . $row['name'] . "</td>
                              <td>" . $row['address'] . "</td>
                              <td>" . $row['shipping_fee'] . "</td>
                              <td>" . $row['discount'] . "</td>
                              <td>
                              ";
                    
                    while ($row1 = mysqli_fetch_array($sql_select1)) {
                         $a=$row1['supplier_id'];
                         if ($row['id'] == $a) {
                              $out_put .= "
                         " . $row1['category_id'] . ".";
                         }
                    };
                    $out_put .= "<button data-id_option='" . $row['id'] . "' data-toggle='modal' data-target='#modal-option' class='option-data' name='edit'>Option</button></td>
                    </td>
            <td><button data-id_xoa='" . $row['id'] . "' class='del-supplier-data' name='delete_data'>Xóa</button>|<button data-id_sua='" . $row['id'] . "' data-toggle='modal' data-target='#modal-edit-supplier' class='edit-supplier-data'  id='" . $row['id'] . "'>Sửa</button></td>
        </tr>
      ";
               }
          } else {
               $out_put .= "
    <tr>
      <td>Dữ liệu chưa được tải</td>
    </tr>
  ";
          }
          $out_put .= "</table></div>";
          echo $out_put;
     }
     public function addcatesup()
     {
          $supplier_id = $_POST['supplier_id'];
          $category_id = $_POST['category_id'];
          $query = "INSERT into supplier_category(supplier_id,category_id) value('$supplier_id','$category_id')";
          $result = Database::getInstance()->execute($query);
     }

     public function add()
     {
          $name_supplier = $_POST['name_supplier'];
          $address_supplier = $_POST['address_supplier'];
          $shipping_fee = $_POST['shipping_fee'];
          $discount_percent = $_POST['discount_percent'];
          $category_id = $_POST['category_id'];
          $query = "INSERT into supplier(name,address,shipping_fee,discount,category_id) value('$name_supplier','$address_supplier','$shipping_fee','$discount_percent','$category_id')";
          $result = Database::getInstance()->execute($query);
          $query0 = "SELECT * from supplier order by id desc";
          $result1 = Database::getInstance()->execute($query0);
          $row = mysqli_fetch_array($result1);
          $this->renderJSON($row);
          $query1 = "INSERT into supplier_category(supplier_id,category_id) value('" . $row['id'] . "','$category_id')";
          $result2 = Database::getInstance()->execute($query1);
     }

     public function delete()
     {
          $id = $_POST['id'];
          $query1 = "DELETE  from supplier_category where supplier_id=$id";
          $result1 = Database::getInstance()->execute($query1);
          $query = "DELETE from supplier where id=$id";
          $result = Database::getInstance()->execute($query);
     }

     public function update()
     {
          $id = $_POST['id'];
          $name_supplier = $_POST['name_supplier'];
          $address_supplier = $_POST['address_supplier'];
          $shipping_fee = $_POST['shipping_fee'];
          $discount_percent = $_POST['discount_percent'];
          $sql_editcode = "UPDATE supplier set name='" . $name_supplier . "',address= '" . $address_supplier . "', shipping_fee='" . $shipping_fee . "', discount='" . $discount_percent . "' where id=$id";
          $result = Database::getInstance()->execute($sql_editcode);
     }
     public function getSupplierById()
     {
          $id = $_POST['id'];
          $sql_ajax = "SELECT * from supplier where id=$id limit 1";
          $result = Database::getInstance()->execute($sql_ajax);
          $row = mysqli_fetch_assoc($result);
          $this->renderJSON($row);
     }
     public function displayCategoryInSelect()
     {
          $sql_select = "SELECT * from category order by id asc";
          $query = Database::getInstance()->execute($sql_select);
          $result = [];
          $index = 0;
          while ($row = $query->fetch_assoc()) {
               $result[$index++] = $row;
          }
          $this->renderJSON($result);
     }
}
$supplier = new Supplier();
