<article id="home-work" class="bg-light grid-container">
    <div class="row collapse">
        <div class="columns large-5 large-offset-5 medium-11 small-12 small-offset-1 end">
            <div class="slanted-container small-no-slant">
                <h2>
                    <?php echo get_theme_mod('home_work_title', ''); ?>
                </h2>
                <div class="slanted-block">
                    <?php echo get_theme_mod('home_work_content', ''); ?>
                </div>
            </div>
            <!--/.slanted-container-->
        </div>
        <!--/.columns-->
    </div>
    <!--/.row collapse work intro-->

    <?php
    $highlight_home = get_term_by('slug', 'highlight_home', 'post_tag')->term_id;
    // WP_Query arguments
    $args = array(
        'category_name' => 'work', // Replace 'your_category_slug' with the slug of your category
        'posts_per_page' => -1, // Retrieve all posts in the category
        'tag' => 'highlight',
        'tag__not_in' => array($highlight_home) // T
    );

    // The Query
    $the_query = new WP_Query($args);

    // Check if the query has posts
    if ($the_query->have_posts()):
        // Start the loop counter
        $counter = 0;
        // Loop through each post
        while ($the_query->have_posts()):
            $the_query->the_post();
            // Increment the counter
            $counter++;
            // Check if it's the first item in the pair
            $topImageParent;
            $topImageChild;
            $bottomImageParent;
            $bottomImageChild;
            $word;
            if ($counter % 2 == 1) {
                // Open the container for each pair of items
                echo '<div class="work-item left-align">';
                $topImageParent = '<div class="large-6 small-8 columns">';
                $topImageChild = '<div class="lighten-image  bleed-left ">';

                $bottomImageParent = '<div class="small-offset-1 small-10 large-7 columns">';
                $bottomImageChild = '<div class="lighten-image ">';

                $word = '<div class="medium-offset-8 medium-6 small-offset-2 small-12 columns end">';

            } else {
                // For the second item in the pair, use right-align
                echo '<div class="work-item right-align">';
                $topImageParent = '<div class="small-offset-2 small-9 large-offset-5 large-7 columns">';
                $topImageChild = '<div class="lighten-image ">';

                $bottomImageParent = '<div class="small-offset-7 small-7 large-offset-9 large-5 columns">';
                $bottomImageChild = '<div class="lighten-image  bleed-right ">';

                $word = '<div class="small-offset-2 small-12 large-offset-3 large-11 columns end">';
            }
            ?>
            <!-- Your HTML structure for each work item -->
            <div class="row">
                <!-- top image -->
                <?php echo $topImageParent ?>
                <?php echo $topImageChild ?>
                <a href="<?php the_permalink(); ?>" class="scale">
                    <img src="<?php echo wp_get_attachment_url(get_post_meta(get_the_ID(), 'meta_box_back_field', true)); ?>">
                </a>
            </div>
            </div>
            </div>
            <div class="row work-copy-container">
                <div class="row second-image">
                    <!-- bottom image -->
                    <?php echo $bottomImageParent ?>
                    <?php echo $bottomImageChild ?>
                    <a href="<?php the_permalink(); ?>" class="scale">
                        <img
                            src="<?php echo wp_get_attachment_url(get_post_meta(get_the_ID(), 'meta_box_front_field', true)); ?>">
                    </a>
                </div>
            </div>
            </div>
            <div class=" row work-copy">
                <!-- work copy -->
                <?php echo $word ?>
                <div class="slanted-container">
                    <a class="work-title" href="<?php the_permalink(); ?>">
                            <?php
                            $title = get_the_title(get_the_ID());

                            $parts = explode(' ##### ', $title);
                            foreach ($parts as $part) {
                                // Loại bỏ các khoảng trắng ở đầu và cuối phần
                                $part = trim($part);
                                // Hiển thị thẻ <h1> cho mỗi phần nếu phần không rỗng
                                if (!empty($part)) {
                                    echo '<h3>' . $part . '</h3>';
                                }
                            }
                            ?>
                        <h4 class="client">
                            <?php echo get_post_meta(get_the_ID(), 'client', true); ?>
                        </h4>
                        <h5 class="agency"></h5>
                        <img src="/wp-content/themes/tbwa/assets/images/arrow.svg" class="arrow">
                    </a>
                </div>
            </div>
            </div>
            </div>
            </div> <!-- Close work-item div -->
            <?php
            // Check if it's the last item in the pair or the last item overall
            if ($counter % 2 == 0 || $counter == $the_query->post_count) {
                // Close the container for each pair of items
                echo '</div>';
            }
        endwhile;
        // Reset post data
        wp_reset_postdata();
    else:
        // If no posts found
        echo 'No posts found';
    endif;
    ?>

    <!-- For loop work tags -->
    <div class="row collapse">
        <div class="columns large-5 large-offset-5 medium-5 medium-offset-4 small-9 small-offset-1 end">
            <a href="/work" class="font-dark section-link">See more of our work</a>
        </div>
    </div>
    <!--/.row collapse-->
</article>