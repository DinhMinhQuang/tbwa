<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <style class="vjs-styles-defaults">
    .video-js {
      width: 300px;
      height: 150px;
    }

    .vjs-fluid {
      padding-top: 56.25%
    }
  </style>
  <style class="vjs-styles-dimensions">
    .video-dimensions {
      width: 300px;
      height: 300px;
    }

    .video-dimensions.vjs-fluid {
      padding-top: 56.25%;
    }
  </style>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="description"
    content="TBWA is The Disruption® Company. Named Adweek’s 2018 Global Agency of the Year, our collective has 11,300 creative minds across 270 offices in 95 countries.">
  <link rel="shortcut icon" href="https://www.tequila.com.vn/img/favicon.ico" type="image/x-icon">
  <!-- Open Graph tags to customize link previews -->
  <meta property="og:url" content="https://www.tequila.com.vn/">
  <meta property="og:type" content="website">
  <meta property="og:title" content="TBWA">
  <!--<meta property="fb:app_id" content="1731508873846176" />-->

  <?php wp_head(); ?>

  <!-- google fonts for language support
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext" rel="stylesheet">
 -->

</head>

<body class="dark homepage">
  <div id="js_cookieNotice" class="cookieNotice" style="display: block;">
    <div class="cookieNotice__container">
      <p>
        This website uses cookies to improve your experience.
      </p>
      <p>
        <a id="js_cookieNotice_accept" href="https://www.tequila.com.vn/#">Accept</a>
        <a href="https://www.tequila.com.vn/privacy-policy">Privacy Policy</a>
      </p>

    </div>
  </div>

  <style type="text/css">
    .cookieNotice {
      background: #000;
      display: none;
      font-family: "Averta Bold", Open Sans Bold, Open Sans Hebrew Semibold, Helvetica Neue, sans-serif;
      font-weight: 400;
      font-size: 1em;
      line-height: 120%;
      left: 0;
      padding: 30px 60px 30px 0;
      position: fixed;
      right: 0;
      bottom: 0;
      width: 100%;
      s color: #fff;
      z-index: 100;
    }

    .cookieNotice__container {
      margin: 0 auto;
      width: 90%;
    }

    .cookieNotice__container * {
      margin: 0 1em;
      float: left;
    }

    .cookieNotice__container a {
      color: #fecc00;
    }

    .cookieNotice__container a h4 {
      font-size: 1.2rem;
    }

    .cookieNotice p {
      color: #fff;
    }
  </style>

  <?php get_header(); ?>

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

  <section id="main-container" class="tbwa-homepage">
    <article id="home-disruption" class="bg-dark grid-container">
      <div class="row collapse">
        <div class="columns large-7 large-offset-3 medium-8 medium-offset-3 small-12 small-offset-1  end">

          <div class="slanted-container small-no-slant">
            <h2>A Cure for the common</h2>
            <div class="slanted-block">
              <span>We&nbsp;</span><span>are&nbsp;</span><span>not&nbsp;</span><span>a&nbsp;</span><span>traditional&nbsp;</span><span>ad&nbsp;</span><span>agency&nbsp;</span><span>network&nbsp;</span><span>—we&nbsp;</span><span>are&nbsp;</span><span>a&nbsp;</span><span>radically&nbsp;</span><span>open&nbsp;</span><span>creative&nbsp;</span><span>collective.&nbsp;</span><span>We&nbsp;</span><span>look&nbsp;</span><span>at&nbsp;</span><span>what&nbsp;</span><span>everyone&nbsp;</span><span>else&nbsp;</span><span>is&nbsp;</span><span>doing&nbsp;</span><span>and&nbsp;</span><span>strive&nbsp;</span><span>to&nbsp;</span><span>do&nbsp;</span><span>something&nbsp;</span><span>completely&nbsp;</span><span>new.&nbsp;</span><span>Completely&nbsp;</span><span>ownable.&nbsp;</span><span>We&nbsp;</span><span>live&nbsp;</span><span>and&nbsp;</span><span>breathe&nbsp;</span><span>Disruption,&nbsp;</span><span>and&nbsp;</span><span>for&nbsp;</span><span>more&nbsp;</span><span>than&nbsp;</span><span>two&nbsp;</span><span>decades&nbsp;</span><span>that's&nbsp;</span><span>been&nbsp;</span><span>the&nbsp;</span><span>secret&nbsp;</span><span>to&nbsp;</span><span>our&nbsp;</span><span>clients'&nbsp;</span><span>unprecedented&nbsp;</span><span>success.
                &nbsp;</span>
            </div>
            <a href="https://www.tequila.com.vn/disruption">More on Disruption</a>
          </div>


        </div>
        <!--/.columns-->
      </div>
      <!--/.row-->
      <div class="row" id="always-live">
        <div
          class="columns xlarge-5 xlarge-offset-7 medium-7 large-offset-4 medium-offset-3 small-12 small-offset-1 end">

          <div class="slanted-container small-no-slant">
            <h2>Always Live</h2>
            <div class="slanted-block">
              <span>Disruption&nbsp;</span><span>doesn’t&nbsp;</span><span>happen&nbsp;</span><span>just&nbsp;</span><span>once.&nbsp;</span><span>It’s&nbsp;</span><span>an&nbsp;</span><span>ever-churning&nbsp;</span><span>system&nbsp;</span><span>of&nbsp;</span><span>locating&nbsp;</span><span>and&nbsp;</span><span>involving&nbsp;</span><span>our&nbsp;</span><span>brands&nbsp;</span><span>in&nbsp;</span><span>culture.
                &nbsp;</span>
            </div>
            <a href="https://www.tequila.com.vn/disruption#methods">Here's how</a>
          </div>


        </div>
        <!--/.columns-->
      </div>
      <!--/.row collapse-->
    </article>
    <!--/#home-disruption-->
    <article id="home-work" class="bg-light grid-container">
      <div class="row collapse">
        <div class="columns large-5 large-offset-5 medium-11 small-12 small-offset-1 end">

          <div class="slanted-container small-no-slant">
            <h2>We hate boring</h2>
            <div class="slanted-block">
              <span>After&nbsp;</span><span>we’ve&nbsp;</span><span>defined&nbsp;</span><span>where&nbsp;</span><span>a&nbsp;</span><span>brand&nbsp;</span><span>belongs&nbsp;</span><span>in&nbsp;</span><span>culture,&nbsp;</span><span>it’s&nbsp;</span><span>time&nbsp;</span><span>to&nbsp;</span><span>show&nbsp;</span><span>up.&nbsp;</span><span>Preferably&nbsp;</span><span>in&nbsp;</span><span>an&nbsp;</span><span>asymmetric&nbsp;</span><span>tux&nbsp;</span><span>and&nbsp;</span><span>striped&nbsp;</span><span>neon&nbsp;</span><span>socks.
                &nbsp;</span>
            </div>
          </div>
          <!--/.slanted-container-->

        </div>
        <!--/.columns-->
      </div>
      <!--/.row collapse work intro-->
      <div class="work-item left-align ">

        <div class="row"> <!-- top image -->

          <div class="large-6 small-8 columns">
            <div class="lighten-image  bleed-left ">
              <a href="https://www.tequila.com.vn/work/we-care-for-her" class="scale">
                <img src="/wordpress/wp-content/themes/tbwa/Tequila_Vietnam_files//thumbnail.jpg">
              </a>
            </div>
          </div>

        </div>

        <div class="row work-copy-container">
          <div class="row second-image"> <!-- bottom image -->

            <div class="small-offset-1 small-10 large-7 columns">
              <div class="lighten-image ">
                <a href="https://www.tequila.com.vn/work/we-care-for-her" class="scale">
                  <img src="/wordpress/wp-content/themes/tbwa/Tequila_Vietnam_files//thumbnail1.jpg">
                </a>
              </div>
            </div>

          </div>

          <div class="row work-copy"> <!-- work copy -->

            <div class="medium-offset-8 medium-6 small-offset-2 small-12 columns end">
              <div class="slanted-container">
                <a class="work-title" href="https://www.tequila.com.vn/work/we-care-for-her">
                  <h3>#Social-PR-Event</h3>
                  <h3>We care for her ( . )( . )</h3>
                  <h4 class="client">ROCHE</h4>
                  <h5 class="agency"></h5>
                  <img src="/wordpress/wp-content/themes/tbwa/Tequila_Vietnam_files//arrow.svg" class="arrow">
                </a>
              </div>
            </div>

          </div>

        </div>



      </div>
      <div class="work-item right-align ">

        <div class="row"> <!-- top image -->

          <div class="small-offset-2 small-9 large-offset-5 large-7 columns">
            <div class="lighten-image ">
              <a href="https://www.tequila.com.vn/work/rosesforyouridols" class="scale">
                <img src="/wordpress/wp-content/themes/tbwa/Tequila_Vietnam_files//Vlive_Bantim-Thumbnails.png">
              </a>
            </div>
          </div>

        </div>

        <div class="row work-copy-container">
          <div class="row second-image"> <!-- bottom image -->

            <div class="small-offset-7 small-7 large-offset-9 large-5 columns">
              <div class="lighten-image  bleed-right ">
                <a href="https://www.tequila.com.vn/work/rosesforyouridols" class="scale">
                  <img src="/wordpress/wp-content/themes/tbwa/Tequila_Vietnam_files//Picture1.jpg">
                </a>
              </div>
            </div>

          </div>

          <div class="row work-copy"> <!-- work copy -->

            <div class="small-offset-2 small-12 large-offset-3 large-11 columns end">
              <div class="slanted-container">
                <a class="work-title" href="https://www.tequila.com.vn/work/rosesforyouridols">
                  <h3>#Digital</h3>
                  <h3>Roses For Your Idols</h3>
                  <h4 class="client">V LINE</h4>
                  <h5 class="agency"></h5>
                  <img src="/wordpress/wp-content/themes/tbwa/Tequila_Vietnam_files//arrow.svg" class="arrow">
                </a>
              </div>
            </div>

          </div>

        </div>



      </div>
      <div class="work-item left-align ">

        <div class="row"> <!-- top image -->

          <div class="large-6 small-8 columns">
            <div class="lighten-image  bleed-left ">
              <a href="https://www.tequila.com.vn/work/bachy-solentanche-vietnam-20-years-anniversary-event"
                class="scale">
                <img src="/wordpress/wp-content/themes/tbwa/Tequila_Vietnam_files//Bachy1.jpg">
              </a>
            </div>
          </div>

        </div>

        <div class="row work-copy-container">
          <div class="row second-image"> <!-- bottom image -->

            <div class="small-offset-1 small-10 large-7 columns">
              <div class="lighten-image ">
                <a href="https://www.tequila.com.vn/work/bachy-solentanche-vietnam-20-years-anniversary-event"
                  class="scale">
                  <img src="/wordpress/wp-content/themes/tbwa/Tequila_Vietnam_files//Bachy2.jpg">
                </a>
              </div>
            </div>

          </div>

          <div class="row work-copy"> <!-- work copy -->

            <div class="medium-offset-8 medium-6 small-offset-2 small-12 columns end">
              <div class="slanted-container">
                <a class="work-title"
                  href="https://www.tequila.com.vn/work/bachy-solentanche-vietnam-20-years-anniversary-event">
                  <h3>#Event</h3>
                  <h3>Build on us</h3>
                  <h4 class="client">BACHY SOLENTANCHE VIETNAM</h4>
                  <h5 class="agency"></h5>
                  <img src="/wordpress/wp-content/themes/tbwa/Tequila_Vietnam_files//arrow.svg" class="arrow">
                </a>
              </div>
            </div>

          </div>

        </div>



      </div>
      <div class="work-item right-align ">

        <div class="row"> <!-- top image -->

          <div class="small-offset-2 small-9 large-offset-5 large-7 columns">
            <div class="lighten-image ">
              <a href="https://www.tequila.com.vn/work/maserati-levante-lauching-event" class="scale">
                <img src="/wordpress/wp-content/themes/tbwa/Tequila_Vietnam_files//maserati4.jpg">
              </a>
            </div>
          </div>

        </div>

        <div class="row work-copy-container">
          <div class="row second-image"> <!-- bottom image -->

            <div class="small-offset-7 small-7 large-offset-9 large-5 columns">
              <div class="lighten-image  bleed-right ">
                <a href="https://www.tequila.com.vn/work/maserati-levante-lauching-event" class="scale">
                  <img src="/wordpress/wp-content/themes/tbwa/Tequila_Vietnam_files//maserati1.jpg">
                </a>
              </div>
            </div>

          </div>

          <div class="row work-copy"> <!-- work copy -->

            <div class="small-offset-2 small-12 large-offset-3 large-11 columns end">
              <div class="slanted-container">
                <a class="work-title" href="https://www.tequila.com.vn/work/maserati-levante-lauching-event">
                  <h3>#Event</h3>
                  <h3>Levante Launching Event</h3>
                  <h4 class="client">MASERATI</h4>
                  <h5 class="agency"></h5>
                  <img src="/wordpress/wp-content/themes/tbwa/Tequila_Vietnam_files//arrow.svg" class="arrow">
                </a>
              </div>
            </div>

          </div>

        </div>



      </div>
      <div class="work-item left-align ">

        <div class="row"> <!-- top image -->

          <div class="large-6 small-8 columns">
            <div class="lighten-image  bleed-left ">
              <a href="https://www.tequila.com.vn/work/citisoho-launching-event" class="scale">
                <img src="/wordpress/wp-content/themes/tbwa/Tequila_Vietnam_files//Kien-A-soho-4.png">
              </a>
            </div>
          </div>

        </div>

        <div class="row work-copy-container">
          <div class="row second-image"> <!-- bottom image -->

            <div class="small-offset-1 small-10 large-7 columns">
              <div class="lighten-image ">
                <a href="https://www.tequila.com.vn/work/citisoho-launching-event" class="scale">
                  <img src="/wordpress/wp-content/themes/tbwa/Tequila_Vietnam_files//Kien-A-soho-3.png">
                </a>
              </div>
            </div>

          </div>

          <div class="row work-copy"> <!-- work copy -->

            <div class="medium-offset-8 medium-6 small-offset-2 small-12 columns end">
              <div class="slanted-container">
                <a class="work-title" href="https://www.tequila.com.vn/work/citisoho-launching-event">
                  <h3>#Event</h3>
                  <h3>Citisoho Launching Event</h3>
                  <h4 class="client">KIEN A</h4>
                  <h5 class="agency"></h5>
                  <img src="/wordpress/wp-content/themes/tbwa/Tequila_Vietnam_files//arrow.svg" class="arrow">
                </a>
              </div>
            </div>

          </div>

        </div>



      </div>
      <div class="work-item right-align ">

        <div class="row"> <!-- top image -->

          <div class="small-offset-2 small-9 large-offset-5 large-7 columns">
            <div class="lighten-image ">
              <a href="https://www.tequila.com.vn/work/downy-parfum-collection-launching-event" class="scale">
                <img src="/wordpress/wp-content/themes/tbwa/Tequila_Vietnam_files//Downy3.JPG">
              </a>
            </div>
          </div>

        </div>

        <div class="row work-copy-container">
          <div class="row second-image"> <!-- bottom image -->

            <div class="small-offset-7 small-7 large-offset-9 large-5 columns">
              <div class="lighten-image  bleed-right ">
                <a href="https://www.tequila.com.vn/work/downy-parfum-collection-launching-event" class="scale">
                  <img src="/wordpress/wp-content/themes/tbwa/Tequila_Vietnam_files//Downy4.JPG">
                </a>
              </div>
            </div>

          </div>

          <div class="row work-copy"> <!-- work copy -->

            <div class="small-offset-2 small-12 large-offset-3 large-11 columns end">
              <div class="slanted-container">
                <a class="work-title" href="https://www.tequila.com.vn/work/downy-parfum-collection-launching-event">
                  <h3>#Event</h3>
                  <h3>Downy - Never Faded</h3>
                  <h4 class="client">P&amp;G</h4>
                  <h5 class="agency"></h5>
                  <img src="/wordpress/wp-content/themes/tbwa/Tequila_Vietnam_files//arrow.svg" class="arrow">
                </a>
              </div>
            </div>

          </div>

        </div>



      </div>

      <div class="row collapse">
        <div class="columns large-5 large-offset-5 medium-5 medium-offset-4 small-9 small-offset-1 end">
          <a href="https://www.tequila.com.vn/work" class="font-dark section-link">See more of our work</a>
        </div>
      </div>
      <!--/.row collapse-->
    </article>
    <!--/#home-work-->
    <article id="home-pirates" class="bg-dark">
      <div class="row collapse">
        <div class="columns large-5 large-offset-5 medium-8 medium-offset-3 small-12 small-offset-1 end">
          <div class="slanted-container small-no-slant">
            <h2>Meet the Team</h2>
            <div class="slanted-block">
              <span>We&nbsp;</span><span>are&nbsp;</span><span>creative&nbsp;</span><span>renegades.&nbsp;</span><span>We&nbsp;</span><span>take&nbsp;</span><span>risks.&nbsp;</span><span>We&nbsp;</span><span>rewrite&nbsp;</span><span>rules.&nbsp;</span><span>We&nbsp;</span><span>come&nbsp;</span><span>up&nbsp;</span><span>with&nbsp;</span><span>brave&nbsp;</span><span>ideas&nbsp;</span><span>that&nbsp;</span><span>take&nbsp;</span><span>on&nbsp;</span><span>conventionally-steered&nbsp;</span><span>ships.
                &nbsp;</span>
            </div>
            <a href="https://www.tequila.com.vn/our-team">More Our Team</a>
          </div>
          <!--/.slanted-container-->
        </div>
        <!--/.columns-->
      </div>
      <!--/.row -->
      <div class="row collapse">
        <div class="columns large-14" id="pirates-image">
          <div id="heightz">
            <img src="Tequila_Vietnam_files/piratesBG.jpg">
          </div>
        </div>
      </div>
      <!--/.row collapse-->
    </article>
    <!--/#home-pirates-->
  </section>
  <!--/#main-container-->
  <?php get_footer(); ?>

  <script>
    var siteUrl = "https://www.tequila.com.vn/";
  </script>

  <script>
    var disruptionVideo = "https://d2rijh2vqznvtd.cloudfront.net/assets/videos/disruption.mp4",
      disruptionVideoTitle = "Disruption",
      softwareVideo = "https://d2rijh2vqznvtd.cloudfront.net/assets/videos/software.mp4",
      softwareVideoTitle = "Our Software",
      workVideo = "https://d2rijh2vqznvtd.cloudfront.net/assets/videos/work.mp4",
      workVideoTitle = "Our Work",
      piratesVideo = "https://d2rijh2vqznvtd.cloudfront.net/assets/videos/pirate.mp4",
      piratesVideoTitle = "Pirates",
      peopleAndPlacesVideo = "https://d2rijh2vqznvtd.cloudfront.net/assets/videos/peopleandplaces.mp4",
      peopleAndPlacesVideoTitle = "Our Culture";
  </script>
  <script type="text/javascript" src="/wordpress/wp-content/themes/tbwa/Tequila_Vietnam_files/video.min.js"></script>
  <script type="text/javascript" src="/wordpress/wp-content/themes/tbwa/Tequila_Vietnam_files/homepage.min.js"></script>
  <script type="text/javascript">
    function facebookLogout() {
      FB.getLoginStatus(function (response) {
        if (response.status === 'connected') {
          FB.logout(function (response) {
            console.log(response)
          });
        }
      });
    }
    var elNotice = document.getElementById('js_cookieNotice')
    var elAccept = document.getElementById('js_cookieNotice_accept')
    var elRefuse = document.getElementById('js_cookieNotice_refuse')


    function setCookie(name, value, days) {
      var expiry = new Date()
      expiry.setTime(expiry.getTime() + (days * 24 * 60 * 60 * 1000))
      var expires = 'expires=' + expiry.toUTCString()
      document.cookie = name + '=' + value + ';' + expires + ';' + 'path=/'
    }

    function getCookie(name) {
      var name = name + '='
      var decodedCookie = decodeURIComponent(document.cookie)
      var ca = decodedCookie.split(';')

      for (var i = 0; i < ca.length; i++) {
        var c = ca[i]

        while (c.charAt(0) == ' ') {
          c = c.substring(1)
        }

        if (c.indexOf(name) == 0) return c.substring(name.length, c.length)
        //if (c.indexOf(name) == 0) return true
      }

      return false
    }

    function cookieIsSet() {
      return getCookie('cookieConsent')
    }
    function analyticsIsSet() {
      return getCookie('acceptAnalytics')
    }

    function socialIsSet() {
      return getCookie('acceptSocial')
    }

    function showNotice() {
      elNotice.style.display = 'block'
    }

    function hideNotice() {
      elNotice.style.display = 'none'
    }

    //this sets all cookies, recommended settings 

    function setAcceptCookie() {
      setCookie('cookieConsent', '1', 365);
      setAcceptAnalytics();
      setAcceptSocial();

    }

    function setAcceptAnalytics() {
      setCookie('acceptAnalytics', '1', 365)
    }

    function setAcceptSocial() {
      setCookie('acceptSocial', '1', 365)
    }

    function vimeoOptOut() {
      //remove vimeo cookies
      setCookie('player', '', -1);

    }
    function eraseCookieFromAllPaths(name) {
      // This function will attempt to remove a cookie from all paths.
      var pathBits = location.pathname.split('/');
      var pathCurrent = ' path=';

      // do a simple pathless delete first.
      document.cookie = name + '=; expires=Thu, 01-Jan-1970 00:00:01 GMT;';

      for (var i = 0; i < pathBits.length; i++) {
        pathCurrent += ((pathCurrent.substr(-1) != '/') ? '/' : '') + pathBits[i];
        document.cookie = name + '=; expires=Thu, 01-Jan-1970 00:00:01 GMT;' + pathCurrent + ';';
      }
    }

    function loadExternalScripts() {
      //get craft sections 
      //check if anaylytics cookies are accepted

      var fSeg = '';
      var lSeg = '';
      var workk = 'https://www.tequila.com.vn/work'
      if (document.cookie.split(';').filter((item) => item.includes('acceptAnalytics=1')).length) {


        //     (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        //       (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        //       m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        //       })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        //     ga('create', '', 'auto');
        //     ga('set', 'anonymizeIp', true);
        //     ga('send', 'pageview');


        // var head  = document.getElementsByTagName('head')[0];
        // var gtagscript  = document.createElement('script');
        // gtagscript.src= "https://www.googletagmanager.com/gtag/js?id=UA-4626987-2";
        // gtagscript.async = true;
        // head.appendChild(gtagscript);

        // window.dataLayer = window.dataLayer || [];
        // function gtag(){dataLayer.push(arguments);}
        // gtag('js', new Date());
        // gtag('config', 'UA-4626987-2');

        (function (i, s, o, g, r, a, m) {
          i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
          }, i[r].l = 1 * new Date(); a = s.createElement(o),
            m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', '', 'auto');
        ga('set', 'anonymizeIp', true);
        ga('send', 'pageview');

      } else {

      }
      //end analytics 

      //check if social cookies are accepted
      if (document.cookie.split(';').filter((item) => item.includes('acceptSocial=1')).length) {
        // console.log(socialIsSet())
        //load FB

        //load Twitter
        window.twttr = (function (d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0],
            t = window.twttr || {};
          if (d.getElementById(id)) return t;
          js = d.createElement(s);
          js.id = id;
          js.src = "https://platform.twitter.com/widgets.js";
          fjs.parentNode.insertBefore(js, fjs);

          t._e = [];
          t.ready = function (f) {
            t._e.push(f);
          };

          return t;
        }(document, "script", "twitter-wjs"));
        //end twitter


        //load article-video

        //end vimeo

      }
      //end of social

      // convert data-src to src for iframes
      var externalContents = document.querySelectorAll('[iframe-src]');
      if (externalContents[0]) {
        for (var i = 0; i < externalContents.length; i++) {
          var iframe = document.createElement('iframe');
          iframe.src = externalContents[i].getAttribute('iframe-src');

          iframe.frameborder = externalContents[i].getAttribute('frameborder');
          iframe.allowfullscreen = externalContents[i].getAttribute('allowfullscreen');
          // TODO convert more attribute or find better way to append all setted attributes and class to that element
          externalContents[i].parentNode.replaceWith(iframe, externalContents[i]);
        }
      }

      // Custom content




    }

    window.onload = function () {


      //console all cookies , remove after testing
      var cookie = document.cookie.split(';');
      for (var i = 0; i < cookie.length; i++) {

        var chip = cookie[i],
          entry = chip.split("="),
          name = entry[0];

        //console.log(chip, entry, name)
      }

      if (!cookieIsSet()) {
        //console.log('cookie not set')
        //console.log(cookieIsSet())
        setTimeout(function () { showNotice() }, 2000);
      } else {

        //console.log('cookkie is set')
        loadExternalScripts();
        //console.log(cookieIsSet())
      }

      elAccept.onclick = elAccept.ontouch = function (e) {
        e.preventDefault();
        hideNotice();
        setAcceptCookie();
        loadExternalScripts();
      }

      if (elRefuse) {
        elRefuse.onclick = elRefuse.ontouch = function (e) {
          e.preventDefault();
          hideNotice();
        }
      }


      //check for Analytics settings 
      var analyticsSelector = document.getElementById('gdrp-analytics-selector');
      if (typeof (analyticsSelector) != 'undefined' && analyticsSelector != null) {

        if (document.cookie.split(';').filter((item) => item.includes('acceptAnalytics=1')).length) {
          $('input#checkboxAnalytics').prop("checked", true);
        } else {
          $('input#checkboxAnalytics').prop("checked", false);
        }
      }
      //end analytics settings check

      //check for Analytics settings 
      var socialSelector = document.getElementById('gdrp-social-selector');
      if (typeof (socialSelector) != 'undefined' && socialSelector != null) {

        if (document.cookie.split(';').filter((item) => item.includes('acceptSocial=1')).length) {
          $('input#checkboxSocial').prop("checked", true);
        } else {
          $('input#checkboxSocial').prop("checked", false);
        }
      }
      //end analytics settings check

      $('input#checkboxAnalytics').on('change', function () {
        if (this.checked) {
          setCookie('acceptAnalytics', '1', 365);
          setAcceptAnalytics();
          loadExternalScripts();

        } else {
          setCookie('acceptAnalytics', '0', 365);
          gaOptout();
        }
      })

      $('input#checkboxSocial').on('change', function () {
        if (this.checked) {
          setCookie('acceptSocial', '1', 365)
          setAcceptAnalytics();
          loadExternalScripts();

        } else {
          setCookie('acceptSocial', '0', 365)
          facebookLogout();
          vimeoOptOut();
          //gaOptout();
        }
      })
      // FB.logout(function () { document.location.reload(); });
    }
  </script>

  <?php
  wp_footer();
  ?>

</body>

</html>