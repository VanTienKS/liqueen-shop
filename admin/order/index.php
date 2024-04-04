<?php
	$title = 'Quản Lý Đơn Hàng';
	$baseUrl = '../';
	require_once('../layouts/header.php');

	//pending, approved, cancel
	$sql = "SELECT * FROM `order`"; 

	$data = executeResult($sql);
?>

<div class="row" style="margin-top: 20px;">
	<div class="col-md-12 table-responsive">
		<h3>Quản Lý Đơn Hàng</h3>

		<table class="table table-bordered table-hover" style="margin-top: 20px;">
			<thead>
				<tr>
					<th>STT</th>
					<th>Họ & Tên</th>
					<th>SĐT</th>
					<th>Địa Chỉ</th>
					
					<th>Ngày Tạo</th>
					<th>Hình thức thanh toán</th>
					<th style="width: 120px"> Trạng thái</th>
				</tr>
			</thead>
			<tbody>
<?php
	$index = 0;
	foreach($data as $item) {
		echo '<tr>
					<th>'.(++$index).'</th>
					<td><a href="detail.php?id='.$item['id'].'">'.$item['cus_fullname'].'</a></td>
					<td><a href="detail.php?id='.$item['id'].'">'.$item['cus_mobile'].'</a></td>					
					<td>'.$item['cus_address'].'</td>
					<td>'.$item['created_date'].'</td>
					<td style="width: 50px">';
					
					if ($item['payment_method'] == 0) {
						echo 'COD';
					} elseif ($item['payment_method'] == 1) {
						echo 'Bank';
					}
					echo '<td>';
		if($item['status'] == 0) {
			echo '<button onclick="changeStatus('.$item['id'].', 1)" class="btn btn-sm btn-success" style="margin-bottom: 10px;">Approve</button>
			<button onclick="changeStatus('.$item['id'].', 2)" class="btn btn-sm btn-danger">Cancel</button>';
		} else if($item['status'] == 1) {
			echo '<label class="badge badge-success">Approved</label>';
		} else {
			echo '<label class="badge badge-danger">Cancel</label>';
		}
		echo '</td>
				</tr>';
	}
?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	function changeStatus(id, status ) {
		$.post('form_api.php', {
			'id': id,
			'status': status ,
			'action': 'update_status'
		}, function(data) {
	if(data != null && data != ''){
		//alert(data);
		return;
	}
		location.reloat
		})
	}
</script>

<?php
	require_once('../layouts/footer.php');
?>