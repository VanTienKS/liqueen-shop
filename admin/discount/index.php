<?php
$title = 'Quản Lý Mã Giảm Giá';
$baseUrl = '../';
require_once('../layouts/header.php');
?>
<h2>Mã giảm giá</h2>
<div class="d-flex justify-content-between align-items-center">
     <div><button class="btn-add btn btn-success" data-toggle="modal" data-target="#modal-add" id="btn-add">Thêm</button></div>
</div>
<div id="load_data"></div>
<!-- Modal edit -->
<div class='modal fade' id='modal-edit' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden="true">
     <div class='modal-dialog modal-dialog-centered'>
          <div class='modal-content'>
               <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Sửa mã giảm giá</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' data-dismiss="modal" aria-label='Close'>X</button>
               </div>
               <div class='modal-body'>
                    <div id='form-edit-container'>
                         <table>
                              <form method='POST' id='edit_data'>
                                   <tr>
                                        <td>Mã giảm giá</td>
                                        <td><input type='text' id='code' disabled='disabled' name='id_edit' value=""></td>
                                   </tr>
                                   <tr>
                                        <td>Tên mã giảm giá</td>
                                        <td><input type='text' id='namecode' name='name_code' value=""></td>
                                   </tr>
                                   <tr>
                                        <td>% giảm giá</td>
                                        <td><input type='number' id='percentcode' name='percent_code' value=""></td>
                                   </tr>
                                   <tr>
                                        <td>Ngày bắt đầu</td>
                                        <td><input type='date' id='firstday' name='first_day' value=""></td>
                                   </tr>
                                   <tr>
                                        <td>Ngày kết thúc</td>
                                        <td><input type='date' id='finishday' name='finish_day' value=""></td>
                                   </tr>
                              </form>
                         </table>
                    </div>
               </div>
               <div class='modal-footer'>
                    <button type='button' class='btn-add btn btn-success' data-bs-dismiss='modal' data-dismiss="modal" name='edit_coupons' id='btn-edit-submit'>Submit</button>
               </div>
          </div>
     </div>
</div>
<!-- Modal add -->
<div class=" modal fade" id="modal-add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
               <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Thêm mã giảm giá</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-dismiss="modal">X</button>
               </div>
               <div class="modal-body">
                    <div id="form-container">
                         <table>
                              <form method="POST" id="form-add-data" name="">
                                   <tr>
                                        <td>Mã giảm giá</td>
                                        <td><input type="number" id="codeadd" name="code"></td>
                                   </tr>
                                   <tr>
                                        <td>Tên mã giảm giá</td>
                                        <td><input type="text" id="nameadd" name="name"></td>
                                   </tr>
                                   <tr>
                                        <td>% giảm giá</td>
                                        <td><input type="number" id="percentcodeadd" name="percent_code"></td>
                                   </tr>
                                   <tr>
                                        <td>Ngày bắt đầu</td>
                                        <td><input type="date" id="startdayadd" name="begin_day"></td>
                                   </tr>
                                   <tr>
                                        <td>Ngày kết thúc</td>
                                        <td><input type="date" id="enddayadd" name="end_day"></td>
                                   </tr>
                              </form>
                         </table>
                    </div>
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn-add btn btn-success" data-bs-dismiss="modal" data-dismiss="modal" id="btn-submit" name="add_coupons">Submit</button>
               </div>
          </div>
     </div>
</div>

<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>