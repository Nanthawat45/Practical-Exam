<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ฟอร์มค้นหาลูกค้าตามเบอร์โทร</title>
</head>
<body>
    <h1>ฟอร์มค้นหาลูกค้าตามเบอร์โทร</h1>
    <form action="kfc2.php" method="POST">
    <input type="text" placeholder="Enter Phone Number" name="PhoneNumber">
    <br><br>
    <input type="submit">
    </form>
</body>
</html>

<?php
    require "connect.php";
    if(isset($_POST["PhoneNumber"])&&$_POST['PhoneNumber']!=null)
    {
        $sql = "SELECT * FROM tbl_customer Where  PhoneNumber like CONCAT('%',:PhoneNumber,'%')";
    
        echo "<br>" . " sql =
        " .$sql . "<br>";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':PhoneNumber',$_POST['PhoneNumber']);
        $stmt->execute();
        //$result = $stmt->fetch(PDO::FETCH_ASSOC)
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
    <td>    <?php echo $result["CustomerID"]; ?>     </td>
     <td>   <?php echo $result["Firstname"]; ?>  </td>
    <td>    <?php echo $result["LastName"]; ?></td>
    <td>    <?php echo $result["PhoneNumber"]; ?>  </td>
    
  </tr>
 
<?php
  }
?>
 
 <?php }
    // if($_GET['P_name']==null)
    // echo "<br> NO Data... <br>";
    $conn = null;
        
    ?>
    </table>