import UIkit from 'uikit'

// Set an overridable full width
$('ul.gform_fields').addClass('uk-child-width uk-grid')

// Use UIKit grid for ul.gfields
UIkit.grid($('ul.gform_fields'))

// Add Icon to Date Field
$('input.datepicker_with_icon').wrap('<div class="uk-position-relative datepicker-icon-wrap"></div>')
$('.datepicker-icon-wrap').prepend(`<span class="uk-form-icon" uk-icon="calendar"></span>`)

// Watch for validation error and reinit UIKit on the form
window.ready('.validation_error', function(element) {
  let fields = $(element).closest('form').find('ul.gform_fields')

  fields.addClass('uk-child-width')
  UIkit.grid(fields)
})



