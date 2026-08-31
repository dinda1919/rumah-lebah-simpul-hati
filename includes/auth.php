<?php
function isLoggedIn(){
    return isset($_SESSION['admin_id']);
}

function requireLogin(){
    if(!isLoggedIn()){
        header('Location: login.php');
        exit;
    }
}

function redirect($url){
    header('Location: '.$url);
    exit;
}

function csrfToken(){
    if(empty($_SESSION['csrf_token'])){
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verifyCsrf($token){
    return hash_equals($_SESSION['csrf_token'] ?? '', $token);
}
