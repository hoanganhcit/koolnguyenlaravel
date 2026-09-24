@extends('FE.layouts.app')

@section('title', 'Contact - Kool Nguyen')
@section('description', 'Get in touch with Kool Nguyen for photography and visual stories.')

@section('content')
    <section class="section section-contact section-onescreen">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title__section title__h1 title_horizontal-line"><span class="reveal reveal_gray">Let’s
                            chat.</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <p class="text-block">A photo — is a search for what can get into the frame. When you limit events
                        to a
                        frame — You change these events.</p>
                </div>
                <div class="col-lg-8">
                    <form id="contact-form" data-toggle="validator">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="firstName" class="label">First Name *</label>
                                    <input type="text" class="form-control input" id="firstName" name="first_name"
                                        required data-error="Please, enter your first name." autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="lastName" class="label">Last Name *</label>
                                    <input type="text" class="form-control input" id="lastName" name="last_name"
                                        required data-error="Please, enter your last name." autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email" class="label">Email *</label>
                                    <input type="email" class="form-control input" id="email" name="email" required
                                        data-error="Please, enter your email." autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone" class="label">Phone *</label>
                                    <input type="tel" class="form-control input" id="phone" name="phone" required
                                        data-error="Please, enter your phone." autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="message" class="label">Your Message ... *</label>
                                    <textarea class="form-control input" id="message" name="message" rows="3" required
                                        data-error="Please, enter message."></textarea>
                                </div>
                                <div class="btn-block">
                                    <button type="submit" class="btn">Send Message</button>
                                    <div id="validator-contact" class="hidden"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="text-decoration text-decoration_bottom" data-100-start="transform[swing]:translateY(100px)"
            data--800-top="transform[swing]:translateY(-100px)">Contact</div>
    </section>
@endsection

@push('styles')
    <style>
        .section-newsletter {
            display: none;
        }
    </style>
@endpush