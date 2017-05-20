<?php

$key = md5('adio127389727hsjbsjj');
$salt = md5('adioayteuieiepsueieejiddd');

function getImageFileExtension($fileName) {
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $png = '.png'; $jpg = '.jpg'; $gif = '.gif'; $PNG = '.PNG'; $JPG = '.JPG';
    $xtension = filter_var('.'.$ext);
    if($xtension === $JPG || $xtension === $PNG || $xtension === $gif || $xtension === $jpg || $xtension == $png){
      return $xtension;  
    }
}

//header redirect function
function Redirect($location) {
    $location = header("Location: $location");
    return $location;
}

//this is the function to include files
function includesFiles($folder, $param) {
    if (!is_dir($folder)) {
        $strings = '<strong>' . $folder . '</strong>' . ' is not a directory, please enter a correct directory name';
        echo $strings;
    } else {
        $strings = include_once('../public/' . $folder . '/' . $param . '.php');
    }
    return $strings;
}
//url formarting
function AdioTrim_all($string) {
    $filtered = str_replace(' ', '-', $string);
    return $filtered;
}

function AdioTrim_allUnveil($string) {
    $filtered = str_replace('-', ' ', $string);
    return $filtered;
}

//password matching regular expression
function passwordRegularExpression($password) {
    $match = preg_match('((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%/()-_+!`~|\;",:]).{8,20})', $password);
    return $match;
}

//Username matching regular expression
function usernameRegularExpression($username) {
    $match = preg_match('/^[a-z0-9_-]{3,20}$/', $username);
    return $match;
}

// email matching regular expression
function emailRegularExpression($email) {
    $match = preg_match('/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD', $email);
    return $match;
}
//name matching regular expression
function nameRegularExpression($name) {
    $match = preg_match('/^[a-zA-Z_-]$/', $name);
    return $match;
}

//input sanitizing funtions starts here-----------------------------------------------------------------------
function AdioSanitizeFunc($string) {
    $string = trim(strip_tags(addslashes($string)));
    return $string;
}

//input sanitizing function ends here-----------------------------------------------------------------------------
//encrypt function----------------------------------------------------------------------------------------------------------
function AdioEncrypt($string, $key) {
    $string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
    return $string;
}

//encryption function ends here---------------------------------------------------------------------------------------------
//decryption function-------------------------------------------------------------------------------------------------------
function AdioDecrypt($string, $key) {
    $string = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($string), MCRYPT_MODE_ECB));
    return $string;
}

//decryption function ends here-------------------------------------------------------------------------------------------
//password Salt encryption function--------------------------------------------------------------------------------------
function AdioHashword($string, $salt) {
    $string = crypt($string, '$1$' . $salt . '$');
    return $string;
}

?>