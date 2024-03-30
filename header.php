<style type="text/css">
    #logo.white-logo a {
        background: url(<?php echo esc_url(get_theme_mod('white_logo_setting')); ?>) 0 0/contain no-repeat;
    }

    #logo.black-logo a {
        background: url(<?php echo esc_url(get_theme_mod('black_logo_setting')); ?>) 0 0/contain no-repeat;
    }

    #logo a img {
        height: 30px;
        width: auto;
        opacity: 0;
    }

    @media screen and (max-width: 64em) {
        #logo.black-logo a {
            height: 20px;
        }

        #logo.white-logo a {
            height: 20px;
            background: url(<?php echo esc_url(get_theme_mod('black_logo_url')); ?>) 0 0/contain no-repeat;
        }

        #logo a img {
            height: 20px;
        }
    }
</style>

<div id="menu-container"> <!-- container for TBWA logo, menu button and menu overlay -->
    <div id="menu-dark-bg"></div>
    <div id="menu-slash-bg">
        <div id="menus">
            <!-- main menu -->
            <div id="main-menu">
                <?php
                wp_nav_menu(
                    array(
                        'menu' => 'primary',
                        'theme_location' => 'primary',
                        'menu_class' => 'menu',
                        'fallback_cb' => false,
                        'walker' => new Custom_Walker_Nav_Menu()
                    )
                );
                ?>
            </div>
            <!--/#main-menu-->

            <div id="sub-menu">
                <div id="inner-sub-menu">
                    <!-- secondary menu -->
                    <div id="secondary-menu-container">
                        <div id="secondary-menu">
                            <?php
                            wp_nav_menu(
                                array(
                                    'menu' => 'secondary',
                                    'theme_location' => 'secondary',
                                    'container' => 'container',
                                    'menu_class' => 'menu',
                                    'fallback_cb' => false,
                                    'walker' => new Custom_Walker_Nav_Menu()
                                )
                            );
                            ?>
                            <!-- <ul>
                                <li><a href="https://www.tequila.com.vn/news"><span>News</span></a></li>
                            </ul> -->
                        </div>
                        <!--/#secondary-menu-->
                    </div>
                    <!--/#secondary-menu-container-->

                    <div id="contact-info-container">
                        <!-- email contacts -->
                        <div id="contact-info">
                            <h3>New Business Inquiries</h3>
                            <p class="name">Nguyen Kim Chi</p>
                            <a class="email" href="mailto:chi.nk@tequila.com.vn">chi.nk@tequila.com.vn</a>

                            <h3>New Business Inquiries</h3>
                            <p class="name">Nguyen Kim Chi</p>
                            <a class="email" href="mailto:chi.nk@tequila.com.vn">chi.nk@tequila.com.vn</a>
                        </div>

                        <!-- office address -->
                        <div id="office-address">
                            <h3>Tequila\TBWA Vietnam</h3>
                            <span class="address">
                                <p>4th Floor
                                </p>
                                <p>9 Dinh Tien Hoang St.</p>
                                <p>Da Kao Ward, District 1, </p>
                                <p>Ho Chi Minh City, Vietnam</p><br>
                                <a class="phone" href="tel:+84 2838239987">+84 2838239987</a>
                            </span><br>
                            <a class="email" href="mailto:info@tequila.com.vn">info@tequila.com.vn</a>
                        </div>
                    </div>
                    <!--/#office-addresses-->
                </div>
                <!-- social icons -->
                <div id="social-icons">
                    <ul class="social-share-buttons">
                        <li><a href="https://facebook.com/TBWAWorldwide" data-share-channel="" id="facebook"
                                class="share-btn" target="_blank">Facebook</a></li>
                        <li><a href="https://www.linkedin.com/company/tbwa" data-share-channel="" id="linkedin"
                                class="share-btn" target="_blank">Linkedin</a></li>
                    </ul>
                </div>
                <!--/#social-icons-->
            </div>
            <!--/#sub-menu-->
        </div>
        <!--/#menus-->
    </div>
    <!--/#menu-slash-bg-->
</div>
<!--/#menu-container-->



<div id="menu-language-toggle" class="white">
    <ul>
        <li class="nav__item current"><a href="https://www.tequila.com.vn/">EN</a></li>
        <li class="divider"> \ </li>
        <li class="nav__item "><a href="https://www.tequila.com.vn/vi/">VI</a></li>
    </ul>
</div>
<!--/#menu-language-toggle-->

<div id="logo-container">
    <div id="logo" class="white-logo">
        <?php
        $white_logo_url = get_theme_mod('white_logo_setting');
        $black_logo_url = get_theme_mod('black_logo_setting');
        ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="tbwa-homepage" id="tbwa-logo">
            <img src="<?php echo esc_url($white_logo_url); ?>" alt="<?php bloginfo('name'); ?>">
        </a>
        <!-- <a href="https://www.tequila.com.vn/" class="tbwa-homepage" id="tbwa-logo">
            <img src="/wordpress/wp-content/themes/tbwa/Tequila_Vietnam_files//Tequila_logo_light.png">
        </a> -->
    </div>
</div>
<!--/#logo-container-->

<div id="menu-button" class="burger-white"> <!-- menu button -->
    <svg id="hamburger-top-svg" class="hamburger-svg" viewBox="0 0 40 6" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink">
        <polygon points="0,0 40,0 40,6 0,6"></polygon>
    </svg>
    <svg id="hamburger-bottom-svg" class="hamburger-svg" viewBox="0 0 40 6" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink">
        <polygon points="0,0 40,0 40,6 0,6"></polygon>
    </svg>
</div><!-- end menu button -->