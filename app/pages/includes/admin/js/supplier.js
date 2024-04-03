$(document).ready(function () {
  // Sửa nhà cung cấp
  $(document).on('click', '.edit-supplier-data', function () {
    let idsua = $(this).data('id_sua');
    $("#edit-supplier").html(`
    <table>
    <form action="action.php" method="POST" id="edit_data">
      <tr>
        <td>Tên nhà cung cấp</td>
        <td><input type="text" id="name-supplier2"></td>
      </tr>
      <tr>
        <td>Địa chỉ</td>
        <td><input type="text" id="address-supplier2"></td>
      </tr>
      <tr>
        <td>Phí vận chuyển</td>
        <td><input type="number" id="shipping-fee2"></td>
      </tr>
      <tr>
        <td>Giảm giá</td>
        <td><input type="number" id="discount2"></td>
      </tr>
      <tr>
        <td>
          Danh mục sản phẩm
          <select name="" id="select2">
            
          </select>
        </td>
      </tr>
      <tr>
        <td>
          <input type="button" name="edit_supplier" id="btn-editsupplier-submit" value="submit" data-id_edit=${idsua}>
        </td>
      </tr>
    </form>
  </table>
          `);
    $('#edit-supplier').toggle('hidden');
  });
  $(document).on('click', '#btn-editsupplier-submit', function () {
    let id_edit2 = $(this).data('id_edit');
    let name_supplier2 = $('#name-supplier2').val();
    let address_supplier2 = $('#address-supplier2').val();
    let shipping_fee2 = $('#shipping-fee2').val();
    let discount_percent2 = $('#discount2').val();
    let category_id2 = $('#select2').val();
    $.ajax({
      url: "supplier/action.php",
      method: "POST",
      data: { id_edit2: id_edit2, name_supplier2: name_supplier2, address_supplier2: address_supplier2, shipping_fee2: shipping_fee2, discount_percent2: discount_percent2, category_id2: category_id2 },
      success: function (data) {
        alert("Sửa thành công");
        display_supplier();
        $('#edit-supplier').toggle('hidden');
      }
    });
  });
  // Hiển thị dữ liệu
  let accept = 1;
  let j=1;
  function display_supplier() {
    
    if (accept > 0) {
      $.ajax({
        url: "supplier/action.php",
        method: "POST",
        data: { accept: accept },
        success: function (data) {
          let i = 0;
          data.map((data, index) => {
            i++;
            $('#load-supplier-data').append(`<tr>
            <td>${i}</td>
          <td value=${data.id}>${data.name}</td>
          <td value=${data.id}>${data.address}</td>
          <td value=${data.id}>${data.shipping_fee}</td>
          <td value=${data.id}>${data.discount}</td>
          <td><button data-id_xoa=${data.id} class='del-supplier-data' name='delete-supplier-data'>Xóa</button>|<button data-id_sua=${data.id} class='edit-supplier-data' name='edit-supplier-data' id=${data.id}>Sửa</button></td>
          </tr>`);
          })
        }
      });
    }
  };
  display_supplier();
  //Xóa nhà cung cấp
  $(document).on('click', '.del-supplier-data', function () {
    let id_supplier = $(this).data('id_xoa');
    $.ajax({
      url: "supplier/action.php",
      method: "POST",
      data: { id_supplier: id_supplier },
      success: function (data) {
        alert('Xóa nhà cung cấp thành công');
        display_supplier();
      }
    })
  });
  // Hiển thị danh mục sản phẩm trong thẻ select
  $('#btn-add-supplier').click(function () {
    $('#form-add-supplier-container').toggle('hidden');
    let pull_select = 1;
    $.ajax({
      url: "supplier/action.php",
      method: "POST",
      data: { pull_select: pull_select },
      success: function (data) {
        console.log(data);
        data.map((data, index_display) => {
          $('#select').append(`<option value=${data.id} id="category-id"> ${data.name}</option>`);
        })
      }
    })
  });
  $(document).on('click', '.edit-supplier-data', function () {
    let pull_select2 = 1;
    alert("okS");
    $.ajax({
      url: "supplier/action.php",
      method: "POST",
      data: { pull_select2: pull_select2 },
      success: function (data) {
        console.log(data);
        data.map((data, index2) => {
          $('#select2').append(`<option value=${data.id} id="category-id"> ${data.name}</option>`);
        })
      }
    })
  });
  //Thêm nhà cung cấp
  $('#btn-addsupplier-submit').click(function () {
    let name_supplier = $('#name-supplier').val();
    let address_supplier = $('#address-supplier').val();
    let shipping_fee = $('#shipping-fee').val();
    let discount_percent = $('#discount').val();
    let category_id = $('#select').val();
    $.ajax({
      url: "supplier/action.php",
      method: "POST",
      data: { name_supplier: name_supplier, address_supplier: address_supplier, shipping_fee: shipping_fee, discount_percent: discount_percent, category_id: category_id },
      success: function (data) {
        alert("Thêm thành công");
        display_supplier();
        $('#form-add-supplier-container').toggle('hidden');
      }
    });
  });
});
