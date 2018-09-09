<?php

namespace App\Http\Controllers;

use App\Question;
use App\Tag;
use Auth;
use Illuminate\Http\Request;
use Validator;

class QuestionsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$questions = Question::orderBy('id', 'desc')->get();
		$tags = Tag::pluck('name', 'id')->toArray();
		return view('admin.questions.index', compact('tags', 'questions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$tags = Tag::pluck('name', 'id');
		return View('admin.questions.create', compact('tags'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store() {
		$data = request()->except('_token', 'tag_ids');
		$validator = Validator::make($data,
			array(
				'blogorforum' => 'required',
				'title' => 'required',
				'question' => 'required',
				'thumb_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
				// 'tag_ids' => 'required',
			)
		);

		if ($validator->fails()) {
			return Redirect()->route("questions.create")
				->withErrors($validator)
				->withInput();
		}
		$userid = Auth::user()->id;
		$data['user_id'] = $userid;
		$data['tag_ids'] = json_encode(request()->tag_ids);
		/*Thumb image upload*/
		$thumb_image = $data['thumb_image'];
		$imageName = time() . '_' . get_file_name($thumb_image->getClientOriginalName());
		$data['thumb_image'] = $imageName;

		// dd($data);
		$questions = Question::create($data);
		if ($questions) {
			if ($thumb_image != null) {
				$thumb_image->storeAs('admin/blog', $imageName);
			}
			$message = "You have successfully created";
			return Redirect()->route('questions.index')
				->with('flash_success', $message);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$questions = Question::where('id', $id)->first();
		//dd($questions->tag_ids);
		$tags = Tag::pluck('name', 'id')->toArray();
		return View('admin.questions.edit', compact('questions', 'tags'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update($id) {
		$data = request()->except('_method', '_token', 'tag_ids', 'old_thumb_image');
		$validator = Validator::make($data,
			array(
				'title' => 'required',
				'question' => 'required',
				'thumb_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			)
		);

		if ($validator->fails()) {
			return Redirect()->route('questions.edit', $id)
				->withErrors($validator)
				->withInput();
		}
		$data2 = request()->only('old_thumb_image');
		//for thumb image
		$thumb_image = request()->file('thumb_image');
		if ($thumb_image != null) {
			$imageName = time() . '_' . get_file_name($thumb_image->getClientOriginalName());
			$data['thumb_image'] = $imageName;
		}

		$data['tag_ids'] = json_encode(request()->tag_ids);
		//dd($data);
		$questions = Question::where('id', $id)->update($data);
		if ($questions) {
			//delete & store thumb image
			if ($thumb_image != null) {
				\Storage::delete('admin/blog/' . $data2['old_thumb_image']);
				$thumb_image->storeAs('admin/blog/', $imageName);
			}
			$message = "You have successfully updated";
			return redirect()->route('questions.edit', $id)
				->with('flash_success', $message);
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$questions = Question::where('id', $id)->delete();
		if ($questions) {
			$message = "You have successfully deleted";
			return redirect()->route('questions.index')
				->with('flash_success', $message);
		} else {
			$message = "Data could not be deleted";
			return redirect()->route('questions.index')
				->with('flash_error', $message);
		}
	}

}
