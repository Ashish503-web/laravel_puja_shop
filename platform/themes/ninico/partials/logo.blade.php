@if($logo = theme_option('logo'))
    @php
        $height = theme_option('logo_height', 35);

        $attributes = [
            'style' => sprintf('height: %s', is_numeric($height) ? "{$height}px" : $height),
            'loading' => false,
        ];
    @endphp
    <div class="logo">
        <a href="{{ BaseHelper::getHomepageUrl() }}">
            {{ RvMedia::image($logo, theme_option('site_title'), attributes: $attributes) }}
        </a>
    </div>
@endif
