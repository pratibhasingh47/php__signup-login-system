<?php

declare(strict_types = 1 )

function check_login_errors(){
    if ( isset($_SESSION["error_login"]) ){

        $errors = $_SESSION["error_login"];

        echo "<br>";

        foreach( $errors as $error ){
            echo "<p> . $error . </p>";
        }

        unset( $_SESSION["error_login"]);
    }
    else if( isset($_GET['login']) && $_GET["login"] === "success" ){
        echo '<br>';

        echo '<p>Login Success!</p>';

    }
}