<?php
$title = 'Quản Lý Nhà Cung Cấp';
$baseUrl = '../';
require_once('../layouts/header.php');
?>

<div class="d-flex justify-content-between align-items-center">
     <h2>Phiếu nhập</h2>
     <div><button class="btn-add btn btn-success" data-toggle="modal" data-target="#modal-add-entercoupon" id="btn-add-entercoupon">Thêm</button></div>
</div>

<div id="load-entercoupon-data">
</div>
<!-- Modal edit -->
<div class="modal fade" id="modal-edit-entercoupon" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
               <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Sửa nhà cung cấp</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close">X</button>
               </div>
               <div class="modal-body">
                    <div id="form-edit-entercoupon-container">
                         <table>
                              <form method="POST" id="add-data" name="">
                                   <tr>
                                        <td>Mã nhà cung cấp</td>
                                        <td><input type="number" id="id-edit-entercoupon" disabled=disabled></td>
                                   </tr>
                                   <tr>
                                        <td>Tên nhà cung cấp</td>
                                        <td><input type="text" id="name-edit-entercoupon"></td>
                                   </tr>
                                   <tr>
                                        <td>Địa chỉ</td>
                                        <td><input type="text" id="address-edit-entercoupon"></td>
                                   </tr>
                                   <tr>
                                        <td>Phí vận chuyển</td>
                                        <td><input type="number" id="shipping-edit-fee"></td>
                                   </tr>
                                   <tr>
                                        <td>Giảm giá</td>
                                        <td><input type="number" id="discount-edit"></td>
                                   </tr>
                              </form>
                         </table>
                    </div>
               </div>
               <div class="modal-footer">
                    <button type="button" name="edit_supplier" id="btn-editsupplier-submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
               </div>
          </div>
     </div>
</div>
<!-- Modal add -->
<div class="modal fade" id="modal-add-entercoupon" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
               <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Thêm phiếu nhập</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close">X</button>
               </div>
               <div class="modal-body">
                    <div>
                         <table>
                              <form method="POST" id="form-add-entercoupon-container">
                                   <tr>
                                        <td>Tên nhà cung cấp:
                                             <select id="select-supplier" name="supplier_id">
                                                  
                                             </select>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>Mã nhân viên</td>
                                        <td><input type="number" id="staff-id"></td>
                                   </tr>
                                   <tr>
                                        <td>Ngày nhập hàng</td>
                                        <td><input type="date" id="enter-day" name="created_at"></td>
                                   </tr>
                                   <tr>
                                        <td>Số sản phẩm thêm:</td>
                                        <td><input type="number" id="n-qty"></td>
                                        <td><input type="button" name="qty-add" id="quantity-add" value="ok"></td>
                                   </tr>
                                   <tr id="form-product-add">

                                   </tr>

                                   <tr>
                                        <td>
                                             <input type="button" name="add_entercoupon" id="btn-add-entercoupon-submit" value="submit">
                                        </td>
                                   </tr>
                              </form>
                         </table>
                    </div>
               </div>
               <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-primary" name="add_supplier" id="btn-addsupplier-submit">Submit</button>
               </div>
          </div>
     </div>
</div>
<!-- Modal option -->
<div class="modal fade" id="modal-option" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
               <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Thêm danh mục sản phẩm</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close">X</button>
               </div>
               <div class="modal-body">
                    <div id="form-add-supplier-container">
                         <table>
                              <form method="POST" id="add-catesup-data" name="">
                                   <tr>
                                        <td>
                                             ID NHÀ CUNG CẤP:
                                             <input type="number" disabled=disabled id="NCC">
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>
                                             Danh mục sản phẩm
                                             <select name="" id="select-catesup">

                                             </select>
                                        </td>
                                   </tr>
                              </form>
                         </table>
                    </div>
               </div>
               <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-primary" name="add_catesupplier" id="btn-add-catesup-submit">Submit</button>
               </div>
          </div>
     </div>
</div>

<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>