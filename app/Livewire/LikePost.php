<?php

namespace App\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLike;

    //es lo mismo que un constructor
    public function mount($post)
    {
        $this->isLike = $post->checklike(auth()->user());
    }

    public function like()
    {
        if ($this->post->checklike(auth()->user() ))
        {
            $this->post->likes()->where('post_id', $this->post->id)->delete();
            $this->isLike = false;
        }
        else {
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isLike = true;
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
