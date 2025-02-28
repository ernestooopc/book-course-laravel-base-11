<?php

namespace App\View\Components\blog;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Post;
class Show extends Component
{
    /**
     * Create a new component instance.
     */

     protected $except = ['post'];


    public function __construct(public Post $post)
    {

    }

    public function changeTitle(){
        $this->post->title = "New title";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog.post.show');
    }
}
