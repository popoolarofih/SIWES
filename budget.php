<?php
$conn = mysqli_connect("localhost", "root", "", "expenses") or die ("Error : " . mysqli_error($conn));


if(isset($_POST['add'])){
    $name = $_POST['name'];
    $title = mysqli_real_escape_string($conn, $_POST['descrip']);
    $amount = $_POST['paid'];
    

    $insert = "insert into budget_allocation(Budget_Name, Budget_Amount, Budget_Description) values('$name', '$amount', '$title')";
    if(mysqli_query($conn, $insert)){
        echo "<script>alert('Success')</script>";
    }
    else{
        echo "<script>alert('Error')</script>";
    }
   
   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Allocation</title>
    <link rel="stylesheet"  href="./budget.css">
</head>
<body>
<a href="./dash.php"><button class="bt">Back To Dashboard</button></a>
    <div class="container">
    
        <div class="add">
            <Span class="alloc">Budget Allocation</Span><br>
            <span class="bu" >Add Budget</span><br>
            <button onclick="add_task()">+</button>
        </div>
      <div class="minus">
        <form action="budget.php" method="POST" >
        
        <div class="form-control">
              <label for="text" > <h5 class="message">Budget Name</h5> </label>
              <input type="text" id="budgetname" name="name" placeholder="Enter name..."  required />
            </div>
            <div class="form-control">
              <label for="text"><h5 class="message">Budget Description</h5> </label>
              <input type="text" id="text" name="descrip" placeholder="Enter text..."  required/>
            </div>
            
            <div class="form-control">
              <label for="amount"> <h5 class="message">Amount Being Paid</h5> </label>
              <input type="number" id="amount" name="paid" placeholder="Enter amount..."  required/>
            </div>
            <button class="btn" type="submit" name="add">Add Budget</button>
          </form>
      </div>
        
    </div>
</body>
<script>
  let add_container = document.querySelector(".minus");
  function add_task(){
  add_container.style.display="block";
}
</script>
</html>