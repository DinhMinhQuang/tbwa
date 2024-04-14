<?php
/**
 * Template Name: Custom Category News
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_head(); ?>
</head>

<body class="dark">
    <?php get_header(); ?>

    <?php
    $category = get_term_by('slug', 'news', 'category');
    if (!$category)
        echo "Category Not Found";
    ?>
    ?>
    <section id="news-archive">
        <div class="grid-container">
            <article class="section-intro">
                <div class="row">
                    <div
                        class="columns xxlarge-offset-5 xlarge-offset-4 xlarge-6 large-offset-3 large-7 medium-offset-2 medium-8 small-offset-1 small-13">
                        <div class="slanted-container small-no-slant">
                            <h1>
                                <?php echo get_term_meta($category->term_id, 'title_intro', true); ?>
                            </h1>
                            <div class="slanted-block section-intro-copy">
                                <?php echo get_term_meta($category->term_id, 'description_intro', true); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <div class="row">
                <div class="columns large-6 medium-10 small-14 large-offset-1">
                    <div class="work-entry ">
                        <a href="https://www.tbwa.com.vn/news/tbwaxtiktok-kể-chuyện-trong-thời-kỳ-sáng-tạo-phục-hưng-mới"
                            alt="TBWAxTiktok: STORYTELLING IN THE NEXT CREATIVE RENAISSANCE">
                            <img src="/wordpress/wp-content/themes/tbwa/assets/images/TBWAxTiktok_2023-09-08-040106_glqo.png"
                                alt="TBWAxTiktok: STORYTELLING IN THE NEXT CREATIVE RENAISSANCE" />
                        </a>
                        <div>
                            <h3 class="entry-date">September 07, 2023</h3>
                            <a class="entry-headline"
                                href="https://www.tbwa.com.vn/news/tbwaxtiktok-kể-chuyện-trong-thời-kỳ-sáng-tạo-phục-hưng-mới"
                                alt="TBWAxTiktok: STORYTELLING IN THE NEXT CREATIVE RENAISSANCE">
                                TBWAxTiktok: STORYTELLING IN THE NEXT CREATIVE RENAISSANCE
                            </a>
                            <h4 class="entry-location">Vietnam</h4>
                            <p class="entry-body">
                                A brand&#039;s biggest creative efforts shouldn&#039;t be saved for key moments, but
                                allowed to flourish every day.
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.columns-->
                <div class="columns large-5 medium-10 small-14 large-offset-1 medium-offset-4 end ">
                    <div class="work-entry  entry-middle ">
                        <a href="https://www.tbwa.com.vn/news/tbwa-was-named-adweeks-2022-global-agency"
                            alt="TBWA Recognized as Adweek&#039;s 2022 Global Agency of the Year for Second Year in a Row">
                            <img src="/wordpress/wp-content/themes/tbwa/assets/images/la_ww_adweekaoy_twitter_post_02.png"
                                alt="TBWA Recognized as Adweek&#039;s 2022 Global Agency of the Year for Second Year in a Row" />
                        </a>
                        <div>
                            <h3 class="entry-date">December 14, 2022</h3>
                            <a class="entry-headline"
                                href="https://www.tbwa.com.vn/news/tbwa-was-named-adweeks-2022-global-agency"
                                alt="TBWA Recognized as Adweek&#039;s 2022 Global Agency of the Year for Second Year in a Row">
                                TBWA Recognized as Adweek&#039;s 2022 Global Agency of the Year for Second Year in a Row
                            </a>
                            <h4 class="entry-location">TBWA\Group Vietnam</h4>
                            <p class="entry-body">
                                The Disruption® Company received the accolade for its creative product, business growth,
                                innovation and for maximizing its potential across the globe
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.columns-->
            </div>
            <!--/.row-->
            <div class="row">
                <div class="columns large-5 medium-10 small-14 large-offset-1">
                    <div class="work-entry ">
                        <a href="https://vietcetera.com/en/the-future-of-retail-in-vietnam?fbclid=IwAR1MWeVva7cMBL7iS--nJ65ZxtRkMlf0HPimgqQeKxxXWfMMpWPaJIioJj4"
                            alt="TBWA\ The Future Of Retail In Vietnam" target="_blank">
                            <img src="/wordpress/wp-content/themes/tbwa/assets/images/resized-shutterstock-1509875111-min.jpg"
                                alt="TBWA\ The Future Of Retail In Vietnam" />
                        </a>
                        <div>
                            <h3 class="entry-date">July 08, 2021</h3>
                            <a class="entry-headline"
                                href="https://vietcetera.com/en/the-future-of-retail-in-vietnam?fbclid=IwAR1MWeVva7cMBL7iS--nJ65ZxtRkMlf0HPimgqQeKxxXWfMMpWPaJIioJj4"
                                alt="TBWA\ The Future Of Retail In Vietnam" target="_blank">
                                TBWA\ The Future Of Retail In Vietnam
                                <img class="link-arrow"
                                    src="/wordpress/wp-content/themes/tbwa/assets/images/link.svg" />
                            </a>
                            <h4 class="entry-location">TBWA\Group Vietnam</h4>
                            <p class="entry-body">
                                Vietnam aims to have over half of the 96 million population shopping online by 2025 – a
                                trend only accelerated by the pandemic...
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.columns-->
                <div class="columns large-6 medium-10 small-14 large-offset-1 medium-offset-4 end ">
                    <div class="work-entry  entry-middle ">
                        <a href="https://www.campaignasia.com/article/pride-month-how-can-brands-avoid-pinkwashing/469971?fbclid=IwAR2VddKECTk0k60WR6eaxNWoIdst4p_FGEjHzgEvFTXunUwBROQvU_blMXw"
                            alt="Pride month: How can brands avoid pinkwashing?" target="_blank">
                            <img src="/wordpress/wp-content/themes/tbwa/assets/images/cdn.i.haymarketmedia.asia.jpeg"
                                alt="Pride month: How can brands avoid pinkwashing?" />
                        </a>
                        <div>
                            <h3 class="entry-date">June 02, 2021</h3>
                            <a class="entry-headline"
                                href="https://www.campaignasia.com/article/pride-month-how-can-brands-avoid-pinkwashing/469971?fbclid=IwAR2VddKECTk0k60WR6eaxNWoIdst4p_FGEjHzgEvFTXunUwBROQvU_blMXw"
                                alt="Pride month: How can brands avoid pinkwashing?" target="_blank">
                                Pride month: How can brands avoid pinkwashing?
                                <img class="link-arrow"
                                    src="/wordpress/wp-content/themes/tbwa/assets/images/link.svg" />
                            </a>
                            <h4 class="entry-location">TBWA\GroupVietnam</h4>
                            <p class="entry-body">
                                To mark the beginning of Pride month, Hesperus Mak, the head of strategic planning at
                                TBWA Group Vietnam, shares his tips on how brands should approach the LGBT event.
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.columns-->
            </div>
            <!--/.row-->
            <div class="row">
                <div class="columns large-6 medium-10 small-14 large-offset-1 ">
                    <div class="work-entry ">
                        <a href="https://advertisingvietnam.com/loreal-paris-ket-hop-cung-tbwagroup-vietnam-trong-chien-dich-chinh-nu-ton-vinh-mot-nua-the-gioi-nhan-ngay-83-p16232"
                            alt="L’Oreal Paris in association with TBWA \ Group Vietnam in the &quot;Chinh Nu - Because you’re worth it&quot; campaign - Honoring half of the world on March 8"
                            target="_blank">
                            <img src="https://www.tbwa.com.vn/assets/news/media.png"
                                alt="L’Oreal Paris in association with TBWA \ Group Vietnam in the &quot;Chinh Nu - Because you’re worth it&quot; campaign - Honoring half of the world on March 8" />
                        </a>
                        <div>
                            <h3 class="entry-date">March 09, 2021</h3>
                            <a class="entry-headline"
                                href="https://advertisingvietnam.com/loreal-paris-ket-hop-cung-tbwagroup-vietnam-trong-chien-dich-chinh-nu-ton-vinh-mot-nua-the-gioi-nhan-ngay-83-p16232"
                                alt="L’Oreal Paris in association with TBWA \ Group Vietnam in the &quot;Chinh Nu - Because you’re worth it&quot; campaign - Honoring half of the world on March 8"
                                target="_blank">
                                L’Oreal Paris in association with TBWA \ Group Vietnam in the &quot;Chinh Nu - Because
                                you’re worth it&quot; campaign - Honoring half of the world on March 8
                                <img class="link-arrow"
                                    src="/wordpress/wp-content/themes/tbwa/assets/images/link.svg" />
                            </a>
                            <h4 class="entry-location">TBWA\ Group Vietnam</h4>
                            <p class="entry-body">
                                We have just shaken hands with beauty brand L&#039;Oreal Paris to give half of the world
                                a special gift on March 8th through the campaign &quot;Chinh Nu - Because you’re worth
                                it&quot;. Let&#039;s see!
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.columns-->
                <div class="columns large-5 medium-10 small-14 large-offset-1 medium-offset-4 end ">
                    <div class="work-entry  entry-middle ">
                        <a href="https://advertisingvietnam.com/diem-danh-3-chien-dich-giup-tbwa-group-vietnam-rinh-vang-o-agency-of-the-year-2020-p15791?fbclid=IwAR3hKYRgo1baCXW47rjktPmLpQzV-vsyDs2JbztjtxF-o8joFBv3V8eE35Q"
                            alt="Attend three campaigns to help TBWA\ Group Vietnam &quot;get gold&quot; at Agency of the Year 2020"
                            target="_blank">
                            <img src="https://www.tbwa.com.vn/assets/news/AOY-Case-01.png"
                                alt="Attend three campaigns to help TBWA\ Group Vietnam &quot;get gold&quot; at Agency of the Year 2020" />
                        </a>
                        <div>
                            <h3 class="entry-date">December 15, 2020</h3>
                            <a class="entry-headline"
                                href="https://advertisingvietnam.com/diem-danh-3-chien-dich-giup-tbwa-group-vietnam-rinh-vang-o-agency-of-the-year-2020-p15791?fbclid=IwAR3hKYRgo1baCXW47rjktPmLpQzV-vsyDs2JbztjtxF-o8joFBv3V8eE35Q"
                                alt="Attend three campaigns to help TBWA\ Group Vietnam &quot;get gold&quot; at Agency of the Year 2020"
                                target="_blank">
                                Attend three campaigns to help TBWA\ Group Vietnam &quot;get gold&quot; at Agency of the
                                Year 2020
                                <img class="link-arrow"
                                    src="/wordpress/wp-content/themes/tbwa/assets/images/link.svg" />
                            </a>
                            <h4 class="entry-location">TBWA\ Group Vietnam</h4>
                            <p class="entry-body">
                                With many shining campaigns in 2020, the TBWA\ Group Vietnam excellently won 2 Gold
                                Awards 🥇🥇 for themselves in Agency of The Year by Campaign Asia.
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.columns-->
            </div>
            <!--/.row-->
            <div class="row">
                <div class="columns large-5 medium-10 small-14 large-offset-1 ">
                    <div class="work-entry ">
                        <a href="https://campaignbriefasia.com/2020/06/22/tbwagroup-vietnam-merges-fadigital-into-the-agency-collective/"
                            alt="TBWA Vietnam Joins Together with f\adigital" target="_blank">
                            <img src="https://www.tbwa.com.vn/assets/news/TBWA-Vietnam-Branding-in-Asia.jpg"
                                alt="TBWA Vietnam Joins Together with f\adigital" />
                        </a>
                        <div>
                            <h3 class="entry-date">June 22, 2020</h3>
                            <a class="entry-headline"
                                href="https://campaignbriefasia.com/2020/06/22/tbwagroup-vietnam-merges-fadigital-into-the-agency-collective/"
                                alt="TBWA Vietnam Joins Together with f\adigital" target="_blank">
                                TBWA Vietnam Joins Together with f\adigital
                                <img class="link-arrow"
                                    src="/wordpress/wp-content/themes/tbwa/assets/images/link.svg" />
                            </a>
                            <h4 class="entry-location">TBWA\GroupVietnam</h4>
                            <p class="entry-body">
                                TBWA\ Group Vietnam has confirmed that f\adigital, previously known as Focus Asia, has
                                joined TBWA\Group Vietnam.
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.columns-->
                <div class="columns large-6 medium-10 small-14 large-offset-1 medium-offset-4 end ">
                    <div class="work-entry  entry-middle ">
                        <a href="https://www.thedrum.com/opinion/2020/05/18/can-vietnamese-brands-succeed-with-covid-19-the-country-did?fbclid=IwAR201HX2Sn-v4XS5FtAcSDgFH3EgPSAwBjhm8SNKVCyLpb5cMedSoYVtax4"
                            alt="CAN VIETNAMESE BRANDS SUCCEED WITH COVID-19 LIKE THE COUNTRY DID?" target="_blank">
                            <img src="https://www.tbwa.com.vn/assets/news/s3-news-tmp-116020-andreea-popa-pknaorb1lvo-unsplash-2x1-940.png"
                                alt="CAN VIETNAMESE BRANDS SUCCEED WITH COVID-19 LIKE THE COUNTRY DID?" />
                        </a>
                        <div>
                            <h3 class="entry-date">May 18, 2020</h3>
                            <a class="entry-headline"
                                href="https://www.thedrum.com/opinion/2020/05/18/can-vietnamese-brands-succeed-with-covid-19-the-country-did?fbclid=IwAR201HX2Sn-v4XS5FtAcSDgFH3EgPSAwBjhm8SNKVCyLpb5cMedSoYVtax4"
                                alt="CAN VIETNAMESE BRANDS SUCCEED WITH COVID-19 LIKE THE COUNTRY DID?" target="_blank">
                                CAN VIETNAMESE BRANDS SUCCEED WITH COVID-19 LIKE THE COUNTRY DID?
                                <img class="link-arrow"
                                    src="/wordpress/wp-content/themes/tbwa/assets/images/link.svg" />
                            </a>
                            <h4 class="entry-location">TBWA\Group Vietnam</h4>
                            <p class="entry-body">
                                Vietnam has emerged an unlikely hero in the fight against Covid-19 with integrated
                                response to the crisis – recording less than 300 cases, zero deaths, and no community
                                transmissions for weeks.
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.columns-->
            </div>
            <!--/.row-->
            <div class="row">
                <div class="columns large-6 medium-10 small-14 large-offset-1 ">
                    <div class="work-entry ">
                        <a href="https://www.facebook.com/tbwavietnam/videos/2673819576049404/"
                            alt="FIGHT THE VIRUS, NOT THE PEOPLE!" target="_blank">
                            <img src="/wordpress/wp-content/themes/tbwa/assets/images/launch-Board.jpg"
                                alt="FIGHT THE VIRUS, NOT THE PEOPLE!" />
                        </a>
                        <div>
                            <h3 class="entry-date">March 19, 2020</h3>
                            <a class="entry-headline"
                                href="https://www.facebook.com/tbwavietnam/videos/2673819576049404/"
                                alt="FIGHT THE VIRUS, NOT THE PEOPLE!" target="_blank">
                                FIGHT THE VIRUS, NOT THE PEOPLE!
                                <img class="link-arrow"
                                    src="/wordpress/wp-content/themes/tbwa/assets/images/link.svg" />
                            </a>
                            <h4 class="entry-location">TBWA\ Group Vietnam</h4>
                            <p class="entry-body">
                                Some scan others’ race for symptoms, but virus doesn&#039;t discriminate by race,
                                neither should we. Race is not virus. Join us &amp; create your &quot;stories&quot;:
                                https://lnkd.in/gSyix54
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.columns-->
                <div class="columns large-5 medium-10 small-14 large-offset-1 medium-offset-4 end ">
                    <div class="work-entry  entry-middle ">
                        <a href="https://advertisingvietnam.com/2019/12/danh-sach-agency-viet-nam-dat-giai-agency-of-the-year-2019/"
                            alt="Vietnam Creative Agency of the Year 2019" target="_blank">
                            <img src="/wordpress/wp-content/themes/tbwa/assets/images/79900771_2186858468080810_3846162296107696128_o.jpg"
                                alt="Vietnam Creative Agency of the Year 2019" />
                        </a>
                        <div>
                            <h3 class="entry-date">December 20, 2019</h3>
                            <a class="entry-headline"
                                href="https://advertisingvietnam.com/2019/12/danh-sach-agency-viet-nam-dat-giai-agency-of-the-year-2019/"
                                alt="Vietnam Creative Agency of the Year 2019" target="_blank">
                                Vietnam Creative Agency of the Year 2019
                                <img class="link-arrow"
                                    src="/wordpress/wp-content/themes/tbwa/assets/images/link.svg" />
                            </a>
                            <h4 class="entry-location">TBWA\Group Vietnam</h4>
                            <p class="entry-body">
                                Arrrrr! Hey all pirates, we found another treasure at the award ceremony for Campaign
                                Asia - South East Asia Agency Of The Year 2019
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.columns-->
            </div>
            <!--/.row-->
            <!-- pagination -->
            <div class="row pagination">
                <span class='current'>1</span>
                <a href='https://www.tbwa.com.vn/news/p2'>2</a>
                <a href='https://www.tbwa.com.vn/news/p2'>&gt;</a>
            </div>
            <!--/.row pagination-->
    </section>
    <?php get_template_part('footer-script'); ?>


    <?php get_footer(); ?>
    <?php
    wp_footer();
    ?>
</body>

</html>