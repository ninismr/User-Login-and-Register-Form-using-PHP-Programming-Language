<?php

if (isset($_POST['txtName']) && 
    isset($_POST['txtEmail']) && 
    isset($_POST['txtNumber']) &&
    isset($_POST['txtAddress']) &&
    isset($_POST['txtMsg'])) {

        include 'formconn.php';

    function validate($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $flname = validate($_POST['txtName']);
    $mail = validate($_POST['txtEmail']);
    $num = validate($_POST['txtNumber']);
    $adrs = validate($_POST['txtAddress']);
    $msg = validate($_POST['txtMsg']);

    if (empty($flname) || empty($mail) || empty($num) || empty($adrs) || empty($msg)) {
        header("Location: contact.html");

    }else {
        $sql2 = "INSERT INTO visitors (fullName, email, phoneNum, address, message) VALUES ('$flname',
        '$mail', '$num', '$adrs', '$msg')";
        $res = mysqli_query($conn, $sql2);

        if ($res) {
            echo "<script>alert('Your Message Was Sent Successfully!')</script>";

            $flname = "";
            $mail = "";
            $num = "";
            $adrs = "";
            $msg = "";
            
        }else {
            echo "<script>alert('Your Message Could Not be Sent!')</script>";
        }
    }

}else {
    header("Location: contact.html");
}

?>