<?php
/* Template Name: Каталог */
get_header();
?>

<section class="catalog container" aria-labelledby="catalog-title">
  <?php garden_catalog_breadcrumbs(); ?>

  <header class="catalog__header">
    <h1 class="catalog__title" id="catalog-title">
      Райский сад Сибири <br> Каталог
    </h1>
  </header>

  <div class="catalog__body">
    <?php
    $terms = get_terms([
      'taxonomy'   => 'catalog_category',
      'hide_empty' => true,
    ]);

    if (!empty($terms) && !is_wp_error($terms)) :
      foreach ($terms as $term) :

        // Получаем изображение категории из ACF
        $image_id = get_field('category_image', $term);
    ?>

        <div class="catalog-category">
          <a class="catalog-category__link" href="<?php echo esc_url(get_term_link($term)); ?>">

            <div class="catalog-category__inner">

              <div class="catalog-category__images">

                <?php if ($image_id) : ?>

                  <?php
                  echo wp_get_attachment_image(
                    $image_id,
                    'catalog-card',
                    false,
                    [
                      'class'   => 'catalog-category__image',
                      'alt'     => esc_attr($term->name),
                      'loading' => 'lazy'
                    ]
                  );
                  ?>

                <?php else : ?>

                  <img
                    class="catalog-category__image"
                    src="<?php echo get_template_directory_uri(); ?>/src/assets/images/Catalog/vegetables/Arkano.jpg"
                    alt="<?php echo esc_attr($term->name); ?>"
                    loading="lazy">

                <?php endif; ?>

              </div>

              <h2 class="catalog-category__title">
                <?php echo esc_html($term->name); ?>
              </h2>

            </div>

          </a>
        </div>

    <?php
      endforeach;
    else :
      echo '<p>Категории пока не созданы.</p>';
    endif;
    ?>
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