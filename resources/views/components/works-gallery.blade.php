@props([
    'projects',
    'categories',
    'title' => 'My Works.',
    'subtitle' => 'A photo — is a search for what can get into the frame. When you limit events to a frame — You change these events.',
    'limit' => null,
    'showExplore' => false,
    'sectionClass' => 'section-works',
])

<section {{ $attributes->merge(['class' => "section {$sectionClass}"]) }}>
    <div class="container">
        <div class="row">
            <div class="col section__header-wrap">
                <h2 class="title__section title__h1 title_horizontal-line"><span class="reveal reveal_gray"
                        data-i18n="works.title">{{ $title }}</span></h2>
                <p class="section__subtitle" data-i18n="works.subtitle">{{ $subtitle }}</p>
            </div>
            <div class="col-12 works-filter-wrap">
                <div class="select works-filter">
                    <span class="placeholder" data-i18n="works.filter">Select category</span>
                    <ul class="filter">
                        <li class="filter__item active" data-filter="{{ $limit ? '[data-home-limit]' : '*' }}"><a
                                class="filter__link active" href="#filter" data-i18n="works.all">All works</a></li>
                        @foreach ($categories as $category)
                            <li class="filter__item" data-filter=".category-{{ $category->slug }}"><a
                                    class="filter__link" href="#filter">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                    <input type="hidden" name="works-category" />
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="grid-gallery grid-gallery__fixed filter-container load-container">
            @forelse ($projects as $index => $project)
                <figure
                    class="item-portfolio item-portfolio__column-three category-{{ optional($project->category)->slug ?: 'uncategorized' }}"
                    @if ($limit && ($index + 1) <= $limit) data-home-limit @endif>
                    <a href="#" class="project-photo-link" data-toggle="modal"
                        data-target="#project-modal-{{ $project->id }}">
                        <img class="image-portfolio"
                            src="{{ asset('public/storage/' . ($project->images[0] ?? '')) }}"
                            alt="{{ $project->title }}">
                    </a>
                    <ul class="item-details">
                        <li><span>{{ $project->title }}</span></li>
                        <li class="item-details_right">
                            <span>{{ optional($project->shot_at)->format('Y') ?: '' }}</span></li>
                    </ul>
                </figure>
            @empty
                <div class="col-12">
                    <p>No published projects yet.</p>
                </div>
            @endforelse
        </div>

        @if ($showExplore)
            <a href="{{ route('gallery') }}" class="btn-link btn-link_right" data-i18n="works.explore">explore gallery</a>
        @endif
    </div>

    @foreach ($projects as $project)
        <div class="modal fade project-modal" id="project-modal-{{ $project->id }}" tabindex="-1" role="dialog"
            aria-labelledby="project-modal-{{ $project->id }}-label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="project-modal-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <div class="modal-header">
                        <div class="project-modal-heading">
                            <h2 class="project-modal-title" id="project-modal-{{ $project->id }}-label">
                                {{ $project->title }}</h2>
                            <ul class="project-modal-meta list-inline">
                                @if (optional($project->category)->name)
                                    <li class="list-inline-item"><strong data-i18n="works.category">Category</strong>
                                        {{ $project->category->name }}</li>
                                @endif
                                @if ($project->shot_at)
                                    <li class="list-inline-item"><strong data-i18n="works.year">Year</strong>
                                        {{ $project->shot_at->format('Y') }}</li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="modal-body">
                        @if ($project->excerpt)
                            <p class="project-modal-excerpt">{{ $project->excerpt }}</p>
                        @endif

                        @if (!empty($project->images))
                            <div class="project-modal-gallery">
                                @foreach ($project->images as $image)
                                    <div class="project-gallery-item">
                                        <a href="{{ asset('public/storage/' . $image) }}"
                                            class="project-gallery-link" data-width="1600" data-height="1200"
                                            data-caption="{{ e($project->title) }}">
                                            <img class="img-fluid" src="{{ asset('public/storage/' . $image) }}"
                                                alt="{{ $project->title }}">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</section>

@push('styles')
    <style>
        .project-modal .modal-dialog {
            max-width: 100%;
            width: 100%;
            height: 100vh;
            margin: 0;
        }

        .project-modal .modal-content {
            height: 100vh;
            border: 0;
            border-radius: 0;
            background: #0d0d0d;
            color: #fff;
            overflow-y: auto;
        }

        .project-modal .modal-header {
            border-bottom: 1px solid rgba(255, 255, 255, .08);
            padding: 60px 60px 30px;
        }

        .project-modal-title {
            font-size: 36px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 16px;
        }

        .project-modal-meta {
            margin: 0;
            padding: 0;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, .55);
        }

        .project-modal-meta li {
            margin-right: 30px;
        }

        .project-modal-meta strong {
            display: block;
            color: rgba(255, 255, 255, .3);
            font-weight: 400;
            font-size: 11px;
            margin-bottom: 4px;
        }

        .project-modal-close {
            position: fixed;
            top: 24px;
            right: 40px;
            z-index: 1060;
            width: 48px;
            height: 48px;
            border: 1px solid rgba(255, 255, 255, .2);
            border-radius: 50%;
            background: transparent;
            color: #fff;
            font-size: 26px;
            font-weight: 300;
            line-height: 1;
            transition: all .3s ease;
        }

        .project-modal-close:hover {
            background: #fff;
            color: #0d0d0d;
        }

        .project-modal .modal-body {
            padding: 40px 60px 100px;
        }

        .project-modal-excerpt {
            max-width: 720px;
            font-size: 17px;
            line-height: 1.8;
            color: rgba(255, 255, 255, .7);
            margin-bottom: 50px;
        }

        .project-modal-gallery {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
        }

        .project-gallery-item {
            margin-bottom: 0;
            width: 100%;
            height: 100%;
        }

        .project-gallery-link {
            display: block;
            overflow: hidden;
            height: 100%;
        }

        .project-gallery-link img {
            width: 100%;
            height: 100%;
            display: block;
            transition: transform .6s ease;
            object-fit: cover;
        }

        .project-gallery-link:hover img {
            transform: scale(1.04);
        }

        @media (max-width: 991px) {
            .project-modal-gallery {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.5rem;
            }
        }

        @media (max-width: 767px) {

            .project-modal .modal-header,
            .project-modal .modal-body {
                padding-left: 24px;
                padding-right: 24px;
            }

            .project-modal-title {
                font-size: 26px;
            }

            .project-modal-gallery {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
        }
    </style>
@endpush
