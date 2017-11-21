<?php
require_once("Controllers/ProductController.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Növény típusok </title>
    <?php require_once("Contents/headIncludes.php") ?>
</head>
<body class="green lighten-1">

<?php if (isset($_SESSION["user"])):
    require_once("Contents/menu.php");
    ?>


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
        <div id="login-page" class="row">
            <div class="col s12 card-panel green darken-1">
                <div class="row">
                    <div class="card-content white-text center ">
                        <span class="card-title"><a href="#modal1"><h3
                                    style="color: white;">Új termék felvitele</h3></a></span>
                    </div>

                </div>
            </div>


        </div>
    </div>
    
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Új termék felvitele</h4>
            <form id="productForm" class="container form-horizontal" method="POST"
                  action="" enctype="multipart/form-data">
                <div class="row">
                    <div class="file-field input-field">
                        <div class="waves-effect green darken-3 waves-light btn">
                            <span>Kép választása</span>
                            <input name="picture" type="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>

                    <div class="input-field col s12">
                        <input id="name" type="text" name="name" class="validate">
                        <label>Termék neve</label>
                    </div>

                    <div class="input-field col s12">
                        <textarea id="textarea1" name="description" class="materialize-textarea validate"></textarea>
                        <label for="textarea1">Leírás</label>
                    </div>


                </div>
                <div class="row center">
                    <button id="submit-button" type="submit" name="newProduct"
                            class="waves-effect green darken-3 waves-light btn">Felvitel
                    </button>
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Mégse</a>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-6">
        <!-- Már felvitt elemek -->
        <div class="jumbotron">
            <h2 class="header center green-text text-darken-4 " style="text-shadow: 2px 2px 3px black;">Már felvitt
                elemek</h2>
        </div>
    </div>
    <?php if (!isset($alldata) || empty($alldata)): ?>
    <div class="valign-wrapper animated zoomIn  ">
        <div class="row center">
            <div class="col s12center">
                <div class="card  green darken-1 center">
                    <div class="card-content center">
                        <h3 class="center white-text">Jelenleg nem tartalmaz az oldal terméket!</h3>
                        <p class="white-text">Sajnálattal értesítjük, hogy még egy terméket se vettek fel az
                            oldalhoz.<br> Megjelenítéshez vegyen fel terméket.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="row">
        <?php foreach ($alldata as $data): ?>
            <div class=" animated fadeInLeft ">
                <div class="col s8 m4">
                    <div class="card">
                        <div class="card-image">
                            <img height="500" src="data:image;base64, <?php echo $data['picture']; ?>"/>
                            <span class="card-title"><?php echo $data['name']; ?></span>
                        </div>
                        <div class="card-content">
                            <p>Termék leírás: <?php echo $data['description']; ?>'</p>
                        </div>
                        <div class="card-action">
                            <a href="edit.php?id='<?php echo base64_encode(base64_encode($data["id"])) ?>'">Szekesztés</a>
                            <a href="edit.php?id='<?php echo base64_encode(base64_encode($data["id"])) ?>'&delete=true">Törlés</a>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $('#help').modal();
            </script>

        <?php endforeach; ?>

    </div>

    <div class="row">
        <ul class="pagination center">
            <?php for ($page = 1; $page <= $number_of_pages; $page++): ?>

                <?php if (isset($_GET["page"]) && $page == $_GET["page"]): ?>
                    <li class="disabled green darken-4"><a class="white-text"
                                                           href="<?php echo 'product.php?page=' . $page; ?>"> <?php echo $page; ?> </a>
                    </li>
                <?php else: ?>
                    <li class="waves-effect "><a class="white-text"
                                                 href="<?php echo 'product.php?page=' . $page; ?>"> <?php echo $page; ?> </a>
                    </li>
                <?php endif; ?>
            <?php endfor; ?>

        </ul>
    </div>
<?php endif; ?>

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

<script type="text/javascript">
    $(document).ready(function () {
        $('#modal1').modal();
    });

</script>
<script src="Assets/js/validation.js"></script>
<script src="Assets/js/jquery.validate.min.js"></script>
</body>
</html>