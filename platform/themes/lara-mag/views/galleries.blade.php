<section class="sub-page">
    <section class="container">
        @php
            $primarySidebar = Theme::partial('primary-sidebar');
        @endphp
        <section @if ($primarySidebar) class="primary fleft" @endif>
            {!! Theme::partial('breadcrumbs') !!}
            <h1 class="single-title">
                {{ __('Galleries') }}
            </h1><!-- end .single-pro-title -->
            <section class="single-content">
                @if (isset($galleries) && !$galleries->isEmpty())
                    <div class="gallery-wrap">
                        @foreach ($galleries as $gallery)
                            <div class="gallery-item">
                                <div class="img-wrap">
                                    <a href="{{ $gallery->url }}"><img src="{{ RvMedia::getImageUrl($gallery->image, 'medium', false, RvMedia::getDefaultImage()) }}" alt="{{ $gallery->name }}"></a>
                                </div>
                                <div class="gallery-detail">
                                    <div class="gallery-title"><a href="{{ $gallery->url }}">{{ $gallery->name }}</a></div>
                                    <div class="gallery-author">{{ __('By') }} {{ $gallery->user->name }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                <br>
            </section><!-- end .single-pro-content -->
        </section><!-- end .primary -->
        {!! $primarySidebar !!}
    </section><!-- end .container -->
</section>
