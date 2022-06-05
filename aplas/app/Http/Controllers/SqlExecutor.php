<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

Use Exception;

class SqlExecutor extends Controller {
	// json return

	function jsonReturner(
		$msg,
		$code,
		$data
	) {
		if ($data == "") {
			return response()->json(
				[
					'message' => $msg,
					'code' => $code,
					'data' => array()
				],$code
			);
		}else{
	return response()->json(
				[
					'message' => $msg,
					'code' => $code,
					'data' => $data
				],$code
			);

		}
	}

	public function index(Request $request) {
	
		return $this->jsonReturner("Run",200,"");

	}
	//
	public function Execute(Request $request) {
		$payload = Validator::make($request->all(),[
			'query' => 'required',
		],[
			'query.required' => 'please fill query',
		]);

		
	
	// check 
		if ($payload->fails()){
			return $this->jsonReturner(
				"Please set query",
				400,
				""
			);
		}
		try {
			// enable query log
			DB::enableQueryLog();
			$jsonQueryStr = json_encode($request->json()->all(),TRUE);
			$decodeJSON = json_decode($jsonQueryStr);

			$query = DB::select($decodeJSON->query);
			$queryLog = DB::getQueryLog();
//		var_dump($queryLog[0]['time']);
			return $this->jsonReturner("Run",200,array(
				"message" => "Query OK",
				"execute_time" => $queryLog[0]['time'],
				"result" => $query

			));
		} catch (Exception $e) {	
		
			return $this->jsonReturner($e->getMessage(),400,array(
				"sql_err_code" => $e->getCode(),
				"message" => $e->getMessage()
			));
			}
		

	}
}
