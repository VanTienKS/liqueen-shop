<?php
$title = 'Quản Lý Nhà Cung Cấp';
$baseUrl = '../';
require_once('../layouts/header.php');
?>

<div class="d-flex justify-content-between align-items-center">
     <h2>Nhà cung cấp</h2>
     <div><button class="btn-add btn btn-success" data-toggle="modal" data-target="#modal-add-supplier" id="btn-add-supplier">Thêm</button></div>
</div>

<div id="load-supplier-data">
</div>
<!-- Modal edit -->
<div class="modal fade" id="modal-edit-supplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
               <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Sửa nhà cung cấp</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close">X</button>
               </div>
               <div class="modal-body">
                    <div id="form-edit-supplier-container">
                         <table>
                              <form method="POST" id="add-data" name="">
                                   <tr>
                                        <td>Mã nhà cung cấp</td>
                                        <td><input type="number" id="id-edit-supplier" disabled=disabled></td>
                                   </tr>
                                   <tr>
                                        <td>Tên nhà cung cấp</td>
                                        <td><input type="text" id="name-edit-supplier"></td>
                                   </tr>
                                   <tr>
                                        <td>Địa chỉ</td>
                                        <td><input type="text" id="address-edit-supplier"></td>
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
<div class="modal fade" id="modal-add-supplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
               <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Thêm nhà cung cấp</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close">X</button>
               </div>
               <div class="modal-body">
                    <div id="form-add-supplier-container">
                         <table>
                              <form method="POST" id="add-data" name="">
                                   <tr>
                                        <td>Tên nhà cung cấp</td>
                                        <td><input type="text" id="name-supplier"></td>
                                   </tr>
                                   <tr>
                                        <td>Địa chỉ</td>
                                        <td><input type="text" id="address-supplier"></td>
                                   </tr>
                                   <tr>
                                        <td>Phí vận chuyển</td>
                                        <td><input type="number" id="shipping-fee"></td>
                                   </tr>
                                   <tr>
                                        <td>Giảm giá</td>
                                        <td><input type="number" id="discount"></td>
                                   </tr>
                                   <tr>
                                        <td>
                                             Danh mục sản phẩm
                                             <select name="" id="select">

                                             </select>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>
                                             <input type="button" name="add_supplier" id="btn-addsupplier-submit" value="submit">
                                        </td>
                                   </tr>
                              </form>
                         </table>
                    </div>
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
                                   <tr>
                                        <td>
                                             <input type="button" name="add_catesupplier" id="btn-add-catesup-submit" value="submit">
                                        </td>
                                   </tr>
                              </form>
                         </table>
                    </div>
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
               </div>
          </div>
     </div>
</div>

<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>