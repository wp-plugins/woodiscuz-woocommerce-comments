<th colspan="3" scope="col" style="margin-bottom: 5px;"><h2><?php _e('General settings', 'woodiscuz'); ?></h2></th>

<tr valign="top" class="wpc-row-dark">
    <th scope="row">
        <?php _e('Turn Off WooDiscuz Tab', 'woodiscuz'); ?>
    </th>
    <td colspan="3">                                
        <label for="wpc_tab_on_off">
            <input type="checkbox" <?php checked($this->wpc_options_serialized->wpc_tab_on_off == 1) ?> value="<?php echo $this->wpc_options_serialized->wpc_tab_on_off; ?>" name="wpc_tab_on_off" id="wpc_tab_on_off" />
        </label>
    </td>
</tr>

<tr valign="top" class="wpc-row-light">
    <th scope="row">
        <?php _e('Set the Discussion Tab as the first opened Tab', 'woodiscuz'); ?>
    </th>
    <td colspan="3">                                
        <label for="wpc_comment_tab_priority">
            <input type="checkbox" <?php checked($this->wpc_options_serialized->wpc_comment_tab_priority == 1) ?> value="<?php echo $this->wpc_options_serialized->wpc_comment_tab_priority; ?>" name="wpc_comment_tab_priority" id="wpc_comment_tab_priority" />
        </label>
    </td>
</tr>

<tr valign="top" class="wpc-row-dark">
    <th scope="row">
        <?php _e('Hide WooCommerce Review Tab', 'woodiscuz'); ?>
    </th>
    <td colspan="3">                                
        <label for="wpc_tab_show_hide">
            <input type="checkbox" <?php checked($this->wpc_options_serialized->wpc_tab_show_hide == 1) ?> value="<?php echo $this->wpc_options_serialized->wpc_tab_show_hide; ?>" name="wpc_tab_show_hide" id="wpc_tab_show_hide" />
        </label>
    </td>
</tr>

<tr valign="top" class="wpc-row-light">
    <th scope="row">
        <?php _e('Hide Voting buttons', 'woodiscuz'); ?>
    </th>
    <td colspan="3">                                
        <label for="wpc_voting_buttons_show_hide">
            <input type="checkbox" <?php checked($this->wpc_options_serialized->wpc_voting_buttons_show_hide == 1) ?> value="<?php echo $this->wpc_options_serialized->wpc_voting_buttons_show_hide; ?>" name="wpc_voting_buttons_show_hide" id="wpc_voting_buttons_show_hide" />
        </label>
    </td>
</tr>

<tr valign="top" class="wpc-row-dark">
    <th scope="row">
        <?php _e('Hide Share Button', 'woodiscuz'); ?>
    </th>
    <td colspan="3">                                
        <label for="wpc_share_buttons_show_hide">
            <input type="checkbox" <?php checked($this->wpc_options_serialized->wpc_share_buttons_show_hide == 1) ?> value="<?php echo $this->wpc_options_serialized->wpc_share_buttons_show_hide; ?>" name="wpc_share_buttons_show_hide" id="wpc_share_buttons_show_hide" />
        </label>
    </td>
</tr>

<tr valign="top" class="wpc-row-light">
    <th scope="row">
        <?php _e('Hide the  CAPTCHA field', 'woodiscuz'); ?>
    </th>
    <td colspan="3">                                
        <label for="wpc_captcha_show_hide">
            <input type="checkbox" <?php checked($this->wpc_options_serialized->wpc_captcha_show_hide == 1) ?> value="<?php echo $this->wpc_options_serialized->wpc_captcha_show_hide; ?>" name="wpc_captcha_show_hide" id="wpc_captcha_show_hide" />
        </label>
    </td>
</tr>

<tr valign="top" class="wpc-row-dark">
    <th scope="row">
        <?php _e('User Must be registered to comment', 'woodiscuz'); ?>
    </th>
    <td colspan="3">
        <fieldset>
            <label title="Yes">
                <input type="radio" value="1" <?php checked('1' == $this->wpc_options_serialized->wpc_user_must_be_registered); ?> name="wpc_user_must_be_registered" id="wpc_user_must_be_registered_yes" /> 
                <span>Yes</span>
            </label> &nbsp;
            <label title="No">
                <input type="radio" value="0" <?php checked('0' == $this->wpc_options_serialized->wpc_user_must_be_registered); ?> name="wpc_user_must_be_registered" id="wpc_user_must_be_registered_no" /> 
                <span>No</span>
            </label><br>                                    
        </fieldset>
    </td>
