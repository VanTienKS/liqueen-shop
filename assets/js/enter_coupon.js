//Init value
let listProduct = [];
let selectedIdProduct = [];

function addIdProduct(index, event) {
  let item = selectedIdProduct.find((element) => element.index === index);
  item.id = event.target.value;
}

function addNumberProduct(index, event) {
  let item = selectedIdProduct.find((element) => element.index === index);
  item.number = parseInt(event.target.value);
}

function getListProduct() {
  $.post("enter_coupon.php/getListProduct", { n: 1 }, (data) => {
    listProduct = data;
  })
}

function onSubmit() {
  selectedIdProduct = [{index: 0, id: 113, number: 1}, {index: 0, id: 117, number: 1}]; 
  let data = {
    products: selectedIdProduct,
    supplier_id: 22,
    created_at: "2024-01-01"
  }
  
  data.products = selectedIdProduct;
  console.log("data: ", data);

  $.post('enter_coupon.php/add', data, function (response) {

  });
}

$(document).ready(function () {
  // Init list product
  getListProduct();
  console.log(listProduct);
  $('#btn-add-entercoupon').click(function () {
    $.ajax({
      url: "enter_coupon.php/displaySupplierInSelect",
      method: "POST",
      success: function (data) {

        console.log(data);
        data.map((data, index) => {
          $('#select-supplier').append(`<option value=${data.id} id="supplier-id">${data.id}-${data.name}</option>`);
        })
      }
    })
  });

  $(document).on("click", "#quantity-add", function () {
    $("#form-product-add").html('');

    let n = $("#n-qty").val();
    for (let i = 0; i < n; i++) {
      let idProduct = {
        index: i,
        id: 0,
        number: 0
      }
      selectedIdProduct.push(idProduct);

      $("#form-product-add").append(
        `<tr>
        <td> Tên sản phẩm:
          <select name="select-name-product" class="select-name-product" onchange="addIdProduct(${i}, event)"></select>
        </td> 
        <td>Số lượng:<input type="number" name="product-qty" class="product-qty" onchange="addNumberProduct(${i}, event)"></td>
      </tr>`)
    }
    // listProduct.map((item) => {

    // })
    $.ajax({
      url: "enter_coupon.php/getListProduct",
      method: "POST",
      data: { n: n },
      success: function (data) {
        listProduct = data;
        data.map((item, index) => {
          $(".select-name-product").append(`<option value=${item.id} id="supplier-id">${item.id}-${item.name}</option>`);
        })
      }
    })
    console.log()
  });

  $(document).on("click", "#btn-add-entercoupon-submit", function () {
    let supplier_id = $("#select-supplier").val();
    let staff_id = $("#staff-id").val();
    let enter_day = $("#enter-day").val();
    let data_product = document.getElementsByName('select-name-product');
    console.log(data_product);
  })

  //Submit data
  $('#btn-add-entercoupon-submit').on("click", onSubmit);
});