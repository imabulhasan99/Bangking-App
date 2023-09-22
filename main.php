<?php


require_once("Helper/Login.php");
require_once("Helper/Register.php");
use Helper\UserRegistration;
use Helper\UserLogin;



echo "1. Login\n";
echo "2. Register\n";
echo "3. Exit\n";

$choice = readline("Enter your choice (1/2/3): ");

if ($choice === '1') {
    $login = new UserLogin();
    $login->userLogin();

} elseif ($choice === '2') {


    $registration = new UserRegistration();
    $registration->registerUser();


} elseif ($choice === '3') {
    // Exit the application
    echo "Goodbye!\n";
    exit();
} else {
    echo "Invalid choice. Please enter 1, 2, or 3.\n";
}
