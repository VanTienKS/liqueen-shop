
$(document).ready(function () {
 
  //Sửa dữ liệu
  $(document).on('click', '.edit-data', function () {
    let idsua = $(this).data('id_sua');
    $("#edit-coupons").html(`
            <table>
              <form action="action.php" method="POST" id="edit_data">
                <tr>
                  <td>Mã giảm giá: ${idsua}</td>
                </tr>
                <tr>
                  <td>Tên mã giảm giá</td>
                  <td><input type="text" id="namecode"></td>
                </tr>
                <tr>
                  <td>% giảm giá</td>
                  <td><input type="number" id="percentcode"></td>
                </tr>
                <tr>
                  <td>Ngày bắt đầu</td>
                  <td><input type="date" id="firstday"></td>
                </tr>
                <tr>
                  <td>Ngày kết thúc</td>
                  <td><input type="date" id="finishday"></td>
                </tr>
                <tr>
                  <td>
                    <input type="button" name="edit_coupons" id="btn-edit-submit" value="submit" data-id_edit=${idsua}>
                  </td>
                </tr>
              </form>
            </table>
          `);
          $('#edit-coupons').toggle('hidden');
  });

 

  $(document).on('click', '#btn-edit-submit', function () {
    let id_edit = $(this).data('id_edit');
    let name_code = $('#namecode').val();
    let percent_code = $('#percentcode').val();
    let first_day = $('#firstday').val();
    let finish_day = $('#finishday').val();
    $.ajax({
      url: "discount/action.php",
      method: "POST",
      data: { id_edit: id_edit, name_code: name_code, percent_code: percent_code, first_day: first_day, finish_day: finish_day },
      success: function (data) {
        alert("Sửa thành công");
        fetch_data();
        $('#edit-coupons').toggle('hidden');
      }
    });
  });
  //Xóa dữ liệu
  $(document).on('click', '.del_data', function () {
    let id = $(this).data('id_xoa');
    $.ajax({
      url: "discount/action.php",
      method: "POST",
      data: { id: id },
      success: function (data) {
        alert("Xóa thành công");
        fetch_data();
      }
    });
  });
  //hiển thị dữ liệu
  function fetch_data() {
    $.ajax({
      url: "discount/action.php",
      method: "POST",
      success: function (data) {
        $("#load_data").html(data);
      }
    });
  }
  fetch_data();

  //Show form
  $('#btn-add').click(function () {
    $('#form-container').toggle('hidden');
  })

  // thêm dữ liệu
  $('#btn-submit').click(function () {
    let code = $('#code').val();
    let name = $('#name_code').val();
    let percentcode = $('#percent_code').val();
    let firstday = $('#first_day').val();
    let finishday = $('#finish_day').val();
    if (code == '' || name == '' || percentcode == '' || firstday == '' || finishday == '') {
      alert("Không được bỏ trống");
    }
    else if (finishday < firstday) {
      alert("Ngày kết thúc không hợp lệ");
    } else {
      $.ajax({
        url: "discount/action.php",
        method: "POST",
        data: { code: code, name: name, percentcode: percentcode, firstday: firstday, finishday: finishday },
        success: function (data) {
          $('#add_data')[0].reset();
          fetch_data();
          $('#form-container').toggle('hidden');
        }
      });
    }
  });
});
