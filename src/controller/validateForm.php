

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
                //$usernames = $allLines['username'];
                var_dump($allLines);
                
                $query = "INSERT INTO projectUser(firstName, lastName, username, userMail, userPass) VALUES(\"$fname\", \"$lname\", \"$uname\", \"$mail\", \"$p1\")";
                $affected = $connection->exec($query);
        
                if(!$affected){
                    echo implode(', ', $connection->errorInfo());
                }else{
                    echo 'Success! storing data';
                }
        
                //return;
            }
    
?>
            </div>
        </main>
        <footer>
            <p id="copyright">© Sedat Turkoglu 2018</p>
        </footer>
        
    </body>
</html>
