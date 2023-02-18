<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>select-customer-1</title>
</head>
<body>
<?php
require "connect.php";
$sql = "SELECT * FROM tbl_food,tbl_menu where tbl_food.MenuID=tbl_menu.MenuID";
 
$stmt = $conn->prepare($sql);
 
$stmt->execute();
?>
 
<table width="800" border="1">
  <tr>
    <th width="90"> <div align="center">ชื่ออาหาร</div></th>
    <th width="140"> <div align="center">รายละเอียด</div></th>
    <th width="120"> <div align="center">เมนู </div></th>
    <th width="100"> <div align="center">ราคา </div></th>
  </tr>
 
<?php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
    <td>    <?php echo $result["FoodName"]; ?>     </td>
     <td>   <?php echo $result["FoodDescription"]; ?>  </td>
    <td>    <?php echo $result["MenuName"]; ?></td>
    <td>    <?php echo $result["FoodPrice"]; ?>  </td>
    
  </tr>
 
<?php
  }
?>
 
</table>
 
<?php
$conn = null;
?>
</body>
</html>