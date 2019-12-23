<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoryRequest;
use App\Story;
use DB;
use File;

class StoryController extends Controller
{
    public function index() {
        try {
            $storys = Story::select('id', 'title', 'catestory_id')->orderBy('id', 'DESC')->get()->toArray();
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => 'success', 'data' => $storys]);
    }

    public function create(StoryRequest $request) {
    	$story = new Story();
    	$story->title = $request->txtTitleStory;
    	$story->content = $request->txtContentStory;
    	$story->catestory_id = $request->id_category;
    	$extension = ['jpg','png','jpeg','end'];
        if($request->hasFile('imagesStory')){
            $file = $request->file('imagesStory');
            $duoi = $file->getClientOriginalExtension();
            foreach ($extension as $key) {
                # code...
                if($key == 'end'){
                    return redirect('admin/stories/add')->with('Warning','Just except .jpg, .png, .jpeg');

                }
                else if($duoi == $key){
                    break;
                }
            }
            $name = $file->getClientOriginalName();
            $file->move('resources/upload/imagestory/',$name);
            $story->image = $name;
        }
        else{
        	$story->image = "";
        }

        $story->save();
        return redirect('admin/stories/list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Add Story']);
    }

    public function show($id) {
        $data = Story::findOrFail($id)->toArray();
        $Listcate = DB::table('catestory')->get();
        return view('admin.stories.edit', compact('data', 'Listcate'));
    }

    public function update(Request $request, $id) {
        //yêu cầu nhập chỉnh sửa
        $this->validate($request,[
            'txtTitleStory'=>'required',
            ],[
            'txtTitleStory.required'=>'Please enter title story',
            ]);

        //cập nhật lại dữ liệu
        $story = Story::find($id);
        $story->title = $request->txtTitleStory;
        $story->content = $request->txtContentStory;
        $story->catestory_id = $request->id_category;

        //xử lý hình ảnh
        $img_current = 'resources/upload/imagestory/'.$request->input('imgCurrent');
        if(!empty($request->file('imagesStory'))){
            //echo "có file";
            $file_name = $request->file('imagesStory')->getClientOriginalName();
            $story->image = $file_name;
            $request->file('imagesStory')->move('resources/upload/imagestory/',$file_name);
            if(File::exists($img_current)){
                File::delete($img_current);
            }
        }
        else{
            echo "không có file ảnh";
        }

        $story->save();
        return redirect('admin/stories/list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Edit Story']);
    }

    public function delete($id) {
    	$story = Story::find($id);
        File::delete('resources/upload/imagestory/'.$story->image);
    	$story->delete($id);
    	return redirect()->route('admin.stories.list')->with(['flash_level'=>'success', 'flash_message'=>'success !! Complete Deleted']);
    }
}
