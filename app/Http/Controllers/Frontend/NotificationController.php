<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications=CommentRepository::getNotifications()->limit(10)->get();

        return view('frontend.notifications', ['notifications' => $notifications]);
    }
}
