<h2>Mã giảm giá</h2>
<button class="btn-add" id="btn-add">Thêm</button>
<div id="edit-coupons" class="hidden"></div>
<div class="hidden" id="form-container">
  <table>
    <form action="action.php" method="POST" id="add_data">
      <tr>
        <td>Mã giảm giá</td>
        <td><input type="number" id="code"></td>
      </tr>
      <tr>
        <td>Tên mã giảm giá</td>
        <td><input type="text" id="name_code"></td>
      </tr>
      <tr>
        <td>% giảm giá</td>
        <td><input type="number" id="percent_code"></td>
      </tr>
      <tr>
        <td>Ngày bắt đầu</td>
        <td><input type="date" id="first_day"></td>
      </tr>
      <tr>
        <td>Ngày kết thúc</td>
        <td><input type="date" id="finish_day"></td>
      </tr>
      <tr>
        <td>
          <input type="button" name="add_coupons" id="btn-submit" value="submit">
        </td>
      </tr>
    </form>
  </table>
</div>