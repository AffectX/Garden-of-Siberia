<?php get_header(); ?>

<main class="content">

  <div class="product-card container">
    <?php garden_catalog_breadcrumbs(); ?>

    <div class="product-card__inner">

      <?php while ( have_posts() ) : the_post(); ?>

        <!-- Изображение -->
        <div class="product-card__images">
          <?php if ( has_post_thumbnail() ) : ?>
            <?php
              echo wp_get_attachment_image(
                get_post_thumbnail_id(),
                'catalog-single',
                false,
                [
                  'class'   => 'product-card__image',
                  'alt'     => get_the_title(),
                  'loading' => 'lazy'
                ]
              );
            ?>
          <?php endif; ?>
        </div>

        <!-- Информация -->
        <div class="product-card__info">

          <div class="product-card__title">
            <h1 class="h1"><?php the_title(); ?></h1>
          </div>

          <?php if ( $manufacturer = get_field('manufacturer') ) : ?>
            <div class="product-card__manufacturer">
              <p>Производитель — <?php echo esc_html($manufacturer); ?></p>
            </div>
          <?php endif; ?>

          <?php if ( $parameters = get_field('parameters') ) : ?>
            <div class="product-card__parameters">
              <p><?php echo nl2br( esc_html($parameters) ); ?></p>
            </div>
          <?php endif; ?>

          <?php if ( $description = get_field('description') ) : ?>
            <div class="product-card__description">
              <?php echo nl2br( wp_kses_post($description) ); ?>
            </div>
          <?php endif; ?>

          <?php $status = get_field('stock_status'); ?>

            <div class="product-card__actions">

              <?php if ($status !== 'out_stock') : ?>

                <a class="button product-card__button" href="https://t.me/Rayssad" target="_blank">
                  <span class="button__label">Оформить заказ</span>
                </a>

                <?php if ( $price = get_field('price') ) : ?>
                  <div class="product-card__price">
                    <p><?php echo esc_html($price); ?> ₽</p>
                  </div>
                <?php endif; ?>

              <?php else : ?>

                <div class="product-card__out">
                  <p>Нет в наличии</p>
                </div>

              <?php endif; ?>

            </div>
        </div>

      <?php endwhile; ?>

    </div>
  </div>

</main>

<?php get_footer(); ?>