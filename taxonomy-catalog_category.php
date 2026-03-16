<?php get_header(); ?>

<section class="taxonomy-catalog container" aria-labelledby="taxonomy-catalog-title">
  <?php garden_catalog_breadcrumbs(); ?>

  <header class="taxonomy-catalog__header">
    <h1 class="taxonomy-catalog__title" id="taxonomy-catalog-title">
      <?php single_term_title(); ?>
    </h1>
  </header>

  <div class="taxonomy-catalog__body">

    <?php 
    // Получаем текущую категорию
    $term = get_queried_object();

    // WP_Query для сортировки по наличию
    $args = [
        'post_type' => 'card',           //  тип записи
        'posts_per_page' => -1,
        'tax_query' => [
            [
                'taxonomy' => 'catalog_category',
                'field'    => 'term_id',
                'terms'    => $term->term_id,
            ]
        ],
        'meta_key' => 'stock_status',    // поле ACF
        'orderby' => 'meta_value',       // сортируем по значению
        'order' => 'ASC',                // 'in_stock' будет перед 'out_stock'
    ];

    $products = new WP_Query($args);

    if ($products->have_posts()) : while ($products->have_posts()) : $products->the_post();

        $status = get_field('stock_status'); 
        $card_class = 'taxonomy-card';
        if ($status === 'out_stock') {
            $card_class .= ' out-stock';
        }
    ?>

      <div class="<?php echo esc_attr($card_class); ?>">
        <a class="taxonomy-card__link" href="<?php the_permalink(); ?>">

          <div class="taxonomy-card__inner">

            <div class="taxonomy-card__images">
              <?php 
                if (has_post_thumbnail()) {
                  echo wp_get_attachment_image(
                    get_post_thumbnail_id(get_the_ID()),
                    'medium',
                    false,
                    [
                      'class'   => 'taxonomy-card__image',
                      'alt'     => get_the_title(),
                      'loading' => 'lazy'
                    ]
                  );
                }
              ?>
            </div>

            <h2 class="taxonomy-card__title"><?php the_title(); ?></h2>

          </div>

        </a>
      </div>

    <?php endwhile; else : ?>

      <p>В этой категории пока нет товаров.</p>

    <?php endif; wp_reset_postdata(); ?>

  </div>
</section>

<?php
get_template_part('template-parts/banner', null, [
    'title'       => 'Свяжитесь с нами',
    'description' => 'Поможем выбрать растения и ответим на любые вопросы',
    'button_text' => 'Telegram-сообщество',
    'button_link' => 'https://t.me/Rayssad'
]);
?>

<?php get_footer(); ?>