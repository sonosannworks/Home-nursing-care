<?php
/**
 * ブログ投稿一覧テンプレート（WordPress必須ファイル）
 * 固定フロントページが設定されている場合は front-page.php が優先されます
 */
get_header();
?>

<main id="main">
  <div class="wrap section">

    <h1 class="sec-title">
      <span class="sun" aria-hidden="true"></span>
      <?php
      if ( is_home() && ! is_front_page() ) {
          single_post_title();
      } else {
          echo 'お知らせ';
      }
      ?>
    </h1>

    <div class="news-wrap">
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <div class="news-item">
            <span class="date"><?php echo get_the_date( 'Y.m.d' ); ?></span>
            <span class="txt">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </span>
          </div>
        <?php endwhile; ?>

        <div class="news-more" style="margin-top:32px">
          <?php the_posts_pagination( [ 'prev_text' => '← 前へ', 'next_text' => '次へ →' ] ); ?>
        </div>

      <?php else : ?>
        <p style="text-align:center;color:var(--ink-soft);padding:40px 0">
          投稿がまだありません
        </p>
      <?php endif; ?>
    </div>

  </div>
</main>

<?php get_footer(); ?>
