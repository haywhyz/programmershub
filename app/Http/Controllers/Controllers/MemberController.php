<?php

namespace App\Http\Controllers\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;


class MemberController extends Controller
{
    public function member_list(User $user){
        $member = $user::where('role',2)->get();
        return view('administrator.member.list')->with('members',$member);
    }
}
