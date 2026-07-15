<?php

namespace App\Http\Livewire\Front\Blog;

use App\Models\Post;
use App\Models\PostCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $search = '';

    public $category = '';

    public $sort = 'latest';

    protected $queryString = [

        'search' => ['except' => ''],

        'category' => ['except' => ''],

        'sort' => ['except' => 'latest']

    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function updatingSort()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::query()

            ->where('status',1)

            ->when($this->search,function($query){

                $query->where('title','like',"%{$this->search}%");

            })

            ->when($this->category,function($query){

                $query->where('post_category_id',$this->category);

            });

        if($this->sort == 'popular'){

            $posts->orderByDesc('views');

        }else{

            $posts->latest();

        }

        return view('livewire.front.blog.posts',[

            'posts'=>$posts->paginate(9),

            'categories'=>PostCategory::all()

        ]);
    }
}
