<?php

namespace HashtagsForWp;


class HashtagsForWp
{
  const DOMAIN = 'hashtags-for-wp';
  public $color;
  public $symbol;
  private static HashtagsForWp $instance;

  public function __construct()
  {
    $this->color = get_option('hashtags_for_wp_color', 'initial');
    $this->symbol = get_option('hashtags_for_wp_symbol', '#');
    // Inizializzazione del plugin
    add_action('init', array($this, 'init'));

    //Css
    add_action('admin_enqueue_scripts', array($this, 'hashtags_for_wp_enqueue_styles'));
  }


  public function init()
  {
    // Registrazione delle funzionalità del plugin
    add_action('admin_menu', array($this, '_add_admin_menu'));
    add_filter('the_content', array($this, '_modify_post_content'));
  }

  public function _add_admin_menu()
  {
    // Aggiunta delle due tab nel backend
    add_submenu_page(
      'options-general.php',
      'hashtags-for-wp',
      __('Hashtags', self::DOMAIN),
      'manage_options',
      'hashtags-for-wp',
      array($this, '_hashtags_for_wp_menu_page')
    );
  }
  public function _hashtags_for_wp_menu_page()
  {
    if (isset($_POST['action']) && $_POST['action'] == 'update_hashtags_settings') {
      $this->color = sanitize_hex_color($_POST['colour']);
      $this->symbol = sanitize_text_field($_POST['symbol']);
      update_option('hashtags_for_wp_color', $this->color);
      update_option('hashtags_for_wp_symbol', $this->symbol);
    }

    require_once plugin_dir_path(__FILE__) . '/templates/hashtags-for-wp-admin.php';
  }
  public function _modify_post_content($content)
  {

    if (is_single()) {
      $post_tags = get_the_tags();

      if ($post_tags) {
        foreach ($post_tags as $tag) {
          $tag_link = get_tag_link($tag->term_id);

          $content = str_replace('' . $tag->name . '', "<a href='$tag_link' style='color:$this->color!important;'>$this->symbol$tag->name</a>", $content);
        }
      }
      return $content;
    }
  }
  public  function hashtags_for_wp_enqueue_styles()
  {
    wp_register_style('hashtags-for-wp-style', plugin_dir_url(__FILE__) . 'assets/hashtags-for-wp-style.css');
    wp_enqueue_style('hashtags-for-wp-style');
  }
}
