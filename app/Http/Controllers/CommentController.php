<?php

namespace App\Http\Controllers;

use App\Http\Services\CommentServiceInterface;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    protected $comment;

    public function __construct(CommentServiceInterface $comment)
    {
        $this->comment = $comment;
    }

    public function create(Request $request)
    {
        dd($request->all());
        $this->comment->create($request);

    }
}
