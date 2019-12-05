<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFormReview;
use App\Http\Services\PostServiceInterface;
use App\Post;
use App\Rating;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //
    protected $post;

    public function __construct(PostServiceInterface $post)
    {
        $this->post = $post;
    }

    public function display(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($request->id > 0) {
                $posts = DB::table('posts')
                    ->where('id', '<', $request->id)
                    ->where('house_id', $id)
                    ->where('comment_id', '=', 0)
                    ->orderBy('created_at', 'DESC')
                    ->limit(3)
                    ->get();
            } else {
                $posts = DB::table('posts')
                    ->orderBy('id', 'DESC')
                    ->where('house_id', $id)
                    ->where('comment_id', '=', 0)
                    ->limit(3)
                    ->get();
            }
            $ratings = Rating::all();
            $users = User::all();
            $output = '';
            $last_id = '';
            if (!$posts->isEmpty()) {
                foreach ($posts as $post) {
                    $output .= '
                        <div class="col-md-2">
                        <div class="row">
                        <div class="col-md-12">';
                    foreach ($users as $user) {
                        if ($user->id == $post->user_id) {
                            if ($user->image) {
                                $output .= '<img id="img" style="width: 80px; height: 70px; margin-bottom: 30px"
                                                     src="http://127.0.0.1:8000/storage/' . $user->image . '"
                                                     class="img-thumbnail img-circle img-responsive rounded-circle"
                                                     alt="ahihi"/>';
                            } else {
                                $output .= '<img id="img" style="width: 70px; height: 70px; margin-bottom: 30px"
                                                     src="http://127.0.0.1:8000/img/anhdaidien.jpg"
                                                     class="img-thumbnail img-circle img-responsive rounded-circle"
                                                     alt="ahihi"/>';
                            }
                        }
                    }
                    $output .= '</div>
                        <div class="col-md-12">';
                    foreach ($ratings as $rating) {
                        if ($rating->post_id == $post->id) {
                            $output .= '
                                        <span class="review-stars" style="color: #1e88e5;">';
                            if ($rating->rating <= 0) {
                                $output .= '<div class="rating"><i class="fa fa-star-o s" aria-hidden="true"></i>
                                        <i class="fa fa-star-o s" aria-hidden="true"></i>
                                        <i class="fa fa-star-o s" aria-hidden="true"></i>
                                        <i class="fa fa-star-o s" aria-hidden="true"></i>
                                        <i class="fa fa-star-o s" aria-hidden="true"></i></div>';
                            } elseif ($rating->rating === 1) {
                                $output .= '<div class="rating"><i class="fa fa-star s" aria-hidden = "true" ></i >
                                            <i class="fa fa-star-o s" aria-hidden = "true" ></i >
                                            <i class="fa fa-star-o s" aria-hidden = "true" ></i >
                                            <i class="fa fa-star-o s" aria-hidden = "true" ></i >
                                            <i class="fa fa-star-o s" aria-hidden = "true" ></i ></div>';
                            } elseif ($rating->rating === 2) {
                                $output .= '<div class="rating"><i class="fa fa-star s" aria-hidden = "true" ></i >
                                            <i class="fa fa-star s" aria-hidden = "true" ></i >
                                            <i class="fa fa-star-o s" aria-hidden = "true" ></i >
                                            <i class="fa fa-star-o s" aria-hidden = "true" ></i >
                                            <i class="fa fa-star-o s" aria-hidden = "true" ></i ></div>';

                            } elseif ($rating->rating === 3) {
                                $output .= '<div class="rating"><i class="fa fa-star s" aria-hidden = "true" ></i >
                                            <i class="fa fa-star s" aria-hidden = "true" ></i >
                                            <i class="fa fa-star-o s" aria-hidden = "true" ></i >
                                            <i class="fa fa-star-o s" aria-hidden = "true" ></i >
                                            <i class="fa fa-star-o s" aria-hidden = "true" ></i ></div>';
                            } elseif ($rating->rating === 4) {
                                $output .= '<div class="rating"><i class="fa fa-star s" aria-hidden = "true" ></i >
                                            <i class="fa fa-star s" aria-hidden = "true" ></i >
                                            <i class="fa fa-star s" aria-hidden = "true" ></i >
                                            <i class="fa fa-star s" aria-hidden = "true" ></i >
                                            <i class="fa fa-star-o s" aria-hidden = "true" ></i ></div>';
                            } elseif ($rating->rating >= 5) {
                                $output .= '<div class="rating"><i class="fa fa-star s" aria-hidden = "true" ></i >
                                            <i class="fa fa-star s" aria-hidden = "true" ></i >
                                            <i class="fa fa-star s" aria-hidden = "true" ></i >
                                            <i class="fa fa-star s" aria-hidden = "true" ></i >
                                            <i class="fa fa-star s" aria-hidden = "true" ></i ></div>';
                            }
                            $output .= '</span>';
                        }
                    }
                    $output .= '</div></div></div></div>
                        <div class="col-md-10">';
                    foreach ($users as $user) {
                        if ($user->id == $post->user_id) {
                            $output .= '
                               <div class="panel panel-default" style="width: 100%; margin-left: 17px">
                                   <div class="panel-heading">Đăng bởi: <b>' . $user->name . '</b> on <i>' . $post->created_at . '</i></div>
                                   <div id="body" class="panel-body">' . $post->body . '</div>
                                   <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="' . $post->id . '">Phản hồi</button></div>
                               </div>';
                        }
                    }

                    $output .= '</div>
                                               <div class="col-md-12">';

                    $output .= $this->get_reply_comment($post->id);
                    $output .= '</div>';

                    $last_id = $post->id;

                }
                $output .= '
       <div id="load_more">
        <button type="button" name="load_more_button" class="btn btn-link form-control" data-id="' . $last_id . '" id="load_more_button">Load More</button>
       </div>
       ';
            }
            echo $output;
        }

    }

    public function get_reply_comment($comment_id = 0)
    {

        $output = '';
        $users = User::all();
        $comments = DB::table('posts')->where('comment_id', $comment_id)->get();
        foreach ($comments as $comment) {
            $output .= '
                <div class="col-md-12">
                <div class="col-md-2">';
            foreach ($users as $user) {
                if ($user->id == $comment->user_id) {
                    if ($user->image) {
                        $output .= '<img id="img" style="width: 50px; height: 50px; margin-left: 80px"
                                                     src="http://127.0.0.1:8000/storage/' . $user->image . '"
                                                     class="img-thumbnail img-circle img-responsive rounded-circle"
                                                     alt="ahihi"/>';
                    } else {
                        $output .= '<img id="img" style="width: 50px; height: 50px; margin-left: 80px"
                                                     src="http://127.0.0.1:8000/img/anhdaidien.jpg"
                                                     class="img-thumbnail img-circle img-responsive rounded-circle"
                                                     alt="ahihi"/>';
                    }

                }
            }

            $output .= '  
                    </div>
                    <div class="col-md-10">
                        <div class="panel panel-default" style="margin-left: 68px; width: 96%">';
            foreach ($users as $user) {
                if ($user->id == $comment->user_id) {
                    $output .= '<div class="panel-heading">Đăng bởi: <b>' . $user->name . '</b> on <i>' . $comment->created_at . '</i></div>';
                }
            }
            $output .= '<div class="panel-body">' . $comment->body . '</div>
                </div>
                </div>         
                </div>';
        }
        return $output;
    }


    public function post(Request $request)
    {
        $error = '';
        $params = array();
        parse_str($request->form_data, $params);
        $post = new Post();
        if (empty($params['body'])) {
            $error .= '<p class="text-danger">Nội dung không được để trống</p>';
        } else {
            $post->body = $params['body'];
            $post->user_id = $params['user_id'];
            $post->comment_id = $params['comment_id'];
            $post->house_id = $params['house_id'];
            $post->save();
        }

        $postID = DB::table('posts')->where('id', DB::raw("(select max(`id`) from posts)"))->get();
        $rating = new \willvincent\Rateable\Rating;
        if ($params['comment_id'] > 0) {
            $error .= '<p class="text-success">Gửi phàn hồi thành công</p>';
        } elseif (empty($params['rate'])) {
            $error .= '<p class="text-danger">Bạn chưa đánh giá sao cho bài nhận xét này</p>';
        } else {
            $rating->rating = $params['rate'];
            $rating->user_id = $params['user_id'];
            $rating->post_id = $postID[0]->id;
            $post->ratings()->save($rating);
        }

        $data = array(
            'error' => $error,
            'data' => $params
        );
        return response()->json($data);
    }
}

