<?php
include("../../connectdb/connect.php");
if (isset($_POST['pull_supplier'])) {
  $sql_select = "SELECT * from supplier order by id asc";
  $query = mysqli_query($mysqli, $sql_select);
  $result = [];
  $index = 0;
  while ($row = $query->fetch_assoc()) {
    $result[$index++] = $row;
  }
  header("Content-Type: application/json");
  echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
if (isset($_POST['n'])) {
  $sql_select = "SELECT * from product order by id asc";
  $query = mysqli_query($mysqli, $sql_select);
  $result = [];
  $index = 0;
  while ($row = $query->fetch_assoc()) {
    $result[$index++] = $row;
  }
  header("Content-Type: application/json");
  echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
