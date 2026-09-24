@extends('FE.layouts.app')

@section('title', $post->title . ' - Kool Nguyen')
@section('description', $post->excerpt ?? 'Kool Nguyen journal.')

@section('content')
    <section class="section news-singel section_first">
        <div class="container">
            <article class="item-news item-news__main">
                <header class="item-news__header">
                    <h2 class="title title__h1">{{ $post->title }}</h2>
                    <h6 class="title__h6 title__overhead">{{ $post->published_at->format('d M Y') }}</h6>
                </header>
                <figure class="media-content">
                    <span class="reveal">
                        <img class="news-image"
                            src="{{ $post->image ? asset('public/storage/' . $post->image) : 'img/08_image.jpg' }}"
                            alt="News">
                    </span>
                </figure>
                <div class="item-news__paragraph">
                    {!! $post->content !!}
                </div>
                <footer class="item-news__footer">
                    <div class="share-post">
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i><span>Facebook</span></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i><span>Tweet</span></a>
                        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i><span>Google
                                Plus</span></a>
                        <a class="like-post" href="#"><i class="fa fa-heart"
                                aria-hidden="true"></i><span>{{ $post->likes_count }}</span></a>
                    </div>
                </footer>
            </article>
            <!-- Comments -->
            <div class="section-comments" id="comments">
                <h3 class="title title__h5">{{ $post->comments->count() }} Comments</h3>

                @if (session('success'))
                    <div class="flash flash--success">{{ session('success') }}</div>
                @endif

                @forelse ($post->comments as $comment)
                    <!-- Item Comment -->
                    <div class="media">
                        <div class="float-left col-avatar">
                            <img class="media-object"
                                src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($comment->email))) }}?d=mp&s=80"
                                alt="{{ $comment->name }}">
                        </div>
                        <div class="media-body">
                            <header class="media-header">
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item">
                                        <h4 class="media-heading">{{ $comment->name }}</h4>
                                    </li>
                                    <li class="list-inline-item"><span class="data-comment">/
                                            {{ $comment->created_at->format('d F Y') }}</span>
                                    </li>
                                </ul>
                            </header>
                            <p>{{ $comment->content }}</p>
                        </div>
                    </div>
                    <!-- /Item Comment -->
                @empty
                    <p>Chưa có bình luận nào. Hãy là người đầu tiên chia sẻ suy nghĩ của bạn.</p>
                @endforelse

                <!-- Comment Form -->
                <form class="comment-form" method="POST" action="{{ route('blog.comments.store', $post->slug) }}">
                    @csrf
                    @if ($errors->any())
                        <div class="flash flash--error">{{ $errors->first() }}</div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="label">Name *</label>
                                <input type="text" class="form-control input" id="name" name="name"
                                    value="{{ old('name') }}" required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="label">Email *</label>
                                <input type="email" class="form-control input" id="email" name="email"
                                    value="{{ old('email') }}" required autocomplete="off">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="content" class="label">Message *</label>
                                <textarea class="form-control input" id="content" name="content" rows="3" required>{{ old('content') }}</textarea>
                            </div>
                            <div class="btn-block">
                                <button type="submit" class="btn">Send Comment</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /Comment Form -->
            </div>
            <!-- /Comments -->
        </div>
    </section>
    
    <!-- Nav -->
    <nav class="pager-wrap separation-top">
        <div class="container">
            <ul class="pager">
                <li class="previous">
                    @if ($previousPost)
                        <a href="{{ route('blog.show', $previousPost->slug) }}">Prev</a>
                    @endif
                </li>
                <li><a href="{{ route('blog') }}"><svg class="back_grid" xmlns="http://www.w3.org/2000/svg" width="32"
                            height="22">
                            <path fill-rule="evenodd"
                                d="M28 4h-8v2h8zM18 16H8v2h10zm10-8h-8v2h8zM4 0v2H0v17a3 3 0 0 0 3 3h26a3 3 0 0 0 3-3V0zm0 19a1 1 0 0 1-2 0V4h2zm26 0a1 1 0 0 1-1 1H5.8a3.1 3.1 0 0 0 .2-1V2h24zM18 4H8v10h10zm-2 8h-6V6h6zm12 0h-8v2h8zm0 4h-8v2h8z" />
                        </svg></a></li>
                <li class="next">
                    @if ($nextPost)
                        <a href="{{ route('blog.show', $nextPost->slug) }}">Next</a>
                    @endif
                </li>
            </ul>
        </div>
    </nav>
    <!-- /Nav -->
@endsection

@push('styles')
    <style>
        .flash {
            margin-bottom: 20px;
            padding: 14px 20px;
            border-radius: 4px;
            font-size: 14px;
        }

        .flash--success {
            background: rgba(40, 167, 69, .12);
            border: 1px solid rgba(40, 167, 69, .35);
            color: #2f9e51;
        }

        .flash--error {
            background: rgba(220, 53, 69, .12);
            border: 1px solid rgba(220, 53, 69, .35);
            color: #dc3545;
        }
    </style>
@endpush
