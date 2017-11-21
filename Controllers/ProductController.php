<?php
session_start();

require_once("Models/Product.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["newProduct"])) {

        if ($_POST["name"] == "" || $_POST["description"] == "") {
            $errorMsg = "Minden mezőt kötelező kitölteni";
        } else {
            $name = $_POST["name"];
            $description = $_POST["description"];

            $picture = addslashes($_FILES['picture']['tmp_name']);
            $picture = file_get_contents($picture);
            $picture = base64_encode($picture);


            //Model statikus insert függvény hívása
            $result = Product::insertNewProduct($name, $description, $picture);
            if (!$result)
                $errorMsg = "Sikertelen mentés";
            else
                $successMsg = "Sikeres mentés";

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
    }

} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
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
