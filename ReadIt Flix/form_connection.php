<?php

$username = filter_input(INPUT_POST, 'username');
$email = filter_input(INPUT_POST, 'email');
$text = filter_input(INPUT_POST, 'text');

if (!empty($username)) {
    if (!empty($email)) {
        if (!empty($text)) {
            $host ="localhost" ;
            $dbusername = "root" ;
            $dbpassword = "" ;
            $dbname = "ReadIt" ;

            // create connection //
            $conn = new mysql ($host, $dbusername, $dbpassword, $dbname) ;
            if (mysql_connect_error()) {
                die('connect error('. 
                     mysql_connect_error().')' . 
                     mysql_connect_error());
            }
            else {
                $sql = "INSERT INTO form (username, email, text) values ('$username' , '$email' , 'text') ";
                if ($conn->query($sql)) {
                    echo "New Record is provided sucessfully" ;
                }
                else {
                    echo "ERROR: ". $sql . "<br>" . $ conn->error;
                }
                $conn->close();
            }
        }
        else {
            echo "useranme can't be empty" ;
            die();
        } 
        else {
            echo "email can't be empty" ;
            die();
        }
        else {
            echo "text can't be empty" ;
            die();
        }
    }

}

?>