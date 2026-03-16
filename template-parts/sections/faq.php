 <section class="section container questions" aria-labelledby="questions-title">
        <header class="section__header">
         <div class="section__info">
          <h2 class="section__title" id="questions-title">Частые вопросы</h2>
          <div class="section__description">
            <p>Мы собрали ответы на самые распространенные вопросы наших клиентов.</p>
          </div>
        </div>
      </header>
        <div class="section__body">
          <?php
          $faq_query = new WP_Query([
              'post_type' => 'faq',
              'posts_per_page' => -1,
              'orderby' => 'menu_order',
              'order' => 'ASC'
          ]);

          if ($faq_query->have_posts()) :
          ?>
            <ol class="accordion-group accordion-group--has-counter">
              <?php $i = 0; while ($faq_query->have_posts()) : $faq_query->the_post(); ?>
                <li class="accordion-group__item">
                  <div class="accordion">
                    <details class="accordion__details" name="questions">
                      <summary class="accordion__summary">
                        <h3 class="accordion__title h4">
                          <span role="term" aria-details="question-<?php echo $i; ?>">
                            <?php the_title(); ?>
                          </span>
                        </h3>
                      </summary>
                    </details>

                    <div class="accordion__content" id="question-<?php echo $i; ?>" role="definition">
                      <div class="accordion__content-inner">
                        <div class="accordion__content-body">
                          <?php the_content(); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              <?php $i++; endwhile; wp_reset_postdata(); ?>
            </ol>
          <?php endif; ?>
        </div>
      </section>