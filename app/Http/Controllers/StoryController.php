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
        $extension = ['jpg', 'png', 'jpeg', 'end'];
        if ($request->hasFile('imagesStory')) {
            $file = $request->file('imagesStory');
            $duoi = $file->getClientOriginalExtension();
            foreach ($extension as $key) {
                # code...
                if ($key == 'end') {
                    return redirect('admin/stories/add')->with('Warning', 'Just except .jpg, .png, .jpeg');
                } else if ($duoi == $key) {
                    break;
                }
            }
            $name = $file->getClientOriginalName();
            $file->move('resources/upload/imagestory/', $name);
            $story->image = $name;
        } else {
            $story->image = "";
        }

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

        //xử lý hình ảnh
        $img_current = 'resources/upload/imagestory/' . $request->input('imgCurrent');
        if (!empty($request->file('imagesStory'))) {
            $file_name = $request->file('imagesStory')->getClientOriginalName();
            $story->image = $file_name;
            $request->file('imagesStory')->move('resources/upload/imagestory/', $file_name);
            if (File::exists($img_current)) {
                File::delete($img_current);
            }
        }

        $story->save();
        return response()->json(['status' => 'success', 'data' => $story, 'message' => 'Success !! Complete Edit Story']);
    }

    public function delete($id)
    {
        $story = Story::find($id);
        $story->delete($id);
        return response()->json(['status' => 'success', 'data' => $story, 'message' => 'success !! Complete Deleted']);
    }
}
