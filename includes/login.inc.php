<?php

if ( $_SERVER["REQUEST_METHOD"] ==="POST" ){

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try{
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        //ERROR HANDLER
        $errors = [];

        if(is_input_empty($username,$pwd,$email)){
                $errors["empty_input"] = "Fill in all fields";
        }

        

        require_once 'config_session.inc.php';

        if($errors){
            $_SESSION["error_signup"] = $errors;
            header("Location: ../index.php");
        }

        create_user( $pdo, $pwd , $username , $email);

        header("Location: ../index.php?signup=success");

        $pdo = null;
        $stmt = null;
    }
    catch( PDOException $e ){
        die("Query Failed: " . $e->getMessage());
    }

}
else{
    header("Location: ../index.php");
    die();
}