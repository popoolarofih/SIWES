<?php
$conn = mysqli_connect("localhost", "root", "", "users") or die ("Error : " . mysqli_error($conn));

if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $bio = $_POST['bio'];

    $insert = "insert into user(first_name, last_name, bio) values('$first_name', '$last_name', '$bio')";
    if(mysqli_query($conn, $insert)){
        echo "<script>alert('success')</script>";
    }
    else{
        echo "<script>alert('error')</script>";
    }
    
    /*echo $first_name;
    echo $last_name;
    echo $bio;*/
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ttt.php" method="POST">
        <div>
            <label>First name</label>
            <input type="text" name="first_name" required>
        </div>
        <div>
            <label>Last name</label>
            <input type="text" name="last_name" required>
        </div>
        <div>
            <label>Bio</label>
            <textarea name="bio"></textarea>
        </div>
        <div>
            <input type="submit" name="submit">
        </div>
    </form>
</body>
</html>
