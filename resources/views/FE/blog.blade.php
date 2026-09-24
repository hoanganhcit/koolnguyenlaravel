@extends('FE.layouts.app')

@section('title', 'Blog - Kool Nguyen')
@section('description', 'Photography stories, thoughts and updates from Kool Nguyen.')

@section('content')
    <!-- Blog -->
    <section class="section section_top-space-230 section_first">
        <div class="container">
            <!-- Filter -->
            <ul class="filter-categories">
                <li class="filter-categories__item filter-categories__item_current" data-filter="*">
                    <a href="#filter">All</a>
                </li>
                @foreach ($categories as $category)
                    <li class="filter-categories__item" data-filter=".category-{{ $category->slug }}">
                        <a href="#filter">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
            <!-- /Filter -->
            @php $mainPost = $posts->first(); @endphp

            @if ($mainPost)
                <!-- Main Post -->
                <article class="item-news item-news__main">
                    <header class="item-news__header">
                        <h6 class="title__h6 title__overhead">
                            {{ optional($mainPost->category)->name ? strtoupper($mainPost->category->name) . ' – ' : '' }}{{ $mainPost->published_at->format('d M Y') }}
                        </h6>
                        <h2 class="title title__h1">{{ $mainPost->title }}</h2>
                    </header>
                    @if ($mainPost->image)
                        <figure class="media-content">
                            <span class="reveal">
                                <img class="news-image" src="{{ asset('public/storage/' . $mainPost->image) }}"
                                    alt="{{ $mainPost->title }}">
                            </span>
                        </figure>
                    @endif
                    <div class="item-news__paragraph item-news__paragraph_line">
                        @if ($mainPost->excerpt)
                            <p>{{ $mainPost->excerpt }}</p>
                        @endif

                        <footer class="item-news__footer">
                            <a class="btn" href="{{ route('blog.show', $mainPost->slug) }}">Read More</a>
                        </footer>
                    </div>
                </article>
                <!-- /Main Post -->
            @endif

            @php
                $secondPost = $posts->get(1);
                $thirdPost = $posts->get(2);
            @endphp

            <div class="grid-news load-container filter-container">
                @if ($secondPost)
                    <!-- Post 2 Image -->
                    <article
                        class="item-news item-news__masonry category-{{ optional($secondPost->category)->slug ?: 'uncategorized' }}">
                        @if ($secondPost->image)
                            <figure class="media-content">
                                <img class="news-image" src="{{ asset('public/storage/' . $secondPost->image) }}"
                                    alt="{{ $secondPost->title }}">
                            </figure>
                        @endif
                        <header class="item-news__header">
                            <h6 class="title__h6 title__overhead">
                                {{ optional($secondPost->category)->name ? strtoupper($secondPost->category->name) . ' – ' : '' }}{{ $secondPost->published_at->format('d M Y') }}
                            </h6>
                            <h2 class="title title__h6"><a
                                    href="{{ route('blog.show', $secondPost->slug) }}">{{ $secondPost->title }}</a>
                            </h2>
                        </header>
                        <footer class="item-news__footer">
                            <ul class="item-details">
                                <li><i class="fa fa-comment-o" aria-hidden="true"></i><span>{{ $secondPost->comments_count }}</span>
                                </li>
                                <li><i class="fa fa-heart-o" aria-hidden="true"></i><span>{{ $secondPost->likes_count }}</span>
                                </li>
                            </ul>
                        </footer>
                    </article>
                    <!-- /Post 2 Image -->
                @endif

                <!-- Post Quote -->
                <article class="item-news item-news__masonry">
                    <blockquote class="block-quote block-quote_center">
                        <p>The photo leaves open moments, which immediately overlap with the pressure of time.</p>
                    </blockquote>
                </article>
                <!-- /Post Quote -->

                @if ($thirdPost)
                    <!-- Post 3 Image -->
                    <article
                        class="item-news item-news__masonry category-{{ optional($thirdPost->category)->slug ?: 'uncategorized' }}">
                        @if ($thirdPost->image)
                            <figure class="media-content">
                                <img class="news-image" src="{{ asset('public/storage/' . $thirdPost->image) }}"
                                    alt="{{ $thirdPost->title }}">
                            </figure>
                        @endif
                        <header class="item-news__header">
                            <h6 class="title__h6 title__overhead">
                                {{ optional($thirdPost->category)->name ? strtoupper($thirdPost->category->name) . ' – ' : '' }}{{ $thirdPost->published_at->format('d M Y') }}
                            </h6>
                            <h2 class="title title__h6"><a
                                    href="{{ route('blog.show', $thirdPost->slug) }}">{{ $thirdPost->title }}</a>
                            </h2>
                        </header>
                        <footer class="item-news__footer">
                            <ul class="item-details">
                                <li><i class="fa fa-comment-o" aria-hidden="true"></i><span>{{ $thirdPost->comments_count }}</span>
                                </li>
                                <li><i class="fa fa-heart-o" aria-hidden="true"></i><span>{{ $thirdPost->likes_count }}</span>
                                </li>
                            </ul>
                        </footer>
                    </article>
                    <!-- /Post 3 Image -->
                @endif

                @forelse ($posts->slice(3) as $post)
                    <!-- Post -->
                    <article
                        class="item-news item-news__masonry {{ $loop->iteration % 4 === 0 ? 'item-news__masonry_fully' : '' }} category-{{ optional($post->category)->slug ?: 'uncategorized' }}">
                        @if ($post->image)
                            <figure class="media-content">
                                <img class="news-image" src="{{ asset('public/storage/' . $post->image) }}"
                                    alt="{{ $post->title }}">
                            </figure>
                        @endif
                        <header class="item-news__header">
                            <h6 class="title__h6 title__overhead">
                                {{ optional($post->category)->name ? strtoupper($post->category->name) . ' – ' : '' }}{{ $post->published_at->format('d M Y') }}
                            </h6>
                            <h2 class="title title__h6"><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                            </h2>
                        </header>
                        <footer class="item-news__footer">
                            <ul class="item-details">
                                <li><i class="fa fa-comment-o" aria-hidden="true"></i><span>{{ $post->comments_count }}</span>
                                </li>
                                <li><i class="fa fa-heart-o" aria-hidden="true"></i><span>{{ $post->likes_count }}</span>
                                </li>
                            </ul>
                        </footer>
                    </article>
                    <!-- /Post -->
                @empty
                    @if (!$mainPost)
                        <div class="col-12">
                            <p>No published posts yet.</p>
                        </div>
                    @endif
                @endforelse
            </div>

            <!-- Load more -->
            <div class="btn-load__col btn-load__col_space">
                <div class="btn-load__wrap">
                    <button type="submit" class="btn-load__button"><span class="ripple"></span></button>
                    <span class="btn-load__text">Load More</span>
                </div>
            </div>
        </div>
    </section>
    <!-- /Blog -->
@endsection

