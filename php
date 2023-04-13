<!DOCTYPE html>
<html>
<head>
    <title>Address Form</title>
</head>
<body>

<form method="post">
    Address: <input type="text" name="address" /><br />
    City: <input type="text" name="city" /><br />
    State: <input type="text" name="state" /><br />
    <input type="submit" name="submit" value="Submit" />
</form>

<?php
if(isset($_POST['submit'])) {
    $address = $_POST['Address'];
    $city = $_POST['City'];
    $state = $_POST['State'];
   
    if(empty($address) || empty($city) || empty($state)) {
        echo "Please fill out all fields";
    } else {
        if(strlen($state) !== 2) {
            echo "State must be two letters";
        } else {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "address";
            $conn = new mysqli($servername, $username, $password,$dbname);
           if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
          }

         $sql = "INSERT INTO addresses (address,city,state) VALUES ('$address', '$city','$state')";
         if ($conn->query($sql) === TRUE) {
               echo " insertion was successful";
}
        else {
        echo "Error: " ;
       }
     $conn->close();
}
}
?>
</body>
</html>
