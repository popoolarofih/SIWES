<?php
$conn = mysqli_connect("localhost", "root", "", "expenses") or die ("Error : " . mysqli_error($conn));

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $title = $_POST['title'];
    $amount = $_POST['amount'];
    $img = $_FILES['img']['name'];

    $dir = "img/";
    move_uploaded_file($_FILES['img']['tmp_name'], $dir.$img);

    $insert = "insert into expenditure(Name, Description, Amount, Img) values('$name', '$title', '$amount', '$img')";
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

function getBalance(){
  global $conn;
  $amm = array();
  $total = 0;
  $sql = "select Amount from expenditure";
  $res = mysqli_query($conn, $sql);
  if(mysqli_num_rows($res) > 0){
    while($row = mysqli_fetch_array($res)){
      $amt = $row['Amount'];
      array_push($amm, $amt);
    }

    for($i=0;$i<count($amm);$i++){
      $j = $amm[$i];
      $total = $total + $j;
    }

  }
  $output = $total;
  return $output;
}

function getIncome(){
  global $conn;
  $amm = array();
  $total = 0;
  $sql = "select Amount from expenditure";
  $res = mysqli_query($conn, $sql);
  if(mysqli_num_rows($res) > 0){
    while($row = mysqli_fetch_array($res)){
      $amt = $row['Amount'];
      if($amt > 0){
      array_push($amm, $amt);
      }
    }

    for($i=0;$i<count($amm);$i++){
      $j = $amm[$i];
      $total = $total + $j;
    }

  }
  $output = $total;
  return $output;
}

function getExpenses(){
  global $conn;
  $amm = array();
  $total = 0;
  $sql = "select Amount from expenditure";
  $res = mysqli_query($conn, $sql);
  if(mysqli_num_rows($res) > 0){
    while($row = mysqli_fetch_array($res)){
      $amt = $row['Amount'];
      if($amt < 0){
      array_push($amm, $amt);
      }
    }

    for($i=0;$i<count($amm);$i++){
      $j = $amm[$i];
      $total = $total + $j;
    }

  }
  $output = $total;
  return $output;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="expense.css">
    <title>MY Expense Tracker</title>
</head>
<body>
<div class="navi">
<div class="logo">
  <img src="./Landing page for expense tracker/app_icon_200.png" alt="logo">
</div>
<div class="menu">
            <ul>
               <a href="./Landing page for expense tracker/remind.html"><button><li>HOME</li></button></a> 
                <a href="./dash.php"><button><li>ADMIN</li></button></a>
                <a href="./currency.php"><button><li>CURRENCY CONVERTER</li></button></a>
                <a href="./calculator.html"><button><li>CALCULATOR</li></button></a>
                
            </ul>
        </div> 
  </div>
  <!-- <div class="barr">
    <div class="ball"></div>
  </div>
    <h2 class="top"></h2> -->
    <div class="calendar">
      <div class="calendar-body">
        <span class="month-name">Month</span>
        <span class="day-name">Day</span>
        <span class="date-number">00</span>
        <span class="year">0000</span>
        
      </div>
      
    </div>
  
   <span class="time">00:00:00</span>
        <h2 class="greeting">GOOD MORNING</h2>
    
   <div class="container">
    
      <div class="b">
        <h4 class="bal">Available Balance:</h4>
      <h1 id="balance">#<?php echo getBalance(); ?></h1>
      </div>
      
      <div class="inc-exp-container">
        <div>
          <h4 class="income">Income</h4>
          <p id="money-plus" class="money plus">#<?php echo getIncome(); ?></p>
        </div>
        <div>
          <h4 class="expense">Expense</h4>
          <p id="money-minus" class="money minus">#<?php echo getExpenses(); ?></p>
        </div>
      </div>
     
    
        <div class="incom">
       <form action="expense.php" method="POST" enctype="multipart/form-data">
         <div class="form-control">
           <label for="text"><h5 class="message"> Description</h5> </label>
           <input type="text" id="text" name="title" placeholder="Enter text..."  required/>
         </div>
         <div class="form-control">
           <label for="text" > <h5 class="message">Payer's Name</h5> </label>
           <input type="text" id="tit" name="name" placeholder="Enter name..."  required />
         </div>
         <div class="form-control">
           <label for="amount"> <h5 class="message">Amount Being Paid</h5> <br/>
               To Add income begin with this (+)  To Add expense begin With this (-) </label>
           <input type="number" id="amount" name="amount" placeholder="Enter amount..."  required/>
                <h5 class="message">Upload Reciept</h5>
         </div>
    
         <input style=" background:rgb(5, 150, 70); color: maroon; border:1px solid maroon; margin-left:50px; margin-bottom:20px; margin-top:20px;" type="file" id="submit" name="img" accept="image/*"  required>
         <button class="btn" type="submit" name="add">Add transaction</button>
       </form>
       </div>
    </div>
   
    <div class="chart"></div>
    <div class="slidetext">
    </div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
<script src="./tacker.js"></script>
</html>