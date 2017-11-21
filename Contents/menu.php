<style>
    #sidenav-overlay {
        z-index: -1;
    }
</style>
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper green darken-1">
            <a href="index.php" class="brand-logo"><img src="Assets/garden.png" alt=""
                                                        class="circle responsive-img"></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li <?php
                $active = 'class="active"';
                if ($_SERVER['REQUEST_URI'] == "/noveny/index.php")
                    echo $active;
                ?>><a href="index.php">Kezdőlap</a></li>
                <li <?php
                if ($_SERVER['REQUEST_URI'] == "/noveny/'product.php?page=1")
                    echo $active;
                ?>><a href="product.php?page=1">Termékek</a></li>
                <li><a href="logout.php">Kilépés</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li <?php
                $active = 'class="active"';
                if ($_SERVER['REQUEST_URI'] == "/noveny/index.php")
                    echo $active;
                ?>><a href="index.php">Kezdőlap</a></li>
                <li <?php
                if ($_SERVER['REQUEST_URI'] == "/noveny/'product.php?page=1")
                    echo $active;
                ?>><a href="product.php?page=1">Termékek</a></li>
                <li><a href="logout.php">Kilépés</a></li>
            </ul>
        </div>
    </nav>
</div>

<script>
    $(document).ready(function (e) {
        $(".button-collapse").sideNav();
    });
</script>

<script type="text/javascript">

</script>