<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="../../scss/style.scss">
    </head>
    <body>
        <header>
            <nav id="navbar">
                <ul>
                    <li> <a  href="../../public/index.php">Home</a> </li>
                    <li> <a href="Register.php">Register</a> </li>
                    <li> <a href="Login.php">LogIn</a> </li>
                </ul>
            </nav>
        </header>
        <main>
            <div id="container">
                <h1>Registration Page</h1>
                <form name="registerForm" action="validateForm.php" method="post" id="registerForm">
                    <input type="text" placeholder="Your First Name" name="fname">
                    <span class="help" id="fnameHelp"></span>
                    <input type="text" placeholder="Your Last Name" name="lname">
                    <span class="help" id="lnameHelp"></span>
                    <input type="text" placeholder="Your Username" name="uname">
                    <span class="help" id="unameHelp"></span>
                    <input type="email" required placeholder="Your Mail address" name="mailadd">
                    <input type="password" placeholder="Your Password" name="pass1" id="p1">
                    <span class="help" id="p1Help"></span>
                    <input type="password" placeholder="Confirm your password" name="pass2">
                    <span class="help" id="p2Help"></span>
                    <input type="submit" value="Register" class="registerButton">
                    <input type="reset" value="Reset" class="resetbutton">
                </form>
            </div>
        </main>
        <footer>
            <p id="copyright">© Sedat Turkoglu 2018</p>
        </footer>
        <?php
        // put your code here
        ?>
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"> </script>
        <script src="../../script/script.js"></script>
    </body>
</html>
