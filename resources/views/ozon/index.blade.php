@extends('layouts.main')

@section('content')

    <style>
        html {
            scroll-behavior: smooth; /* свойство scroll-behavior не наследуется, применяется к прокручиваемым блокам */
        }
    </style>
    <div class="breadcrumbs-custom bg-image" style="background-image: url({{ asset('images/Frame_117.jpg') }});">
        <div class="container breadcrumbs-custom-container">
            <div class="breadcrumbs-custom-inner">
                <div class="breadcrumbs-custom-item">
                    <h1 class="text-white breadcrumbs-custom-title">Ozon</h1>
                    <p style="color: white;">Миллионы товаров теперь доступны и для жителей ЛНР. Стоимость наших услуг составляет 10% от суммы вашего заказа.</p>
                    <a style="font-size: 14px;" class="button-order-ozon button button-lg button-primary button-primary-ozon-1" href="#get">👻 Получить товар</a>
                    <a style="font-size: 14px;" target="_blank" class="button-order-ozon button button-lg button-primary button-primary-ozon-2" href="https://www.ozon.ru/">🥑 Сделать заказ</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonials-->

    <section class="section section-lg bg-default text-center">
        <div class="container">
            <h2 class="h2-seti">Как заказать</h2>
            <div class="offset-top-2">
                <!-- Owl Carousel-->
                <div class="owl-carousel" data-items="1" data-lg-items="2" data-xl-items="3" data-dots="true" data-nav="false" data-stage-padding="0" data-loop="false" data-margin="30" data-mouse-drag="false">
                    <blockquote class="quote-classic">
                        <div class="quote-classic-avatar-outer"><img class="quote-classic-avatar" src="{{ asset('images/Frame-ozon.jpg') }}" alt="" width="68" height="68"/>
                        </div>
                        <div class="quote-classic-main">
                            <p style="color: #005bff" class="heading-5 quote-classic-cite">Оформите заказ</p>
                            <div class="quote-classic-text">
                                <q>Пройдите простую регистрацию и офорамите самостоятельно заказ на <a href="https://www.ozon.ru/">Ozon</a>.</q>
                            </div>
                        </div>
                    </blockquote>
                    <blockquote class="quote-classic">
                        <div class="quote-classic-avatar-outer"><img class="quote-classic-avatar" src="{{ asset('images/Frame-ozon-1.jpg') }}" alt="" width="68" height="68"/>
                        </div>
                        <div class="quote-classic-main">
                            <p style="color: #005bff" class="heading-5 quote-classic-cite">Пункт доставки</p>
                            <div class="quote-classic-text">
                                <q>Выберите доставку в пункт выдачи по адресу: г. Ростов-на-Дону, пр-т. Шолохова, д. 211/2</q>
                            </div>
                        </div>
                    </blockquote>
                    <blockquote class="quote-classic">
                        <div class="quote-classic-avatar-outer"><img class="quote-classic-avatar" src="{{ asset('images/Frame-ozon-3.jpg') }}" alt="" width="68" height="68"/>
                        </div>
                        <div class="quote-classic-main">
                            <p style="color: #005bff" class="heading-5 quote-classic-cite">Ваши данные</p>
                            <div class="quote-classic-text">
                                <q>Укажите при оформление заказа свои ФИО и номер телефона в формате +7(949)ХХХ ХХ ХХ</q>
                            </div>
                        </div>
                    </blockquote>
                </div>
            </div>
            <div class="offset-top-2">
                <!-- Owl Carousel-->
                <div class="owl-carousel" data-items="1" data-lg-items="2" data-xl-items="3" data-dots="true" data-nav="false" data-stage-padding="0" data-loop="false" data-margin="30" data-mouse-drag="false">
                    <blockquote class="quote-classic">
                        <div class="quote-classic-avatar-outer"><img class="quote-classic-avatar" src="{{ asset('images/Frame-ozon-4.jpg') }}" alt="" width="68" height="68"/>
                        </div>
                        <div class="quote-classic-main">
                            <p style="color: #005bff" class="heading-5 quote-classic-cite">Следите за заказом</p>
                            <div class="quote-classic-text">
                                <q>Отслеживайте статус своего заказа в своем личном кабинете на Ozon и ожидайте когда его доставят.
                                </q>
                            </div>
                        </div>
                    </blockquote>
                    <blockquote class="quote-classic">
                        <div class="quote-classic-avatar-outer"><img class="quote-classic-avatar" src="{{ asset('images/Frame-ozon-5.jpg') }}" alt="" width="68" height="68"/>
                        </div>
                        <div class="quote-classic-main">
                            <p style="color: #005bff" class="heading-5 quote-classic-cite">Заполнение формы</p>
                            <div class="quote-classic-text">
                                <q>Заполните форму, которая находится ниже и ожидайте когда ваш заказ доставят в Луганск.
                                </q>
                            </div>
                        </div>
                    </blockquote>
                    <blockquote class="quote-classic">
                        <div class="quote-classic-avatar-outer"><img class="quote-classic-avatar" src="{{ asset('images/Frame-ozon-6.jpg') }}" alt="" width="68" height="68"/>
                        </div>
                        <div class="quote-classic-main">
                            <p style="color: #005bff" class="heading-5 quote-classic-cite">Заберите заказ</p>
                            <div class="quote-classic-text">
                                <q>Прийдите в наш офис по адресу ул. Ваываываывывфы, 7 с номером заказа и получите ваш заказ.
                                </q>
                            </div>
                        </div>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-lg bg-gray-100 bg-image bg-image-1" style="background-image: url({{ asset('images/bg-image-2.jpg') }});">
        <div class="container">
            <div class="row" id="get">
                <div class="col-sm-9 col-md-8 col-lg-7 col-xl-6">
                    <h2 class="h2-seti wow fadeIn">Получить товар</h2>
                    <p class="wow fadeIn" data-wow-delay=".4s">Когда товар уже приехал в Ростов-на-Дону, заполните форму и прикрепите QR-код для получения заказа. QR-код обновляется каждые 24 часа, в случае, если вы видите. что товар не получен, а 24 часа прошло, заполните форму и прикрепите QR-код заново. Чтобы узнать, когда ваш товар пришел, подпишитесь на наш Telegram канал.</p>
                    <a class="button-order button button-lg button-primary button-raven wow fadeIn" target="_blank" data-wow-delay=".6s" href="{{ route('ozon.form') }}">👽 Заполнить форму</a>
                </div>
            </div>
        </div>
    </section>

@endsection
