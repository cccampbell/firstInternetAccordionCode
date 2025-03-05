<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;
use WP_Query;

class PostList extends Component
{   
    private WP_Query $query;
    public $current_page = 1;
    public $posts_per_page = 1;
    public $total_pages;
    public $search_term = '';
    
    public function mount()
    {
        $this->loadPosts();
    }
    
    public function updatedSearchTerm()
    {
        $this->current_page = 1;
        $this->loadPosts();
    }
    
    public function loadPosts()
    {
        $args = [
            'post_type' => 'post',
            'posts_per_page' => $this->posts_per_page,
            'paged' => $this->current_page,
        ];
        
        if (!empty($this->search_term)) { 
            $args['s'] = $this->search_term;
        }
        
        $this->query = new \WP_Query($args);
        $this->total_pages = $this->query->max_num_pages;
    }
    
    public function getPosts()
    {
        return collect($this->query->posts);
    }

    public function nextPage()
    {
        if ($this->current_page < $this->total_pages) 
        {
            $this->current_page++;
            $this->loadPosts();
        }
    }
    
    public function previousPage()
    {
        if ($this->current_page > 1) 
        {
            $this->current_page--;
            $this->loadPosts();
        }
    }
    
    public function render()
    {
        return view('livewire.post-list', [
            'posts' => $this->getPosts(),
        ]);
    }
} 