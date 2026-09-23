<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Kool Nguyen – Photography / Visual stories</title>

	<!-- Meta Data -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Kool Nguyen" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('public/FE/images/favicons/apple-touch-icon-144x144.png') }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('public/FE/images/favicons/apple-touch-icon-114x114.png') }}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('public/FE/images/favicons/apple-touch-icon-72x72.png') }}">
	<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('public/FE/images/favicons/apple-touch-icon-57x57.png') }}">
	<link rel="shortcut icon" href="{{ asset('public/FE/images/favicons/favicon.png') }}" type="image/png">

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/FE/style/style.css') }}" />

	<!-- Modernizr -->
	<script src="{{ asset('public/FE/js/modernizr.custom.js') }}" type="text/javascript"></script>

</head>

<body>
	<div class="loading animated">
		<div class="loading-wrap animated bounceInLeft">
			<span class="logotype animated infinite bounceIn">Kool Nguyen</span>
			<span class="loading-tagline">Photography / Visual stories</span>
		</div>
	</div>

	@include('FE.layouts.header')

	<!-- Hero -->
	<header class="hero jarallax" data-image="{{ asset('public/FE/img/hero-image6.jpg') }}">
		<div class="container">
			<div class="hero__caption" data-start="opacity:1; transform[swing]:translateY(0px)"
				data-500-start="opacity:0; transform[swing]:translateY(-100px)">
				<div class="hero__row">
					<h6 class="title__h6 title__overhead" data-i18n="hero.overhead">a personal approach to photography</h6>
					<h1 class="title__h1 hero__title hero__title_line" data-i18n="hero.title">Finding meaning<br />in ordinary moments.</h1>
					<p class="hero__description" data-i18n="hero.description">I photograph quiet stories, natural light, and the details that often go unseen. Start with the way I see the world.</p>
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
					<h2 class="title__section title__h1 title_decoration title_vertical-line-top" data-i18n="hello.title">Hello.</h2>
					<blockquote class="block-quote block-quote__about">
						<p data-i18n="hello.quote">I believe photography is not simply about capturing an image. It is about observing life,
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
	<section class="section section-works">
		<div class="container">
			<div class="row">
				<div class="col section__header-wrap">
						<h2 class="title__section title__h1 title_horizontal-line"><span class="reveal reveal_gray" data-i18n="works.title">My Works.</span></h2>
						<p class="section__subtitle" data-i18n="works.subtitle">A photo — is a search for what can get into the frame. When you limit
						events to a frame — You change these events.</p>
				</div>
				<div class="col-12 works-filter-wrap">
					<div class="select works-filter">
						<span class="placeholder" data-i18n="works.filter">Select category</span>
						<ul class="filter">
							<li class="filter__item active" data-filter="*"><a class="filter__link active" href="#filter" data-i18n="works.all">All works</a></li>
							<li class="filter__item" data-filter=".category-portraits"><a class="filter__link" href="#filter" data-i18n="works.portraits">Portraits</a></li>
							<li class="filter__item" data-filter=".category-lifestyle"><a class="filter__link" href="#filter" data-i18n="works.lifestyle">Lifestyle</a></li>
							<li class="filter__item" data-filter=".category-landscapes"><a class="filter__link" href="#filter" data-i18n="works.landscapes">Landscapes</a></li>
							<li class="filter__item" data-filter=".category-editorial"><a class="filter__link" href="#filter" data-i18n="works.editorial">Editorial</a></li>
						</ul>
						<input type="hidden" name="works-category" />
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="grid-gallery grid-gallery__base grid-gallery_fully filter-container">
				<!-- Picture -->
				<figure class="item-portfolio item-portfolio__column-four category-portraits">
					<a class="link-photo" href="{{ asset('public/FE/img/01_image.jpg') }}" data-width="900" data-height="900"
						data-caption="<div class='options__photo'><span>MAKE</span>NIKON D700</div><div class='options__photo'><span>SHUTTER SPEED</span>1/2500s</div><div class='options__photo'><span>APERTURE</span>f/1.2</div><div class='options__photo'><span>FOCAL LENGTH</span>25mm</div><div class='options__photo'><span>ISO</span>200</div>">
						<img class="image-portfolio" src="{{ asset('public/FE/img/01_image.jpg') }}" alt="Photo">
					</a>
					<ul class="item-details">
						<li><a href="#location"><i class="fa fa-location-arrow" aria-hidden="true"></i></a></li>
						<li class="item-details_right"><a href="#like"><i class="fa fa-heart"
									aria-hidden="true"></i></a><span>18</span></li>
					</ul>
				</figure>

				<!-- Picture -->
				<figure class="item-portfolio item-portfolio__column-four category-lifestyle">
					<a class="link-photo" href="{{ asset('public/FE/img/03_image.jpg') }}" data-width="900" data-height="1800"
						data-caption="<div class='options__photo'><span>MAKE</span>NIKON D700</div><div class='options__photo'><span>SHUTTER SPEED</span>1/2500s</div><div class='options__photo'><span>APERTURE</span>f/1.2</div><div class='options__photo'><span>FOCAL LENGTH</span>25mm</div><div class='options__photo'><span>ISO</span>200</div>">
						<img class="image-portfolio" src="{{ asset('public/FE/img/03_image.jpg') }}" alt="Photo">
					</a>
					<ul class="item-details">
						<li><a href="#location"><i class="fa fa-location-arrow" aria-hidden="true"></i></a></li>
						<li class="item-details_right"><a href="#like"><i class="fa fa-heart"
									aria-hidden="true"></i></a><span>61</span></li>
					</ul>
				</figure>

				<!-- Picture -->
				<figure class="item-portfolio item-portfolio__column-four category-landscapes">
					<a class="link-photo" href="{{ asset('public/FE/img/02_image.jpg') }}" data-width="900" data-height="900"
						data-caption="<div class='options__photo'><span>MAKE</span>NIKON D700</div><div class='options__photo'><span>SHUTTER SPEED</span>1/2500s</div><div class='options__photo'><span>APERTURE</span>f/1.2</div><div class='options__photo'><span>FOCAL LENGTH</span>25mm</div><div class='options__photo'><span>ISO</span>200</div>">
						<img class="image-portfolio" src="{{ asset('public/FE/img/02_image.jpg') }}" alt="Photo">
					</a>
					<ul class="item-details">
						<li><a href="#location"><i class="fa fa-location-arrow" aria-hidden="true"></i></a></li>
						<li class="item-details_right"><a href="#like"><i class="fa fa-heart"
									aria-hidden="true"></i></a><span>39</span></li>
					</ul>
				</figure>

				<!-- Picture -->
				<figure class="item-portfolio item-portfolio__column-four category-portraits">
					<a class="link-photo" href="{{ asset('public/FE/img/04_image.jpg') }}" data-width="900" data-height="1800"
						data-caption="<div class='options__photo'><span>MAKE</span>NIKON D700</div><div class='options__photo'><span>SHUTTER SPEED</span>1/2500s</div><div class='options__photo'><span>APERTURE</span>f/1.2</div><div class='options__photo'><span>FOCAL LENGTH</span>25mm</div><div class='options__photo'><span>ISO</span>200</div>">
						<img class="image-portfolio" src="{{ asset('public/FE/img/04_image.jpg') }}" alt="Photo">
					</a>
					<ul class="item-details">
						<li><a href="#location"><i class="fa fa-location-arrow" aria-hidden="true"></i></a></li>
						<li class="item-details_right"><a href="#like"><i class="fa fa-heart"
									aria-hidden="true"></i></a><span>7</span></li>
					</ul>
				</figure>

				<!-- Picture -->
				<figure class="item-portfolio item-portfolio__column-four category-lifestyle">
					<a class="link-photo" href="{{ asset('public/FE/img/05_image.jpg') }}" data-width="900" data-height="900"
						data-caption="<div class='options__photo'><span>MAKE</span>NIKON D700</div><div class='options__photo'><span>SHUTTER SPEED</span>1/2500s</div><div class='options__photo'><span>APERTURE</span>f/1.2</div><div class='options__photo'><span>FOCAL LENGTH</span>25mm</div><div class='options__photo'><span>ISO</span>200</div>">
						<img class="image-portfolio" src="{{ asset('public/FE/img/05_image.jpg') }}" alt="Photo">
					</a>
					<ul class="item-details">
						<li><a href="#location"><i class="fa fa-location-arrow" aria-hidden="true"></i></a></li>
						<li class="item-details_right"><a href="#like"><i class="fa fa-heart"
									aria-hidden="true"></i></a><span>24</span></li>
					</ul>
				</figure>

				<!-- Picture -->
				<figure class="item-portfolio item-portfolio__column-four category-landscapes">
					<a class="link-photo" href="{{ asset('public/FE/img/06_image.jpg') }}" data-width="900" data-height="900"
						data-caption="<div class='options__photo'><span>MAKE</span>NIKON D700</div><div class='options__photo'><span>SHUTTER SPEED</span>1/2500s</div><div class='options__photo'><span>APERTURE</span>f/1.2</div><div class='options__photo'><span>FOCAL LENGTH</span>25mm</div><div class='options__photo'><span>ISO</span>200</div>">
						<img class="image-portfolio" src="{{ asset('public/FE/img/06_image.jpg') }}" alt="Photo">
					</a>
					<ul class="item-details">
						<li><a href="#location"><i class="fa fa-location-arrow" aria-hidden="true"></i></a></li>
						<li class="item-details_right"><a href="#like"><i class="fa fa-heart"
									aria-hidden="true"></i></a><span>14</span></li>
					</ul>
				</figure>

				<!-- Picture -->
				<figure class="item-portfolio item-portfolio__column-four category-editorial">
					<a class="link-photo" href="{{ asset('public/FE/img/14_image.jpg') }}" data-width="600" data-height="800"
						data-caption="<div class='options__photo'><span>MAKE</span>NIKON D700</div><div class='options__photo'><span>SHUTTER SPEED</span>1/2500s</div><div class='options__photo'><span>APERTURE</span>f/1.2</div><div class='options__photo'><span>FOCAL LENGTH</span>25mm</div><div class='options__photo'><span>ISO</span>200</div>">
						<img class="image-portfolio" src="{{ asset('public/FE/img/14_image.jpg') }}" alt="Photo">
					</a>
					<ul class="item-details">
						<li><a href="#location"><i class="fa fa-location-arrow" aria-hidden="true"></i></a></li>
						<li class="item-details_right"><a href="#like"><i class="fa fa-heart"
									aria-hidden="true"></i></a><span>24</span></li>
					</ul>
				</figure>

				<!-- Picture -->
				<figure class="item-portfolio item-portfolio__column-four category-lifestyle">
					<a class="link-photo" href="{{ asset('public/FE/img/19_image.jpg') }}" data-width="900" data-height="1340"
						data-caption="<div class='options__photo'><span>MAKE</span>NIKON D700</div><div class='options__photo'><span>SHUTTER SPEED</span>1/2500s</div><div class='options__photo'><span>APERTURE</span>f/1.2</div><div class='options__photo'><span>FOCAL LENGTH</span>25mm</div><div class='options__photo'><span>ISO</span>200</div>">
						<img class="image-portfolio" src="{{ asset('public/FE/img/19_image.jpg') }}" alt="Photo">
					</a>
					<ul class="item-details">
						<li><a href="#location"><i class="fa fa-location-arrow" aria-hidden="true"></i></a></li>
						<li class="item-details_right"><a href="#like"><i class="fa fa-heart"
									aria-hidden="true"></i></a><span>14</span></li>
					</ul>
				</figure>
			</div>

			<a href="#" class="btn-link btn-link_right" data-i18n="works.explore">explore gallery</a>
		</div>
	</section>
	<!-- /My Works -->

	<!-- Statistics -->
	<section class="section section-counters text-center">
		<div class="container">
			<div class="row os">
				<div class="col-12 col-md-4">
					<div class="counter">
						<div class="counter__date title_decoration">300</div>
						<div class="counter__name" data-i18n="stats.clients">Clients</div>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<div class="counter">
						<div class="counter__date title_decoration">4357</div>
						<div class="counter__name" data-i18n="stats.photos">Photos</div>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<div class="counter counter_last-child">
						<div class="counter__date title_decoration">500</div>
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
					<h2 class="title__section title__h1 title_center"><span
											class="reveal reveal_gray" data-i18n="testimonials.title">Testimonials.</span></h2>
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
						<p data-i18n="testimonials.one">For me design — is a quality of life. Good design has little to do with trends. Tired of
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
						<p data-i18n="testimonials.two">For me design — is a quality of life. Good design has little to do with trends. Tired of
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
						<p data-i18n="testimonials.three">I like people with a sophisticated mind and at the same time simple in communication. These
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
					<h2 class="title__section title__h1 title_horizontal-line"><span
											class="reveal reveal_gray" data-i18n="pricing.title">Pricing.</span></h2>
							<p class="section__subtitle" data-i18n="pricing.subtitle">The photo leaves open moments, which immediately overlap with the
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
						<div class="pricing-options__included" data-i18n="pricing.semiProfessional">Semi-professional</div>
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
						<div class="pricing-options__included" data-i18n="pricing.semiProfessional">Semi-professional</div>
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
						<div class="pricing-options__included" data-i18n="pricing.correctionRetouch">Correction, Retouch</div>
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
						<div class="pricing-options__included" data-i18n="pricing.allInstallation">All types of installation</div>
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

	<!-- Newsletter -->
	<section class="section section-newsletter">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-lg-9 section__header-wrap">
					<h2 class="title title__h2 title_center title_normal"><span class="reveal reveal_gray" data-i18n="newsletter.title">Sign up for our newsletter to receive special offers.</span></h2>
				</div>
			</div>

			<div class="form-group">
				<form class="subscribe-form" data-toggle="validator">
					<div class="subscribe-form__inner">
						<input type="email" class="form-control _big email_valid" data-i18n-placeholder="newsletter.placeholder" placeholder="Enter your email address"
							required data-error="Please, enter your email.">
						<button type="submit" class="btn-subscribe">OK</button>
					</div>
					<div id="validator-subscribe" class="hidden"></div>
				</form>
			</div>
		</div>
	</section>
	<!-- /Newsletter -->

	@include('FE.layouts.footer')

	<!-- PhotoSwipe -->
	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="pswp__bg"></div>
		<div class="pswp__scroll-wrap">
			<div class="pswp__container">
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
			</div>

			<div class="pswp__ui pswp__ui--hidden">
				<div class="pswp__top-bar">
					<div class="pswp__counter"></div>
					<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
					<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
					<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
					<div class="pswp__preloader">
						<div class="pswp__preloader__icn">
							<div class="pswp__preloader__cut">
								<div class="pswp__preloader__donut"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
					<div class="pswp__share-tooltip"></div>
				</div>
				<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
				<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>

				<div class="pswp__caption">
					<div class="pswp__caption__center"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- /PhotoSwipe -->

	<div id="wave"></div>

	<!-- JavaScripts -->
	<script src="{{ asset('public/FE/js/jquery-3.1.1.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('public/FE/js/plugins.js') }}" type="text/javascript"></script>
	<script src="{{ asset('public/FE/js/siriwave.js') }}" type="text/javascript"></script>
	<script src="{{ asset('public/FE/js/common.js') }}" type="text/javascript"></script>
	<script src="{{ asset('public/FE/js/index.js') }}" type="text/javascript"></script>

</body>
</html>