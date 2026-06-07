<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- ===================== HEADER ===================== -->
<header class="site-header">
  <div class="header-inner">

    <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
      <img src="<?php echo esc_url( get_theme_file_uri( 'image/logo_hidamari.png' ) ); ?>"
           alt="<?php bloginfo( 'name' ); ?>">
    </a>

    <nav class="nav">
      <?php
      if ( has_nav_menu( 'primary' ) ) {
          wp_nav_menu( [
              'theme_location' => 'primary',
              'container'      => false,
              'items_wrap'     => '%3$s',
              'walker'         => new Hidamari_Nav_Walker(),
              'depth'          => 1,
          ] );
      } else {
          // メニュー未設定時のフォールバック
          $pages = [
              ''          => 'トップ',
              'service'   => 'サービス内容',
              'pricing'   => '利用料金',
              'staff'     => 'スタッフ紹介',
              'contact'   => 'お問い合わせ',
              'access'    => 'アクセス',
          ];
          foreach ( $pages as $slug => $label ) {
              $url    = $slug ? home_url( "/{$slug}/" ) : home_url( '/' );
              $active = ( $slug === '' && is_front_page() ) || ( $slug && is_page( $slug ) ) ? ' class="active"' : '';
              echo "<a href=\"" . esc_url( $url ) . "\"{$active}>" . esc_html( $label ) . "</a>\n";
          }
      }
      ?>
    </nav>

    <a class="line-btn" href="<?php echo hidamari_line_url(); ?>">
      <svg class="li" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
        <path d="M12 3C6.5 3 2 6.6 2 10.9c0 3.9 3.6 7.1 8.4 7.7.3.1.8.2.9.5.1.3.1.7 0 1l-.1.9c0 .3-.2 1 .9.6 1.1-.5 6-3.5 8.2-6h0C21.4 14.1 22 12.6 22 10.9 22 6.6 17.5 3 12 3z"/>
      </svg>
      LINE相談
    </a>

    <button class="menu-toggle" id="menuToggle" aria-label="メニューを開く" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>

  </div>

  <!-- スマホメニュー -->
  <nav class="mobile-nav" id="mobileNav" aria-hidden="true">
    <?php
    $pages = [
        ''        => 'トップ',
        'service' => 'サービス内容',
        'pricing' => '利用料金',
        'staff'   => 'スタッフ紹介',
        'contact' => 'お問い合わせ',
        'access'  => 'アクセス',
    ];
    foreach ( $pages as $slug => $label ) {
        $url = $slug ? home_url( "/{$slug}/" ) : home_url( '/' );
        echo "<a href=\"" . esc_url( $url ) . "\">" . esc_html( $label ) . "</a>\n";
    }
    ?>
  </nav>
</header>
