<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFormReview;
use App\Http\Services\PostServiceInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    protected $post;

    public function __construct(PostServiceInterface $post)
    {
        $this->post = $post;
    }

    public function create(CreateFormReview $request)
    {
        try {
            $this->post->create($request);
            return response()->json([
                'status' => 'success',
                'message' => 'nhận xét thành công '
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'errors',
                'message' => 'không nhận xét được '
            ]);
        }
    }
}
