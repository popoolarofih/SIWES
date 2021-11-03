function calculateDaysBetweenDates(begin, end) {
    var date1 = new Date(begin);
    var date2 = new Date(end);
    var timeDiff = Math.abs(date2.getTime() - date1.getTime());
    var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
    return diffDays;
}

function register() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var url = "http://localhost:8080/register?username=" + username + "&password=" + password;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            if (response == "true") {
                window.location.href = "http://localhost:8080/home";
            } else {    //response == "false"
                document.getElementById("register-error").innerHTML = "Username already exists";
            }       }   };  xhr.send(); }

function login() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var url = "http://localhost:8080/login?username=" + username + "&password=" + password;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            if (response == "true") {
                window.location.href = "http://localhost:8080/home";
            } else {
                document.getElementById("login-error").innerHTML = "Invalid username or password";
            }
        }
    };
    xhr.send();
}

