<!-- ===================== FOOTER ===================== -->
<footer class="site-footer">
  <div class="footer-inner">

    <div class="footer-brand">
      <img src="<?php echo esc_url( get_theme_file_uri( 'image/logo_hidamari.png' ) ); ?>"
           alt="<?php bloginfo( 'name' ); ?>">
      <div class="addr">
        <?php echo hidamari_address(); ?><br>
        TEL: <?php echo hidamari_tel(); ?>
      </div>
    </div>

    <nav class="footer-nav" aria-label="フッターナビゲーション">
      <?php
      if ( has_nav_menu( 'footer' ) ) {
          wp_nav_menu( [
              'theme_location' => 'footer',
              'container'      => false,
              'items_wrap'     => '%3$s',
              'walker'         => new Hidamari_Nav_Walker(),
              'depth'          => 1,
          ] );
      } else {
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
      }
      ?>
    </nav>

  </div>
  <div class="footer-copy">
    &copy; <?php echo date( 'Y' ); ?> HIDAMARI Visiting Nursing Station
  </div>
</footer>

<script>
(function () {
  var toggle = document.getElementById('menuToggle');
  var nav    = document.getElementById('mobileNav');
  if (!toggle || !nav) return;
  toggle.addEventListener('click', function () {
    var open = nav.classList.toggle('open');
    toggle.setAttribute('aria-expanded', open);
    nav.setAttribute('aria-hidden', !open);
  });
})();
</script>

<?php wp_footer(); ?>
</body>
</html>
