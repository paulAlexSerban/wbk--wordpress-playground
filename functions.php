<?php 
  function basic_blog_files() {
    $decodedManifestJson = json_decode(file_get_contents(get_theme_file_uri("/build/manifest.json")));

    /**
     * get the manifest.json file build by webpack when compiling and then decode the json
     */

    foreach ($decodedManifestJson as $key=>$value) {
      /**
       * go through each entry in the json file and get the $key adn the $value
       */
      if(preg_match('/\.css$/',$key)) {
        /**
         * check if the key ends in .css using regular expressions
         * then if the is index.php, single.php, page.php, archive.php, front-page.php and the $key starts with the value tested by the regex then inject the ui/ux theme file
         */
        if(is_home() && preg_match('/index/', $key)) {
          wp_enqueue_style("{$key}__styles", get_theme_file_uri('/build/' . $value));
        } else if (is_single() && preg_match('/single/', $key)) {
          wp_enqueue_style("{$key}__styles", get_theme_file_uri('/build/' . $value));
        } else if (is_page() && preg_match('/page/', $key)) {
          wp_enqueue_style("{$key}__styles", get_theme_file_uri('/build/' . $value));
        } else if (is_archive() && preg_match('/archive/', $key)) {
          wp_enqueue_style("{$key}__styles", get_theme_file_uri('/build/' . $value));
        } else if (is_front_page() && preg_match('/front-page/', $key)) {
          wp_enqueue_style("{$key}__styles", get_theme_file_uri('/build/' . $value));
        } 

      } else if(preg_match('/\.js$/',$key)) {
        /**
         * check if the key ends in .js using regular expressions
         * then if the is index.php, single.php, page.php, archive.php, front-page.php and the $key starts with the value tested by the regex then inject the ui/ux theme file
         */
        if(is_home() && preg_match('/index/', $key)) {
          wp_enqueue_script("{$key}__js", get_theme_file_uri('/build/'. $value), NULL, '1.0', true);
        } else if (is_single() && preg_match('/single/', $key)) {
          wp_enqueue_script("{$key}__js", get_theme_file_uri('/build/'. $value), NULL, '1.0', true);
        } else if (is_page() && preg_match('/page/', $key)) {
          wp_enqueue_script("{$key}__js", get_theme_file_uri('/build/'. $value), NULL, '1.0', true);
        } else if (is_archive() && preg_match('/archive/', $key)) {
          wp_enqueue_script("{$key}__js", get_theme_file_uri('/build/'. $value), NULL, '1.0', true);
        } else if (is_front_page() && preg_match('/front-page/', $key)) {
          wp_enqueue_script("{$key}__js", get_theme_file_uri('/build/'. $value), NULL, '1.0', true);
        } 

      }
    }
  }

  add_action('wp_enqueue_scripts', 'basic_blog_files');

  function basic_blog_features() { 
    add_theme_support('title-tag');
  }

  add_action('after_setup_theme', 'basic_blog_features')
?>