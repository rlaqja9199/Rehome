<?php 
   var_dump($_FILES);
    $fileimg = $_FILES['imgsrc'];
    $fileimg2 = $_FILES['imgsrc2'];
    $imgsrc = $_FILES ? $fileimg['name'] : $_POST['oldimg'];    
    $imgsrc2 = $_FILES ? $fileimg2['name'] : $_POST['oldimg2'];  
    echo $imgsrc2;
    if($fileimg['name'] != $_POST['oldimg']){
        echo $_POST['oldimg'];
        $re = unlink('../images/'.$_POST['oldimg']);
        if($re) {
            echo "삭제";
        }else {
            echo "삭제되지 않음";
        }
        // echo $fileimg['name'];
        // echo $fileimg['tmp_name'];
        $re2 = move_uploaded_file("{$fileimg['tmp_name']}",'C:\Apache24\htdocs\php\ReHome\images/'."{$fileimg['name']}");
        if($re2){
            echo '성공';
        }else {
            echo '실패';
        }
    }
    if($fileimg2['name'] != $_POST['oldimg2']){
        echo $_POST['oldimg2'];
        $re3 = unlink('../images/'.$_POST['oldimg2']);
        if($re3) {
            echo "삭제";
        }else {
            echo "삭제되지 않음";
        }
        $re4 = move_uploaded_file("{$fileimg2['tmp_name']}",'C:\Apache24\htdocs\php\ReHome\images/'."{$fileimg2['name']}");
        if($re4){
            echo "성공";
        }else {
            echo "실패";
        }
    }

    // $conn = mysqli_connect('localhost','root','1234','rehome');    
    $conn = mysqli_connect('localhost','cathkid','rornfl*#3693','cathkid'); 
    $query = "update bestitem
    set name1 = '{$_POST['name1']}',
    name2 = '{$_POST['name2']}',
    imgsrc = '{$imgsrc}',             
    brand = '{$_POST['brand']}',
    price = '{$_POST['price']}',
    saleprice = {$_POST['saleprice']},
    id = {$_POST['id']},
    imgsrc2 = '{$imgsrc2}'            
    where id = {$_POST['id']}
    ";
    $result = mysqli_query($conn, $query);
    if($result){
        echo "성공";
    }else {
        echo "실패";
        echo $query;
    }
    header('Location:/php/ReHome/index.php');
?>