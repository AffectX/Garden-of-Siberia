<?php get_header(); ?>
    <main class="content">
      <section class="hero container" aria-labelledby="hero-title">
        <div class="hero__inner ">
          <div class="hero__body ">
            <h1 class="hero__title" id="hero-title">Райский сад Сибири <br>Растения, грунты и всё для ухода</h1>
            <div class="hero__description">
              <p>Цветы, кустарники, деревья, садовый инвентарь и грунты — всё в одном месте. Выращиваем, консультируем и доставляем по Иркутской области.</p>
            </div>
            <div class="hero__body-actions">
              <a class="button hero__button" href="/catalog"><span class="button__label">Каталог</span></a>
              <a class="button hero__button" href="/"><span class="button__label">Получить консультацию</span></a>
            </div>
          </div>
          <div class="hero__images hidden-mobile ">
            <img srcset="/assets/images/Logo-360x241.jpg 360w, /assets/images/Logo-400x268.jpg 400w, /assets/images/Logo-640x429.jpg 640w, /assets/images/Logo-800x536.jpg 800w, /assets/images/Logo-1024x686.jpg 1024w, /assets/images/Logo-1280x858.jpg 1280w, /assets/images/Logo-1440x965.jpg 1440w, /assets/images/Logo-1536x1024.jpg 1536w" src="/assets/images/Logo-1536x1024.jpg" sizes="(min-width: 1536px) 1536px, 100vw" width="1536" height="1024" alt decoding="async" loading="lazy" class="hero__image">
          </div>
        </div>
      </section>
      <section class="section container popular" aria-labelledby="popular-title">
        <header class="section__header">
          <div class="section__info">
            <h2 class="section__title " id="popular-title">Популярные товары</h2>
            <div class="section__description">
              <p>Самые востребованные растения и товары, которые выбирают наши покупатели</p>
            </div>
          </div>
          <div class="section__actions hidden-mobile">
            <div>
              <a class="button popular__button" href="/catalog"><span class="button__label">Смотреть товары</span></a>
            </div>
          </div>
        </header>
        <div class="section__body">
          <ul class="grid grid--3">
            <li class="grid__item">
              <article class="card">
                <div class="card__images">
                  <img srcset="/assets/images/2-300x168.jpg 300w" src="/assets/images/2-300x168.jpg" sizes="(min-width: 300px) 300px, 100vw" width="300" height="168" alt="Эдельвейс альпийский" decoding="async" loading="lazy" class="card__image">
                </div>
                <div class="card__body">
                  <h3 class="card__title">Эдельвейс альпийский</h3>
                  <div class="card__info">
                    <div class="card__description">
                      <p>Это всемирно известный, очень редкий и охраняемый цветок</p>
                    </div>
                  </div>
                </div>
                <div class="card__actions">
                  <a class="button card__button" href="/"><span class="button__label">Оформить заказ</span></a>
                  <div class="card__price">
                    <p>2000 рублей</p>
                  </div>
                </div>
              </article>
            </li>
            <li class="grid__item">
              <article class="card">
                <div class="card__images">
                  <img srcset="/assets/images/2-300x168.jpg 300w" src="/assets/images/2-300x168.jpg" sizes="(min-width: 300px) 300px, 100vw" width="300" height="168" alt="Китайская роза" decoding="async" loading="lazy" class="card__image">
                </div>
                <div class="card__body">
                  <h3 class="card__title">Китайская роза</h3>
                  <div class="card__info">
                    <div class="card__description">
                      <p>Это всемирно известный, очень редкий и охраняемый цветок</p>
                    </div>
                  </div>
                </div>
                <div class="card__actions">
                  <a class="button card__button" href="/"><span class="button__label">Оформить заказ</span></a>
                  <div class="card__price">
                    <p>1500 рублей</p>
                  </div>
                </div>
              </article>
            </li>
            <li class="grid__item">
              <article class="card">
                <div class="card__images">
                  <img srcset="/assets/images/2-300x168.jpg 300w" src="/assets/images/2-300x168.jpg" sizes="(min-width: 300px) 300px, 100vw" width="300" height="168" alt="Флокс шиловидный" decoding="async" loading="lazy" class="card__image">
                </div>
                <div class="card__body">
                  <h3 class="card__title">Флокс шиловидный</h3>
                  <div class="card__info">
                    <div class="card__description">
                      <p>Это всемирно известный, очень редкий и охраняемый цветок</p>
                    </div>
                  </div>
                </div>
                <div class="card__actions">
                  <a class="button card__button" href="/"><span class="button__label">Оформить заказ</span></a>
                  <div class="card__price">
                    <p>1800 рублей</p>
                  </div>
                </div>
              </article>
            </li>
          </ul>
        </div>
      </section>
      <section class="section container delivery" aria-labelledby="delivery-title">
        <header class="section__header">
          <div class="section__info">
            <h2 class="section__title " id="delivery-title">Как оформить доставку</h2>
          </div>
        </header>
        <div class="section__body">
          <ol class="instructions-group instructions-group--2-columns instructions-group--has-counter">
            <li class="instructions-group__item">
              <div class="instructions-group__info">
                <div class="instructions-group__item-title">Напишите нам в личные сообщения</div>
              </div>
            </li>
            <li class="instructions-group__item">
              <div class="instructions-group__info">
                <div class="instructions-group__item-title">Укажите данные для оформления заказа</div>
              </div>
            </li>
            <li class="instructions-group__item">
              <div class="instructions-group__info">
                <div class="instructions-group__item-title">Подтверждение</div>
                <div class="instructions-group__item-description">
                  <p>Мы свяжемся с вами, уточним детали и рассчитаем стоимость и отправим реквизиты для оплаты.</p>
                </div>
              </div>
            </li>
            <li class="instructions-group__item">
              <div class="instructions-group__info">
                <div class="instructions-group__item-title">Доставка</div>
                <div class="instructions-group__item-description">
                  <p>Отправляем заказы по Иркутску и Иркутской области. Упаковываем растения бережно, чтобы они прибыли свежими и целыми. </p>
                </div>
              </div>
            </li>
            <li class="instructions-group__item">
              <div class="instructions-group__info">
                <div class="instructions-group__item-title">Получение</div>
                <div class="instructions-group__item-description">
                  <p>При самовывозе — забираете заказ в удобное для вас время. При доставке — отслеживаете посылку по трек-номеру, который мы отправим. </p>
                </div>
              </div>
            </li>
            <li class="instructions-group__item">
              <div class="instructions-group__info">
                <div class="instructions-group__item-title">Готовы оформить заказ?</div>
                <div class="instructions-group__item-description">
                  <p>Напишите нам прямо сейчас — подберем растения и подскажем оптимальный способ доставки.</p>
                </div>
              </div>
            </li>
          </ol>
        </div>
      </section>
      <section class="section container questions" aria-labelledby="questions-title">
        <header class="section__header">
          <div class="section__info">
            <h2 class="section__title " id="questions-title">Частые вопросы</h2>
            <div class="section__description">
              <p>Мы собрали ответы на самые распространенные вопросы наших клиентов. Если не нашли нужный ответ — напишите нам, мы всегда на связи</p>
            </div>
          </div>
        </header>
        <div class="section__body">
          <ol class="accordion-group accordion-group--has-counter">
            <li class="accordion-group__item">
              <div class="accordion">
                <details class="accordion__details" name="questions" open="">
                  <summary class="accordion__summary">
                    <h3 class="accordion__title h4"><span role="term" aria-details="question-0">Как оформить заказ?</span></h3>
                  </summary>
                </details>
                <div class="accordion__content" id="question-0" role="definition">
                  <div class="accordion__content-inner">
                    <div class="accordion__content-body">
                      <p>Напишите нам в личные сообщения в Telegram или WhatsApp. Укажите ФИО, телефон, способ получения, адрес (если доставка), сорт и количество.</p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="accordion-group__item">
              <div class="accordion">
                <details class="accordion__details" name="questions">
                  <summary class="accordion__summary">
                    <h3 class="accordion__title h4"><span role="term" aria-details="question-1">Как оформить заказ?</span></h3>
                  </summary>
                </details>
                <div class="accordion__content" id="question-1" role="definition">
                  <div class="accordion__content-inner">
                    <div class="accordion__content-body">
                      <p>Напишите нам в личные сообщения в Telegram или WhatsApp. Укажите ФИО, телефон, способ получения, адрес (если доставка), сорт и количество.</p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="accordion-group__item">
              <div class="accordion">
                <details class="accordion__details" name="questions">
                  <summary class="accordion__summary">
                    <h3 class="accordion__title h4"><span role="term" aria-details="question-2">Как оформить заказ?</span></h3>
                  </summary>
                </details>
                <div class="accordion__content" id="question-2" role="definition">
                  <div class="accordion__content-inner">
                    <div class="accordion__content-body">
                      <p>Напишите нам в личные сообщения в Telegram или WhatsApp. Укажите ФИО, телефон, способ получения, адрес (если доставка), сорт и количество.</p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="accordion-group__item">
              <div class="accordion">
                <details class="accordion__details" name="questions">
                  <summary class="accordion__summary">
                    <h3 class="accordion__title h4"><span role="term" aria-details="question-3">Как оформить заказ?</span></h3>
                  </summary>
                </details>
                <div class="accordion__content" id="question-3" role="definition">
                  <div class="accordion__content-inner">
                    <div class="accordion__content-body">
                      <p>Напишите нам в личные сообщения в Telegram или WhatsApp. Укажите ФИО, телефон, способ получения, адрес (если доставка), сорт и количество.</p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="accordion-group__item">
              <div class="accordion">
                <details class="accordion__details" name="questions">
                  <summary class="accordion__summary">
                    <h3 class="accordion__title h4"><span role="term" aria-details="question-4">Как оформить заказ?</span></h3>
                  </summary>
                </details>
                <div class="accordion__content" id="question-4" role="definition">
                  <div class="accordion__content-inner">
                    <div class="accordion__content-body">
                      <p>Напишите нам в личные сообщения в Telegram или WhatsApp. Укажите ФИО, телефон, способ получения, адрес (если доставка), сорт и количество.</p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="accordion-group__item">
              <div class="accordion">
                <details class="accordion__details" name="questions">
                  <summary class="accordion__summary">
                    <h3 class="accordion__title h4"><span role="term" aria-details="question-5">Как оформить заказ?</span></h3>
                  </summary>
                </details>
                <div class="accordion__content" id="question-5" role="definition">
                  <div class="accordion__content-inner">
                    <div class="accordion__content-body">
                      <p>Напишите нам в личные сообщения в Telegram или WhatsApp. Укажите ФИО, телефон, способ получения, адрес (если доставка), сорт и количество.</p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ol>
        </div>
      </section>
      <section class="banner">
        <div class="banner__inner container">
          <h2 class="banner__title">Не нашли ответ на свой вопрос?</h2>
          <div class="banner__description">
            <p>Напишите нам - с радостью подскажем и поможем оформить заказ</p>
          </div>
          <a class="button banner__button button--red" href="/" target="_blank"><span class="button__label">Задать вопрос в Telegram</span></a>
        </div>
      </section>
      <section class="section container reviews" aria-labelledby="reviews-title">
        <header class="section__header">
          <div class="section__info">
            <h2 class="section__title " id="reviews-title">Отзывы наших покупателей</h2>
            <div class="section__description">
              <p>Нам приятно получать отзывы от клиентов.Благодарим вас за ваш выбор и доверие. </p>
            </div>
          </div>
        </header>
        <div class="section__body">
          <div class="reviews-group">
            <article class="review">
              <header class="review__header">
                <h3 class="review__author h3">Юрий</h3>
              </header>
              <div class="review__content">
                <p>Хочу выразить огромную благодарность команде! Заказывала букет для мамы на юбилей, находясь в другом городе. Очень переживала за свежесть и доставку. Но все прошло просто идеально!</p>
              </div>
              <div class="review__product">
                <p class="review__quantity">Товары в заказе:</p>
                <p>Букет роз</p>
              </div>
            </article>
            <article class="review">
              <header class="review__header">
                <h3 class="review__author h3">Евгений</h3>
              </header>
              <div class="review__content">
                <p>Хочу выразить огромную благодарность команде! Заказывала букет для мамы на юбилей, находясь в другом городе. Очень переживала за свежесть и доставку. Но все прошло просто идеально!</p>
              </div>
              <div class="review__product">
                <p class="review__quantity">Товары в заказе:</p>
                <p>Букет роз</p>
              </div>
            </article>
            <article class="review">
              <header class="review__header">
                <h3 class="review__author h3">Елена</h3>
              </header>
              <div class="review__content">
                <p>Хочу выразить огромную благодарность команде! Заказывала букет для мамы на юбилей, находясь в другом городе. Очень переживала за свежесть и доставку. Но все прошло просто идеально!</p>
              </div>
              <div class="review__product">
                <p class="review__quantity">Товары в заказе:</p>
                <p>Букет роз</p>
              </div>
            </article>
          </div>
        </div>
      </section>
      <section class="banner">
        <div class="banner__inner container">
          <h2 class="banner__title">Свяжитесь с нами</h2>
          <div class="banner__description">
            <p>Поможем выбрать растения и ответим на любые вопросы</p>
          </div>
          <a class="button banner__button button--red" href="https://t.me/Rayssad" target="_blank"><span class="button__label">Telegram-сообщество</span></a>
        </div>
      </section>
    </main>
   
<?php get_footer(); ?>