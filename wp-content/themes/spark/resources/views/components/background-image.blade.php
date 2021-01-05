{{-- Pairs with ACF Field Type: "Image" that returns an array --}}

@php
  $img = $img ?: get_sub_field('background_image');

  $id = $img['id'];
  $src = $img['url'];
  $options = $options ?: 'offsetTop: 300px';

  $sizes = "
  (max-width: 320px) 480px,
  (max-width: 640px) 768px,
  (max-width: 960px) 1280px,
  (max-width: 1280px) 1440px,
  (min-width: 1281px) 100vw";

  $default_sizes = ['thumbnail', 'medium', 'medium_large', 'large'];
  $acf_sizes = $img['sizes'];

  // Build $srcset
  foreach ($default_sizes as $size) {
    $width = $acf_sizes["{$size}-width"];
    $srcset .= "{$acf_sizes[$size]} {$width}w, ";
  }
@endphp

<div
  id="image-{{ $id }}"
  class="bg-image {{ $class }}"
  data-src="{{ $src }}"
  data-srcset="{{ $srcset }}{{ $src }} 1440w"
  data-sizes="{{ $sizes }}"
  uk-img="{{ $options }}"
>
  {{ $slot }}
</div>








