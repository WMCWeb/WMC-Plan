<?php
    $userId = $_POST['userId'];
    $userPassword = $_POST['userPassword'];

    $conn=mysqli_connect("127.0.0.1","devUser","abcd123$","accountDB");
    //$db=mysqli_select_db("accountDB",$conn);
    if($conn){
        echo "eb연결성공";
    }
    else
    {
        echo "db연결실패";
    }
    //password 받은 값을 해쉬함수태워서 변환후 $hashpass 에 저장
    $hashpass = $userPassword;
    $sql = "INSERT INTO account(userID, password, authKey) VALUES ('$userId', '$hashpass' ,'$hashpass')";
     
    if ($conn->query($sql) === TRUE) {
        echo "삽입 성공";
    } else {
        echo "Error: " . $sql . "
    " . $conn->error;
    }
     
    $conn->close();
    ?>
