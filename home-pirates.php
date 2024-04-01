<article id="home-pirates" class="bg-dark">
    <div class="row collapse">
        <div class="columns large-5 large-offset-5 medium-8 medium-offset-3 small-12 small-offset-1 end">
            <div class="slanted-container small-no-slant">
                <h2>
                    <?php echo get_theme_mod('home_pirates_title', ''); ?>
                </h2>
                <div class="slanted-block">
                    <?php echo get_theme_mod('home_pirates_content', ''); ?>
                </div>
                <?php echo wp_kses_post(get_theme_mod('home_pirates_link', '')); ?>
            </div>
            <!--/.slanted-container-->
        </div>
        <!--/.columns-->
    </div>
    <!--/.row -->
    <div class="row collapse">
        <div class="columns large-14" id="pirates-image">
            <div id="heightz">
                <img src="<?php echo esc_url(get_theme_mod('home_pirates_banner')); ?>">
            </div>
        </div>
    </div>
    <!--/.row collapse-->
</article>