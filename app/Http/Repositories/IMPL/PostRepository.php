<?php


namespace App\Http\Repositories\IMPL;


use App\Http\Repositories\Eloquent\RepositoryEloquent;
use App\Http\Repositories\PostRepositoryInterface;
use App\Post;

class PostRepository extends RepositoryEloquent implements PostRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        $post = Post::class;
        return $post;
    }
}
