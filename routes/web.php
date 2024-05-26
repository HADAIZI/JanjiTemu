<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetEventController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Models\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [GetEventController::class, 'GetSomeEventLists']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
// // Route untuk keperluan pengembangan FE Group Detail + Create Group
// Route::get('/group/fegd', [GroupController::class, 'ShowGroupDetailTest'])->name('group.testgd');
// // Route untuk keperluan pengembangan FE Group Detail + Create Group + Create Event
// Route::get('/group/fegd/eventcreate', [GroupController::class, 'ShowCreateEventTest'])->name('group.testcreateevent');
// Route (inline view) untuk keperluan pengembangan FE Event Detail (see event by id)
Route::get('/eventdetail', function () {
    return view('eventdetail');
});
//todo 
//add get event by group id
//add change routing to {{group_id}}
Route::middleware('auth')->group(function () {
    Route::get('/group', [GroupController::class, 'GetGroup'])->name('group.getgroup');
    Route::post('/group', [GroupController::class, 'SearchGroup'])->name('group.search');
    Route::prefix('/group/{group_id}')->group(function () {
        Route::get('/setmoderator',[GroupController::class, 'SetModerator'])->name('privilege.setmoderator');
        Route::get('/setmember',[GroupController::class, 'SetMember'])->name('privilege.setmember');
        Route::get('/setadmin',[GroupController::class, 'SetAdmin'])->name('privilege.setadmin');
        Route::get('/', [GroupController::class, 'GetGroupById'])->name('group.getgroupbyid');
        Route::post('/join', [GroupController::class, 'JoinGroup'])->name('group.joingroup');
        Route::prefix('/event')->group(function () {
            Route::get('/', [EventController::class, 'GetEventInGroup'])->name('event.geteventbygroup');
            Route::post('/create', [EventController::class, 'CreateEvent'])->name('event.store'); // add event to group
            Route::get('/create', [EventController::class, 'eventindex'])->name('event.eventindex'); // add event to group
            Route::get('/{event_id}', [EventController::class, 'GetEventByID'])->name('event.geteventdetail');
            Route::get('/{event_id}/join', [EventController::class, 'JoinEvent'])->name('event.joinevent');
            Route::get('/{event_id}/comment', [EventController::class, 'GetEventComment'])->name('event.getcomment');
            Route::post('/{event_id}/comment', [EventController::class, 'AddEventCommentary'])->name('event.postcomment');
            Route::patch('/update/{event_id}', [EventController::class, 'UpdateEvent'])->name('event.update'); // update event
            Route::delete('/delete/{event_id}', [EventController::class, 'DeleteEvent'])->name('event.delete'); // delete event
        });
    });
    Route::get('/event', [EventController::class, 'GetSomeEventLists'])->name('event.getsearch'); //search event
    Route::post('/event', [EventController::class, 'SearchEvent'])->name('event.search'); //search event
    Route::get('dashboard/event/', [EventController::class, 'GetEventByUserID'])->name('event.getevent'); //get event by user id
    Route::get('/creategroup', [GroupController::class, 'index'])->name('group.getcreate');
    Route::post('/creategroup', [GroupController::class, 'CreateGroup'])->name('group.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
