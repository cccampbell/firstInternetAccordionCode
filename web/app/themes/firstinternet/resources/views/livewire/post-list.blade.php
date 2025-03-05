<div>
    <div class="search-container">
        <input 
            type="text" 
            wire:model.live="search_term" 
            placeholder="Search posts..."
            class="search-input"
        >
    </div>

    <div class="posts-grid">
        @foreach($posts as $post)
            <article class="post-card">
                <h2>{{ $post->post_title }}</h2>
                <div class="post-excerpt">
                    {!! wp_trim_words($post->post_content, 20) !!}
                </div>
                <a href="{{ get_permalink($post) }}" class="read-more">
                    Read More
                </a>
            </article>
        @endforeach
    </div>
    
    <div class="pagination">
        @if($current_page > 1)
            <button wire:click="previousPage" class="prev-page">
                Previous Page
            </button>
        @endif

        <span class="current-page">
            Page {{ $current_page }} of {{ $total_pages }}
        </span>

        @if($current_page < $total_pages)
            <button wire:click="nextPage" class="next-page">
                Next Page
            </button>
        @endif
    </div>
</div> 