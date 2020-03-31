<?php

namespace App\Http\Controllers;

use App\CateStory;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoryRequest;
use App\Story;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class StoryController extends Controller
{
    public function index()
    {
        $storys = Story::join('catestory', 'catestory.id', '=', 'stories.catestory_id')
            ->select('stories.id', 'stories.title', 'catestory.title as catestory_title')
            ->orderBy('id', 'DESC')->get()->toArray();
        return response()->json(['status' => 'success', 'data' => $storys]);
    }

    public function create(StoryRequest $request)
    {
        $story = new Story();
        $story->title = $request->title;
        $story->content = $request->content;
        $story->catestory_id = $request->catestory_id;
        $story->image = $request->image;

        $story->save();
        return response()->json(['status' => 'success', 'data' => $story, 'message' => 'Success !! Complete Add Story']);
    }

    public function show($id)
    {
        $story = Story::find($id)->toArray();
        return response()->json(['status' => 'success', 'data' => $story]);
    }

    public function update(Request $request, $id)
    {
        //yêu cầu nhập chỉnh sửa
        $this->validate($request, [
            'title' => 'required',
        ], [
            'title.required' => 'Please enter title story',
        ]);

        //cập nhật lại dữ liệu
        $story = Story::find($id);
        $story->title = $request->title;
        $story->content = $request->content;
        $story->catestory_id = $request->catestory_id;
        $story->image = $request->image;

        $story->save();
        return response()->json(['status' => 'success', 'data' => $story, 'message' => 'Success !! Complete Edit Story']);
    }

    public function delete($id)
    {
        $story = Story::find($id);
        $story->delete($id);
        return response()->json(['status' => 'success', 'data' => $story, 'message' => 'success !! Complete Deleted']);
    }

    public function getStories($catestory_id)
    {
        $stories = Story::where('catestory_id', $catestory_id)->get();
        return response()->json(['status' => 'success', 'data' => $stories]);
    }
}
