<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Member; // Import the Member model


class MainController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dashboard()
    {
        $userRole = Auth::user()->role;
        $data="";
        $sep_data="";

        if($userRole =='dep'){
            $data ="DEP";
            $sep_data = DB::table('members')
                ->where('members.supervisor','=',Auth::user()->email)
                ->get();
            return view('dashboard', compact('sep_data'));
        }elseif ($userRole =='admin'){
            $data ="admin";
            $sep_data = DB::table('members')
                ->join('users','members.supervisor','=','users.email')
                ->select('members.*','users.name as uname')
                ->get();
            return view('admindashboard', compact('sep_data'));
        }


    }

    public function index()
    {
        $userRole = Auth::user()->role;
        $data="";
        $sep_data="";

        if($userRole =='dep'){
            $data ="DEP";
            $sep_data = DB::table('members')
                ->where('members.supervisor','=',Auth::user()->email)
                ->where('data','like',0)
                    ->get();
        }

        return view('create', compact('sep_data'));
    }

    public function storeMemberData(Request $request){
        $data = $request->input('data');
        $year = $request->input('year');
        $member_id = $request->input('sep_member_val');
        $members_admin_view_count = DB::table('members_admin_view')
            ->where('members_admin_view.memberid','=',$member_id)
            ->count();

        DB::table('members')
            ->where('members.id', '=', $member_id)
            ->update([
                'members.data' => $data,
                'members.year' =>$year
            ]);

        if($members_admin_view_count>0){
            $members_admin_view_step = DB::table('members_admin_view')
                ->select('step')
                ->where('members_admin_view.memberid','=',$member_id)
                ->first();
            $newstep = $members_admin_view_step->step+1;

            DB::table('members_admin_view')
                ->insert([
                    'members_admin_view.data' => $data,
                    'members_admin_view.memberid' => $member_id,
                    'members_admin_view.step' =>  $newstep
                ]);
        }else{
            DB::table('members_admin_view')
                ->where('members_admin_view.memberid','=',$member_id)
                ->insert([
                    'members_admin_view.data' => $data,
                    'members_admin_view.memberid' => $member_id,
                    'members_admin_view.step' => 1
                ]);
        }



        return redirect()->back()->with('success', 'Member data');

    }

    public function edit()
    {
        $userRole = Auth::user()->role;
        $data="";
        $sep_data="";

        if($userRole =='dep'){
            $data ="DEP";
            $sep_data = DB::table('members')
                ->where('members.supervisor','=',Auth::user()->email)
                ->where('data','not like',0)
                ->get();
        }

        return view('edit', compact('sep_data'));
    }

    public function editMember(Request $request,$id)
    {
        $userRole = Auth::user()->role;

            $sep_data = DB::table('members')
                ->where('members.supervisor','=',Auth::user()->email)
                ->where('data','not like',0)
                ->where('id','=',$id)
                ->first();


        return view('editmember', compact('sep_data'));
    }

    public function viewMemberAdmin(Request $request,$id)
    {
        $userRole = Auth::user()->role;

        if($userRole =='admin'){
            $data = DB::table('members')
                ->join('members_admin_view','members_admin_view.memberid','=','members.id')
                ->where('members.id','=',$id)
                ->get();
            $user_main_data = DB::table('members')
                ->join('users','members.supervisor','=','users.email')
                ->select('members.*','users.name as uname')
                ->where('members.id','=',$id)
                ->first();
        }


        return view('viewmemberadmin', compact('data','user_main_data'));
    }

    public function viewMemberAdminAll()
    {


            $sep_data = DB::table('members')
                ->where('data','not like',0)
                ->get();

        return view('viewadminall', compact('sep_data'));
    }

    public function newmember(){
        $userRole = Auth::user()->role;
        if($userRole =='admin'){
            return view('newmember');
        }else{
            abort(404);
        }

    }

    public function storenewmember(Request $request)
    {

        $membersData = $request->input('members');

        foreach ($membersData as $data) {
            if ($data['name'] !=''){
                $member = new Member();
                $member->name = $data['name'] ?? '';
                $member->email = $data['email'] ?? '';
                $member->supervisor = $data['supervisor'] ?? '';
                // Any additional fields can be handled here

                $member->save();
            }

        }

        // Redirect or return a response after saving the data
        return redirect('/dashboard')->with('success', 'Members created successfully!');
    }

}
