<?php
    $userID = $_POST['userID'];
    $userPWD = $_POST['userPWD'];
    $userNAME = $_POST['userNAME'];
    $userNUM = $_POST['userNUM'];

    $conn=mysqli_connect("127.0.0.1","devUser","abcd123$","accountDB");
    //$db=mysqli_select_db("accountDB",$conn);
    if($conn){
    }
    else
    {
        echo "db연결실패";
    }
    //password 받은 값을 해쉬함수태워서 변환후 $hashpass 에 저장

    $hashpass = hash("sha256",$userPWD);
    $sql = "INSERT INTO users(userID, userPWD, userNAME, userNUM) VALUES ('$userID', '$hashpass' ,'$userNAME','$userNUM')";
     
    if ($conn->query($sql) === TRUE) {
    }
    else {
        echo "Error: " . $sql . "" . $conn->error;
    }

    $conn->close();
?>
