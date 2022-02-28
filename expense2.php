<?php
$conn = mysqli_connect("localhost", "root", "", "expenses") or die("Error : " . mysqli_error($conn));

if (isset($_POST['add'])) {
  $name = $_POST['name'];
  $title = $_POST['title'];
  $amount = $_POST['amount'];
  $img = $_FILES['img']['name'];

  $dir = "img/";
  move_uploaded_file($_FILES['img']['tmp_name'], $dir . $img);

  $insert = "insert into expenditure(Name, Description, Amount, Img) values('$name', '$title', '$amount', '$img')";
  if (mysqli_query($conn, $insert)) {
    echo "<script>alert('success')</script>";
  } else {
    echo "<script>alert('error')</script>";
  }
}

function getBalance()
{
  global $conn;
  $amm = array();
  $total = 0;
  $sql = "select Amount from expenditure";
  $res = mysqli_query($conn, $sql);
  if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_array($res)) {
      $amt = $row['Amount'];
      array_push($amm, $amt);
    }

    for ($i = 0; $i < count($amm); $i++) {
      $j = $amm[$i];
      $total = $total + $j;
    }
  }
  $output = $total;
  return $output;
}

function getIncome()
{
  global $conn;
  $amm = array();
  $total = 0;
  $sql = "select Amount from expenditure";
  $res = mysqli_query($conn, $sql);
  if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_array($res)) {
      $amt = $row['Amount'];
      if ($amt > 0) {
        array_push($amm, $amt);
      }
    }

    for ($i = 0; $i < count($amm); $i++) {
      $j = $amm[$i];
      $total = $total + $j;
    }
  }
  $output = $total;
  return $output;
}

function getExpenses()
{
  global $conn;
  $amm = array();
  $total = 0;
  $sql = "select Amount from expenditure";
  $res = mysqli_query($conn, $sql);
  if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_array($res)) {
      $amt = $row['Amount'];
      if ($amt < 0) {
        array_push($amm, $amt);
      }
    }

    for ($i = 0; $i < count($amm); $i++) {
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
  <link rel="stylesheet" href="expense2.css">
  <title>POP EXPENSE</title>
  <!-- Favicon  -->
  <link rel="icon" href="images/favicon.png">
</head>

<body class="body">
  <div class="navi">
    <div class="logo">
      <img src="./images/pop.png" alt="logo">
    </div>
    <div class="menu">
      <ul>
        <a href="./index.php"><button class="hom">
            <li>HOME</li>
          </button></a>
        <a href="./user-registration.php"><button class="ad">
            <li>ADMIN</li>
          </button></a>
        <a href="./converter2/converter.html"><button class="ren">
            <li>CURRENCY CONVERTER</li>
          </button></a>
        <a href="./calculator.html"><button class="cal">
            <li>CALCULATOR</li>
          </button></a>

         
       
      </ul>
    </div>
  </div>
 
  <div class="calendar">
    <div class="calendar-body">
      <span class="month-name">Month</span>
      <span class="day-name">Day</span>
      <span class="date-number">00</span>
      <span class="year">0000</span>
    <span class="time">00:00:00</span>
  <h2 class="greeting">GOOD MORNING</h2>
    </div>

  </div>

  

  <div class="container">

    <div class="b">
      <h4 class="av" >Available Balance: <span> #<?php echo getBalance(); ?></span></h4>
      
    </div>

    <div class="inc-exp-container">
      <div>
      <img src="./images/arrow-down.svg" alt="">
        <h4 class="income">Income</h4>
        <p id="money-plus" class="money plus">#<?php echo getIncome(); ?></p>
        
      </div>
      <div>
        <img src="./images/arrow-up.svg" alt="">
        <h4 class="expense">Expense</h4>
        <p id="money-minus" class="money minus">#<?php echo getExpenses(); ?></p>
      </div>
    </div>
    <div class="incom">
      <form action="expense2.php" method="POST" enctype="multipart/form-data">
        <div class="form-control">
          <label for="text">
            <h3  class="message"> Description</h3>
          </label>
          <input autocomplete="off" type="text" id="text" name="title" placeholder="Eg Enter text..." required />
        </div>
        <div class="form-control">
          <label for="text">
            <h3 class="message2">Payer's Name</h3>
          </label>
          <input autocomplete="off" type="text" id="tit" name="name" placeholder="Eg Enter name..." required />
        </div>
        <div class="form-control" id="rite">
          <label class="np" for="amount">
            <h3  class="message3">Amount Being Paid</h3> 
            To Add income begin with this (+) To Add expense begin With this (-) <br>
          </label>
          <input autocomplete="off" type="number" id="amount" name="amount" placeholder="Eg Enter amount..." required />
         <label for="text"><h3>Upload Reciept</h3> </label> 
          <input autocomplete="off" type="file" class="upload" id="submit" name="img" accept="image/*" required>
        </div>
        <button class="btn" type="submit" name="add">Add transaction</button>
      </form>
    </div>
  </div>
  </div>
  <!-- <div class="chart"></div> -->
  <div class="slidetext"></div>
  <div class="about">
    
  <h1 class="credit"> Powered by <a href="https://wa.me/+2349017652551" target="_blank"> Executive Designs-09017652551 </a> | &copy copyright 2021 </h1>
  </div>

</body>

<script src="./tacker.js"></script>

</html>