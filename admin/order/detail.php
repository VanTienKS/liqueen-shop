<?php
	$title = 'Thông Tin Chi Tiết Đơn Hàng';
	$baseUrl = '../';
	require_once('../layouts/header.php');

	$orderId = getGet('id');

	$sql = "select order_item.*, Product.name, Product.featured_image from order_item left join Product on Product.id = order_item.product_id where order_item.order_id = $orderId";
	$data = executeResult($sql);

	$sql = "select * from order where id = $orderId";
	$orderItem = executeResult($sql, true);
?>

<div class="row" style="margin-top: 20px;">
	<div class="col-md-12">
		<h3>Chi Tiết Đơn Hàng</h3>
	</div>
	<div class="col-md-8 table-responsive">
		<table class="table table-bordered table-hover" style="margin-top: 20px;">
			<thead>
				<tr>
					<th>STT</th>
					<th>Thumbnail</th>
					<th>Tên Sản Phẩm</th>
					<th>Giá</th>
					<th>Số Lượng</th>
					<th>Tổng Giá</th>
				</tr>
			</thead>
			<tbody>
<?php
	$index = 0;
	foreach($data as $item) {
		echo '<tr>
					<th>'.(++$index).'</th>
					<td><img src="'.fixUrl($item['featured_image']).'" style="height: 120px"/></td>
					<td>'.$item['title'].'</td>
					<td>'.$item['price'].'</td>
					<td>'.$item['num'].'</td>
					<td>'.$item['total_money'].'</td>
				</tr>';
	}
?>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<th>Tổng Tiền</th>
					<th><?=$orderItem[0]['total_money']?></th>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-md-4">
		<table class="table table-bordered table-hover" style="margin-top: 20px;">
			<tr>
				<th>Họ & Tên: </th>
				<td><?=$orderItem[0]['fullname']?></td>
			</tr>
			<tr>
				<th>Email: </th>
				<td><?=$orderItem[0]['email']?></td>
			</tr>
			<tr>
				<th>Địa Chỉ: </th>
				<td><?=$orderItem[0]['ward_id']?></td>
			</tr>
			<tr>
				<th>Phone: </th>
				<td><?=$orderItem[0]['mobile']?></td>
			</tr>
		</table>
	</div>
</div>
<?php
	require_once('../layouts/footer.php');
?>