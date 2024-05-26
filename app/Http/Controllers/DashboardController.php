<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\UserServices\GetUserNameByIdService;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\EventServices\GetEventByUserIDService;
use App\Http\Services\GroupServices\GetGroupByUserIdService;
class DashboardController extends Controller
{
    public function index(GetUserNameByIdService $getUserByIdService, GetEventByUserIDService $getEventByUserIDService, GetGroupByUserIdService $getGroupByUserIdService){
        $events = $getEventByUserIDService->execute(Auth::user()->id);
        $groups = $getGroupByUserIdService->execute(Auth::user()->id);
        $result = $getUserByIdService->execute(Auth::user()->id);
        return view('dashboard', ['user' => $result, 'events' => $events, 'groups' => $groups]);
    }
}
