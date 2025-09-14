<?php

    if($_SERVER["REQUEST_METHOD"]=="POST") {
    $user=$_POST["login"];
    $pswd=$_POST["pass"];
    $con=new mysqli("localhost","root","","taxi_booking");
    if($con->connect_error)
    {
        echo "not connected";
    }
    else { echo "connected";}
    $stmt=$con->prepare("insert into logindata(user,pswd) values(?,?)");
    $stmt->bind_param("ss",$user,$pswd);
   if ($stmt->execute()) {
    header("Location: index.html?success=User+registered+successfully");
} else {
    header("Location: index.html?error=Failed+to+register");
}

$stmt->close();
$con->close();
exit;
    }
?>