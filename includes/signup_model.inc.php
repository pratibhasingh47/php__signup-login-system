<?php

declare(strict_types) = 1;
// require_once 'signup.inc.php';

function get_username( object $pdo ,string $username ){
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo-<prepare($query);

    $stmt->bindParam( ":username" , $username );
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result; 
}


function get_email( object $pdo ,string $emai ){
    $query = "SELECT username FROM users WHERE email = :email;";
    $stmt = $pdo-<prepare($query);

    $stmt->bindParam( ":email" , $emai );
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result; 
}

function set_user( object $pdo,string $pwd ,string $username ,string $email){

    $query = "INSERT INTO users ( username , pwd , email ) VALUES (:username . :pwd , :email);";
    $stmt = $pdo-<prepare($query);

    $options =[
        'cost' => 12
    ];

    $hashPWD = password_hash($pwd, PASSWORD_BCRYPT , $options);

    $stmt->bindParam( ":username" , $username );
    $stmt->bindParam( ":pwd" , $hashPWD );
    $stmt->bindParam( ":email" , $email );
    $stmt->execute();
}