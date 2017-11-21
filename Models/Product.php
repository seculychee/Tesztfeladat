<?php
require_once("Config/database.php");

/**
 *
 */
class Product
{

    public static function insertNewProduct($nev, $leiras, $picture)
    {
        $db = db::get();
        $insertString = "INSERT INTO `products` (`name`,`description`,`picture`) VALUES ('" . $nev . "','" . $leiras . "','" . $picture . "')";;
        $result = $db->query($insertString);
        return $result;
    }

    public static function getAll()
    {
        $db = db::get();
        $selectString = "SELECT * FROM `products`";
        $result = $db->getAssoc($selectString);
        return $result;
    }

    public static function updateType($nevParam, $description, $idParam, $pictureParam = null)
    {
        $db = db::get();
        if ($pictureParam == null) {
            $queryString = "UPDATE `products` SET `name`='" . $nevParam . "', `description`='" . $description . "' WHERE id=" . $idParam;
        } else {
            $queryString = "UPDATE `products` SET `name`='" . $nevParam . "', `description`='" . $description . "', `picture`='" . $pictureParam . "' WHERE id=" . $idParam;
        }
        $result = $db->query($queryString);
        return $result;
    }

    public static function getEditedField($id)
    {
        $db = db::get();
        $selectString = "SELECT * FROM `products` WHERE id='" . $id . "'";
        $result = $db->getAssoc($selectString);
        return $result;
    }

    public static function deleteProduct($id)
    {
        $db = db::get();
        $queryString = "DELETE FROM `products` WHERE id='" . $id . "'";
        $result = $db->query($queryString);
        return $result;

    }
    public static function getPageLimit($page)
    {
        $results_per_page = 6;
        $this_page_first_result = ($page-1)*$results_per_page;
        $db = db::get();
        $selectString = 'SELECT * FROM products LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
        $result = $db->getAssoc($selectString);
        return $result;
    }
    public static function getNumrow()
    {
        $db = db::get();
        $selectString = "SELECT * FROM `products`";
        $result = $db->getNumRow($selectString);
        return $result;
    }


}


?>