<?php
/**
 * ひだまり訪問看護 — functions.php
 */

// テーマサポート設定
function hidamari_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );

    register_nav_menus( [
        'primary' => 'メインナビゲーション',
        'footer'  => 'フッターナビゲーション',
    ] );
}
add_action( 'after_setup_theme', 'hidamari_setup' );

// スタイルシート読み込み
function hidamari_enqueue_scripts() {
    wp_enqueue_style(
        'hidamari-style',
        get_stylesheet_uri(),
        [],
        '1.0.0'
    );
}
add_action( 'wp_enqueue_scripts', 'hidamari_enqueue_scripts' );

// カスタムメニュー用ウォーカー（<ul><li> を除去してフラットな <a> を出力）
class Hidamari_Nav_Walker extends Walker_Nav_Menu {
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes  = implode( ' ', (array) $item->classes );
        $active   = in_array( 'current-menu-item', (array) $item->classes ) ? ' class="active"' : '';
        $url      = esc_url( $item->url );
        $title    = esc_html( $item->title );
        $output  .= "<a href=\"{$url}\"{$active}>{$title}</a>\n";
    }
    public function start_lvl( &$output, $depth = 0, $args = null ) {}
    public function end_lvl( &$output, $depth = 0, $args = null ) {}
    public function end_el( &$output, $item, $depth = 0, $args = null ) {}
}

// テーマカスタマイザー（住所・電話番号）
function hidamari_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'hidamari_contact', [
        'title'    => '連絡先情報',
        'priority' => 30,
    ] );

    $fields = [
        'hidamari_address' => [ 'label' => '住所', 'default' => '〒123-4567 東京都○○区○○町1-2-3' ],
        'hidamari_tel'     => [ 'label' => '電話番号', 'default' => '03-1234-5678' ],
        'hidamari_line'    => [ 'label' => 'LINE URL', 'default' => '#' ],
    ];

    foreach ( $fields as $id => $args ) {
        $wp_customize->add_setting( $id, [ 'default' => $args['default'], 'sanitize_callback' => 'sanitize_text_field' ] );
        $wp_customize->add_control( $id, [ 'label' => $args['label'], 'section' => 'hidamari_contact', 'type' => 'text' ] );
    }
}
add_action( 'customize_register', 'hidamari_customize_register' );

// ヘルパー関数
function hidamari_tel() {
    return esc_html( get_theme_mod( 'hidamari_tel', '03-1234-5678' ) );
}
function hidamari_tel_raw() {
    return preg_replace( '/[^0-9]/', '', get_theme_mod( 'hidamari_tel', '0312345678' ) );
}
function hidamari_address() {
    return esc_html( get_theme_mod( 'hidamari_address', '〒123-4567 東京都○○区○○町1-2-3' ) );
}
function hidamari_line_url() {
    return esc_url( get_theme_mod( 'hidamari_line', '#' ) );
}
