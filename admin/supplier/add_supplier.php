<h2>Nhà cung cấp</h2>
<button class="btn-add-supplier" id="btn-add-supplier">Thêm</button>
<div id="edit-supplier" class="hidden"></div>
<div class="hidden" id="form-add-supplier-container">
  <table>
    <form action="action.php" method="POST" id="add_data">
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