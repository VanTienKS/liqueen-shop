<?php
	$title = 'Quản Lý Sản Phẩm';
	$baseUrl = '../';
	require_once('../layouts/header.php');

	$sql = "SELECT Product.*, Category.name AS category_name, Brand.name AS brand_name 
        FROM Product 
        LEFT JOIN Category ON Product.category_id = Category.id 
        LEFT JOIN Brand ON Product.brand_id = Brand.id 
        WHERE Product.deleted = 0";
	$data = executeResult($sql);
?>

<div class="row" style="margin-top: 20px;">
	<div class="col-md-12 table-responsive">
		<h3>Quản Lý Sản Phẩm</h3>

		<a href="editor.php"><button class="btn btn-success">Thêm Sản Phẩm</button></a>

		<table class="table table-bordered table-hover" style="margin-top: 20px;">
			<thead>
				<tr>
					<th>STT</th>
					<th>Thumbnail</th>
					<th>Tên Sản Phẩm</th>
					<th>Nhãn hiệu</th>
					<th>Số lượng tồn</th>
					<th>Mô tả</th>
					<th>Giá nhập</th>
					<th>Giá bán</th>
					<th>Danh Mục</th>
					<th style="width: 50px"></th>
					<th style="width: 50px"></th>
				</tr>
			</thead>
			<tbody>
<?php
	$index = 0;
	foreach($data as $item) {
		echo '<tr>
					<th>'.(++$index).'</th>
					<td><img src="'.($item['featured_image']).'" style="height: 100px"/></td>
					<td>'.$item['name'].'</td>
					<td>'.$item['brand_name'].'</td>
					<td>'.$item['inventory_qty'].'</td>
					<td>'.$item['description'].'</td>
					<td>'.number_format($item['enter_price']).' VNĐ</td>
					<td>'.number_format($item['price']).' VNĐ</td>
					<td>'.$item['category_name'].'</td>
					<td style="width: 50px">
						<a href="editor.php?id='.$item['id'].'"><button class="btn btn-warning">Sửa</button></a>
					</td>
					<td style="width: 50px">
						<button onclick="deleteProduct('.$item['id'].')" class="btn btn-danger">Xoá</button>
					</td>
				</tr>';
	}
?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	function deleteProduct(id) {
		option = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')
		if(!option) return;

		$.post('form_api.php', {
			'id': id,
			'action': 'delete'
		}, function(data) {
			location.reload()
		})
	}
</script>

<?php
	require_once('../layouts/footer.php');
?>