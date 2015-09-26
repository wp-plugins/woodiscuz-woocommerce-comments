<p>
    <label class="" for="<?php echo $this->get_field_name('title'); ?>"><?php _e('Title:', WPC_Core::$TEXT_DOMAIN); ?></label>
    <input type="text" 
           class="widefat wpc_title" 
           id="<?php echo $this->get_field_id('title'); ?>"
           name="<?php echo $this->get_field_name('title'); ?>" 
           value="<?php echo esc_attr($instance['title']); ?>" />
</p>
<p>
    <label class="" for="<?php echo $this->get_field_name('number'); ?>"><?php _e('Number:', WPC_Core::$TEXT_DOMAIN); ?></label>
    <input type="number" 
           class="widefat wpc_number" 
           id="<?php echo $this->get_field_id('number'); ?>"
           name="<?php echo $this->get_field_name('number'); ?>" 
           value="<?php echo esc_attr($instance['number']); ?>" />
</p>