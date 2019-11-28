<?php


namespace App\Http\Services;


use App\Comment;
use App\Http\Repositories\CommentRepositoryInterface;
use Auth;

class CommentService implements CommentServiceInterface
{
    protected $commentRepo;

    public function __construct(CommentRepositoryInterface $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    public function create($request)
    {
        // TODO: Implement create() method.
        $comment = new Comment();
        $comment->body = $request->body;
        $comment->post_id = $request->post_id;
        $comment->user_id = Auth::user()->id;
        $this->commentRepo->create($comment);
    }
}
