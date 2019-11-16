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
		
		return view('home',compact('questions'));
	}

	public function ajaxSearch(Request $request){
		$client = new Client();
		$res = $client->get('http://localhost:9200/q&asystem.questions/_search?q='.$request->keyword);
		//$questions = $this->runSearch($request->keyword);
		//if($questions->count()<=0) return "";
		if($res->getBody()->count()<=0)return "";

		foreach($res->getBody() as $question){
			echo view('layout.search_link',compact('question'));
		}
	}

	public function searchIndex(Request $request){
		$keyword = $request->keyword;
		$client = new Client();
		$res = $client->get('http://localhost:9200/q&asystem.questions/_search?q='.$keyword.'&filter_path=hits.hits');
		//$questions = $this->runSearch($keyword);
		
		$questions = $res->getBody('hits');
		// echo gettype($questions);
		// exit;
		// echo gettype($questions);
		// exit;
		//$decode = json_decode($questions);
		// $decode1= json_decode(json_encode($questions));
		// echo gettype($decode1);
		// exit;
		$decode = json_decode($questions);
		
		$result = $decode->hits->hits;
		
		// foreach ($result as $key => $value) {
		// 	$carbon = new Carbon($value->_source->created_at);
		// 	echo var_dump($carbon).'<br/>';
		// }
		// exit;
	
		//$myArray = json_decode($questions);
		//echo $myArray->{'hits'};
		// echo $result;
		// exit;
		
		
		
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