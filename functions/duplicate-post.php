<?php
function rd_duplicate_post_as_draft()
{
    global $wpdb;

    if (!(isset($_GET['post']) || isset($_POST['post']) || (isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action']))) {
        wp_die('No post to duplicate has been supplied!');
    }

    $nonce_action = 'rd_duplicate_post_nonce_action';
    if (!isset($_GET['duplicate_nonce']) || !wp_verify_nonce($_GET['duplicate_nonce'], $nonce_action))
        return;

    $post_id = (isset($_GET['post']) ? absint($_GET['post']) : absint($_POST['post']));
    $post = get_post($post_id);
    $current_user = wp_get_current_user();
    $new_post_author = $current_user->ID;

    if (isset($post) && $post != null) {
        $value_post_name = '';
        if ($post->post_name) {
            $value_post_name = $post->post_name . '-draft';
        } else {
            $value_post_name = $post->post_title . '-draft';
        }
        $args = array(
            'comment_status' => $post->comment_status,
            'ping_status' => $post->ping_status,
            'post_author' => $new_post_author,
            'post_content' => $post->post_content,
            'post_excerpt' => $post->post_excerpt,
            'post_name' => $value_post_name,
            'post_parent' => $post->post_parent,
            'post_password' => $post->post_password,
            'post_status' => 'draft',
            'post_title' => $post->post_title,
            'post_type' => $post->post_type,
            'to_ping' => $post->to_ping,
            'menu_order' => $post->menu_order
        );

        $new_post_id = wp_insert_post($args);

        $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
        foreach ($taxonomies as $taxonomy) {
            $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
            wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
        }

        $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
        if (count($post_meta_infos) != 0) {
            $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
            foreach ($post_meta_infos as $meta_info) {
                $meta_key = $meta_info->meta_key;
                if ($meta_key == '_wp_old_slug')
                    continue;
                $meta_value = addslashes($meta_info->meta_value);
                $sql_query_sel[] = "SELECT $new_post_id, '$meta_key', '$meta_value'";
            }
            $sql_query .= implode(" UNION ALL ", $sql_query_sel);
            $wpdb->query($sql_query);
        }

        update_post_meta($new_post_id, 'language', 'vi');
        $language = get_post_meta($post->ID, 'language', true);
        if ($language == 'en') {
            update_post_meta($new_post_id, 'language', 'vi');
        } else {
            update_post_meta($new_post_id, 'language', 'en');
        }
        // Liên kết bài viết gốc với bài viết duplicate
        if ($language == 'en') {
            update_post_meta($new_post_id, 'original_post_id', $post_id);
            update_post_meta($post_id, 'duplicate_post_id', $new_post_id);
        } else if ($language = 'vi') {
            update_post_meta($new_post_id, 'duplicate_post_id', $post_id);
            update_post_meta($post_id, 'original_post_id', $new_post_id);
        }

        wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
        exit;
    } else {
        wp_die('Post creation failed, could not find original post: ' . $post_id);
    }
}

add_action('admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft');



function rd_duplicate_post_link($actions, $post)
{
    if (current_user_can('edit_posts')) {
        $original_post_id = get_post_meta($post->ID, 'original_post_id', true);
        $duplicate_post_id = get_post_meta($post->ID, 'duplicate_post_id', true);
        if (!$original_post_id && !$duplicate_post_id) {
            $nonce_action = 'rd_duplicate_post_nonce_action';
            $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, $nonce_action, 'duplicate_nonce') . '" title="Duplicate this item" rel="permalink">Add new language</a>';
        }
    }

    return $actions;

}

add_filter('post_row_actions', 'rd_duplicate_post_link', 10, 2);

function add_custom_columns($columns)
{
    $columns['linked_posts'] = 'Linked Posts';
    return $columns;
}
add_filter('manage_posts_columns', 'add_custom_columns');
function custom_column_content($column_name, $post_id)
{
    if ($column_name == 'linked_posts') {
        $original_post_id = get_post_meta($post_id, 'original_post_id', true);
        $duplicate_post_id = get_post_meta($post_id, 'duplicate_post_id', true);
        $output = '';

        $language = get_post_meta($post_id, 'language', true);
        $text = '';
        if ($language == 'vi') {
            $text = 'English Version';
        } else {
            $text = 'Vietnamese Version';
        }

        if ($original_post_id) {
            $output .= '<a href="' . admin_url('post.php?action=edit&post=' . $original_post_id) . '"> ' . $text . ' </a>';
        }

        if ($duplicate_post_id) {
            if ($original_post_id) {
                $output .= ' | ';
            }
            $output .= '<a href="' . admin_url('post.php?action=edit&post=' . $duplicate_post_id) . '">' . $text . '</a>';
        }

        if (empty($output)) {
            $output = 'N/A';
        }

        echo $output;
    }
}
add_action('manage_posts_custom_column', 'custom_column_content', 10, 2);

function delete_linked_meta_fields($post_id)
{
    // Kiểm tra nếu bài viết đang bị xóa là một bài viết thực sự
    if (!current_user_can('delete_posts', $post_id)) {
        return;
    }

    // Lấy các meta fields của bài viết
    $original_post_id = get_post_meta($post_id, 'original_post_id', true);
    $duplicate_post_id = get_post_meta($post_id, 'duplicate_post_id', true);

    // Xóa các meta fields liên kết
    if (!empty($original_post_id)) {
        delete_post_meta($original_post_id, 'duplicate_post_id', $post_id);
    }

    if (!empty($duplicate_post_id)) {
        delete_post_meta($duplicate_post_id, 'original_post_id', $post_id);
    }

    // Xóa các meta fields của chính bài viết bị xóa
    delete_post_meta($post_id, 'original_post_id');
    delete_post_meta($post_id, 'duplicate_post_id');
}

// Đăng ký hook trước khi xóa bài viết
add_action('before_delete_post', 'delete_linked_meta_fields');
