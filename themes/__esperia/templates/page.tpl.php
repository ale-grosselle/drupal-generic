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
