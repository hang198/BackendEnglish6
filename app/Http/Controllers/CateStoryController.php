<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CateStoryRequest;
use App\CateStory;
use Illuminate\Support\Facades\File;

class CateStoryController extends Controller
{
    public function index()
    {
        $catestorys = CateStory::select('id', 'title', 'desc', 'image')->orderBy('id', 'DESC')->get()->toArray();
        return response()->json(['status' => 'success', 'data' => $catestorys]);
    }

    public function create(CateStoryRequest $request)
    {
        $catestory = new CateStory();
        $catestory->title = $request->title;
        $catestory->desc = $request->desc;
        $catestory->type = $request->type;
        $catestory->order = $request->order;
        $catestory->image = $request->image;

        $catestory->save();
        return response()->json(['status' => 'success', 'data' => $catestory, 'message' => 'Success !! Complete Add Category']);
    }

    public function show($id)
    {
        $catestory = CateStory::find($id);
        return response()->json(['status' => 'success', 'data' => $catestory]);
    }

    public function update(Request $request, $id)
    {
        //yêu cầu nhập chỉnh sửa
        $this->validate($request, [
            'title' => 'required',
            'type' => 'required',
        ], [
            'title.required' => 'Please enter title category story',
            'type.required' => 'Please enter type category story',
        ]);

        //cập nhật lại dữ liệu
        $catestory = CateStory::find($id);
        $catestory->title = $request->title;
        $catestory->desc = $request->desc;
        $catestory->type = $request->type;
        $catestory->order = $request->order;
        $catestory->image = $request->image;

        $catestory->save();
        return response()->json(['status' => 'success', 'data' => $catestory, 'message' => 'Success !! Complete Edit Category Story']);
    }

    public function delete($id)
    {
        $catestory = CateStory::find($id);
        $catestory->delete($id);
        return response()->json(['status' => 'success', 'data' => $catestory, 'message' => 'success !! Complete Deleted']);
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $file_name = $request->file('image')->store('public/images');
            return response()->json(['status' => 'success', 'data' => basename($file_name), 'message' => 'success !! Complete Uploaded']);
        }
        return response()->json(['status' => 'error', 'message' => 'error !! File not valid']);
    }
}
