<?php
                require_once __DIR__ . '/../../vendor/autoload.php';
                include_once __DIR__ . '/init.php';

                $configs = require __DIR__ . '/../../config/app.conf.php';
    
                service\DBConnector::setConfig($configs['db']);
                $uname = htmlentities($_POST['uname']?? null);
                $upass = htmlentities($_POST['upass']?? null);
                
                $unameflag = false;
                $upassflag = false;
                if(is_string($uname)&& strlen($uname)>=4){
                    $unameflag = true;
                }
                
                if(strlen($upass)>=4){
                    $upassflag = true;
                }
                
                if($upassflag && $unameflag){
                    try {
                        $connection = service\DBConnector::getConnection();                        
                        
                    } catch (Exception $ex) {
                        http_response_code(500);
                        echo 'A problem occured, contact support';
                        exit(10);
                    }
                    
                    $query = "SELECT username FROM projectuser";
                    $statement = $connection->prepare($query);
                    $statement->execute();
                    $allLines = $statement->fetchAll();
                    
                    $allUserNames = [];
                    foreach ($allLines as $keys => $values){
                        array_push($allUserNames, $values['username']);
                    }   
                    
                    if(in_array($uname, $allUserNames)){
                        $query2 = "SELECT username, userPass FROM projectUser WHERE username=?";
                        $statement2 = $connection->prepare($query2);
                        $statement2->bindParam(1, $uname, PDO::PARAM_STR);
                        $statement2->execute();
                        $lines = $statement2->fetchAll();
                        $returnedname = '';
                        $returnedpass = '';
                        foreach ($lines as $key => $value){
                            $returnedname = $value['username'];
                            $returnedpass = $value['userPass'];
                        }
                        if(($returnedname === $uname) && ($returnedpass === $upass)){
                            echo "Login success!";
                        }else{
                            echo "Login failed..";
                        }
                    }
                }
                
                    
                ?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../../scss/style.scss">
        <title>Login</title>
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
                <form method="POST" name="loginform" action="Login.php" id="loginform">
                    <input type="text" name="uname" placeholder="Your username">
                    <input type="password" name="upass" placeholder="Your password">
                    <input type="submit" value="Login" class="registerButton">
                    <input type="reset" value="Reset" class="resetbutton">
                
                </form>
                
                
            </div>
            
        </main>
        <footer>
            <p id="copyright">© Sedat Turkoglu 2018</p>
        </footer>
        
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"> </script>
        <script src="../../script/script.js"></script>
    </body>
</html>
