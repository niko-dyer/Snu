{{-- Pairs with ACF Field Group: "Component - Subheading" --}}

@php
  // Check if a custom string was passed as $element, else use ACF field
  $element_sub_field = $element ?: get_sub_field('subheading_element');
  $element_field = $element ?: get_field('subheading_element');
  $element = $element_sub_field ?: $element_field;

  // Check if a custom string was passed as $text, else use ACF field
  $text_sub_field = $text ?: get_sub_field('subheading_text');
  $text_field = $text ?: get_field('subheading_text');
  $text = $text_sub_field ?: $text_field;
@endphp

@if($element && $text)
  <{{ $element }} class="{{ $class }}">{!! $text !!}</{{ $element }}>
@endif
