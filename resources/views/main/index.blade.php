@extends('layouts.main')

@section('content')
    <!-- FScreen-->
    <section class="section parallax-container section-xl bg-gray-900" data-parallax-img="{{ asset('images/bg-image-1.jpg') }}">
        <div class="parallax-content">
            <div class="container">
                <div class="product-creative-main text-center">
                    <p class="heading-1 product-creative-title">Доставка из России/Китая в ЛНР</p>
                    <div class="product-creative-text">
                        <p class="heading-5 text-white"> У нас вы можете заказать любые разрешенные законом товары на AliExpress, Ozon, Wildberries, Яндекс маркет и другие.</p>
                    </div>
                    <a class="button-order button button-lg button-primary button-raven" href="{{ route('wildberries.index') }}">👻 Wildberries</a>
                    <a class="button-order button button-lg button-primary button-raven" href="{{ route('ozon.index') }}">🥑 Ozon</a>
                    <a class="button-order button button-lg button-primary button-raven" href="{{ route('yandex.index') }}">🦅 Yandex market</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Counters-->
    <section class="section section-md bg-default">
        <div class="container">
            <div class="row row-50">
                <div class="col-6 col-md-3 wow fadeIn">
                    <!-- Counter Modern-->
                    <article class="counter-modern">
                        <div class="icon counter-modern-icon mdi mdi-car"></div>
                        <div class="counter-modern-main"><span>{{ $completeDelivery }}</span><span></span></div>
                        <h4 class="font-weight-regular counter-modern-title">Выполенных доставок</h4>
                    </article>
                </div>
                <div class="col-6 col-md-3 wow fadeIn" data-wow-delay=".2s">
                    <!-- Counter Modern-->
                    <article class="counter-modern">
                        <div class="icon counter-modern-icon mdi mdi-account"></div>
                        <div class="counter-modern-main">
                            <div class="counter">{{ $orderCount }}</div>
                        </div>
                        <h4 class="font-weight-regular counter-modern-title">Клиентов</h4>
                    </article>
                </div>
                <div class="col-6 col-md-3 wow fadeIn" data-wow-delay=".2s">
                    <!-- Counter Modern-->
                    <article class="counter-modern">
                        <div class="icon counter-modern-icon mdi mdi-clipboard-check"></div>
                        <div class="counter-modern-main">
                            <div class="counter">24</div>
                        </div>
                        <h4 class="font-weight-regular counter-modern-title">Отзывов</h4>
                    </article>
                </div>
                <div class="col-6 col-md-3 wow fadeIn" data-wow-delay=".2s">
                    <!-- Counter Modern-->
                    <article class="counter-modern">
                        <div class="icon counter-modern-icon mdi mdi-package-variant-closed"></div>
                        <div class="counter-modern-main">
                            <div class="counter">{{ $deliveryInStock }}</div>
                        </div>
                        <h4 class="font-weight-regular counter-modern-title">Посылок на складе</h4>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- Taxi Service App-->
    <section class="section section-lg bg-gray-100 bg-image bg-image-1" style="background-image: url({{ asset('images/bg-image-2.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-8 col-lg-7 col-xl-6">
                    <h2 style="font-size: 24px;" class="h2-seti wow fadeIn">Мы в соц. сетях</h2>
                    <p style="font-size: 17px;" class="wow fadeIn" data-wow-delay=".4s">В наших соц. сетях мы побликуем самые свежие новости, от дат получения до скидок! Также в чате вы сможете заказать товары с других сайтов, такие как - DNS, Avito, Mvideo и другие.</p>
                    <a class="button-order button button-lg button-primary button-raven wow fadeIn" data-wow-delay=".6s" href="#">👽 Telegram</a>
                    <a class="button-order button button-lg button-primary button-raven wow fadeIn" data-wow-delay=".6s" href="#">👻 Vkontakte</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Advantages-->
    <section class="section section-lg text-center bg-gray-950">
        <div class="container">
            <h2 style="margin-bottom: 55px;" class="h2-seti wow fadeIn">Наши преимущества</h2>
            <div class="row row-30 justify-content-center">
                <div class="col-sm-6 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay=".2s">
                    <!-- Box Classic-->
                    <article class="box-classic"><a class="click-rec icon box-classic-icon fl-bigmug-line-map87" href="#"></a><a class="click-rec box-classic-main" href="#">
                            <h4 class="h2-seti box-classic-title">Доставка на дом</h4>
                            <p>Мы сможем доставить вашу посылку сразу же вам на дом. Стоимость - 150 рублей.</p></a></article>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay=".3s">
                    <!-- Box Classic-->
                    <article class="box-classic"><a class="click-rec icon box-classic-icon fl-bigmug-line-favourites5" href="#"></a><a class="click-rec box-classic-main" href="#">
                            <h4 class="h2-seti box-classic-title">Заказ через сайт</h4>
                            <p>Просто закажите по нашей инструкции через сайт и ожидайте.</p></a></article>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay=".4s">
                    <!-- Box Classic-->
                    <article class="box-classic"><a class="click-rec icon box-classic-icon fl-bigmug-line-shopping198" href="#"></a><a class="click-rec box-classic-main" href="#">
                            <h4 class="h2-seti box-classic-title">Низкий процент</h4>
                            <p>Процент доставки с Китая составляет - 15%, а с России - 10%.</p></a></article>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay=".5s">
                    <!-- Box Classic-->
                    <article class="box-classic"><a class="click-rec icon box-classic-icon fl-bigmug-line-headphones32" href="#"></a><a class="click-rec box-classic-main" href="#">

                            <h4 class="h2-seti box-classic-title">Поддержка</h4>
                            <p>Мы поможем в любой ситуации и подскажем вам, как и что делать..</p></a></article>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog-->
    <section class="section section-lg bg-default text-center">
        <div class="container">
            <h2 class="h2-seti wow fadeIn">Новости</h2>
            <div class="row row-40 justify-content-center">
                @foreach($posts as $post)
                    <div class="col-md-6 wow fadeIn">
                        <!-- Post Classic-->
                        <article class="post-classic"><img class="post-classic-image" src="{{ asset($post->photo) }}" alt="" style="width: 670px; height: 380px;"/></a>
                            <div class="post-classic-meta">
                                <div class="badge">Новость</div>
                                <time class="datetime-text" datetime="2019">{{ $post->created_at }} </time>
                            </div>
                            <h4 class="h2-seti font-weight-regular post-classic-title"><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h4>
                            <p class="datetime-text">{{ substr($post->content, 0, 50).'...' }}</p>
                            <a style="font-size: 15.5px;" class="h2-seti button button-link button-lg" href="{{ route('posts.show', $post->id) }}">Читать полностью...</a>
                        </article>
                    </div>
                @endforeach

            </div><a class="h2-seti button button-lg button-primary button-raven wow fadeIn mt-40" href="{{ route('posts.index') }}">🧠 Все новости</a>
        </div>
    </section>
@endsection
