<h2>Phiếu nhập</h2>
<button class="btn-add-entercoupon" id="btn-add-entercoupon">Thêm</button>
<div id="edit-entercoupon" class="hidden"></div>
<div class="hidden" id="form-add-entercoupon-container">
  <table>
    <form action="action.php" method="POST" id="add_data">
      <tr>
        <td>Tên nhà cung cấp:
          <select name="" id="select-supplier"></select>
        </td>
      </tr>
      <tr>
        <td>Mã nhân viên</td>
        <td><input type="number" id="staff-id"></td>
      </tr>
      <tr>
        <td>Ngày nhập hàng</td>
        <td><input type="date" id="enter-day"></td>
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