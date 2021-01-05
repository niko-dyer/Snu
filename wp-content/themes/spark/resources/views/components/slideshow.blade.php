{{-- Pairs with ACF Field Group: "Component - Slideshow" --}}

@php
  $width = get_sub_field('width');
  $nav = get_sub_field('navigation');
  $animation = 'animation: ' . get_sub_field('animation') . ';';
  $ratio = get_sub_field('aspect_ratio') ? 'ratio: ' . get_sub_field('aspect_ratio') . ';' : '';

  $autoplay = get_sub_field('autoplay') ? 'autoplay: true;' : '';
  $speed = get_sub_field('autoplay_speed');
  $speed = $autoplay ? 'autoplay-interval: ' . ($speed * 1000) . ';' : '';

  $kenburns = get_sub_field('ken_burns_effect');
  $kenburns = $kenburns == 'none' ? '' : ($kenburns == 'in' ? 'uk-animation-kenburns' : 'uk-animation-kenburns uk-animation-reverse');
@endphp

<section class="slideshow uk-section">
  @if($width === 'container')
    <div class="uk-container"><div class="uk-grid" uk-grid><div class="uk-width-1-1">
  @endif

    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1"
         uk-slideshow="{{ $animation }} {{ $autoplay }} {{ $ratio }} {{ $speed }}">

      <ul class="uk-slideshow-items">
        @set($images = get_sub_field('images'))
        @if ($images)
          @foreach ($images as $image)
            @php
              $desc = strtolower($image['description']);
              $alignment = $desc === 'top' ? 'uk-position-top-center' : ($desc === 'bottom' ? 'uk-position-bottom-center' : '');
            @endphp
            <li>
              @if($kenburns)
                <div class="{{ $kenburns }} uk-position-cover">
                  <img class="{{ $alignment }}" src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" uk-cover>
                </div>
              @else
                <img class="{{ $alignment }}" src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" uk-cover>
              @endif
            </li>
          @endforeach
        @endif
      </ul>

      @if($nav === 'arrows' || $nav === 'both')
        <a class="uk-slidenav-large uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
        <a class="uk-slidenav-large uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
      @endif

      @if($nav === 'dots' || $nav === 'both')
        <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>
      @endif

    </div>

  @if($width === 'container')
  </div></div></div>
  @endif
</section>
