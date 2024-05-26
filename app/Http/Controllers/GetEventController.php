<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Services\EventServices\GetSomeEventService;

class GetEventController extends Controller
{
    public function GetSomeEventLists(GetSomeEventService $getSomeEventService){
        $results = $getSomeEventService->execute(3);
        return view('index', ['results' => $results]);
    }

    public function CreateEvent(){}
    public function SearchEvent(){}
    public function UpdateEvent(){}
    public function DeleteEvent(){}
    
}
