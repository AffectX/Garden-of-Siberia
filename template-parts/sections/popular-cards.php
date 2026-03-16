<?php
$popular_cards = get_field('popular_cards'); // поле у страницы Главная

if ($popular_cards) :
?>

<section class="section container popular" aria-labelledby="popular-title">
  <header class="section__header">
    <div class="section__info">
      <h2 class="section__title" id="popular-title">Популярные товары</h2>
      <div class="section__description">
        <p>Самые востребованные растения и товары, которые выбирают наши покупатели</p>
      </div>
    </div>

    <div class="section__actions hidden-mobile">
      <div>
        <a class="button popular__button"
           href="<?php echo esc_url(get_post_type_archive_link('card')); ?>">
          <span class="button__label">Смотреть товары</span>
        </a>
      </div>
    </div>
  </header>

  <div class="section__body">
    <ul class="grid grid--3">

      <?php foreach ($popular_cards as $post) :
        setup_postdata($post);
      ?>

      <li class="grid__item">
        <article class="card">

          <!-- Ссылка на карточку -->
          <a href="<?php the_permalink(); ?>" class="card__link">
            
            <div class="card__inner">
              <!-- Изображение -->
            <div class="card__images">
              <?php if (has_post_thumbnail()) :
                $thumb_id  = get_post_thumbnail_id();
                $thumb_alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                if (empty($thumb_alt)) $thumb_alt = get_the_title();
                $image = wp_get_attachment_image_src($thumb_id, 'large');
              ?>
                <img 
                  class="card__image"
                  src="<?php echo esc_url($image[0]); ?>"
                  width="<?php echo esc_attr($image[1]); ?>"
                  height="<?php echo esc_attr($image[2]); ?>"
                  alt="<?php echo esc_attr($thumb_alt); ?>"
                  loading="lazy"
                >
              <?php endif; ?>
            </div>

            <!-- Заголовок -->
            <div class="card__body">
              <h3 class="card__title"><?php the_title(); ?></h3>
            </div>
            </div>

          </a>

        </article>
      </li>

      <?php endforeach; ?>
      <?php wp_reset_postdata(); ?>

    </ul>
  </div>
</section>

<?php endif; ?>