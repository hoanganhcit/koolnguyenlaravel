@extends('FE.layouts.app')

@section('title', 'Kool Nguyen - Photography / Visual stories')
@section('description', 'Kool Nguyen photography, visual stories and selected works.')

@section('content')
    <!-- Hero -->
    <header class="hero jarallax" data-image="{{ asset('public/FE/img/hero-image6.jpg') }}">
        <div class="container">
            <div class="hero__caption" data-start="opacity:1; transform[swing]:translateY(0px)"
                data-500-start="opacity:0; transform[swing]:translateY(-100px)">
                <div class="hero__row">
                    <h6 class="title__h6 title__overhead" data-i18n="hero.overhead">a personal approach to photography</h6>
                    <h1 class="title__h1 hero__title hero__title_line" data-i18n="hero.title">Finding meaning<br />in
                        ordinary moments.</h1>
                    <p class="hero__description" data-i18n="hero.description">I photograph quiet stories, natural light, and
                        the details that often go unseen. Start with the way I see the world.</p>
                    <a class="btn hero__btn" href="#hello" data-i18n="hero.cta">Meet my perspective</a>
                </div>
            </div>
        </div>
        <div class="hero__social animated slideInUp">
            <a class="link_decoration" href="#facebook">Facebook</a>
            <a class="link_decoration" href="#twitter">Twitter</a>
            <a class="link_decoration" href="#instagram">Instagram</a>
        </div>
    </header>
    <!-- /Hero -->

    <!-- Hello -->
    <section class="section section__hello section_no-space-bottom" id="hello">
        <div class="container">
            <div class="box-image">
                <div class="reveal">
                    <img src="{{ asset('public/FE/img/hello-image3.jpg') }}" alt="Hello!">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 col__quote text-center" data-bottom="transform[swing]:translateY(0px)"
                    data--400-top="transform[swing]:translateY(-100px)">
                    <h2 class="title__section title__h1 title_decoration title_vertical-line-top" data-i18n="hello.title">
                        Hello.</h2>
                    <blockquote class="block-quote block-quote__about">
                        <p data-i18n="hello.quote">I believe photography is not simply about capturing an image. It is about
                            observing life,
                            finding meaning in ordinary moments, and preserving what is often unseen. I am drawn to
                            simplicity, natural light, and honest emotions. For me, the most beautiful photographs are
                            the ones that feel effortless, yet remain meaningful over time.</p>
                        — <cite>Kool Nguyen</cite>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="text-decoration" data-100-start="transform[swing]:translateY(100px)"
            data--800-top="transform[swing]:translateY(-100px)">About Us</div>
    </section>
    <!-- /Hello -->

    <!-- My Works -->
    <x-works-gallery :projects="$projects" :categories="$categories" :limit="8" :show-explore="true" />
    <!-- /My Works -->

    <!-- Statistics -->
    <section class="section section-counters text-center">
        <div class="container">
            <div class="row os">
                <div class="col-12 col-md-4">
                    <div class="counter">
                        <div class="counter__date title_decoration">20+</div>
                        <div class="counter__name" data-i18n="stats.clients">Projects</div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="counter">
                        <div class="counter__date title_decoration">4000+</div>
                        <div class="counter__name" data-i18n="stats.photos">Photos</div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="counter counter_last-child">
                        <div class="counter__date title_decoration">500+</div>
                        <div class="counter__name" data-i18n="stats.albums">Albums</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Statistics -->

    <!-- Testimonials -->
    <section class="section  section_top-space-230">
        <div class="container">
            <div class="row">
                <div class="col section__header-wrap">
                    <h2 class="title__section title__h1 title_center"><span class="reveal reveal_gray"
                            data-i18n="testimonials.title">Testimonials.</span></h2>
                </div>
            </div>
        </div>

        <div class="client-carousel swiper-container">
            <div class="swiper-wrapper">
                <!-- Item -->
                <div class="swiper-slide client-carousel-item">
                    <div class="item__block-number">
                        <span>01.</span>
                    </div>
                    <div class="item__block-author">
                        <div class="item__block-image">
                            <img src="{{ asset('public/FE/img/client_image_01.jpg') }}" alt="Alison Cooper">
                        </div>
                        <div class="item__block-name">
                            <h3 class="client__name">Alison <strong>Cooper</strong></h3>
                            <h4 class="cleint__organization">LEX Сompany</h4>
                        </div>
                    </div>
                    <div class="item__block-description">
                        <p data-i18n="testimonials.one">For me design — is a quality of life. Good design has little to do
                            with trends. Tired of
                            listening to him trying to give a frivolous status of a fashion phenomenon. In my opinion,
                            the designer should strive to do something more than individual things.</p>
                    </div>
                </div>
                <!-- /Item -->

                <!-- Item -->
                <div class="swiper-slide client-carousel-item">
                    <div class="item__block-author">
                        <div class="item__block-number">
                            <span>02.</span>
                        </div>
                        <div class="item__block-image">
                            <img src="{{ asset('public/FE/img/client_image_02.jpg') }}" alt="Alison Cooper">
                        </div>
                        <div class="item__block-name">
                            <h3 class="client__name">Cristian <strong>Newman</strong></h3>
                            <h4 class="cleint__organization">Flex Production</h4>
                        </div>
                    </div>
                    <div class="item__block-description">
                        <p data-i18n="testimonials.two">For me design — is a quality of life. Good design has little to do
                            with trends. Tired of
                            listening to him trying to give a frivolous status of a fashion phenomenon. In my opinion,
                            the designer should strive to do something more than individual things.</p>
                    </div>
                </div>
                <!-- /Item -->

                <!-- Item -->
                <div class="swiper-slide client-carousel-item">
                    <div class="item__block-number">
                        <span>03.</span>
                    </div>
                    <div class="item__block-author">
                        <div class="item__block-image">
                            <img src="{{ asset('public/FE/img/client_image_03.jpg') }}" alt="Alison Cooper">
                        </div>
                        <div class="item__block-name">
                            <h3 class="client__name">Jennifer <strong>Pallian</strong></h3>
                            <h4 class="cleint__organization">ONE Plus Agency</h4>
                        </div>
                    </div>
                    <div class="item__block-description">
                        <p data-i18n="testimonials.three">I like people with a sophisticated mind and at the same time
                            simple in communication. These
                            qualities can be combined quite naturally. However, objects, like people, look pathetic if
                            these properties are connected in them artificially.</p>
                    </div>
                </div>
                <!-- /Item -->
            </div>

            <!-- Control -->
            <div class="swiper-control">
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next" data-i18n="common.next">NEXT</div>
                <div class="swiper-button-prev" data-i18n="common.prev">PREV</div>
            </div>
        </div>
    </section>
    <!-- /Testimonials -->

    <!-- Pricing -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col section__header-wrap">
                    <h2 class="title__section title__h1 title_horizontal-line"><span class="reveal reveal_gray"
                            data-i18n="pricing.title">Pricing.</span></h2>
                    <p class="section__subtitle" data-i18n="pricing.subtitle">The photo leaves open moments, which
                        immediately overlap with the
                        pressure of time.</p>
                </div>
            </div>
        </div>

        <div class="pricing-grid swiper-container">
            <div class="swiper-wrapper">
                <!-- Item -->
                <div class="swiper-slide pricing-grid__item pricing-grid__item_one"
                    style="background-image: url({{ asset('public/FE/img/image_pricing_01.jpg') }})">
                    <h4 class="title__h4" data-i18n="pricing.model">Model Photography.</h4>
                    <div class="pricing-options">
                        <div class="pricing-options__name" data-i18n="pricing.photos">Photos</div>
                        <div class="pricing-options__included" data-i18n="pricing.package50">Package of 50</div>
                    </div>
                    <div class="pricing-options">
                        <div class="pricing-options__name" data-i18n="pricing.processing">Processing</div>
                        <div class="pricing-options__included" data-i18n="pricing.retouch">Retouch</div>
                    </div>
                    <div class="pricing-options">
                        <div class="pricing-options__name" data-i18n="pricing.camera">Type of camera</div>
                        <div class="pricing-options__included" data-i18n="pricing.semiProfessional">Semi-professional
                        </div>
                    </div>
                    <div class="pricing-options">
                        <div class="pricing-options__name" data-i18n="pricing.resolution">Resolution</div>
                        <div class="pricing-options__included">12 MP</div>
                    </div>
                    <div class="pricing-options">
                        <div class="pricing-options__name" data-i18n="pricing.term">Term</div>
                        <div class="pricing-options__included" data-i18n="pricing.14days">14 days</div>
                    </div>
                    <footer class="pricing-footer">
                        <div class="price">$39</div>
                        <a href="#price" class="btn-link btn-link_right" data-i18n="pricing.explore">Explore</a>
                    </footer>
                </div>
                <!-- /Item -->

                <!-- Item -->
                <div class="swiper-slide pricing-grid__item pricing-grid__item_two"
                    style="background-image: url({{ asset('public/FE/img/image_pricing_02.jpg') }})">
                    <h4 class="title__h4" data-i18n="pricing.events">Photography of events.</h4>
                    <div class="pricing-options">
                        <div class="pricing-options__name" data-i18n="pricing.photos">Photos</div>
                        <div class="pricing-options__included" data-i18n="pricing.package150">Package of 150</div>
                    </div>
                    <div class="pricing-options">
                        <div class="pricing-options__name" data-i18n="pricing.processing">Processing</div>
                        <div class="pricing-options__included" data-i18n="pricing.correction">Correction</div>
                    </div>
                    <div class="pricing-options">
                        <div class="pricing-options__name" data-i18n="pricing.camera">Type of camera</div>
                        <div class="pricing-options__included" data-i18n="pricing.semiProfessional">Semi-professional
                        </div>
                    </div>
                    <div class="pricing-options">
                        <div class="pricing-options__name" data-i18n="pricing.resolution">Resolution</div>
                        <div class="pricing-options__included">32 MP</div>
                    </div>
                    <div class="pricing-options">
                        <div class="pricing-options__name" data-i18n="pricing.term">Term</div>
                        <div class="pricing-options__included" data-i18n="pricing.14to21days">14 - 21 days</div>
                    </div>
                    <footer class="pricing-footer">
                        <div class="price">$59</div>
                        <a href="#price" class="btn-link btn-link_right" data-i18n="pricing.explore">Explore</a>
                    </footer>
                </div>
                <!-- /Item -->

                <!-- Item -->
                <div class="swiper-slide pricing-grid__item pricing-grid__item_three"
                    style="background-image: url({{ asset('public/FE/img/image_pricing_03.jpg') }})">
                    <h4 class="title__h4" data-i18n="pricing.corporate">Corporate photography.</h4>
                    <div class="pricing-options">
                        <div class="pricing-options__name" data-i18n="pricing.photos">Photos</div>
                        <div class="pricing-options__included" data-i18n="pricing.package500">Package of 500</div>
                    </div>
                    <div class="pricing-options">
                        <div class="pricing-options__name" data-i18n="pricing.processing">Processing</div>
                        <div class="pricing-options__included" data-i18n="pricing.correctionRetouch">Correction, Retouch
                        </div>
                    </div>
                    <div class="pricing-options">
                        <div class="pricing-options__name" data-i18n="pricing.camera">Type of camera</div>
                        <div class="pricing-options__included" data-i18n="pricing.professional">Professional</div>
                    </div>
                    <div class="pricing-options">
                        <div class="pricing-options__name" data-i18n="pricing.resolution">Resolution</div>
                        <div class="pricing-options__included">48 MP</div>
                    </div>
                    <div class="pricing-options">
                        <div class="pricing-options__name" data-i18n="pricing.term">Term</div>
                        <div class="pricing-options__included" data-i18n="pricing.30days">30 days</div>
                    </div>
                    <footer class="pricing-footer">
                        <div class="price">$99</div>
                        <a href="#price" class="btn-link btn-link_right" data-i18n="pricing.explore">Explore</a>
                    </footer>
                </div>
                <!-- /Item -->

                <!-- Item -->
                <div class="swiper-slide pricing-grid__item pricing-grid__item_four"
                    style="background-image: url({{ asset('public/FE/img/image_pricing_05.jpg') }})">
                    <h4 class="title__h4" data-i18n="pricing.movies">Photography for movies.</h4>
                    <div class="pricing-options">
                        <div class="pricing-options__name" data-i18n="pricing.photos">Photos</div>
                        <div class="pricing-options__included" data-i18n="pricing.unlimited">Unlimited</div>
                    </div>
                    <div class="pricing-options">
                        <div class="pricing-options__name" data-i18n="pricing.processing">Processing</div>
                        <div class="pricing-options__included" data-i18n="pricing.allInstallation">All types of
                            installation</div>
                    </div>
                    <div class="pricing-options">
                        <div class="pricing-options__name" data-i18n="pricing.camera">Type of camera</div>
                        <div class="pricing-options__included" data-i18n="pricing.professional">Professional</div>
                    </div>
                    <div class="pricing-options">
                        <div class="pricing-options__name" data-i18n="pricing.resolution">Resolution</div>
                        <div class="pricing-options__included">68 MP</div>
                    </div>
                    <div class="pricing-options">
                        <div class="pricing-options__name" data-i18n="pricing.term">Term</div>
                        <div class="pricing-options__included" data-i18n="pricing.individual">Individual</div>
                    </div>
                    <footer class="pricing-footer">
                        <div class="price price_small" data-i18n="pricing.individual">Individual</div>
                        <a href="#price" class="btn-link btn-link_right" data-i18n="pricing.explore">Explore</a>
                    </footer>
                </div>
                <!-- /Item -->
            </div>

            <!-- Control -->
            <div class="swiper-control">
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next">NEXT</div>
                <div class="swiper-button-prev">PREV</div>
            </div>
        </div>
    </section>
    <!-- /Pricing -->

@endsection
