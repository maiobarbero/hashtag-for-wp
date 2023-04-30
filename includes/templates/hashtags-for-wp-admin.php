<div class="hashtags-page">
  <h1><?php _e('Hashtags for WordPress','hashtags-for-wp')?></h1>
  <div class="container">
    <div class="column about">
      <h3 class="title"><?php _e('About','hashtags-for-wp')?></h3>
      <p>
        <?php _e('The plugin automatically searches for native tags within the post content and adds a hashtag symbol before each one. It then links the tags to their respective tag archives, which can be useful for digital newspapers and magazines.','hashtags-for-wp')?>
      </p>
      <p>
        <?php _e('If you would like to support me and buy me a coffee, please click on the following button','hashtags-for-wp')?>
      </p>
      <script type="text/javascript" src="https://cdnjs.buymeacoffee.com/1.0.0/button.prod.min.js"
        data-name="bmc-button" data-slug="maiobarbero" data-color="#5F7FFF" data-emoji="🍺" data-font="Cookie"
        data-text="Buy me a beer" data-outline-color="#000000" data-font-color="#ffffff" data-coffee-color="#FFDD00">
      </script>
      <p>
        <?php _e('Your support is greatly appreciated and will motivate me to continue developing useful plugins for the WordPress community. Thank you!','hashtags-for-wp')?>
      </p>
    </div>
    <div class="column settings">
      <h3 class="title"><?php _e('Settings','hashtags-for-wp')?></h3>
      <p>
        <?php _e('With this plugin, users can easily customize the appearance of their hashtags by choosing a color and symbol of their liking.','hashtags-for-wp')?>
      </p>
      <div class="form-container">
        <h4 class="options-title"><?php _e('Color picker','hashtags-for-wp')?></h4>
        <form method="POST" action="">
          <div class="form-row">
            <label for="colour"><?php _e('Choose a color for hashtags links','hashtags-for-wp')?></label>
            <input type="color" name="colour" value="<?php echo esc_attr($this->color); ?>">
          </div>
          <div class="form-row">
            <label for="symbol"><?php _e('Choose a symbol for hashtags','hashtags-for-wp')?></label>
            <input type="text" name="symbol" placeholder="#" value="<?php echo esc_attr($this->symbol); ?>">
          </div>
          <input type="hidden" name="action" value="update_hashtags_settings">
          <input type="submit" value="Save">
        </form>
      </div>
    </div>
  </div>
</div>