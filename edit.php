<?php require_once("Controllers/EditController.php");?>
<!DOCTYPE html>
<html>
<head>
    <title>Termék szerkesztése</title>
    <?php require_once("Contents/headIncludes.php") ?>
</head>
<body class="green lighten-1">

<?php if(isset($_GET["delete"])): ?>

<?php else: ?>

<?php if (isset($_SESSION["user"])):

    require_once("Contents/menu.php"); ?>

    <?php if (isset($errorMsg)): ?>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card-panel red white-text">
                    <h5>Hiba</h5>
                    <ul>
                        <li><?= $errorMsg ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php elseif (isset($successMsg)): ?>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card-panel light-green accent-3 black-text">
                    <h5>Sikeres</h5>
                    <ul>
                        <li><?= $successMsg ?></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class=" animated fadeInDown  ">
    <div class="col s12 card-panel green darken-1">
        <?php foreach ($allData as $data): ?>

            <div class="row center">
                <div class="container form-horizontal">
                    <h3>Hozzá tartozó jelenlegi kép:</h3>
                    <img height="400" src="data:image;base64, <?php echo $data['picture']; ?>"/>
                </div>
            </div>

            <form id="productEditForm" class="container form-horizontal" method="POST" action="" enctype="multipart/form-data">
                <div class="row">
                    <div class="file-field input-field">
                        <div class="waves-effect green darken-3 waves-light btn">
                            <span>Kép választása</span>
                            <input name="picture"  type="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>

                    <div class="input-field col s12">
                        <input id="name" value="<?php echo $data['name']; ?>" type="text" name="name" class="validate">
                        <label for="name">Termék neve</label>
                    </div>

                    <div class="input-field col s12">
                        <textarea id="textarea1" name="description"
                                  class="materialize-textarea"><?php echo $data['description']; ?></textarea>
                        <label for="textarea1">Leírás</label>
                    </div>
                </div>
                <div class="row center">
                    <button type="submit" name="editProduct" class="waves-effect green darken-3 waves-light btn">
                        Felvitel
                    </button>
                </div>
            </form>
        <?php endforeach; ?>
    </div>
    </div>


<?php else: ?>


        <div class="valign-wrapper animated zoomIn  ">
            <div class="row center">
                <div class="col s12 center">
                    <div class="card center">
                        <div class="card-image">
                            <img src="Assets/not_allowed.jpg">
                            <span class="card-title blue-text"></span>
                        </div>
                        <div class="card-content center">
                            <h3 class="center">Hozzásférés megtagadva</h3>
                            <p>Kérem jelentkezzen be a főoldalon az oldal használatához!</p>
                        </div>
                        <div class="card-action center">
                            <a href="index.php">Kezdőlap</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php endif; ?>
<?php endif; ?>

<script src="Assets/js/validation.js"></script>
<script src="Assets/js/jquery.validate.min.js"></script>
</body>
</html>