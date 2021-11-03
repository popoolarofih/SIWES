<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./expense.style/chat.css">
    <title>Admin</title>
</head>
<body>
    <div class="nav">
    
    </div>
    <h2>Number Of Expenditures</h2>
    <?php
$conn = mysqli_connect("localhost", "root", "", "expenses") or die ("Error : " . mysqli_error($conn));

$select = "select * from expenditure";
$result = mysqli_query($conn, $select);
$tttt = mysqli_num_rows($result);
echo "<h2>".$tttt."</h2>";
if(mysqli_num_rows($result) > 0){
    echo "<table>
    <tr>
    <th>id</th>
    <th>Name</th>
    <th>Description</th>
    <th>Amount</th>
    <th>Img</th>
    <th>Time</th>
    </tr>
    ";
    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        $name = $row['Name'];
        $desc = $row['Description'];
        $amt = $row['Amount'];
        $img = $row['Img'];
        $time = $row['Time'];
        echo '
        <tr>
        <td>'.$id.'</td>
        <td>'.$name.'</td>
        <td>'.$desc.'</td>
        <td>'.$amt.'</td>
        <td><img width="100px"  src="img/'.$img.'"></td>
        <td>'.$time.'</td>
        </tr>
        ';
    }
    echo "</table>";
}
else{
    echo "<h1>Nothing Here</h1>";
}

?>
</body>
</html>

