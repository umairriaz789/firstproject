<?php
$insert=false;
if(isset($_POST['name'])){
    $SERVER ="localhost";
    $usename = "root";
    $password="";

    $con = mysqli_connect($SERVER,$usename,$password);

    if(!$con){
        die("connection to this database faild due to".mysqli_connect_error());
    }
    //echo "success connecting to db"; 
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $Class=$_POST['Class'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $desc=$_POST['desc'];
    $sql = "INSERT INTO `reg`.`registration` (`name`, `age`, `gender`, `class`, `email`, `phone`, `other information`, `dt`) VALUES ('$name', '$age', '$gender', '$Class', '$email', '$phone', '$desc.', current_timestamp());";
    //echo $sql;

    if($con->query($sql) == true){
        //echo "successuly inserted";
        $insert=true;
    }
    else{
        echo "error: $sql <br> $con->error";
    }
    $con->close();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="b" src="photo-1481627834876-b7833e8f5570.jpg" alt="image">
    <div class="container">
        <h2>Student Registration form</h2>
        <p>Please fill this form</p>
        <?php
        if($insert == true){
        echo "<P class='submit'>Successully submit</P>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="Class" id="Class" placeholder="Enter your class">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10"
                placeholder="Enter any other information here"></textarea>
            <button class="btn">submit</button>

        </form>
    </div>
    <script src="index.js"></script>
</body>

</html>