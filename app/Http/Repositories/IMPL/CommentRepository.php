<?php


namespace App\Http\Repositories\IMPL;


use App\Comment;
use App\Http\Repositories\CommentRepositoryInterface;
use App\Http\Repositories\Eloquent\RepositoryEloquent;

class CommentRepository extends RepositoryEloquent implements CommentRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        $comment = Comment::class;
        return $comment;
    }
}
