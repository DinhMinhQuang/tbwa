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
        <a href="https://www.tequila.com.vn/" class="tbwa-homepage" id="tbwa-logo">
            <img src="/wordpress/wp-content/themes/tbwa/Tequila_Vietnam_files//Tequila_logo_light.png">
        </a>
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

<section id="landing-container" class="row collapse">
    <article id="landing-video" class="full-width-video">
        <video poster="" id="landing-vid" playsinline="" autoplay="" muted="" loop="">
            <source src="https://d2rijh2vqznvtd.cloudfront.net/assets/videos/attractor.mp4" type="video/mp4">
        </video>
        <article class="video-overlay" id="homepage">
            <div class="vertical-align">
                <h1 class="font-light">
                    <p>We Are</p>
                    <p>The<br></p>
                    <p>Disruption<sup>®</sup></p>
                    <p>Company</p>
                </h1>
                <a href="https://www.tequila.com.vn/#" class="slanted-button bg-light" id="tbwa-videos">
                    <h4>Watch</h4>
                </a>
            </div>
            <img src="/wordpress/wp-content/themes/tbwa/Tequila_Vietnam_files//arrow_white.svg" class="down-arrow"
                alt="Scroll Down">
        </article>
        <!--/.video-overlay-->
    </article>
    <!--/#landing-video-->

    <article id="main-video-player" class="player" style="display: none;">
        <div tabindex="-1" preload="auto"
            class="video-js vjs-paused video-dimensions vjs-controls-enabled vjs-workinghover vjs-user-inactive"
            id="video" role="region" aria-label="video player"><video id="video_html5_api" class="vjs-tech"
                preload="auto" tabindex="-1" poster=""
                src="https://d2rijh2vqznvtd.cloudfront.net/assets/videos/peopleandplaces.mp4">
                <source src="https://d2rijh2vqznvtd.cloudfront.net/assets/videos/peopleandplaces.mp4" type="video/mp4">
            </video>
            <div></div>
            <div class="vjs-poster vjs-hidden" tabindex="-1" aria-disabled="false"></div>
            <div class="vjs-text-track-display" aria-live="off" aria-atomic="true"></div>
            <div class="vjs-loading-spinner" dir="ltr"></div><button class="vjs-big-play-button" type="button"
                aria-live="polite" title="Play Video" aria-disabled="false"><span class="vjs-control-text">Play
                    Video</span></button>
            <div class="vjs-control-bar" dir="ltr" role="group" style="width: 1576.8px;"><button
                    class="vjs-play-control vjs-control vjs-button" type="button" aria-live="polite" title="Play"
                    aria-disabled="false"><span class="vjs-control-text">Play</span></button>
                <div class="vjs-volume-menu-button vjs-menu-button vjs-menu-button-inline vjs-control vjs-button vjs-volume-menu-button-horizontal vjs-vol-3"
                    tabindex="0" role="button" aria-live="polite" title="Mute" aria-disabled="false">
                    <div class="vjs-menu">
                        <div class="vjs-menu-content">
                            <div tabindex="0" class="vjs-volume-bar vjs-slider-bar vjs-slider vjs-slider-horizontal"
                                role="slider" aria-valuenow="100.00" aria-valuemin="0" aria-valuemax="100"
                                aria-label="volume level" aria-valuetext="100.00%">
                                <div class="vjs-volume-level"><span class="vjs-control-text"></span></div>
                            </div>
                        </div>
                    </div><span class="vjs-control-text">Mute</span>
                </div>
                <div class="vjs-current-time vjs-time-control vjs-control">
                    <div class="vjs-current-time-display" aria-live="off"><span class="vjs-control-text">Current
                            Time</span>
                        0:00</div>
                </div>
                <div class="vjs-time-control vjs-time-divider">
                    <div><span>/</span></div>
                </div>
                <div class="vjs-duration vjs-time-control vjs-control">
                    <div class="vjs-duration-display" aria-live="off"><span class="vjs-control-text">Duration
                            Time</span> 3:20
                    </div>
                </div>
                <div class="vjs-progress-control vjs-control">
                    <div tabindex="0" class="vjs-progress-holder vjs-slider vjs-slider-horizontal" role="slider"
                        aria-valuenow="NaN" aria-valuemin="0" aria-valuemax="100" aria-label="progress bar"
                        aria-valuetext="0:00">
                        <div class="vjs-load-progress" style="width: 12.2418%;"><span
                                class="vjs-control-text"><span>Loaded</span>: 0%</span>
                            <div style="left: 0%; width: 9.15584%;"></div>
                            <div style="left: 14.2846%; width: 85.7154%;"></div>
                        </div>
                        <div class="vjs-mouse-display" data-current-time="0:00" style="left: 0px;"></div>
                        <div class="vjs-play-progress vjs-slider-bar" data-current-time="0:00" style="width: 0%;"><span
                                class="vjs-control-text"><span>Progress</span>: 0%</span></div>
                    </div>
                </div>
                <div class="vjs-live-control vjs-control vjs-hidden">
                    <div class="vjs-live-display" aria-live="off"><span class="vjs-control-text">Stream Type</span>LIVE
                    </div>
                </div>
                <div class="vjs-remaining-time vjs-time-control vjs-control">
                    <div class="vjs-remaining-time-display" aria-live="off"><span class="vjs-control-text">Remaining
                            Time</span>
                        -3:20</div>
                </div>
                <div class="vjs-custom-control-spacer vjs-spacer ">&nbsp;</div>
                <div class="vjs-playback-rate vjs-menu-button vjs-menu-button-popup vjs-control vjs-button vjs-hidden"
                    tabindex="0" role="menuitem" aria-live="polite" title="Playback Rate" aria-disabled="false"
                    aria-expanded="false" aria-haspopup="true">
                    <div class="vjs-menu" role="presentation">
                        <ul class="vjs-menu-content" role="menu"></ul>
                    </div><span class="vjs-control-text">Playback Rate</span>
                    <div class="vjs-playback-rate-value">1</div>
                </div>
                <div class="vjs-chapters-button vjs-menu-button vjs-menu-button-popup vjs-control vjs-button vjs-hidden"
                    tabindex="0" role="menuitem" aria-live="polite" title="Chapters" aria-disabled="false"
                    aria-expanded="false" aria-haspopup="true" aria-label="Chapters Menu">
                    <div class="vjs-menu" role="presentation">
                        <ul class="vjs-menu-content" role="menu">
                            <li class="vjs-menu-title" tabindex="-1">Chapters</li>
                        </ul>
                    </div><span class="vjs-control-text">Chapters</span>
                </div>
                <div class="vjs-descriptions-button vjs-menu-button vjs-menu-button-popup vjs-control vjs-button vjs-hidden"
                    tabindex="0" role="menuitem" aria-live="polite" title="Descriptions" aria-disabled="false"
                    aria-expanded="false" aria-haspopup="true" aria-label="Descriptions Menu">
                    <div class="vjs-menu" role="presentation">
                        <ul class="vjs-menu-content" role="menu">
                            <li class="vjs-menu-item vjs-selected" tabindex="-1" role="menuitemcheckbox"
                                aria-live="polite" aria-disabled="false" aria-checked="true">descriptions off<span
                                    class="vjs-control-text">,
                                    selected</span></li>
                        </ul>
                    </div><span class="vjs-control-text">Descriptions</span>
                </div>
                <div class="vjs-subtitles-button vjs-menu-button vjs-menu-button-popup vjs-control vjs-button vjs-hidden"
                    tabindex="0" role="menuitem" aria-live="polite" title="Subtitles" aria-disabled="false"
                    aria-expanded="false" aria-haspopup="true" aria-label="Subtitles Menu">
                    <div class="vjs-menu" role="presentation">
                        <ul class="vjs-menu-content" role="menu">
                            <li class="vjs-menu-item vjs-selected" tabindex="-1" role="menuitemcheckbox"
                                aria-live="polite" aria-disabled="false" aria-checked="true">subtitles off<span
                                    class="vjs-control-text">,
                                    selected</span></li>
                        </ul>
                    </div><span class="vjs-control-text">Subtitles</span>
                </div>
                <div class="vjs-captions-button vjs-menu-button vjs-menu-button-popup vjs-control vjs-button vjs-hidden"
                    tabindex="0" role="menuitem" aria-live="polite" title="Captions" aria-disabled="false"
                    aria-expanded="false" aria-haspopup="true" aria-label="Captions Menu">
                    <div class="vjs-menu" role="presentation">
                        <ul class="vjs-menu-content" role="menu">
                            <li class="vjs-menu-item vjs-texttrack-settings" tabindex="-1" role="menuitem"
                                aria-live="polite" aria-disabled="false">captions settings<span
                                    class="vjs-control-text">, opens captions settings
                                    dialog</span></li>
                            <li class="vjs-menu-item vjs-selected" tabindex="-1" role="menuitemcheckbox"
                                aria-live="polite" aria-disabled="false" aria-checked="true">captions off<span
                                    class="vjs-control-text">, selected</span>
                            </li>
                        </ul>
                    </div><span class="vjs-control-text">Captions</span>
                </div>
                <div class="vjs-audio-button vjs-menu-button vjs-menu-button-popup vjs-control vjs-button vjs-hidden"
                    tabindex="0" role="menuitem" aria-live="polite" title="Audio Track" aria-disabled="false"
                    aria-expanded="false" aria-haspopup="true" aria-label="Audio Menu">
                    <div class="vjs-menu" role="presentation">
                        <ul class="vjs-menu-content" role="menu"></ul>
                    </div><span class="vjs-control-text">Audio Track</span>
                </div><button class="vjs-fullscreen-control vjs-control vjs-button" type="button" aria-live="polite"
                    title="Fullscreen" aria-disabled="false"><span class="vjs-control-text">Fullscreen</span></button>
            </div>
            <div class="vjs-error-display vjs-modal-dialog vjs-hidden " tabindex="-1"
                aria-describedby="video_component_353_description" aria-hidden="true" aria-label="Modal Window"
                role="dialog">
                <p class="vjs-modal-dialog-description vjs-offscreen" id="video_component_353_description">This is a
                    modal
                    window.</p>
                <div class="vjs-modal-dialog-content" role="document"></div>
            </div>
            <div class="vjs-caption-settings vjs-modal-overlay vjs-hidden" tabindex="-1" role="dialog"
                aria-labelledby="TTsettingsDialogLabel-video_component_358"
                aria-describedby="TTsettingsDialogDescription-video_component_358">
                <div role="document">
                    <div class="vjs-control-text" id="TTsettingsDialogLabel-video_component_358" aria-level="1"
                        role="heading">
                        Caption Settings Dialog</div>
                    <div class="vjs-control-text" id="TTsettingsDialogDescription-video_component_358">Beginning of
                        dialog
                        window. Escape will cancel and close the window.</div>
                    <div class="vjs-tracksettings">
                        <div class="vjs-tracksettings-colors">
                            <fieldset class="vjs-fg-color vjs-tracksetting">
                                <legend>Text</legend><label class="vjs-label"
                                    for="captions-foreground-color-video_component_358">Color</label><select
                                    id="captions-foreground-color-video_component_358">
                                    <option value="#FFF">White</option>
                                    <option value="#000">Black</option>
                                    <option value="#F00">Red</option>
                                    <option value="#0F0">Green</option>
                                    <option value="#00F">Blue</option>
                                    <option value="#FF0">Yellow</option>
                                    <option value="#F0F">Magenta</option>
                                    <option value="#0FF">Cyan</option>
                                </select><span class="vjs-text-opacity vjs-opacity"><label class="vjs-label"
                                        for="captions-foreground-opacity-video_component_358">Transparency</label><select
                                        id="captions-foreground-opacity-video_component_358">
                                        <option value="1">Opaque</option>
                                        <option value="0.5">Semi-Transparent</option>
                                    </select></span>
                            </fieldset>
                            <fieldset class="vjs-bg-color vjs-tracksetting">
                                <legend>Background</legend><label class="vjs-label"
                                    for="captions-background-color-video_component_358">Color</label><select
                                    id="captions-background-color-video_component_358">
                                    <option value="#000">Black</option>
                                    <option value="#FFF">White</option>
                                    <option value="#F00">Red</option>
                                    <option value="#0F0">Green</option>
                                    <option value="#00F">Blue</option>
                                    <option value="#FF0">Yellow</option>
                                    <option value="#F0F">Magenta</option>
                                    <option value="#0FF">Cyan</option>
                                </select><span class="vjs-bg-opacity vjs-opacity"><label class="vjs-label"
                                        for="captions-background-opacity-video_component_358">Transparency</label><select
                                        id="captions-background-opacity-video_component_358">
                                        <option value="1">Opaque</option>
                                        <option value="0.5">Semi-Transparent</option>
                                        <option value="0">Transparent</option>
                                    </select></span>
                            </fieldset>
                            <fieldset class="vjs-window-color vjs-tracksetting">
                                <legend>Window</legend><label class="vjs-label"
                                    for="captions-window-color-video_component_358">Color</label><select
                                    id="captions-window-color-video_component_358">
                                    <option value="#000">Black</option>
                                    <option value="#FFF">White</option>
                                    <option value="#F00">Red</option>
                                    <option value="#0F0">Green</option>
                                    <option value="#00F">Blue</option>
                                    <option value="#FF0">Yellow</option>
                                    <option value="#F0F">Magenta</option>
                                    <option value="#0FF">Cyan</option>
                                </select><span class="vjs-window-opacity vjs-opacity"><label class="vjs-label"
                                        for="captions-window-opacity-video_component_358">Transparency</label><select
                                        id="captions-window-opacity-video_component_358">
                                        <option value="0">Transparent</option>
                                        <option value="0.5">Semi-Transparent</option>
                                        <option value="1">Opaque</option>
                                    </select></span>
                            </fieldset>
                        </div>
                        <div class="vjs-tracksettings-font">
                            <div class="vjs-font-percent vjs-tracksetting"><label class="vjs-label"
                                    for="captions-font-size-video_component_358">Font Size</label><select
                                    id="captions-font-size-video_component_358">
                                    <option value="0.50">50%</option>
                                    <option value="0.75">75%</option>
                                    <option value="1.00">100%</option>
                                    <option value="1.25">125%</option>
                                    <option value="1.50">150%</option>
                                    <option value="1.75">175%</option>
                                    <option value="2.00">200%</option>
                                    <option value="3.00">300%</option>
                                    <option value="4.00">400%</option>
                                </select></div>
                            <div class="vjs-edge-style vjs-tracksetting"><label class="vjs-label"
                                    for="video_component_358">Text
                                    Edge Style</label><select id="video_component_358">
                                    <option value="none">None</option>
                                    <option value="raised">Raised</option>
                                    <option value="depressed">Depressed</option>
                                    <option value="uniform">Uniform</option>
                                    <option value="dropshadow">Dropshadow</option>
                                </select></div>
                            <div class="vjs-font-family vjs-tracksetting"><label class="vjs-label"
                                    for="captions-font-family-video_component_358">Font Family</label><select
                                    id="captions-font-family-video_component_358">
                                    <option value="proportionalSansSerif">Proportional Sans-Serif</option>
                                    <option value="monospaceSansSerif">Monospace Sans-Serif</option>
                                    <option value="proportionalSerif">Proportional Serif</option>
                                    <option value="monospaceSerif">Monospace Serif</option>
                                    <option value="casual">Casual</option>
                                    <option value="script">Script</option>
                                    <option value="small-caps">Small Caps</option>
                                </select></div>
                        </div>
                        <div class="vjs-tracksettings-controls"><button
                                class="vjs-default-button">Defaults</button><button
                                class="vjs-done-button">Done</button></div>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <!--/#video-player-->
    <div class="tbwa-player playlist vjs-csspointerevents vjs-mouse" id="main-video-playlist" style="display: none;">
        <ol class="vjs-playlist-item-list">
            <li class="vjs-playlist-item vjs-selected" tabindex="0">
                <div class="vjs-playlist-thumbnail vjs-playlist-thumbnail-placeholder vjs-playlist-now-playing"><span
                        class="vjs-playlist-now-playing-text" title="Now Playing">Now Playing</span>
                    <div class="vjs-playlist-title-container">
                        <div class="vjs-playlist-name"><span>Our Culture</span></div>
                    </div>
                </div>
            </li>
            <li class="vjs-playlist-item vjs-up-next" tabindex="0">
                <div class="vjs-playlist-thumbnail vjs-playlist-thumbnail-placeholder"><span
                        class="vjs-playlist-now-playing-text" title="Now Playing">Now Playing</span>
                    <div class="vjs-playlist-title-container">
                        <div class="vjs-playlist-name"><span>Disruption</span></div>
                    </div>
                </div>
            </li>
            <li class="vjs-playlist-item" tabindex="0">
                <div class="vjs-playlist-thumbnail vjs-playlist-thumbnail-placeholder"><span
                        class="vjs-playlist-now-playing-text" title="Now Playing">Now Playing</span>
                    <div class="vjs-playlist-title-container">
                        <div class="vjs-playlist-name"><span>Our Software</span></div>
                    </div>
                </div>
            </li>
            <li class="vjs-playlist-item" tabindex="0">
                <div class="vjs-playlist-thumbnail vjs-playlist-thumbnail-placeholder"><span
                        class="vjs-playlist-now-playing-text" title="Now Playing">Now Playing</span>
                    <div class="vjs-playlist-title-container">
                        <div class="vjs-playlist-name"><span>Our Work</span></div>
                    </div>
                </div>
            </li>
            <li class="vjs-playlist-item" tabindex="0">
                <div class="vjs-playlist-thumbnail vjs-playlist-thumbnail-placeholder"><span
                        class="vjs-playlist-now-playing-text" title="Now Playing">Now Playing</span>
                    <div class="vjs-playlist-title-container">
                        <div class="vjs-playlist-name"><span>Pirates</span></div>
                    </div>
                </div>
            </li>
            <li class="vjs-playlist-ad-overlay"></li>
        </ol>
    </div>

</section>
<!--/#landing-container-->