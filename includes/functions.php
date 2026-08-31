<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/auth.php';

// Simple helper untuk upload gambar produk
function uploadImage($fieldName, $folder){
    if(!isset($_FILES[$fieldName]) || $_FILES[$fieldName]['error'] !== UPLOAD_ERR_OK){
        return null;
    }
    $file = $_FILES[$fieldName];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if(!in_array($ext, ALLOWED_EXTENSIONS)){
        return null;
    }
    if($file['size'] > MAX_UPLOAD_SIZE){
        return null;
    }
    $newName = uniqid() . '.' . $ext;
    $dest = UPLOAD_DIR . $folder . '/' . $newName;
    if(move_uploaded_file($file['tmp_name'], $dest)){
        return $newName;
    }
    return null;
}
