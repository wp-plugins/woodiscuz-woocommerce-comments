<div>
    <h2 style="padding:5px 10px 10px 10px; margin:0px;"><?php _e('General Phrases', WPC_Core::$TEXT_DOMAIN); ?></h2>
    <table class="wp-list-table widefat plugins"  style="margin-top:10px; border:none;">
        <tbody>
            <tr valign="top">
                <th scope="row">
                    <?php _e('Disscussion Tab Title', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_discuss_tab">
                        <input type="text" value="<?php echo $this->wpc_options_serialized->wpc_phrases['wpc_discuss_tab']; ?>" name="wpc_discuss_tab" id="wpc_discuss_tab" />
                    </label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">
                    <?php _e('Header', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_header_text">
                        <input type="text" value="<?php echo $this->wpc_options_serialized->wpc_phrases['wpc_header_text']; ?>" name="wpc_header_text" id="wpc_header_text" />
                    </label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">
                    <?php _e('Load More Button', WPC_Core::$TEXT_DOMAIN); ?>
                </th>
                <td colspan="3">                                
                    <label for="wpc_load_more_submit_text">
                        <input type="text" value="<?php echo $this->wpc_options_serialized->wpc_phrases['wpc_load_more_submit_text']; ?>" name="wpc_load_more_submit_text" id="wpc_load_more_submit_text" />
                    </label>
                </td>
            </tr>
        </tbody>
    </table>
</div>