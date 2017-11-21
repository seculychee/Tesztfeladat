<?php

session_start();

require_once("Models/Product.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["editProduct"])) {

        if ($_POST["name"] == "" || $_POST["description"] == "") {

            $name = $_POST["name"];
            $description = $_POST["description"];

            $errorMsg = "Minden mezőt kötelező kitölteni";

        } else {

            $name = $_POST["name"];
            $description = $_POST["description"];
            $id = base64_decode(base64_decode($_GET["id"]));

            if (isset($_FILES['picture'])) {
                $picture = addslashes($_FILES['picture']['tmp_name']);
                if ($picture != null)
                {
                    $picture = file_get_contents($picture);
                }
                $picture = base64_encode($picture);

                $result = Product::updateType($name, $description, $id, $picture);
                if (!$result)
                    $errorMsg = "Sikertelen mentés";
                else {
                    $successMsg = "Sikeres mentés";
                    $allData = Product::getEditedField($id);
                }
            }
            else
            {
            $result = Product::updateType($name, $description, $id);
            if (!$result)
                $errorMsg = "Sikertelen mentés";
            else
                $successMsg = "Sikeres mentés";
            $allData = Product::getEditedField($id);
            }
        }
    }

} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = base64_decode(base64_decode($_GET["id"]));
    if (isset($_GET["delete"]))
    {
        $allData = Product::deleteProduct($id);
        header("Refresh:0; url=product.php");
    }else{
        $allData = Product::getEditedField($id);
    }

}
