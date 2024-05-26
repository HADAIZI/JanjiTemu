<?php

namespace App\Http\Controllers;

use App\Http\Services\UserGroupServices\GetGroupPermisionService;
use Illuminate\Http\Request;
use App\Models\Group;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Services\UserGroupServices\AddUserGroupService;
use App\Http\Services\UserGroupServices\GetUserInGroupByRoleService;
use App\Http\Services\UserGroupServices\SetPrivilegeService;
use App\Http\Services\UserGroupServices\GetGroupMemberService;
use App\Http\Services\UserGroupServices\ChangeGroupAdminService;
use App\Http\Services\GroupServices\GetGroupService;
use App\Http\Services\GroupServices\CreateGroupService;
use App\Http\Services\GroupServices\SearchGroupService;
use App\Http\Services\GroupServices\GetGroupByIdService;
use App\Http\Services\GroupServices\GetGroupTotalEventService;
use App\Http\Services\EventServices\GetEventInGroupService;
use Carbon\Carbon;
use App\Models\UserGroup;
use Throwable;
use Illuminate\Support\Facades\Auth;


class GroupController extends Controller
{
    //show group list
    public function index()
    {
        return view('creategroup');
    }
    public function GetGroup(Request $request, GetGroupService $getGroupService)
    {
        $count = $request->input('count') ?? 10;
        $results = $getGroupService->execute($count);
        return view('group', ['results' => $results]);
    }

    //create new group, and auto set user as master
    public function CreateGroup(Request $request, AddUserGroupService $addUserGroupService, CreateGroupService $createGroupService)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $groupId = Str::uuid();
        DB::beginTransaction();
        try {
            $group = new Group(
                $groupId,
                $request->input('name'),
                $request->input('description'),
                1,
                date('Y-m-d H:i:s')
            );
            $createGroupService->execute($group);
            $userGroupId = Str::uuid();
            $userGroup = new UserGroup(
                $userGroupId,
                Auth::user()->id,
                $groupId,
                1
            );
            $addUserGroupService->execute($userGroup);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
        $status = 'success membuat grup';
        $group_id = $groupId;
        // dd($group_id);
        return redirect()->route('group.getgroupbyid', compact('group_id', 'status'));
    }

    //show group search result
    public function SearchGroup(Request $request, SearchGroupService $searchGroupService, GetGroupService $getGroupService)
    {
        if($request->input('search') == null){
            return redirect()->route('group.getgroup');
        }
        $group = $request->input('search');
        $results = $searchGroupService->execute($group);
        return view('group', ['results' => $results]);
    }

    //Get group by id and show it's group's master
    public function GetGroupById(
        string $id,
        GetGroupByIdService $getGroupByIdService,
        GetUserInGroupByRoleService $getUserInGroupByRoleService,
        GetGroupTotalEventService $getGroupTotalEventService,
        GetGroupMemberService $getGroupMemberService,
        GetEventInGroupService $getEventInGroupService,
        GetGroupPermisionService $getGroupPermisionService
    ) {
        $results = $getGroupByIdService->execute($id);
        // if(isEmpty($results)){
        //     return view('groupdetail', ['results' => $results]);
        // }
        $user_status = $getGroupPermisionService->execute(Auth::user()->id, $id);
        $events = $getEventInGroupService->execute($id);
        $members = $getGroupMemberService->execute($id);
        $results->total_event = $getGroupTotalEventService->execute($id);
        $group_master = $getUserInGroupByRoleService->execute(1, $id)[0];
        return view('groupdetail', ['results' => $results, 'group_master' => $group_master, 'members' => $members, 'events' => $events, 'user_status' => $user_status->role  ?? null, 'group_id' => $id]);
    }

    public function JoinGroup(string $id, AddUserGroupService $addUserGroupService)
    {
        $userGroupId = Str::uuid();
        $userGroup = new UserGroup(
            $userGroupId,
            Auth::user()->id,
            $id,
            3
        );
        $info = $addUserGroupService->execute($userGroup);
        return redirect()->route('group.getgroupbyid', ['group_id' => $id, 'info' => $info]);
    }

    public function SetModerator(string $group_id, Request $request, SetPrivilegeService $setPrivilegeService, GetGroupPermisionService $getGroupPermisionService)
    {
        $request->validate([
            'user_id' => 'integer|required',
        ]);
        $adminId = Auth::user()->id;
        $permission = $getGroupPermisionService->execute($adminId, $group_id);
        if($permission->role == 1){
            DB::beginTransaction();
            try{
                $user_id = $request->input('user_id');
                $setPrivilegeService->execute($group_id, $user_id, 2);
                DB::commit();
                return redirect()->route('group.getgroupbyid', ['group_id' => $group_id, 'info' => 'sukses menjadikan hak member sebagai moderator']);
            }catch(\Exception $e){
                DB::rollback();
                Throw $e;
                return redirect()->route('group.getgroupbyid', ['group_id' => $group_id, 'info' => 'gagal menaikkan hak member']);
            }
        }else{
            return redirect()->route('group.getgroupbyid', ['group_id' => $group_id, 'info' => 'anda bukan admin grup']);
        }
    }

    public function SetMember(string $group_id, Request $request, SetPrivilegeService $setPrivilegeService, GetGroupPermisionService $getGroupPermisionService)
    {
        $request->validate([
            'user_id' => 'integer|required',
        ]);
        $adminId = Auth::user()->id;
        $permission = $getGroupPermisionService->execute($adminId, $group_id);
        if($permission->role == 1){
            DB::beginTransaction();
            try{
                $user_id = $request->input('user_id');
                $setPrivilegeService->execute($group_id, $user_id, 3);
                DB::commit();
                return redirect()->route('group.getgroupbyid', ['group_id' => $group_id, 'info' => 'sukses menurunkan hak moderator sebagai member']);
            }catch(\Exception $e){
                DB::rollback();
                Throw $e;
                return redirect()->route('group.getgroupbyid', ['group_id' => $group_id, 'info' => 'gagal menurunkan hak moderator']);
            }
        }else{
            return redirect()->route('group.getgroupbyid', ['group_id' => $group_id, 'info' => 'anda bukan admin grup']);
        }
    }

    public function SetAdmin(string $group_id, Request $request, ChangeGroupAdminService $changeGroupAdminService, GetGroupPermisionService $getGroupPermisionService)
    {
        $request->validate([
            'user_id' => 'integer|required',
        ]);
        $adminId = Auth::user()->id;
        $permission = $getGroupPermisionService->execute($adminId, $group_id);
        if($permission->role == 1){
            DB::beginTransaction();
            try{
                $user_id = $request->input('user_id');
                $changeGroupAdminService->execute($group_id, $user_id, $adminId);
                DB::commit();
                return redirect()->route('group.getgroupbyid', ['group_id' => $group_id, 'info' => 'Admin grup telah berganti']);
            }catch(\Exception $e){
                DB::rollback();
                throw $e;
                return redirect()->route('group.getgroupbyid', ['group_id' => $group_id, 'info' => 'gagal jadi admin']);
            }
        }else{
            return redirect()->route('group.getgroupbyid', ['group_id' => $group_id, 'info' => 'anda bukan admin grup']);
        }
    }
}
