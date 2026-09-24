@extends('FE.layouts.app')

@section('title', 'About Me - Kool Nguyen')
@section('description', 'The story and career milestones of Kool Nguyen.')

@section('content')
    <section class="section section-history section_no-space-bottom section_first">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9 section__header-wrap section__quote">
                    <h2 class="title title__h2 title_center title_light title_vertical-line-bottom"
                        data-i18n="about.quote">
                        Photography —is the most democratic of all arts.
                    </h2>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Item -->
            <div class="row row-flex os">
                <div class="col-sm-auto col-lg-5">
                    <div class="block-image">
                        <span class="block-image__number" data-top-bottom="transform:translate3d(0,50px,0)"
                            data-bottom-top="transform:translate3d(0,0px,0)">01.</span>
                        <div class="reveal"><img src="{{ asset('public/FE/img/image_history_01.jpg') }}"
                                alt="2015 Year"></div>
                    </div>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="col-about__describe col-about__describe_right">
                        <h6 class="title__h6 title__overhead" data-i18n="about.year2015">2015 year</h6>
                        <h2 class="title title__h2 title__section title_normal" data-i18n="about.title2015">Beginning of
                            a
                            photographer's career.</h2>
                        <p class="block-description" data-i18n="about.text2015">The world of design is ruled by
                            diversity,
                            and it's good. Another question is whether to consider a lot of pieces of furniture as
                            trash.
                            That's it is this responsibility — to create things, not junk, — lies on the designer and
                            the
                            company-manufacturer. Bad architecture is even more harmful.
                            If you make an ugly, uncomfortable and expensive chair, then it will be forgotten very
                            quickly,
                            but if you build a terrible building — it will stay for twenty years and make many
                            unhappy.</p>
                    </div>
                </div>
            </div>
            <!-- /Item -->

            <!-- Item -->
            <div class="row row-flex os">
                <div class="col-12 col-lg-7 order-2 order-lg-1">
                    <div class="col-about__describe col-about__describe_left">
                        <h6 class="title__h6 title__overhead" data-i18n="about.year2016">2016 year</h6>
                        <h2 class="title title__h2 title__section title_normal" data-i18n="about.title2016">Opening of
                            the
                            office.</h2>
                        <p class="block-description" data-i18n="about.text2016">More than the design process itself, I
                            am
                            interested in inventions, engineering and marketing ... I think that a good designer is
                            someone
                            who manages to unite all the elements: the understanding of materials and the belief in
                            increasing functionality. Then the reduction to the form, if you like, becomes the result of
                            all
                            these experiments ..</p>
                    </div>
                </div>
                <div class="col-sm-auto col-lg-5 order-1 order-lg-2">
                    <div class="block-image _right">
                        <span class="block-image__number" data-top-bottom="transform:translate3d(0,50px,0)"
                            data-bottom-top="transform:translate3d(0,0px,0)">02.</span>
                        <div class="reveal"><img src="{{ asset('public/FE/img/image_history_02.jpg') }}"
                                alt="2016 Year"></div>
                    </div>
                </div>
            </div>
            <!-- /Item -->

            <!-- Item -->
            <div class="row row-flex os">
                <div class="col-sm-auto col-lg-5">
                    <div class="block-image">
                        <span class="block-image__number" data-top-bottom="transform:translate3d(0,50px,0)"
                            data-bottom-top="transform:translate3d(0,0px,0)">03.</span>
                        <div class="reveal"><img src="{{ asset('public/FE/img/image_history_03.jpg') }}"
                                alt="2017 Year"></div>
                    </div>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="col-about__describe col-about__describe_right">
                        <h6 class="title__h6 title__overhead" data-i18n="about.year2017">2017 year</h6>
                        <h2 class="title title__h2 title__section title_normal" data-i18n="about.title2017">Cooperation
                            with
                            world brands.</h2>
                        <p class="block-description" data-i18n="about.text2017">My work is simple and sophisticated, so
                            it
                            can be described in both simple and florid language. I love sophistication and I feel its
                            superiority. I like people with a sophisticated mind and at the same time simple in
                            communication. These qualities can be combined quite naturally. However, objects, like
                            people,
                            look pathetic if these properties are connected in them artificially.</p>
                    </div>
                </div>
            </div>
            <!-- /Item -->
        </div>
    </section>
@endsection
