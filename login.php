<?php
    $userID = $_POST['userID'];
    $userPWD = hash("sha256",($_POST['userPWD']));


    $conn=mysqli_connect("127.0.0.1","devUser","abcd123$","accountDB");
    //$db=mysqli_select_db("accountDB",$conn);
    if($conn){
    }
    else
    {
        echo "db연결실패";
    }
    //password 받은 값을 해쉬함수태워서 변환후 $hashpass 에 저장


    $result = mysqli_query($conn,"SELECT * FROM users WHERE userID='$userID'");
    $rows = mysqli_fetch_array($result);

    if(!$result || $rows['userPWD'] != $userPWD) {
        echo "가입되지 않은 ID 거나 비밀번호가 틀립니다.";
    }
    else{
        $userKey= password_hash($userPWD,PASSWORD_DEFAULT);
        $sql = "INSERT INTO userKey(userKey, keyTime) VALUES ('$userKey', now() )";

        $sql_update="UPDATE users SET userKey = '$userKey' WHERE userID='$userID'";

        if ($conn->query($sql_update) === TRUE) {
          echo "OK_1";
        }

        if ($conn->query($sql) === TRUE) {
        }
        echo "OK";

    }

    $conn->close();
?>
