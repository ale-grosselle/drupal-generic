<?php
include "partnersList/index.tpl.php";
$nodeInfo = node_load(7);
?>
<script>
    window.$ = jQuery;
    $('html').addClass('d_none');
    $(document).ready(function () {
        $('html').show();
        $("body").queryLoader2({
            backgroundColor: '#fff',
            barColor: '#9ed08b',
            barHeight: 4,
            percentage: true,
            deepSearch: true,
            minimumTime: 1000
        });
    });
</script>

<!--side menu-->
<button id="open_side_menu" class="icon_wrap_size_2 circle color_black">
    <i class="icon-menu"></i>
</button>
<div id="side_menu">
    <header class="m_bottom_30 d_table w_full">
        <!--logo-->
        <div class="d_table_cell half_column v_align_m">
            <a href="<?php print $front_page; ?>">
                <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/>
            </a>
        </div>
        <!--close sidemenu button-->
        <div class="d_table_cell half_column v_align_m t_align_r">
            <button class="icon_wrap_size_2 circle color_grey_light_2 d_inline_m" id="close_side_menu">
                <i class="icon-cancel"></i>
            </button>
        </div>
    </header>
    <hr class="divider_type_4 m_bottom_25">
    <!--main menu-->
    <nav>
        <ul class="side_main_menu fw_light">
            <?php print theme('links__system_main_menu', array(
                'links' => $main_menu,
                'attributes' => array(
                    'class' => array('fw_light', 'side_main_menu'),
                ),
            )); ?>
        </ul>
    </nav>
</div>
<!--layout-->
<div class="wide_layout bg_light_2">
    <!--header markup-->
    <header role="banner" class="relative type_2">
        <span class="gradient_line"></span>
        <!--top part-->
        <hr>
        <section class="header_bottom_part type_2 bg_light">
            <div class="container-full">
                <div class="d_table w_full d_xs_block" style="height: 230px;">
                    <!--logo-->
                    <div class="first col-lg-3 col-md-3 col-sm-3  d_xs_block f_none v_align_m logo t_xs_align_c">
                        <a href="index.html" class="d_inline_m m_xs_top_20 m_xs_bottom_20">
                            <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/>
                        </a>
                    </div>
                    <div style="font-size: 0; vertical-align: middle; position: relative;"
                         class="second col-lg-9 col-md-9 col-sm-9 d_xs_block f_none t_xs_align_c">
                        <div class="bkg">
                            <img
                                src="<?php print  base_path() . path_to_theme('inceptio') . '/images/home-page-stone-change-2016.png'; ?>">
                        </div>
                        <h3 class="main-title">
                            <?php print getValue($nodeInfo->field_conference_title) ?>
                            <span class="sub-title">
								<?php print getValue($nodeInfo->field_conference_subtitle) ?>
							</span>
                        </h3>

                        <div class="header-description">
                            <i class="slogan">
                                "<?php print getValue($nodeInfo->field_slogan) ?>"
                            </i>
                        </div>
                        <div class="ghost"></div>
                        <div class="abs-text">
							<span>
								INTERNATIONAL STONE CONFERENCE
							</span>
                        </div>
                    </div>
                    <div style="font-size: 0;" class="third logoCarousel">
                        <div>
                            <img src="<?php print  base_path() . path_to_theme('inceptio') . '/courseLogo.png'; ?>">
                            <span style="font-size: 15px;">Carrara 15 June 2016</span>
                        </div>
                        <div>
                            <a target="_blank"
                               href="<?php print  base_path() . path_to_theme('inceptio') . '/QUARRY_MANAGEMENT.pdf'; ?>">
                                <img
                                    src="<?php print  base_path() . path_to_theme('inceptio') . '/quarry%20management%20course.png'; ?>">
                            </a>
                        </div>
                        <div class="ghost"></div>
                    </div>
                </div>
            </div>
            <div class="row list-header">
                <div class="organiser col-lg-6 col-md-6 col-sm-6 m_xs_bottom_30">
				<span class="color_dark tt_uppercase">
					<?php print(t("Organisers")); ?>
				</span>

                    <div>
                        <?php printSlides("organiser"); ?>
                    </div>
                </div>
                <div class="coordinator col-lg-6 col-md-6 col-sm-6 m_xs_bottom_30">
				<span class="color_dark  tt_uppercase">
					<?php print(t("Tech. Coordinators")); ?>
				</span>

                    <div class="">
                        <?php printSlides("technical_coordinators"); ?>
                    </div>
                </div>
                <div class="patronage col-lg-6 col-md-6 col-sm-6 m_xs_bottom_30">
				<span class="color_dark tt_uppercase">
				<?php print(t("Patronage of")); ?>
			</span>

                    <div>
                        <?php printSlides("patronage_"); ?>
                    </div>
                </div>
            </div>
        </section>
        <hr class="d_xs_none">
        <section class="sticky_part bg_light menu-container-wrapper">
            <div class="container menu-container">
                <!--main navigation-->
                <button id="menu_button" class="r_corners tr_all color_blue db_centered m_bottom_20 d_none d_xs_block">
                    <i class="icon-menu"></i>
                </button>
                <!--main navigation-->
                <nav role="navigation"
                     class="navigation-mobile d_inline_m d_xs_none m_xs_right_0 m_right_15 m_sm_right_5 t_align_l m_xs_bottom_15">
                    <?php print theme('links__system_main_menu', array(
                        'links' => $main_menu,
                        'attributes' => array(
                            'id' => 'main-menu-links',
                            'class' => array('hr_list', 'main_menu', 'fw_light', 'type_2'),
                        ),
                    )); ?>
                </nav>
            </div>
        </section>
    </header>

    <?php print render($page['content']); ?>

    <!-- CONTAINER -->
    <?php if (drupal_is_front_page()) : ?>
        <?php include "homepage.tpl.php"; ?>
    <?php endif; ?>

    <!--footer-->
    <?php /*print render($page['footer']); */ ?><!--
	--><?php /*include "footer/index.tpl.php"; */ ?>
