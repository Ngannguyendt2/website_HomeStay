<?php


namespace App\Http\Services;


use App\House;
use App\Http\Repositories\PostRepositoryInterface;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostService implements PostServiceInterface
{
    protected $postRepo;

    public function __construct(PostRepositoryInterface $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    public function create($request)
    {

        // TODO: Implement create() method.;
        $post = new Post();
        $post->body = $request->body;
        $post->house_id = $request->id;
        $post->user_id = Auth::user()->id;
//       $this->postRepo->create($post);

        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rate;
        $rating->user_id = Auth::user()->id;
        $rating->post_id = $post->id;
        $post->ratings()->save($rating);

        return $post;
    }
}
