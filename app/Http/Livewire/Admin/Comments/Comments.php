<?php

namespace App\Http\Livewire\Admin\Comments;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $search;

    public function submitComment($comment_id)
    {
        $comment = Comment::query()->find($comment_id);
        if($comment->status == 'draft'){
            $comment->update([
                'status'=> 'approved'
            ]);

        }elseif($comment->status == 'approved'){
            $comment->update([
                'status'=> 'rejected'
            ]);
        }else{
            $comment->update([
                'status'=> 'approved'
            ]);
        }

    }




    public function render()
    {
        $comments = Comment::query()->orderBy('created_at' , 'DESC')->paginate(10);
        return view('livewire.admin.comments.comments' , compact('comments'));
    }
}