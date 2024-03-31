<script>
    var siteUrl = "/";
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
        if (typeof articleVideo !== 'undefined' && typeof articleVideo.init === 'function') {
            // Call the init() method
            articleVideo.init();
        }

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
