<?php

namespace App\Http\Controllers;
use App\Question;
use App\Tag;

class SitesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function blog() {
		$reponse = [];

		$questions = Question::orderBy('id', 'desc')->get();
		$reponse['questions'] = $questions;
		$tags = Tag::pluck('name', 'id');
		$reponse['tags'] = $tags;
		return response()->json($reponse);
	}

	public function forum() {
		$reponse = [];

		$questions = Question::orderBy('id', 'desc')->get();
		$reponse['questions'] = $questions;
		$tags = Tag::pluck('name', 'id');
		$reponse['tags'] = $tags;
		return response()->json($reponse);
	}

	public function blogdetails($id) {
		$reponse = [];

		$questions = Question::where('id', $id)->orderBy('id', 'desc')->get();
		$reponse['questions'] = $questions;
		$tags = Tag::pluck('name', 'id');
		$reponse['tags'] = $tags;
		return response()->json($reponse);
	}

	public function search($data) {
		$search_data = Question::where('title', 'LIKE', "%$data%")
			->orWhere('question', 'LIKE', "%$data%");

		$search_tag = Tag::where('name', 'LIKE', "%$data%")->pluck('id');

		if (count($search_tag) > 0) {
			$id = substr(json_encode($search_tag), 1, -1);
			$search_data->orWhere('tag_ids', 'LIKE', '%' . $id . '%');

		}

		$results = $search_data->orderBy('id', 'desc')->get();

		//dd($results);

		return response()->json($results);
	}

}
