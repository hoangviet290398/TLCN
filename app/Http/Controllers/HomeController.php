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

	public function ajaxSearch(Request $request){
		$keyword = $request->keyword;
		$client = new Client();
		$res = $client->get('http://localhost:9200/q&asystem.questions/_search?q='.$keyword.'&filter_path=hits.hits');
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
		$res = $client->get('http://localhost:9200/q&asystem.questions/_search?q='.$keyword.'&filter_path=hits.hits');
		
		
		$questions = $res->getBody('hits');
	
		$decode = json_decode($questions);
		
		$result = $decode->hits->hits;
						
		return view('question.search_result',compact('result','keyword'));
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