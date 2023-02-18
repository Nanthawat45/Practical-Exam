<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add country</title>
</head>


<body>
    <h1>เพิ่มข้อมูลอาหาร</h1>
    <form action="kfc4.php" method="POST">


       <input type="text" placeholder="กรุณาใส่รหัสอาหารอาหาร" name="FoodID">
        <br><br>
        <input type="text" placeholder="กรุณาใส่ชื่อรายการอาหารอาหาร" name="FoodName">
        <br><br>
        <input type="text" placeholder="กรุณาใส่ราคา" name="FoodPrice">
        <br><br>
        <textarea name="FoodDescription" id="FoodDescription" cols="30" rows="10"></textarea>
        <br><br>
        <input type="text" placeholder="กรุณาใส่รหัสเมนูประเภทอาหาร" name="MenuID">
        <br><br>
        <input type="submit">
    </form>
</body>
</html>




<?php
if (!empty($_POST['FoodID'])&& !empty($_POST['FoodName'])&& !empty($_POST['FoodPrice'])&& !empty($_POST['FoodDescription'])&& !empty($_POST['MenuID'])):
    require'connect.php';
    $sql_insert="insert into tbl_food values(:FoodID,:FoodName,:FoodDescription,:FoodPrice,:MenuID)";


    $stmt=$conn->prepare($sql_insert);
    $stmt->bindParam(':FoodID',$_POST['FoodID']);
    $stmt->bindParam(':FoodName',$_POST['FoodName']);
    $stmt->bindParam(':FoodPrice',$_POST['FoodPrice']);
    $stmt->bindParam(':FoodDescription',$_POST['FoodDescription']);
     $stmt->bindParam(':MenuID',$_POST['MenuID']);

    if ($stmt->execute()):
        $message = 'Suscessfully add new country';
        //header("Location:/business/selectCountry1.php");
       
    else:
        $message='Fail to add new coutry';
    endif;
    echo $message;
    $conn=null;
endif;
?>
