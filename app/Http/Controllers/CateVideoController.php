<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CateVideoRequest;

use App\CateVideo;
use Illuminate\Support\Facades\File;

class CateVideoController extends Controller
{
	public function index()
	{
		$catevideos = CateVideo::select('id', 'title', 'desc', 'type', 'order')->orderBy('id', 'DESC')->get()->toArray();
		return response()->json(['status' => 'success', 'data' => $catevideos]);
	}

	public function create(CateVideoRequest $request)
	{
		$catevideo = new CateVideo();
		$catevideo->title = $request->title;
		$catevideo->desc = $request->desc;
		$catevideo->type = $request->type;
		$catevideo->order = $request->order;
		$catevideo->image = $request->image;

		$catevideo->save();
		return response()->json(['status' => 'success', 'data' => $catevideo, 'message' => 'Success !! Complete Add Category']);
	}

	public function show($id)
	{
		$catevideo = CateVideo::find($id);
		return response()->json(['status' => 'success', 'data' => $catevideo]);
	}

	public function update(Request $request, $id)
	{
		//yêu cầu nhập chỉnh sửa
		$this->validate($request, [
			'title' => 'required',
			'type' => 'required',
		], [
			'title.required' => 'Please enter title category video',
			'type.required' => 'Please enter type category video',
		]);
		//cập nhật lại dữ liệu
		$catevideo = CateVideo::find($id);
		$catevideo->title = $request->title;
		$catevideo->desc = $request->desc;
		$catevideo->type = $request->type;
		$catevideo->order = $request->order;
		$catevideo->image = $request->image;

		$catevideo->save();
		return response()->json(['status' => 'success', 'data' => $catevideo, 'message' => 'Success !! Complete Edit Category Video']);
	}

	public function delete($id)
	{
		$catevideo = CateVideo::find($id);
		$catevideo->delete($id);
		return response()->json(['status' => 'success', 'data' => $catevideo,  'message' => 'success !! Complete Deleted']);
	}
}
