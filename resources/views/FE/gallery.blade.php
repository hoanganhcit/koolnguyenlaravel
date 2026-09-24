@extends('FE.layouts.app')

@section('title', 'Gallery - Kool Nguyen')
@section('description', 'Full photography gallery of Kool Nguyen.')

@section('content')
    <!-- Gallery -->
    <div class="section section-works section_top-space-230 section_first">
        <x-works-gallery :projects="$projects" :categories="$categories" title="Gallery."
            subtitle="A photo — is a search for what can get into the frame. When you limit events to a frame — You change these events."
            section-class="section-works section_no-space-top" />
        <!-- Load more -->
        <div class="btn-load__col btn-load__col_space">
            <div class="btn-load__wrap">
                <button type="submit" class="btn-load__button"><span class="ripple"></span></button>
                <span class="btn-load__text">Load More</span>
            </div>
        </div>
    </div>
    <!-- /Gallery -->
@endsection
