<?php
// Setup Metaboxes for Humble Roots Media theme
$prefix = 'humblerootsmedia_';
$meta_box = array(
    'id' => 'humblerootsmedia-meta-box',
    'title' => 'Humble Roots Media Meta Box',
    'page' => 'page',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Splash Title',
            'desc' => 'Big-text title displayed on the splash of this page.',
            'id' => $prefix . 'splash-title',
            'type' => 'text',
            'std' => 'Default value 1'
        ),
        array(
            'name' => 'Splash Tagline',
            'desc' => 'Smaller text displayed below the splash title',
            'id' => $prefix . 'splash-tagline',
            'type' => 'text',
            'std' => 'Default value 1'
        ),
        array(
            'name' => 'Show Ghost Button in Splash',
            'desc' => 'Show a button that scrolls user to below the page',
            'id' => $prefix . 'ghost-checkbox',
            'type' => 'checkbox'
        ),
        array(
            'name' => 'Ghost Button Text',
            'desc' => 'The text inside the ghost button',
            'id' => $prefix . 'ghost-text',
            'type' => 'text',
            'std' => 'Default value 1'
        ),
        array(
            'name' => 'Introductory Text',
            'desc' => 'Text usually positioned right under the splash.',
            'id' => $prefix . 'intro-text',
            'type' => 'text',
            'std' => 'Bonjour. Salve. Hello. Aloha.'
        ),
        array(
            'name' => 'Midtro Text',
            'desc' => 'Text usually found in the middle of the page. Used as a break for layout.',
            'id' => $prefix . 'midtro-text',
            'type' => 'text',
            'std' => 'Surprise.'
        ),
        array(
            'name' => 'Outro Text',
            'desc' => 'Text found at the end of the content area, right before the footer.',
            'id' => $prefix . 'outro-text',
            'type' => 'text',
            'std' => 'I don\'t know why you say goodbye, I say hello.'
        )
    )
);

// Add Metaboxes
add_action('admin_menu', 'humblerootsmedia_add_box');
function humblerootsmedia_add_box() {
    global $meta_box;

    add_meta_box($meta_box['id'], $meta_box['title'], 'humblerootsmedia_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
}

// Show Metaboxes
function humblerootsmedia_show_box() {
    global $meta_box, $post;

    // Use nonce for verification
    echo '<input type="hidden" name="humblerootsmedia_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

    echo '<table class="form-table">';

    foreach ($meta_box['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);

        echo '<tr>',
                '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
                '<td>';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '<br />', $field['desc'];
                break;
            case 'textarea':
                echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
                break;
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option ', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>';
                break;
            case 'radio':
                foreach ($field['options'] as $option) {
                    echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
                }
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                break;
        }
        echo     '</td><td>',
            '</td></tr>';
    }

    echo '</table>';
}

// Save data from meta box
add_action('save_post', 'humblerootsmedia_save_data');
function humblerootsmedia_save_data($post_id) {
    global $meta_box;

    // verify nonce
    if (!wp_verify_nonce($_POST['humblerootsmedia_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    foreach ($meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];

        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}
