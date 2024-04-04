<?php
if(!empty($_POST)){
    $id=getPOST("id");
    $name=getPOST("name");
    if($id>0){
        execute("Update  category set name='$name' where id=$id");

            
    }else{
        execute("INSERT INTO category(name) VALUES ('$name')");
       
    
    }

}