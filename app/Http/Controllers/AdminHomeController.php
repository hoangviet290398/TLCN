<?php

namespace App\Http\Controllers;
use App\Question;
use App\User;
use App\User_Question_Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notification;

class AdminHomeController extends Controller
{
	public function index()
	{
		$limit=\Config::get('constants.options.ItemNumberPerPage');
        $users = User::orderBy('created_at', 'desc')->paginate($limit);
        $users->setPath('/');
        $questions = Question::orderBy('created_at', 'desc')->paginate($limit);
        $questions->setPath('/');
		return view('admin.adminhome',compact('users','questions'));
	}

	public function manageUsers(){
		$limit=\Config::get('constants.options.ItemNumberPerPage');
        $users = User::orderBy('created_at', 'desc')->paginate($limit);
        $users->setPath('/');

		return view('admin.adminhome_users',compact('users'));
	}

	public function manageQuestions()
	{
		$limit=\Config::get('constants.options.ItemNumberPerPage');
        $questions = Question::orderBy('created_at', 'desc')->paginate($limit);
        $questions->setPath('/');
      
     	return view('admin.adminhome_questions',compact('questions'));
	}

	public function destroy(Request $request)
	{
		$this->removeQuestion($request);


		
		return redirect()->back();
	}
	
	public function removeQuestion(Request $request)
	{
		$question = Question::find($request->_id);

		if(empty($question)) return 'Question not found';

		$question->delete();

		(new UserController)->createNotification($question->user, Notification::$target['question'], Notification::$action['deleted'],  $question->_id);
	}

	public function manageQuestionsByUser($id)
	{
		$limit=\Config::get('constants.options.ItemNumberPerPage');
		$questions = Question::where('user_id',$id)->orderBy('created_at', 'desc')->paginate($limit);
		$questions->setPath('/');

		$created_by = User::where('_id',$id)->first();

		return view('admin.adminhomequestionsbyuser',compact('questions','created_by')); 
	}

	public function logout()
    {
        Auth::logout();
        Session()->flush();
        
        return redirect()->route('adminHomePage');
    }

}