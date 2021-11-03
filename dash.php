<?php
$conn = mysqli_connect("localhost", "root", "", "expenses") or die ("Error : " . mysqli_error($conn));

function getBalance(){
    global $conn;
    $amm = array();
    $total = 0;
    $sql = "select Amount from expenditure";
    $res = mysqli_query($conn, $sql) or die (mysqli_error($conn));
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

  function getBudget(){
    global $conn;
    $amm = array();
    $total = 0;
    $sql = "select Budget_Amount from budget_allocation";
    $res = mysqli_query($conn, $sql) or die (mysqli_error($conn));
    if(mysqli_num_rows($res) > 0){
      while($row = mysqli_fetch_array($res)){
        $amt = $row['Budget_Amount'];
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
  ?>
  <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet"  href="./dash.css">
   </head>
   
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">INCOME AND EXPENSE TRACKER</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
         <li>
          <a href="./budget.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Budget</span>
          </a>
        </li>
        <li>
          <a href="chat.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
           <span class="links_name">Chart Analysis</span>
          </a>
        </li>
        
        <li class="log_out">
          <a href="expense.php">
            <i class='bx bx-log-out'></i>
           <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
  
       
      </div>
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name">ADMIN</span>
        
        <i class='bx bx-chevron-down'></i>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
            <div class="right-side">
            
            <div class="box-topic">Total Expenditures</div>
            
            <?php
$conn = mysqli_connect("localhost", "root", "", "expenses") or die ("Error : " . mysqli_error($conn));
$select = "select * from expenditure";
$result = mysqli_query($conn, $select);
            $tttt = mysqli_num_rows($result);
echo "<h2>".$tttt."</h2>";
?>
        
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up till today</span>
            </div>
            <div class="balance">
              <h2>Balance: #<?php echo getBalance(); ?></h2> 
        <span>Income: #<?php echo getIncome(); ?></span>
        <span>Expense: #<?php echo getExpenses(); ?></span>
            </div>
  
          </div>
          <div class="right-side">
            <div class="box-topic">Total Budget Set</div>
            <h2>#<?php echo getBudget(); ?></h2>
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up till today</span>
            </div>
          </div>
          
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
        <?php
$select = "select * from expenditure";
$result = mysqli_query($conn, $select);

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
</div>



      </div>
  <div class="before-falling">
  <div class="falling">
<?php
$select = "select * from budget_allocation";
          $result = mysqli_query($conn, $select);
          
          if(mysqli_num_rows($result) > 0){
              echo "<table>
              <tr>
              <th>id</th>
              <th>Budget_Name</th>
              <th>Budget_Description</th>
              <th>Budget_Amount</th>
              <th>Time</th>
              </tr>
              ";
              while($row = mysqli_fetch_array($result)){
                  $id = $row['Id'];
                  $name = $row['Budget_Name'];
                  $desc = $row['Budget_Description'];
                  $amt = $row['Budget_Amount'];
                  $time = $row['Date_Allocated'];
                  echo '
                  <tr>
                  <td>'.$id.'</td>
                  <td>'.$name.'</td>
                  <td>'.$desc.'</td>
                  <td>'.$amt.'</td>
                  
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
          
</div>
  </div>
  <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
    </div>
    
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>
 
 <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script> -->
</body>
</html>
