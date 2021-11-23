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

  /*echo $first_name;
    echo $last_name;
    echo $bio;*/
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
  <link rel="stylesheet" href="expense.css">
  <title>MY Expense Tracker</title>
</head>

<body class="body">
  <div class="navi">
    <div class="logo">
      <img src="./Landing page for expense tracker/app_icon_200.png" alt="logo">
    </div>
    <div class="menu">
      <ul>
        <a href="./Landing page for expense tracker/remind.html"><button class="hom">
            <li>HOME</li>
          </button></a>
        <a href="./signup.php"><button class="ad">
            <li>ADMIN</li>
          </button></a>
        <a href="./currency.php"><button class="ren">
            <li>CURRENCY CONVERTER</li>
          </button></a>
        <a href="./calculator.html"><button class="cal">
            <li>CALCULATOR</li>
          </button></a>
          <button onclick="open_t()"class="change">
            <li  >CHANGE THEME</li>
          </button>
        <div class="colors">
          <button class="purple" onclick="changeBgcolor('purple'); av('purple'); greting('purple'); sub('purple'); calenderb('purple'); lyear('purple'); datenumber('purple'); dayname('purple'); cal('purple'); change('purple'); ren('purple'); ad('purple'); 
           changegcolor('purple'); changeegcolor('purple'); his('purple'); mess2('purple'); mess4('purple'); mess3('purple');
           mes1('4px solid goldenrod');mes2('4px solid goldenrod');mes3('4px solid goldenrod');mes4('4px solid goldenrod');
           text('2px solid purple'); tit('2px solid purple'); amount('2px solid purple'); btn('5px solid goldenrod'); bt('goldenrod'); b('purple') ">
             <span>Purple</span>
          </button>
         <button class="green" onclick="changeBgcolor('rgb(4, 99, 33)');  cal('rgb(4, 99, 33)'); change('rgb(4, 99, 33)'); ren('rgb(4, 99, 33)'); ad('rgb(4, 99, 33)'); av('rgb(4, 99, 33)'); greting('rgb(4, 99, 33)'); sub('rgb(4, 99, 33)'); calenderb('rgb(4, 99, 33)'); lyear('rgb(4, 99, 33)'); datenumber('rgb(4, 99, 33)'); dayname('rgb(4, 99, 33)'); 
           changegcolor('rgb(4, 99, 33)'); changeegcolor('rgb(4, 99, 33)'); his('rgb(4, 99, 33)'); mess2('rgb(4, 99, 33)'); mess4('rgb(4, 99, 33)'); mess3('rgb(4, 99, 33)');
           mes1('4px solid goldenrod');mes2('4px solid goldenrod');mes3('4px solid goldenrod');mes4('4px solid goldenrod');
           text('2px solid rgb(4, 99, 33)'); tit('2px solid rgb(4, 99, 33)'); amount('2px solid rgb(4, 99, 33)'); btn('5px solid goldenrod'); bt('goldenrod'); b('rgb(4, 99, 33)') ">
           <span>Green</span>
         </button>
          <button class="pink" onclick="changeBgcolor('rgb(233, 17, 53)'); cal('rgb(233, 17, 53)'); av('rgb(233, 17, 53)'); greting('rgb(233, 17, 53)'); sub('rgb(233, 17, 53)'); calenderb('rgb(233, 17, 53)'); lyear('rgb(233, 17, 53)'); datenumber('rgb(233, 17, 53)'); dayname('rgb(233, 17, 53)'); change('rgb(233, 17, 53)'); ren('rgb(233, 17, 53)'); ad('rgb(233, 17, 53)'); 
           changegcolor('rgb(233, 17, 53)'); changeegcolor('rgb(233, 17, 53)'); his('rgb(233, 17, 53)'); mess2('rgb(233, 17, 53)'); mess4('rgb(233, 17, 53)'); mess3('rgb(233, 17, 53)');
           mes1('4px solid goldenrod');mes2('4px solid goldenrod');mes3('4px solid goldenrod');mes4('4px solid goldenrod');
           text('2px solid rgb(233, 17, 53)'); tit('2px solid rgb(233, 17, 53)'); amount('2px solid rgb(233, 17, 53)'); btn('5px solid goldenrod'); bt('goldenrod'); b('rgb(233, 17, 53)')">
            <span>Pink</span>
          </button>
          <button class="red" onclick="changeBgcolor('red'); cal('red'); change('red'); ren('red'); ad('red'); av('red'); greting('red'); sub('red'); calenderb('red'); lyear('red'); datenumber('red'); dayname('red');
           changegcolor('red'); changeegcolor('red'); his('red'); mess2('red'); mess4('red'); mess3('red');
           mes1('4px solid goldenrod');mes2('4px solid goldenrod');mes3('4px solid goldenrod');mes4('4px solid goldenrod');
           text('2px solid red'); tit('2px solid red'); amount('2px solid red'); btn('5px solid goldenrod'); bt('goldenrod'); b('red')">
            <span>Red</span>
          </button>
          <button class="aqua" onclick="changeBgcolor('aqua'); cal('aqua'); change('aqua'); ren('aqua'); ad('aqua'); av('aqua'); greting('aqua'); sub('aqua'); calenderb('aqua'); lyear('aqua'); datenumber('aqua'); dayname('aqua');  
           changegcolor('aqua'); changeegcolor('aqua'); his('aqua'); mess2('aqua'); mess4('aqua'); mess3('aqua');
           mes1('4px solid goldenrod');mes2('4px solid goldenrod');mes3('4px solid goldenrod');mes4('4px solid goldenrod');
           text('2px solid aqua'); tit('2px solid aqua'); amount('2px solid aqua'); btn('5px solid goldenrod'); bt('goldenrod'); b('aqua')">
            <span>Aqua</span>
          </button>
          <button class="close" onclick="close_t()" >
            <span>Close</span>
          </button>
        </div>
      </ul>
    </div>
  </div>
 
  <div class="calendar">
    <div class="calendar-body">
      <span class="month-name">Month</span>
      <span class="day-name">Day</span>
      <span class="date-number">00</span>
      <span class="year">0000</span>

    </div>

  </div>

  <span class="time" style="color: goldenrod; margin-top:20px; font-size:20px;">00:00:00</span>
  <h2 class="greeting" style="color: rgb(4, 76, 185);">GOOD MORNING</h2>

  <div class="container">

    <div class="b">
      <h4 class="av" style="color: rgb(4, 76, 185); font-size:20px; font-weight:bolder;">Available Balance:</h4>
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
          <label for="text">
            <h5 class="message"> Description</h5>
          </label>
          <input type="text" id="text" name="title" placeholder="Enter text..." required />
        </div>
        <div class="form-control">
          <label for="text">
            <h5 class="message2">Payer's Name</h5>
          </label>
          <input type="text" id="tit" name="name" placeholder="Enter name..." required />
        </div>
        <div class="form-control">
          <label for="amount">
            <h5 class="message3">Amount Being Paid</h5> <br />
            To Add income begin with this (+) To Add expense begin With this (-)
          </label>
          <input type="number" id="amount" name="amount" placeholder="Enter amount..." required />
          <h5 class="message4">Upload Reciept</h5>
        </div>

        <input style=" background:rgb(4, 76, 185); color: white;  font-size:15px; margin-left:40px; margin-bottom:20px; margin-top:20px;" type="file" id="submit" name="img" accept="image/*" required>
        <button class="btn" type="submit" name="add">Add transaction</button>
      </form>
    </div>
  </div>
  </div>
  <!-- <div class="chart"></div> -->
  <div class="slidetext"></div>
  <button class="dark-btn">Dark Mode</button>
  <!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
  <script>
    let dark = document.querySelector('.dark-btn')
    dark.addEventListener('click', () => {
      document.body.classList.toggle('dark-mode');
    })
    let add_container = document.querySelector(".colors");
    function open_t(){
    add_container.style.display="block";
    }
    let container = document.querySelector(".colors");
    function close_t(){
    container.style.display="none";
    }

    function changeBgcolor(color){
      const sec = document.querySelector(".inc-exp-container ");
    sec.style.background = color;  
    }

    function changegcolor(color){
      const sec = document.querySelector(".slidetext");
    sec.style.background = color;  
    }
    function changeegcolor(color){
      const sec = document.querySelector(".hom");
    sec.style.background = color;  
    }
    function ad(color){
      const sec = document.querySelector(".ad");
    sec.style.background = color;  
    }function ren(color){
      const sec = document.querySelector(".ren");
    sec.style.background = color;  
    }function change(color){
      const sec = document.querySelector(".change");
    sec.style.background = color;  
    }
    function cal(color){
      const sec = document.querySelector(".cal");
    sec.style.background = color;  
    }
    function his(color){
      const sec = document.querySelector(".message");
    sec.style.background = color;  
    }
    function mess2(color){
      const sec = document.querySelector(".message2");
    sec.style.background = color;  
    }
    function mess3(color){
      const sec = document.querySelector(".message3");
    sec.style.background = color;  
    }
    function mess4(color){
      const sec = document.querySelector(".message4");
    sec.style.background = color;  
    }
    function mes1(color){
      const sec = document.querySelector(".message");
    sec.style.border= color;  
    }
    function mes2(color){
      const sec = document.querySelector(".message2");
    sec.style.border= color;  
    }
    function mes3(color){
      const sec = document.querySelector(".message3");
    sec.style.border= color;  
    }
    function mes4(color){
      const sec = document.querySelector(".message4");
    sec.style.border= color;  
    }
    function text(color){
      const sec = document.querySelector("#text");
    sec.style.border= color;  
    }
    function tit(color){
      const sec = document.querySelector("#tit");
    sec.style.border= color;  
    }
    function sub(color){
      const sec = document.querySelector("#submit");
    sec.style.background= color;  
    }
    function amount(color){
      const sec = document.querySelector("#amount");
    sec.style.border= color;  
    }
    function btn(color){
      const sec = document.querySelector(".btn");
    sec.style.border= color;  
    }function bt(color){
      const sec = document.querySelector(".btn");
    sec.style.color= color;  
    }function b(color){
      const sec = document.querySelector(".btn");
    sec.style.background= color;  
    }function calenderb(color){
      const sec = document.querySelector(".month-name");
    sec.style.background= color;  
    }
    function lyear(color){
      const sec = document.querySelector(".year");
    sec.style.color= color;  
    }
    function dayname(color){
      const sec = document.querySelector(".day-name");
    sec.style.color= color;  
    }
    function datenumber(color){
      const sec = document.querySelector(".date-number");
    sec.style.color= color;  
    }
    function greting(color){
      const sec = document.querySelector(".greeting");
    sec.style.color= color;  
    }
    function av(color){
      const sec = document.querySelector(".av");
    sec.style.color= color;  
    }
    
    
  </script>

</body>

<script src="./tacker.js"></script>

</html>