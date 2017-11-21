<?php
session_start();

require_once("Models/User.php");
require_once("Models/Product.php");
//belépés
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {

        if ($_POST["email"] == "" || $_POST["password"] == "") $errorMsg = "Minden mező kitöltése kötelező";
    else {
        $login = User::login($_POST["email"], $_POST["password"]);/*= User::login($_POST["email"],$_POST["password"]);*/;
        if ($login) {
                $_SESSION["user"] = "Belepve";
            } else {
                $errorMsg = " Sikertelen belépés nem megfelelő email, jelszó páros!";
            }
    }

    }

//regisztráció
    if (isset($_POST["regist"])) {

        if ($_POST["email"] == "" || $_POST["password"] == "" || $_POST["firstname"] == "" || $_POST["lastname"] == "") $errorMsg = "Minden mező kitöltése kötelező";
    else {
            $login = User::insertUser($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["password"]);/*= User::login($_POST["email"],$_POST["password"]);*/;
            if ($login) {
                $_SESSION["user"] = "Belepve";
            } else {
                $errorMsg = " Sikertelen belépés nem megfelelő email, jelszó páros!";
            }
        }

    }

}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $alldata = Product::getAll();
    $results_per_page = 6;
    $number_of_results = Product::getNumrow();
    $number_of_pages = ceil($number_of_results / $results_per_page);
        if (!isset($_GET['page'])) {
            $page = 1;
            $alldata = Product::getPageLimit($page);
        } else {
            $page = $_GET['page'];
            $alldata = Product::getPageLimit($page);
        }

}
?>