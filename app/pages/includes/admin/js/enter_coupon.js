$(document).ready(function () {
  $(document).on("click", "#btn-add-entercoupon", function () {
    $("#form-add-entercoupon-container").toggle("hidden");
    let pull_supplier = 1;
    $.ajax({
      url: "enter_coupon/action.php",
      method: "POST",
      data: { pull_supplier: pull_supplier },
      success: function (data) {
        console.log(data);
        data.map((data, index) => {
          $("#select-supplier").append(`<option value=${data.id} id="supplier-id"> ${data.name}</option>`);
        })
      }
    })
  });
  $(document).on("click", "#quantity-add", function () {
    let n = $("#n-qty").val();
    for (let i = 0; i < n; i++) {
      $("#form-product-add").append(`<tr>
      <td>Tên sản phẩm:
      <select name="select-name-product" class="select-name-product"></select>
    </td> 
    <td>Số lượng:<input type="number" name="product-qty" class="product-qty"></td>
    </tr>
    `)
    }
    $.ajax({
      url: "enter_coupon/action.php",
      method: "POST",
      data: { n: n },
      success: function (data) {
        console.log(data);
        data.map((data, index) => {
          $(".select-name-product").append(`<option value=${data.id} id="supplier-id">${data.id}-${data.name}</option>`);
        })
      }
    })
  });
  $(document).on("click","#btn-add-entercoupon-submit",function(){
    let supplier_id=$("#select-supplier").val();
    let staff_id=$("#staff-id").val();
    let enter_day=$("#enter-day").val();
    let data_product=document.getElementsByName('select-name-product');
    console.log(data_product);
  })
});