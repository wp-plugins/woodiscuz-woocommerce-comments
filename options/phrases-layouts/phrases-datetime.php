<div>
    <h2 style="padding:5px 10px 10px 10px; margin:0px;"><?php _e('Date/Time Phrases', WPC_Core::$TEXT_DOMAIN); ?></h2>
    <table class="wp-list-table widefat plugins"  style="margin-top:10px; border:none;">
        <tbody>
            <tr valign="top">
                <th scope="row">
                    <?php _e('Year', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_year_text">
                        <input type="text" value="<?php echo $this->wpc_options_serialized->wpc_phrases['wpc_year_text']['datetime'][0]; ?>" name="wpc_year_text" id="wpc_year_text" />
                    </label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php _e('Years (Plural Form)', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_year_text_plural">
                        <input type="text" value="<?php echo isset($this->wpc_options_serialized->wpc_phrases['wpc_year_text_plural']['datetime'][0]) ? $this->wpc_options_serialized->wpc_phrases['wpc_year_text_plural']['datetime'][0] : __('Years', WPC_Core::$TEXT_DOMAIN); ?>" name="wpc_year_text_plural" id="wpc_year_text_plural" />
                    </label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php _e('Month', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_month_text">
                        <input type="text" value="<?php echo $this->wpc_options_serialized->wpc_phrases['wpc_month_text']['datetime'][0]; ?>" name="wpc_month_text" id="wpc_month_text" />
                    </label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php _e('Months (Plural Form)', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_month_text_plural">
                        <input type="text" value="<?php echo $this->wpc_options_serialized->wpc_phrases['wpc_month_text_plural']['datetime'][0]; ?>" name="wpc_month_text_plural" id="wpc_month_text_plural" />
                    </label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php _e('Day', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_day_text">
                        <input type="text" value="<?php echo $this->wpc_options_serialized->wpc_phrases['wpc_day_text']['datetime'][0]; ?>" name="wpc_day_text" id="wpc_day_text" />
                    </label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php _e('Days (Plural Form)', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_day_text_plural">
                        <input type="text" value="<?php echo $this->wpc_options_serialized->wpc_phrases['wpc_day_text_plural']['datetime'][0]; ?>" name="wpc_day_text_plural" id="wpc_day_text_plural" />
                    </label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php _e('Hour', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_hour_text">
                        <input type="text" value="<?php echo $this->wpc_options_serialized->wpc_phrases['wpc_hour_text']['datetime'][0]; ?>" name="wpc_hour_text" id="wpc_hour_text" />
                    </label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php _e('Hours (Plural Form)', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_hour_text_plural">
                        <input type="text" value="<?php echo $this->wpc_options_serialized->wpc_phrases['wpc_hour_text_plural']['datetime'][0]; ?>" name="wpc_hour_text_plural" id="wpc_hour_text_plural" />
                    </label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php _e('Minute', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_minute_text">
                        <input type="text" value="<?php echo $this->wpc_options_serialized->wpc_phrases['wpc_minute_text']['datetime'][0]; ?>" name="wpc_minute_text" id="wpc_minute_text" />
                    </label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php _e('Minutes (Plural Form)', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_minute_text_plural">
                        <input type="text" value="<?php echo $this->wpc_options_serialized->wpc_phrases['wpc_minute_text_plural']['datetime'][0]; ?>" name="wpc_minute_text_plural" id="wpc_minute_text_plural" />
                    </label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php _e('Second', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_second_text">
                        <input type="text" value="<?php echo $this->wpc_options_serialized->wpc_phrases['wpc_second_text']['datetime'][0]; ?>" name="wpc_second_text" id="wpc_second_text" />
                    </label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php _e('Seconds (Plural Form)', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_second_text_plural">
                        <input type="text" value="<?php echo $this->wpc_options_serialized->wpc_phrases['wpc_second_text_plural']['datetime'][0]; ?>" name="wpc_second_text_plural" id="wpc_second_text_plural" />
                    </label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php _e('Plural (Ex. user -> user + s)', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_plural_text">
                        <input type="text" value="<?php echo $this->wpc_options_serialized->wpc_phrases['wpc_plural_text']; ?>" name="wpc_plural_text" id="wpc_plural_text" />
                    </label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php _e('Commented "right now" text', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_right_now_text">
                        <input type="text" value="<?php echo $this->wpc_options_serialized->wpc_phrases['wpc_right_now_text']; ?>" name="wpc_right_now_text" id="wpc_right_now_text" />
                    </label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php _e('Ago text', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_ago_text">
                        <input type="text" value="<?php echo $this->wpc_options_serialized->wpc_phrases['wpc_ago_text']; ?>" name="wpc_ago_text" id="wpc_ago_text" />
                    </label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php _e('"Today" text', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_posted_today_text">
                        <input type="text" value="<?php echo $this->wpc_options_serialized->wpc_phrases['wpc_posted_today_text']; ?>" name="wpc_posted_today_text" id="wpc_posted_today_text" />
                    </label>
                </td>
            </tr>
        </tbody>
    </table>
</div>