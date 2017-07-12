<script>
    window.$ = jQuery;
</script>
<?php
    $infoFactory = getNodeFromId(6);
?>

<!--Preload section starts here-->
<div class="preload"><i class="fa fa-heartbeat"></i></div>
<!--Preload section ends here-->

<!--header section starts here-->
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-9">
                <a href="index.html" class="brand">
                    <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="img-responsive" />
                </a>
            </div>
            <div class="col-xs-3 hidden-sm hidden-md hidden-lg">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#main-menu-dropdown" aria-expanded="false"><span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span> <span class="icon-bar"></span> <span
                                    class="icon-bar"></span></button>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="main-menu-dropdown">
                            <?php print theme('links__system_main_menu', array(
                                'links' => $main_menu,
                                'attributes' => array(
                                    'class' => array('main-menu text-center'),
                                ),
                            )); ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!--header section ends here-->

<!-- sticky header section starts here-->
<header class="stuck up hidden-xs hidden-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="index.html" class="brand">
                    <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
                </a>
            </div>
            <div class="col-md-8">
                <?php print theme('links__system_main_menu', array(
                    'links' => $main_menu,
                    'attributes' => array(
                        'class' => array('main-menu'),
                    ),
                )); ?>
            </div>
        </div>
    </div>
</header>
<!-- sticky header section ends here-->

<!-- CONTAINER -->
<?php print render($page['content']); ?>
<?php if (drupal_is_front_page()) : ?>
    <?php include "homepage.tpl.php"; ?>
<?php endif; ?>
<!-- CONTAINER -->

<!--FOOTER-->
<!-- Footer Widgets Section starts here-->
<section class="footer-widget">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <ul class="location">
                    <li>
                        <h4>Indirizzo</h4>
                        <span>
                            <?php print getValue($infoFactory->field_indirizzo_civico); ?>
                        </span>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4">
                <ul class="mobile">
                    <li>
                        <h4>
                            <a href="tel:<?php print getValue($infoFactory->field_telefono);?>" >
                                <?php print getValue($infoFactory->field_telefono); ?>
                            </a>
                        </h4>
                        <span>
                            <?php print(t("Chiamaci oggi!"))?>
                        </span>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4">
                <ul class="calender">
                    <li>
                        <h4><?php print(t("Richiedi un appuntamento"))?></h4>
                        <span>
                            <a href="mailto:<?php print getValue($infoFactory->field_email); ?>">
                                <?php print getValue($infoFactory->field_email); ?>
                            </a>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Footer Widgets Section ends here-->

<!-- Footer starts here-->
<footer class="footer blue-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <a href="index.html">
                    <img src="<?php print $logo; ?>" alt="logo" class="margin-bottom" />
                </a>
                <p class="color-white">
                    <?php print t("Avvalendosi di un team di professionalità e competenza, lo Studio dentistico Moro Dr. Antonio mette al servizio dei clienti chirurghi e odontoiatri per interventi di chirurgia endossea, endodonzia, chirurgia odontostomatologica, gnatologia, chirurgia paradentale e ortodonzia.")?>
                </p>
                <h4 class="color-white social-heading">Seguici su:</h4>
                <ul class="social-links list-inline font-40">
                    <li><a target="_blank" href="<?php print getValue($infoFactory->field_url_facebook); ?>"><i class="fa fa-facebook"></i></a></li>
                    <li><a target="_blank" href="<?php print getValue($infoFactory->field_url_twitter); ?>"><i class="fa fa-twitter"></i></a></li>
                    <li><a target="_blank" href="<?php print getValue($infoFactory->field_url_linkedin); ?>"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-12">
                <h4 class="color-white heading2-underline">
                    <?php print(t("Orari di apertura:"));?>
                </h4>
                <ul class="footer-list list-unstyled">
                    <?php print getValue($infoFactory->field_orari_apertura); ?>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Footer ends here-->
<div class="copyrights text-center">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 color-white" id="add-year"></div>
            <script>
                var d = new Date();
                var n = d.getFullYear();
                $("#add-year").html("&copy; " + n + " All Rights Reserved.");
            </script>
        </div>
    </div>
</div>