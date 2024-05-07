<article id="home-pirates" class="bg-dark">
    <div class="row collapse">
        <div class="columns large-5 large-offset-5 medium-8 medium-offset-3 small-12 small-offset-1 end">
            <div class="slanted-container small-no-slant">
                <?php
                $attributes = get_language_attributes('html');
                preg_match('/lang="([^"]+)"/', $attributes, $matches);
                $lang_attribute_value = isset($matches[1]) ? $matches[1] : '';
                $lang_prefix = ($lang_attribute_value === 'vi_VN') ? '_vi' : '';
                ?>
                <h2>
                    <?php echo get_theme_mod("home_pirates_title{$lang_prefix}", ''); ?>
                </h2>
                <div class="slanted-block">
                    <?php echo get_theme_mod("home_pirates_content{$lang_prefix}", ''); ?>
                </div>
                <a href="https://www.tbwa.com.vn/pirates">
                    <?php echo get_theme_mod('home_pirates_link', ''); ?>
                </a>
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