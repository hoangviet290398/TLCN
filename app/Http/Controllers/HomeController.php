<?php

namespace App\Http\Controllers;
use App\Question;
use App\User;
use App\User_Question_Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Carbon\Carbon;


class HomeController extends Controller
{
	public function index()
	{
		$limit=\Config::get('constants.options.ItemNumberPerPage');
		$questions = Question::orderBy('created_at', 'desc')->paginate($limit);
		$questions->setPath('/');

		$topMembers = User::all();
		
		return view('home',compact('questions','topMembers'));
	}

	public function mostAnswered()
	{
		$limit=\Config::get('constants.options.ItemNumberPerPage');
		$questions = Question::orderBy('total_answer', 'desc')->paginate($limit);
		$questions->setPath('/');

		$topMembers = User::all();
		
		return view('home_most_answered',compact('questions','topMembers'));
	}

	public function noAnswers()
	{
		$limit=\Config::get('constants.options.ItemNumberPerPage');
		$questions = Question::where('total_answer', 0)->orderBy('created_at', 'desc')->paginate($limit);
		$questions->setPath('/');

		$topMembers = User::all();
		
		return view('home_no_answers',compact('questions','topMembers'));
	}

	public function week()
	{
		$limit=\Config::get('constants.options.ItemNumberPerPage');
	
		$questions = Question::where('created_at','>=', Carbon::now()->startOfWeek())->orderBy('created_at', 'desc')->paginate($limit);
	

		$topMembers = User::all();
		
		return view('home_week',compact('questions','topMembers'));
	}

	public function month()
	{
		$limit=\Config::get('constants.options.ItemNumberPerPage');
	
		$questions = Question::where('created_at','>=', Carbon::now()->startOfMonth())->orderBy('created_at', 'desc')->paginate($limit);
	

		$topMembers = User::all();
		
		return view('home_month',compact('questions','topMembers'));
	}

	public function year()
	{
		$limit=\Config::get('constants.options.ItemNumberPerPage');
	
		$questions = Question::where('created_at','>=', Carbon::now()->startOfYear())->orderBy('created_at', 'desc')->paginate($limit);
	

		$topMembers = User::all();
		
		return view('home_year',compact('questions','topMembers'));
	}

	public function ajaxSearch(Request $request){
		$keyword = $request->keyword;
		$client = new Client();
		$res = $client->get('http://localhost:9200/q&asystem.questions/_search?q="'.$keyword.'"&filter_path=hits.hits');
		$questions = $res->getBody('hits');
	
		$decode = json_decode($questions);
		
		$result = $decode->hits->hits;

		//if($result->count()<=0)return "";

		foreach($result as $key => $value){
				
			echo view('layout.search_link',compact('value'));
		}
	}

	public function searchIndex(Request $request){
		$keyword = $request->keyword;
		$client = new Client();
		$res = $client->get('http://localhost:9200/q&asystem.questions/_search?q="'.$keyword.'"&filter_path=hits.hits');
		
		
		$questions = $res->getBody('hits');
	
		$decode = json_decode($questions);
		
		$result = $decode->hits->hits;
		$array_id = [];
		foreach ($result as $key => $value) {
			array_push($array_id,$value->_id); 
		}
		$limit=\Config::get('constants.options.ItemNumberPerPage');
		$questions = Question::whereIn('_id', $array_id)->paginate($limit);
		$questions->setPath('/');

		$topMembers = User::all();
		
		return view('question.search_result',compact('questions','keyword','topMembers'));
	}

	public function runSearch($keyword){
		$fullText = Question::whereRaw(array('$text'=>array('$search'=> $keyword)))->get();

		return $fullText;
	}

	public function getQuestion(){
		$client = new Client();
		$res = $client->get('http://localhost:9200/q&asystem.questions/_search?q=title:VietPham');

		$keyword = 'VietPham';
		$questions = $this->runSearch($keyword);
		echo $questions;
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		//echo $res->getStatusCode(); // 200
		echo $res->getBody(); // { "type": "User", ....

	}
}