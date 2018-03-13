

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../../scss/style.scss">
        <title>Registration</title>
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
                <?php

                require_once __DIR__ . '/../../vendor/autoload.php';
                include_once __DIR__ . '/init.php';

                $configs = require __DIR__ . '/../../config/app.conf.php';
    
                service\DBConnector::setConfig($configs['db']);
                $values = $_POST;
    
                $fname = htmlentities($_POST['fname']);
                $lname = htmlentities($_POST['lname']);
                $uname = htmlentities($_POST['uname']);
                $mail = htmlentities($_POST['mailadd']);
                $p1 = htmlentities($_POST['pass1']);
                $p2 = htmlentities($_POST['pass2']);
    
                $fnameflag = false;
                $lnameflag = false;
                $unameflag = false;
                $passflag = false;
    
                if(is_string($fname) && strlen($fname)>=4){
                    $fnameflag = true;
                }
    
                if(is_string($lname) && strlen($lname)>=4){
                    $lnameflag = true;
                }
    
                if(strlen($uname)>=4){
                    $unameflag = true;
                }
    
                if(strlen($p1)>=4 && $p1 === $p2){
                    $passflag = true;
                }
    
                if($fnameflag && $lnameflag && $unameflag && $passflag){
                    try
                    {
                        $connection = service\DBConnector::getConnection();
                    } catch (Exception $ex) {
                        http_response_code(500);
                        echo 'A problem occured, contact support';
                        exit(10);
                    }
        
                $checkquery = "SELECT username FROM projectUser";
                $statement = $connection->prepare($checkquery);
                $statement->execute();
                $allLines = $statement->fetchAll();
                $allUserNames = [];
                foreach ($allLines as $keys => $values){
                    array_push($allUserNames, $values['username']);
                }
                if(!in_array($uname, $allUserNames)){
                     $query = "INSERT INTO projectUser(firstName, lastName, username, userMail, userPass) VALUES(?, ?, ?, ?, ?)";
                     $statement = $connection->prepare($query);
                     $statement->bindParam(1, $fname, PDO::PARAM_STR);
                     $statement->bindParam(2, $lname, PDO::PARAM_STR);
                     $statement->bindParam(3, $uname, PDO::PARAM_STR);
                     $statement->bindParam(4, $mail, PDO::PARAM_STR);
                     $statement->bindParam(5, $p1, PDO::PARAM_STR);
                     $statement->execute();
                     echo "<h1>You have successfully created your account please log in</h1>";
                }else{
                    echo "<h1>Username already exists please use login button to log into your account</h1>";
                }
            }
    
?>
            </div>
        </main>
        <footer>
            <p id="copyright">© Sedat Turkoglu 2018</p>
        </footer>
        
    </body>
</html>
