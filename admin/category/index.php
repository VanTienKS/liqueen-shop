
<?php

    $title = 'Quản lý danh mục sản phẩm';
    $baseUrl=  '../';
    require_once('../layouts/header.php');

    require_once('../category/form_save.php');  
    require_once('../category/form_api.php');  
    $id=$name='';
    if (isset($_GET['id'])) {
        $id = getGET('id');
        $sql = "SELECT * FROM category WHERE id = $id";
        $data = executeResult($sql, true);
        if (!empty($data)) {
            $name = $data[0]['name']; // Access the first row
        }
    }
 

    $sql ="select * from category ";
    $data= executeResult($sql);
    ?>   <div class ="row" style="margin-top:20px;">
       <div class="col-md-12 ">
       <h3>Quản lý danh mục sản phẩm</h3>
       </div>
       <div class="col-md-6 " style="margin-top:20px">
       <form method="post" action="index.php" onsubmit="return validateForm();">
					<div class="form-group">
				  <label for="usr" style="font-weight:bold;">Tên danh mục:</label>
				  <input required="true" type="text" class="form-control" id="name" name="name" value="<?=$name?>">
				<input type="text" name ="id" value="<?=$id?>" hidden="true">
                <button class="btn btn-success">Lưu</button>
                </div>
            
            </form>  
            </div>

       <div class="col-md-12 table-responsive">
    

  
        <table class="table table-bordered table-hover  ">
        <thread>
          <tr>
          <th>STT</th>
            <th>Tên danh mục</th>
            
            <th style="width: 50px"></th>
            <th style="width: 50px"></th>
          </tr>

        </thread>
    <?php
    $index=0;
        foreach($data as $item){
            echo '<tr>
            <td>'.(++$index).'</td>
              <td>'.$item['name'].'</td>
             
              <td style="width: 50px">
              <a href="?id='.$item['id'].'"><button class="btn btn-warning">Sửa</button></a>
              </td>
              <td style="width: 50px">
              <button onclick="deleteCategory('.$item['id'].')" class="btn btn-danger">Xóa</button>
               </td>
            </tr>';
        }

?>

        </table>
    </div>
</div>
<script >
function deleteCategory(id)
{   option=confirm('Bạn có chắc chắn xóa người dùng này không')
  if(!option) return;
  $.post('form_api.php',{
    'id':id,
    'action':'delete'
  }, function(data) {
    if(data!=null&& data !='')
    {
      location.reload()
        return;
    }
   

  }

  )
}
</script>
<?php
 require_once('../layouts/footer.php');
 ?>

