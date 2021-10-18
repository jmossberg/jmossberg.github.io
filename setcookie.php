<?php
$cookie_name = "user";
$cookie_value = "Jacob Doe";
setcookie($cookie_name, $cookie_value, [
    'expires' => time() + 86400,
    'path' => '/',
    'secure' => true,
    'samesite' => 'None',
]);
//setcookie($cookie_name, $cookie_value, [
//    'expires' => time() + 86400,
//    'path' => '/',
//    'secure' => true,
//    'httponly' => true,
//    'samesite' => 'None',
//]);
//setcookie($cookie_name, $cookie_value, [
//    'expires' => time() + 86400,
//    'path' => '/',
//    'domain' => 'jacobmossberg.se',
//    'secure' => true,
//    'httponly' => true,
//    'samesite' => 'None',
//]);
header('Access-Control-Allow-Origin: https://jmossberg.github.io', false);
header('Access-Control-Allow-Credentials: true');
?>
<html>
<body>

<?php
if(!isset($_COOKIE[$cookie_name])) {
     echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
     echo "Cookie '" . $cookie_name . "' is set!<br>";
     echo "Value is: " . $_COOKIE[$cookie_name];
}
?>

<p><strong>Note:</strong> You might have to reload the page to see the value of the cookie.</p>

</body>
</html>
