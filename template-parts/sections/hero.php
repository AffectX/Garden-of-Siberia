<section class="hero container" aria-labelledby="hero-title">
  <div class="hero__inner">

    <div class="hero__body">

      <?php if ( get_field('hero_title') ) : ?>
        <h1 class="hero__title" id="hero-title">
          <?php echo nl2br( esc_html( get_field('hero_title') ) ); ?>
        </h1>
      <?php endif; ?>

      <?php if ( get_field('hero_description') ) : ?>
        <div class="hero__description">
          <p><?php the_field('hero_description'); ?></p>
        </div>
      <?php endif; ?>

      <div class="hero__body-actions">

        <a class="button hero__button" href="<?php echo esc_url( get_post_type_archive_link('card') ); ?>">
          <span class="button__label">Каталог</span>
        </a>

        <a class="button hero__button" href="https://t.me/Rayssad" target="_blank" rel="noopener">
          <span class="button__label">Получить консультацию</span>
        </a>

      </div>

    </div>

    <div class="hero__images hidden-mobile">

      <?php
      $hero_image = get_field('hero_image');

      if ($hero_image) {
          echo wp_get_attachment_image(
              $hero_image,
              'full',
              false,
              [
                  'class' => 'hero__image',
                  'decoding' => 'async',
                  'fetchpriority' => 'high',
                  'loading' => 'eager'
              ]
          );
      }
      ?>

    </div>

  </div>
</section>