<section class="section container reviews" aria-labelledby="reviews-title">
    <header class="section__header">
        <div class="section__info">
            <h2 class="section__title" id="reviews-title">Отзывы наших покупателей</h2>
            <div class="section__description">
                <p>Нам приятно получать отзывы от клиентов. Благодарим вас за ваш выбор и доверие.</p>
            </div>
        </div>
    </header>
    <div class="section__body">
        <div class="reviews-group">
            <?php
            $args = [
                'post_type' => 'review',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC'
            ];
            $reviews = new WP_Query($args);
            if($reviews->have_posts()):
                while($reviews->have_posts()): $reviews->the_post();

                    $author = get_field('review_author');
                    $content = get_field('review_content');
                    $products = get_field('review_products'); ?>
                    
                    <article class="review">
                        <header class="review__header">
                            <h3 class="review__author h3"><?php echo esc_html($author); ?></h3>
                        </header>
                        <div class="review__content">
                            <p><?php echo esc_html($content); ?></p>
                        </div>
                        <div class="review__product">
                            <p class="review__quantity">Товары в заказе:</p>
                            <p><?php echo esc_html($products); ?></p>
                        </div>
                    </article>
                <?php endwhile;
                wp_reset_postdata();
            else: ?>
                <p>Пока нет отзывов.</p>
            <?php endif; ?>
        </div>
    </div>
</section>