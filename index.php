<?php require_once("Controllers/userController.php"); ?>
<!DOCTYPE html>
<html>
<head>

    <title>Termék kezelő</title>
    <?php require_once("Contents/headIncludes.php") ?>
</head>
<?php if (isset($_SESSION["user"])):
require_once("Contents/menu.php"); ?>
<body class="green darken-1">

<div id="index-banner" class="parallax-container animated fadeIn">
    <div class="section no-pad-bot">
        <div class="container">
            <br><br>
            <h1 class="header center green-text " style="text-shadow: 2px 2px 3px black;">Üdvözölöm! </h1>
            <div class="row center">
                <h5 class="header col s12 light green-text" style="text-shadow: 2px 2px 3px #000000 ;"><strong>A
                        termékek
                        menüpontnál végezhet műveleteket a termékekkel.</strong></h5><br>
            </div>

        </div>
    </div>
    <div class="parallax"><img src="Assets/background1.jpg" alt="Unsplashed background img 1"></div>
</div>

<?php else: ?>
<body class="green darken-1">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="nav-wrapper green darken-1">
        <a href="index.php" class="brand-logo left"><img src="Assets/garden.png" alt=""
                                                         class="circle responsive-img"></a>
        <ul class="right">
            <li><a href="#modal1" style="color: white;">Belépés</a></li>
        </ul>
    </div>
    </div>
</nav>


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
<?php endif; ?>

<!-- Login Modal -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Belépés</h4>

        <div class="card-content white-text center ">
            <span class="card-title"><h3>Belépés</h3></span>
        </div>
        <form id="login" class="container form-horizontal" method="POST" action="">
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email" name="email" class="validate">
                    <label for="email">Email</label>
                </div>
                <div class="input-field col s12">
                    <input id="password" type="password" name="password" class="validate">
                    <label for="password">Password</label>
                </div>

                <div class="row center">
                    <button type="submit" name="login" class="waves-effect green darken-3 waves-light btn">
                        Belépés
                    </button>
        </form>
    </div>
</div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#modal1').modal();
    });

</script>

<?php if (!isset($alldata) || empty($alldata)): ?>
    <div class="valign-wrapper animated zoomIn  ">
        <div class="row center">
            <div class="col s12center">
                <div class="card center">
                    <div class="card-content center">
                        <h3 class="center">Jelenleg nem tartalmaz az oldal terméket!</h3>
                        <p>Sajnálattal értesítjük, hogy még egy terméket se vettek fel az oldalhoz.<br> Kérjük
                            látogasson vissza késöbb.</p>
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
                    <li class="active green darken-4"><a
                            href="<?php echo 'index.php?page=' . $page; ?>"> <?php echo $page; ?> </a>
                    </li>
                <?php else: ?>
                    <li class="waves-effect white-text "><a
                            href="<?php echo 'index.php?page=' . $page; ?>"> <?php echo $page; ?> </a></li>
                <?php endif; ?>
            <?php endfor; ?>

        </ul>
    </div>
<?php endif; ?>

<script src="Assets/js/validation.js"></script>
<script src="Assets/js/jquery.validate.min.js"></script>
<?php endif; ?>
</body>
</html>