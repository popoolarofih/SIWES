let head = document.querySelector(".head");
function register(){
    head.style.display="block";
    }

    let button = document.getElementById("butt-on");
    let full = document.getElementById("fullname");
    let user = document.getElementById("Username");
    let date = document.getElementById("DOB");
    let pass = document.getElementById("password");
    let confirmp = document.getElementById("passw");
    let mail = document.getElementById("email");
    let jamb = document.getElementById("Reg");
    let score = document.getElementById("Score");
    let Age = document.getElementById("age");
    let Gender =document.getElementById("gender");
    let Num = document.getElementById("number");
   
button.addEventListener("click", validation);
function validation(){
    let password = pass.value;
    let Confirm_Password = confirmp.value;
    let fullname = full.value;
    let Username = user.value;
    let DOB = date.value;
    let email = mail.value;
    let Score = score.value;
    let age = Age.value;
    let gender = Gender.value;
    let Reg = jamb.value;
    let number = Num.value;
    if(password === Confirm_Password){
        alert("SIGN - UP SUCCEFULL");
    }
    else{
        alert("check your password");
    } 
    if(age = 16,15,14,13,12,11,10){
        alert("You are not eligible" );
    }
    else{
        alert("You are eligible");
    }
    // alert(password + "\n" + fullname + "\n" + Username +  "\n" + DOB + "\n" + email + "\n" + Score + "\n" + age + "\n" + gender + "\n" + Reg )
  localStorage.setItem("user-info", JSON.stringify({fullname:full.value,username:user.value,DOB:date.value,email:mail.value, Jscore:score.value, Yage:Age.value, sex:Gender.value, Jreg:jamb.value, Pnumber:Num.value}));
  location.replace('thecss/SIGN-UP.html');
}


// let rofih = sessionStorage.getItem("user-info")
