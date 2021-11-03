<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <div class="container">
        <form action="includes/signup.inc.php" class="form-1" method="post" id="login">
            <h1 class="form__title">Sign Up</h1>
            <div class="form__message form__message--error"></div> 
            <div class="form__input--group">
                <input type="text" class="form__input" name="uid" autofocus placeholder="Admin's Name">
            </div>
            <div class="form__input--group">
                <input type="email" class="form__input" name="mail" autofocus placeholder="Admin's Mail">
            </div>
            <div class="form__input--group">
                <input type="password" name="pwd" class="form__input" autofocus placeholder="password">
            </div>
            <div class="form__input--group">
                <input type="password" name="pwd-repeat" class="form__input" autofocus placeholder="Confirm password">
            </div>
            <button type="submit" name="signup-btn" class="form__button">Continue</button>
            <br><br/>
            <p class="form__text">
                <a class="form__link" href="./login.php" id="linkCreateAccount">Already a user? Login</a>
            </p>
        </form>
    </div>
</body>
</html>
