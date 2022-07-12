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
        }else {
            echo "<script>alert('Your Message Could Not be Sent!')</script>";
        }
    }

}else {
    header("Location: contact.html");
}

?>


<!DOCTYPE html>
<html>
<head>
		<title>HOGWARTS</title>
		<link rel="stylesheet" type="text/css"
		media="all" href="style7.css">
</head>
<body>
		<div id="layout">
			<div id="header">
			<img src="hdr.jpg" class="header">
			</div>
			<div id="menu">
				<ul>
					<li><a href="index7.html">Home</a></li>
					<li><a href="profil.html">About Me</a></li>
					<li><a href="contact.html">Contact Us</a></li>
				</ul>
			</div>
			<div id="runningtext">
			<marquee behavior="scroll" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();" direction="left">
					Welcome to My Website
			</marquee>
			</div>
			<div id="contact">
                <div class="contact">
                <h2>CONTACT US</h2><br>
                    <form method="POST" action=" ">
                    <table class="contactable">
                    <tr>
                        <td class="column1"> Full Name : </td>
                        <td class="column2"> <input type="text" name="txtName" size="50"> </td>
                    </tr>
                    <tr>
                        <td> E-Mail : </td>
                        <td> <input type="text" name="txtEmail" size="50"> </td>
                    </tr>
                    <tr>
                        <td> Phone Number : </td>
                        <td> <input type="text" name="txtNumber" size="50"> </td>
                    </tr>
                    <tr>
                        <td> Address : </td>
                        <td> <input type="text" name="txtAddress" size="50"> </td>
                    </tr>
                    <tr>
                        <td> Message : </td>
                        <td> <textarea type="text" name="txtMsg" cols="80" rows="10"></textarea> </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="submitbtn">    
                            <input type="reset" name="resetbtn"></td>
                    </tr>
                    </table>
                    </form>
                </div>
            </div>
			<div id="footer"> &copy 2020, by Ninis </div>
		</div>
</body>
</html>