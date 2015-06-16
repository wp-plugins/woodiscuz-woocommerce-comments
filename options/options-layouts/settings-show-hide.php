<div>
    <h2 style="padding:5px 10px 10px 10px; margin:0px;"><?php _e('Show/Hide Components', WPC_Core::$TEXT_DOMAIN); ?></h2>
    <table class="wp-list-table widefat plugins"  style="margin-top:10px; border:none;">
        <tbody>          
            <tr valign="top">
                <th scope="row" style="width:55%;">
                    <?php _e('Hide WooCommerce Review Tab', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_tab_show_hide">
                        <input type="checkbox" <?php checked($this->wpc_options_serialized->wpc_tab_show_hide == 1 )  ?> value="1" name="wpc_tab_show_hide" id="wpc_tab_show_hide" />
                    </label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row" style="width:55%;">
                    <?php _e('Hide Voting buttons', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_voting_buttons_show_hide">
                        <input type="checkbox" <?php checked($this->wpc_options_serialized->wpc_voting_buttons_show_hide == 1 ) ?> value="1" name="wpc_voting_buttons_show_hide" id="wpc_voting_buttons_show_hide" />
                    </label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row" style="width:55%;">
                    <?php _e('Hide Share Button', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_share_buttons_show_hide">
                        <input type="checkbox" <?php checked($this->wpc_options_serialized->wpc_share_buttons_show_hide == 1 ) ?> value="1" name="wpc_share_buttons_show_hide" id="wpc_share_buttons_show_hide" />
                    </label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row" style="width:55%;">
                    <?php _e('Hide the  CAPTCHA field', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_captcha_show_hide">
                        <input type="checkbox" <?php checked($this->wpc_options_serialized->wpc_captcha_show_hide == 1) ?> value="1" name="wpc_captcha_show_hide" id="wpc_captcha_show_hide" />
                    </label>
                </td>
            </tr>            
            <tr valign="top">
                <th scope="row" style="width:55%;">
                    <?php _e('Hide Reply button for Guests', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_reply_button_guests_show_hide">
                        <input type="checkbox" <?php checked($this->wpc_options_serialized->wpc_reply_button_guests_show_hide == 1) ?> value="1" name="wpc_reply_button_guests_show_hide" id="wpc_reply_button_guests_show_hide" />
                    </label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row" style="width:55%;">
                    <?php _e('Hide Reply button for Customers', WPC_Core ::$TEXT_DOMAIN); ?> 
                </th>
                <td colspan="3">                                
                    <label for="wpc_reply_button_customers_show_hide">
                        <input type="checkbox" <?php checked($this->wpc_options_serialized->wpc_reply_button_customers_show_hide == 1) ?> value="1" name="wpc_reply_button_customers_show_hide" id="wpc_reply_button_customers_show_hide" />
                    </label>
                </td>
            </tr>            
            <tr valign="top">
                <th scope="row" style="width:55%;">
                    <?php _e('Hide Author Titles', WPC_Core::$TEXT_DOMAIN); ?>
                        </th>
                        <td colspan="3">                                
                            <label for="wpc_author_titles_show_hide">
                                <input type="checkbox"  <?php checked($this->wpc_options_serialized->wpc_author_titles_show_hide == 1) ?> value="1" name="wpc_author_titles_show_hide" id="wpc_author_titles_show_hide" />
                    </label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row" style="width:55%;">
                    <?php _e('Hide Subscription', WPC_Core::$TEXT_DOMAIN); ?>
                        </th>
                        <td colspan="3">
                            <label for="wpc_reply_subscription_on_off">
                                <input type="checkbox"  <?php checked($this->wpc_options_serialized->wpc_reply_subscription_on_off == 1) ?> value="1" name="wpc_reply_subscription_on_off" id="wpc_reply_subscription_on_off" />
                    </label>
                </td>
            </tr>
        </tbody>
    </table>
</div>