</tr>

<tr valign="top" class="wpc-row-light">
    <th scope="row">
        <?php _e('Held new comments for moderation', 'woodiscuz'); ?>
    </th>
    <td colspan="3">                                
        <label for="wpc_held_comment_to_moderate">
            <input type="checkbox" <?php checked($this->wpc_options_serialized->wpc_held_comment_to_moderate == 1) ?> value="<?php echo $this->wpc_options_serialized->wpc_held_comment_to_moderate; ?>" name="wpc_held_comment_to_moderate" id="wpc_held_comment_to_moderate" />
        </label>
    </td>
</tr>

<tr valign="top" class="wpc-row-dark">
    <th scope="row">
        <?php _e('Hide Reply button for Guests', 'woodiscuz'); ?>
    </th>
    <td colspan="3">                                
        <label for="wpc_reply_button_guests_show_hide">
            <input type="checkbox" <?php checked($this->wpc_options_serialized->wpc_reply_button_guests_show_hide == 1) ?> value="<?php echo $this->wpc_options_serialized->wpc_reply_button_guests_show_hide; ?>" name="wpc_reply_button_guests_show_hide" id="wpc_reply_button_guests_show_hide" />
        </label>
    </td>
</tr>

<tr valign="top" class="wpc-row-light">
    <th scope="row">
        <?php _e('Hide Reply button for Customers', 'woodiscuz'); ?> 
    </th>
    <td colspan="3">                                
        <label for="wpc_reply_button_customers_show_hide">
            <input type="checkbox" <?php checked($this->wpc_options_serialized->wpc_reply_button_customers_show_hide == 1) ?> value="<?php echo $this->wpc_options_serialized->wpc_reply_button_customers_show_hide; ?>" name="wpc_reply_button_customers_show_hide" id="wpc_reply_button_customers_show_hide" />
        </label>
    </td>
</tr>

<tr valign="top" class="wpc-row-dark">
    <th scope="row">
        <?php _e('Hide Author Titles', 'woodiscuz'); ?>
    </th>
    <td colspan="3">                                
        <label for="wpc_author_titles_show_hide">
            <input type="checkbox" <?php checked($this->wpc_options_serialized->wpc_author_titles_show_hide == 1) ?> value="<?php echo $this->wpc_options_serialized->wpc_author_titles_show_hide; ?>" name="wpc_author_titles_show_hide" id="wpc_author_titles_show_hide" />
        </label>
    </td>
</tr>

<tr valign="top" class="wpc-row-light">
    <th scope="row">
        <?php _e('Usergroups for User Title "Support"', 'woodiscuz'); ?> 
    </th>
    <td colspan="3">
        <?php
        foreach ($roles as $key => $role) {
            if ($key != 'subscriber') {
                ?>
                <label for="<?php echo $key; ?>">
                    <input type="checkbox" <?php checked(in_array($key, $this->wpc_options_serialized->wpc_usergroups_for_support_title)); ?> value="<?php echo $key; ?>" name="wpc_usergroups_for_support_title[]" id="<?php echo $key; ?>" />
                    <span><?php echo $role; ?></span>
                </label><br/>
                <?php
            }
        }
        ?>
    </td>
</tr>


<tr valign="top" class="wpc-row-dark">
    <th scope="row">
        <?php _e('Comment Threads Per Page', 'woodiscuz'); ?> 
    </th>
    <td colspan="3">
        <label for="wpc_comment_count">
            <input type="number" value="<?php echo $this->wpc_options_serialized->wpc_comment_count; ?>" name="wpc_comment_count" id="wpc_comment_count" />
        </label><br/>
    </td>
</tr>

<tr valign="top" class="wpc-row-light">
    <th scope="row">
        <?php _e('Notify moderator on new comment', 'woodiscuz'); ?> 
    </th>
    <td colspan="3">                                
        <label for="wpc_notify_moderator">
            <input type="checkbox" <?php checked($this->wpc_options_serialized->wpc_notify_moderator == 1) ?> value="<?php echo $this->wpc_options_serialized->wpc_notify_moderator; ?>" name="wpc_notify_moderator" id="wpc_notify_moderator" />
        </label>
    </td>
</tr>

