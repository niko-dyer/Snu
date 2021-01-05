{{-- Pairs with ACF Field Type: "Image" that returns an array --}}

@php
  $img = $img ?: get_sub_field('image');

  $id = $img['id'];
  $src = $img['url'];
  $alt = $img['alt'];
  $full_width = $img['width'];
  $full_height = $img['height'];
  $options = $options ?: 'offsetTop: 300px';

  $default_sizes = ['thumbnail', 'medium', 'medium_large', 'large'];
  $acf_sizes = $img['sizes'];

  // Build $srcset & $sizes
  foreach ($default_sizes as $size) {
    $width = $acf_sizes["{$size}-width"];
    $srcset .= "{$acf_sizes[$size]} {$width}w, ";
    $sizes .= "(max-width: {$width}px) {$width}px, ";
  }
@endphp

<img
  id="image-{{ $id }}"
  class="image {{ $classes }}"
  data-src="{{ $src }}"
  data-srcset="{{ $srcset }}"
  sizes="{{ $sizes }}"
  width="{{ $full_width }}"
  height="{{ $full_height }}"
  alt="{{ $alt }}"
  uk-img="{{ $options }}">
