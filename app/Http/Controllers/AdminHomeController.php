<?php

namespace App\Http\Controllers;
use App\Question;
use App\User;
use App\User_Question_Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
	public function index()
	{
		
		return view('admin.adminhome');
	}

}