<tr valign="top" class="wpc-row-dark">
    <th scope="row">
        <?php _e('Notify comment author on new reply', 'woodiscuz'); ?> 
    </th>
    <td colspan="3">                                
        <label for="wpc_notify_comment_author">
            <input type="checkbox" <?php checked($this->wpc_options_serialized->wpc_notify_comment_author == 1) ?> value="<?php echo $this->wpc_options_serialized->wpc_notify_comment_author; ?>" name="wpc_notify_comment_author" id="wpc_notify_comment_author" />
        </label>
    </td>
</tr>

<tr valign="top" class="wpc-row-dark">
    <th scope="row">
        <?php _e('Requesting for comment on purchased product', 'woodiscuz'); ?> 
    </th>
    <td colspan="3">                                
        <label for="wpc_request_for_comment">
            <input type="checkbox" <?php checked($this->wpc_options_serialized->wpc_request_for_comment == 1) ?> value="<?php echo $this->wpc_options_serialized->wpc_request_for_comment; ?>" name="wpc_request_for_comment" id="wpc_request_for_comment" />
        </label>
    </td>
</tr>

<tr valign="top" class="wpc-row-light">
    <th scope="row">
        <label for="wpc_comment_bg_color"><?php _e('Comment Background Color', 'woodiscuz'); ?></label>
    </th>
    <td width="1">
        <input type="text" class="regular-text" value="<?php echo $this->wpc_options_serialized->wpc_comment_bg_color; ?>" id="wpc_comment_bg_color" name="wpc_comment_bg_color" placeholder="<?php _e('Example: #00ff00', 'woodiscuz'); ?>"/>
    </td>

    <td class="picker_img_cell">
        <a href="#wpc_openModal1">
            <img class="wpc_colorpicker_img1" src="<?php echo plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/third-party/colorpicker/img/colorpicker_icon_22.png'); ?>" />
        </a>
    </td>
    <td class="color_picker">
        <div id="wpc_openModal1" class="modalDialog">
            <div id="wpc_box1">
                <a href="#close" title="Close" class="close">X</a>
                <h2>Color Picker</h2>
                <p id="wpc_colorpickerHolder1"></p>
            </div>
        </div>
    </td>
</tr>

<tr valign="top" class="wpc-row-dark">
    <th scope="row">
        <label for="wpc_reply_bg_color"><?php _e('Reply Background Color', 'woodiscuz'); ?></label>
    </th>
    <td>
        <input type="text" class="regular-text" value="<?php echo $this->wpc_options_serialized->wpc_reply_bg_color; ?>" id="wpc_reply_bg_color" name="wpc_reply_bg_color" placeholder="<?php _e('Example: #00ff00', 'woodiscuz'); ?>"/>
    </td>

    <td class="picker_img_cell">
        <a href="#wpc_openModal2">
            <img class="wpc_colorpicker_img2" src="<?php echo plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/third-party/colorpicker/img/colorpicker_icon_22.png'); ?>" />
        </a>
    </td>
    <td class="color_picker">
        <div id="wpc_openModal2" class="modalDialog">
            <div id="wpc_box2">
                <a href="#close" title="Close" class="close">X</a>
                <h2>Color Picker</h2>
                <p id="wpc_colorpickerHolder2"></p>
            </div>
        </div>
    </td>
</tr>

<tr valign="top" class="wpc-row-light">
    <th scope="row">
        <label for="wpc_comment_text_color"><?php _e('Comment Text Color', 'woodiscuz'); ?></label>
    </th>
    <td>
        <input type="text" class="regular-text" value="<?php echo $this->wpc_options_serialized->wpc_comment_text_color; ?>" id="wpc_comment_text_color" name="wpc_comment_text_color" placeholder="<?php _e('Example: #00ff00', 'woodiscuz'); ?>"/>
    </td>

    <td class="picker_img_cell">
        <a href="#wpc_openModal3">
            <img class="wpc_colorpicker_img3" src="<?php echo plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/third-party/colorpicker/img/colorpicker_icon_22.png'); ?>" />
        </a>
    </td>
    <td class="color_picker">
        <div id="wpc_openModal3" class="modalDialog">
            <div id="wpc_box3">
                <a href="#close" title="Close" class="close">X</a>
                <h2>Color Picker</h2>
                <p id="wpc_colorpickerHolder3"></p>
            </div>
        </div>
    </td>
</tr>