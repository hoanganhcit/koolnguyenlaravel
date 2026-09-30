@extends('FE.layouts.app')

@section('title', 'Kool Nguyen - Photography / Visual stories')
@section('description', 'Kool Nguyen photography, visual stories and selected works.')

@section('content')
    <!-- Hero -->
    <header class="hero jarallax" data-image="{{ asset('public/FE/img/hero-image6.png') }}">
        <div class="container">
            <div class="hero__caption" data-start="opacity:1; transform[swing]:translateY(0px)"
                data-500-start="opacity:0; transform[swing]:translateY(-100px)">
                <div class="hero__row">
                    <h6 class="title__h6 title__overhead" data-i18n="hero.overhead">a personal approach to photography</h6>
                    <h1 class="title__h1 hero__title hero__title_line" data-i18n="hero.title">Finding meaning<br />in
                        ordinary moments.</h1>
                    <p class="hero__description" data-i18n="hero.description">I photograph quiet stories, natural light, and
                        the details that often go unseen. Start with the way I see the world.</p>
                    <a class="btn hero__btn" href="#pricing" data-i18n="hero.cta">Booking Now</a>
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
    <section class="section" id="pricing">
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
                @php($pricingImages = ['image_pricing_01.jpg', 'image_pricing_02.jpg', 'image_pricing_03.jpg', 'image_pricing_05.jpg'])
                @forelse ($categories as $category)
                    <div class="swiper-slide pricing-grid__item pricing-grid__item_{{ ($loop->index % 4) + 1 }}"
                        style="background-image: url({{ $category->image ? asset('public/storage/' . $category->image) : asset('public/FE/img/' . $pricingImages[$loop->index % 4]) }})">
                        <h4 class="title__h4">{{ $category->name }}</h4>
                        <p class="pricing-description">{{ $category->description ?: 'Photography service' }}</p>
                        @if (!empty($category->features))
                            <ul class="pricing-features">
                                @foreach ($category->features as $feature)
                                    <li>{{ $feature }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <footer class="pricing-footer">
                            <div class="price {{ $category->price ? '' : 'price_small' }}">
                                {{ $category->price ? '$' . number_format($category->price, 2) : 'Contact' }}
                            </div>
                            <button type="button" class="btn-link btn-link_right" data-booking-open
                                data-booking-category-id="{{ $category->id }}"
                                data-booking-package="{{ $category->name }}"
                                data-booking-price="{{ $category->price ? '$' . number_format($category->price, 2) : 'Contact for pricing' }}">Booking</button>
                        </footer>
                    </div>
                @empty
                    <p class="col-12">Chưa có danh mục chụp hình nào.</p>
                @endforelse
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

    <div class="popup popup-overlay booking-popup" data-booking-popup aria-hidden="true">
        <button type="button" class="popup__btn-close" data-booking-close aria-label="Close booking form">Close</button>
        <div class="popup-inner">
            <div class="booking-popup__content">
                <h2 class="title__section title__h1">Book a shoot.</h2>
                <p class="section__subtitle">Tell me about your project and preferred date.</p>
                <p class="booking-popup__package">Selected package: <strong data-booking-package-label></strong> · <strong data-booking-price-label></strong></p>
                <div class="flash flash--success" data-booking-success hidden></div>
                <div class="flash flash--error" data-booking-error hidden></div>
                <form method="POST" action="{{ route('booking.store') }}" data-booking-form>
                    @csrf
                    <input type="hidden" name="category_id" data-booking-category-id-input>
                    <input type="hidden" name="package" data-booking-package-input>
                    <div class="booking-popup__fields">
                        <input type="text" name="name" placeholder="Name *" required>
                        <input type="email" name="email" placeholder="Email *" required>
                        <input type="tel" name="phone" placeholder="Phone *" required>
                        <input type="date" name="date" min="{{ now()->format('Y-m-d') }}" required aria-label="Preferred booking date">
                    </div>
                    <textarea name="message" rows="3" placeholder="Tell me about your project..."></textarea>
                    <button type="submit" class="btn booking-submit" data-booking-submit>
                        <span class="booking-submit__spinner" data-booking-spinner aria-hidden="true"></span>
                        <span>Send booking request</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <style>
        .booking-submit {
            align-items: center;
            display: inline-flex;
            gap: 10px;
            justify-content: center;
        }

        .booking-submit__spinner {
            animation: booking-spin .8s linear infinite;
            border: 2px solid rgba(255, 255, 255, .35);
            border-radius: 50%;
            border-top-color: #fff;
            display: none;
            height: 14px;
            width: 14px;
        }

        .booking-submit.is-loading .booking-submit__spinner {
            display: inline-block;
        }

        @keyframes booking-spin {
            to { transform: rotate(360deg); }
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('public/FE/js/booking.js') }}"></script>
@endpush
