<?php require_once("Controllers/userController.php"); ?>
<!DOCTYPE html>
<html>
<head>

    <title>Page Title</title>
    <?php require_once("Contents/headIncludes.php") ?>
</head>
<body class="green lighten-1">

<!-- -->
<?php if (isset($_SESSION["user"])):
    require_once("Contents/menu.php");
    ?>
    <style type="text/css">

        /* label color */
        .input-field label {
            color: #a5d6a7;
        }

        /* label focus color */
        .input-field input[type=text]:focus + label {
            color: #a5d6a7;
        }

        /* label underline focus color */
        .input-field input[type=text]:focus {
            border-bottom: 1px solid #a5d6a7;
            box-shadow: 0 1px 0 0 #a5d6a7;
        }

        /* valid color */
        .input-field input[type=text].valid {
            border-bottom: 1px solid #a5d6a7;
            box-shadow: 0 1px 0 0 #a5d6a7;
        }

        /* invalid color */
        .input-field input[type=text].invalid {
            border-bottom: 1px solid #a5d6a7;
            box-shadow: 0 1px 0 0 #a5d6a7;
        }

        /* icon prefix focus color */
        .input-field .prefix.active {
            color: #a5d6a7;
        }

    </style>

    <div class="valign-wrapper animated zoomIn ">
        <div class="row">

            <div class="card green darken-1">
                <div class="card-content white-text center">
                    <span class="card-title">Regisztráció</span>
                </div>
                <form class="container form-horizontal" method="POST" action="">

                    <div class="row">
                        <div class="input-field col s6">
                            <input id="firstname" type="text" name="firstname" class="validate">
                            <label for="firstname">Vezetéknév</label>
                        </div>

                        <div class="input-field col s6">
                            <input id="lastname" type="text" name="lastname" class="validate">
                            <label for="lastname">Keresztnév</label>
                        </div>

                        <div class="input-field col s12">
                            <input id="email" type="email" name="email" class="validate">
                            <label for="email">Email</label>
                        </div>

                        <div class="input-field col s12">
                            <input id="password" type="password" name="password" class="validate">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="card-action center">
                        <button type="submit" name="regist" class="waves-effect green darken-3 waves-light btn">
                            Regisztráció
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>

<?php else: ?>

    <?php if (isset($errorMsg)): ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 alert alert-danger">
                    <?= $errorMsg ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

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
</body>
</html>