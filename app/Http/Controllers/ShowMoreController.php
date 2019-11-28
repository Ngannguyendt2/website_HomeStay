<?php

namespace App\Http\Controllers;

use App\Rating;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowMoreController extends Controller
{
    public function load_data(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($request->id > 0) {
                $posts = DB::table('posts')
                    ->where('house_id', $id)
                    ->where('id', '<', $request->id)
                    ->orderBy('id', 'DESC')
                    ->limit(2)
                    ->get();
            } else {
                $posts = DB::table('posts')
                    ->where('house_id', $id)
                    ->orderBy('id', 'DESC')
                    ->limit(2)
                    ->get();
            }
            $users = User::all();
            $ratings = Rating::all();
            $output = '';
            $last_id = '';
            if (!$posts->isEmpty()) {
                foreach ($posts as $post) {
                    $output .= '
                <div class="rating col-md-12">
                    <div class="row">
                        <div class="col-md-3">';
                    foreach ($users as $user) {
                        if ($post->user_id == $user->id) {
                            $output .= '<p style="margin-bottom: 0">' . $user->name . '</p>';
                            if ($user->image) {
                                $output .= '<img id="img" style="width: 50px; height: 50px; margin-bottom: 30px"
                                                     src="http://127.0.0.1:8000/' . $user->image . '"
                                                     class="img-thumbnail img-circle img-responsive rounded-circle"
                                                     alt="ahihi"/>';
                            } else {
                                $output .= '<img id="img" style="width: 50px; height: 50px; margin-bottom: 30px"
                                                     src="http://127.0.0.1:8000/img/anhdaidien.jpg"
                                                     class="img-thumbnail img-circle img-responsive rounded-circle"
                                                     alt="ahihi"/>';
                            }

                        }
                    }
                    $output .= '</div>
                        <div class="col-md-9">';
                    foreach ($ratings as $rating) {

                        if ($rating->post_id == $post->id) {
                            $output .= '<span class="review-stars" style="color: #1e88e5;">';
                            if ($rating->rating <= 0) {
                                $output .= '<i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>';
                            } elseif ($rating->rating === 1) {
                                $output .= '<i class="fa fa-star" aria-hidden = "true" ></i >
                                            <i class="fa fa-star-o" aria-hidden = "true" ></i >
                                            <i class="fa fa-star-o" aria-hidden = "true" ></i >
                                            <i class="fa fa-star-o" aria-hidden = "true" ></i >
                                            <i class="fa fa-star-o" aria-hidden = "true" ></i >';
                            } elseif ($rating->rating === 2) {
                                $output .= '<i class="fa fa-star" aria-hidden = "true" ></i >
                                            <i class="fa fa-star" aria-hidden = "true" ></i >
                                            <i class="fa fa-star-o" aria-hidden = "true" ></i >
                                            <i class="fa fa-star-o" aria-hidden = "true" ></i >
                                            <i class="fa fa-star-o" aria-hidden = "true" ></i >';

                            } elseif ($rating->rating === 3) {
                                $output .= '<i class="fa fa-star" aria-hidden = "true" ></i >
                                            <i class="fa fa-star" aria-hidden = "true" ></i >
                                            <i class="fa fa-star-o" aria-hidden = "true" ></i >
                                            <i class="fa fa-star-o" aria-hidden = "true" ></i >
                                            <i class="fa fa-star-o" aria-hidden = "true" ></i >';
                            } elseif ($rating->rating === 4) {
                                $output .= '<i class="fa fa-star" aria-hidden = "true" ></i >
                                            <i class="fa fa-star" aria-hidden = "true" ></i >
                                            <i class="fa fa-star" aria-hidden = "true" ></i >
                                            <i class="fa fa-star" aria-hidden = "true" ></i >
                                            <i class="fa fa-star-o" aria-hidden = "true" ></i >';
                            } elseif ($rating->rating >= 5) {
                                $output .= '<i class="fa fa-star" aria-hidden = "true" ></i >
                                            <i class="fa fa-star" aria-hidden = "true" ></i >
                                            <i class="fa fa-star" aria-hidden = "true" ></i >
                                            <i class="fa fa-star" aria-hidden = "true" ></i >
                                            <i class="fa fa-star" aria-hidden = "true" ></i >';
                            }
                            $output .= '</span>';

                        }
                    }
                    $output .= '<p>' . $post->body . '</p>
                        </div>
                    </div>
                </div>';
                    $last_id = $post->id;


                }

                $output .= '
                <div id="load_more">
                    <button style="margin-left: 50px" name="load_more_button"
                            class="btn btn-outline-info" data-id="' . $last_id . '" id="load_more_button">Xem thêm</button>
                </div>
                ';
            } else {
                $output .= '
                <div id="load_more">
                    <button style="margin-left: 50px" class="btn btn-outline-danger" name="load_more_button" type="button">Không có dữ liệu</button>
                </div>
                ';
            }
            echo $output;
        }
    }
}

