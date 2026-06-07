<?php
/**
 * トップページ（フロントページ）テンプレート
 */
get_header();
?>

<main id="main">

  <!-- ===================== HERO ===================== -->
  <section class="hero">
    <div class="wrap hero-grid">

      <div class="hero-copy">
        <h1>住み慣れたおうちで、<br>安心の毎日を。</h1>
        <p>訪問看護で、<br>あなたらしい暮らしを支えます。</p>
        <div class="hero-actions">
          <a class="btn btn-tel" href="tel:<?php echo hidamari_tel_raw(); ?>">
            <svg class="ic" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.6 21 3 13.4 3 4c0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.2.2 2.4.6 3.6.1.4 0 .8-.3 1l-2.2 2.2z"/>
            </svg>
            電話で相談する
          </a>
          <a class="btn btn-line" href="<?php echo hidamari_line_url(); ?>">
            <svg class="ic" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M12 3C6.5 3 2 6.6 2 10.9c0 3.9 3.6 7.1 8.4 7.7.3.1.8.2.9.5.1.3.1.7 0 1l-.1.9c0 .3-.2 1 .9.6 1.1-.5 6-3.5 8.2-6h0C21.4 14.1 22 12.6 22 10.9 22 6.6 17.5 3 12 3z"/>
            </svg>
            LINEで相談する
          </a>
        </div>
      </div>

    </div>
  </section>

  <!-- ===================== ひだまりが選ばれる理由 ===================== -->
  <section class="section alt">
    <div class="wrap">
      <h2 class="sec-title"><span class="sun" aria-hidden="true"></span>ひだまりが選ばれる理由</h2>
      <div class="features">

        <div class="feature">
          <div class="badge">
            <img src="<?php echo esc_url( get_theme_file_uri( 'image/icon_03_clock24.png' ) ); ?>"
                 alt="" width="38" height="38">
          </div>
          <h3>24時間対応で安心</h3>
          <p>緊急時もいつでも<br>ご連絡いただけます</p>
        </div>

        <div class="feature">
          <div class="badge">
            <img src="<?php echo esc_url( get_theme_file_uri( 'image/icon_04_nurse_person.png' ) ); ?>"
                 alt="" width="38" height="38">
          </div>
          <h3>経験豊富な看護師が訪問</h3>
          <p>医療・介護の連携で<br>安心をサポート</p>
        </div>

        <div class="feature">
          <div class="badge">
            <img src="<?php echo esc_url( get_theme_file_uri( 'image/icon_02_line.png' ) ); ?>"
                 alt="" width="38" height="38">
          </div>
          <h3>LINEで気軽に相談・連絡</h3>
          <p>ご家族やケアマネとも<br>スムーズに連携</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ===================== ご提供サービス ===================== -->
  <section class="section">
    <div class="wrap">
      <h2 class="sec-title"><span class="sun" aria-hidden="true"></span>ご提供サービス</h2>
      <div class="services">

        <div class="svc">
          <div class="badge">
            <img src="<?php echo esc_url( get_theme_file_uri( 'image/icon_08_checklist.png' ) ); ?>"
                 alt="" width="32" height="32">
          </div>
          <h3>健康状態の観察</h3>
          <p>血圧・体温・脈拍など<br>のチェックを行います</p>
        </div>

        <div class="svc">
          <div class="badge">
            <img src="<?php echo esc_url( get_theme_file_uri( 'image/icon_05_heart_hands.png' ) ); ?>"
                 alt="" width="32" height="32">
          </div>
          <h3>医療処置・管理</h3>
          <p>点滴・カテーテル<br>褥瘡の処置など</p>
        </div>

        <div class="svc">
          <div class="badge">
            <img src="<?php echo esc_url( get_theme_file_uri( 'image/icon_06_person_heart.png' ) ); ?>"
                 alt="" width="32" height="32">
          </div>
          <h3>リハビリテーション</h3>
          <p>日常生活動作の維持<br>向上をサポート</p>
        </div>

        <div class="svc">
          <div class="badge">
            <img src="<?php echo esc_url( get_theme_file_uri( 'image/icon_09_house_heart.png' ) ); ?>"
                 alt="" width="32" height="32">
          </div>
          <h3>ご家族への支援</h3>
          <p>介護の相談・アドバイス<br>を行います</p>
        </div>

      </div>
      <div style="text-align:center;margin-top:36px">
        <a class="btn btn-ghost" href="<?php echo esc_url( home_url( '/service/' ) ); ?>">
          サービス内容を詳しく見る
        </a>
      </div>
    </div>
  </section>

  <!-- ===================== お知らせ ===================== -->
  <section class="section alt">
    <div class="wrap">
      <h2 class="sec-title"><span class="sun" aria-hidden="true"></span>お知らせ</h2>
      <div class="news-wrap">
        <?php
        $news_query = new WP_Query( [
            'post_type'      => 'post',
            'posts_per_page' => 5,
            'post_status'    => 'publish',
        ] );

        if ( $news_query->have_posts() ) :
            while ( $news_query->have_posts() ) :
                $news_query->the_post();
        ?>
          <div class="news-item">
            <span class="date"><?php echo get_the_date( 'Y.m.d' ); ?></span>
            <span class="txt">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </span>
          </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
          <div class="news-item">
            <span class="date">—</span>
            <span class="txt">お知らせはまだありません</span>
          </div>
        <?php endif; ?>
      </div>
      <div class="news-more">
        <a href="<?php echo esc_url( home_url( '/news/' ) ); ?>">一覧を見る →</a>
      </div>
    </div>
  </section>

  <!-- ===================== 理念バナー ===================== -->
  <section class="section banner">
    <div class="wrap banner-grid">
      <div>
        <h2>地域に根ざした<br>訪問看護を目指して</h2>
        <p>訪問看護ステーション ひだまりは、地域の皆さまとともに、安心して在宅療養を続けられるようサポートいたします。</p>
      </div>
      <img class="banner-photo"
           src="<?php echo esc_url( get_theme_file_uri( 'image/photo_06_nurse_elder_warm.png' ) ); ?>"
           alt="地域に根ざした訪問看護"
           width="480" height="230">
    </div>
  </section>

</main><!-- #main -->

<?php get_footer(); ?>
