<div class="{{ $block->classes }}" style="{{ $block->inlineStyle }}">
  <div class="container">
    <div class="text-center accordion-block-heading">
      <h3 class="accordion-block-title mb-4">{{ $heading }}</h3>
      <div>
        {!! $sub_text !!}
      </div>
    </div>
    @if (have_rows('items'))
      <div class="accordion">
        @while (have_rows('items'))
          @php the_row() @endphp
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ get_row_index() }}" aria-expanded="false" aria-controls="collapse{{ get_row_index() }}">
                {{ get_sub_field('heading') }}
              </button>
            </h2>
            <div id="collapse{{ get_row_index() }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                {!! get_sub_field('text') !!}
              </div>
            </div>
          </div>
        @endwhile
      </div>
    @else
      <p>{{ $block->preview ? 'Add an item...' : 'No items found!' }}</p>
    @endif
  </div>
</div>