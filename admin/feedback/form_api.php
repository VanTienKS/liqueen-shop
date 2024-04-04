<?php


session_start();
require_once('../../utils/utility.php');
    require_once('../../database/dbhelper.php');

    $user=getUserToken();
    if($user == null)
    {
       
            die();
    } 
    
    if(!empty($_POST))
    {   
       
        $action=getPOST('action');
        switch  ($action){
            case 'mark':
                markable();
                break;
        }
    }
    function markable()
    {
        $id=getPOST('id');
        $created_date= date('Y-m-d H:i:s');
        $sql="update feedback set status=1,created_date= '$created_date' where id= '$id'";
        echo $sql;
        execute($sql);
    }