</div>
<!--back to top button-->
<button id="back_to_top" class="circle icon_wrap_size_2 color_blue_hover color_grey_light_4 tr_all d_md_none">
    <i class="icon-angle-up fs_large"></i>
</button>


<!--Libs-->
<script src="<?php print  base_path() . path_to_theme('inceptio') . '/plugins/jquery.iosslider.min.js'; ?>"></script>
<script src="<?php print  base_path() . path_to_theme('inceptio') . '/plugins/jquery.appear.js'; ?>"></script>
<script src="<?php print  base_path() . path_to_theme('inceptio') . '/plugins/afterresize.min.js'; ?>"></script>
<script src="<?php print  base_path() . path_to_theme('inceptio') . '/plugins/jquery.easytabs.min.js'; ?>"></script>
<script
    src="<?php print  base_path() . path_to_theme('inceptio') . '/plugins/owl-carousel/owl.carousel.min.js'; ?>"></script>
<script
    src="<?php print  base_path() . path_to_theme('inceptio') . '/plugins/jackbox/js/jackbox-packed.min.js'; ?>"></script>
<script
    src="<?php print  base_path() . path_to_theme('inceptio') . '/plugins/twitter/jquery.tweet.min.js'; ?>"></script>
<script src="<?php print  base_path() . path_to_theme('inceptio') . '/plugins/flickr.js'; ?>"></script>
<script src="<?php print  base_path() . path_to_theme('inceptio') . '/plugins/jquery.easing.1.3.js'; ?>"></script>


<!--Theme Initializer-->
<script src="<?php print  base_path() . path_to_theme('inceptio') . '/js/theme.plugins.js'; ?>"></script>
<script src="<?php print  base_path() . path_to_theme('inceptio') . '/js/theme.js'; ?>"></script>
<script src="<?php print  base_path() . path_to_theme('inceptio') . '/plugins/isotope.pkgd.min.js'; ?>"></script>

<!-- Popup Programme -->
<link rel="stylesheet"
      href="<?php print  base_path() . path_to_theme('inceptio') . '/plugins/jquery-ui-1.11.4.custom/jquery-ui.css'; ?>">
<script
    src="<?php print  base_path() . path_to_theme('inceptio') . '/plugins/jquery-ui-1.11.4.custom/jquery-ui.js'; ?>"></script>
<script src="<?php print  base_path() . path_to_theme('inceptio') . '/js/popupProgramme.js'; ?>"></script>
<script src="<?php print  base_path() . path_to_theme('inceptio') . '/js/jquery.cookie.js'; ?>"></script>
