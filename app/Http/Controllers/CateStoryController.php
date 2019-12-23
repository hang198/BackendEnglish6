<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CateStoryRequest;
use App\CateStory;
use File;
class CateStoryController extends Controller
{
	public function index()	{
        try {
            $catestorys = CateStory::select('id', 'title','desc', 'type', 'order')->orderBy('id', 'DESC')->get()->toArray();
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => 'success', 'data' => $catestorys]);
	}

    public function create(Request $request ) {
    	$catestory = new CateStory();
    	$catestory->title = $request->title;
    	$catestory->desc = $request->desc;
    	$catestory->type = $request->type;
    	$catestory->order = $request->order;

    	$extension = ['jpg','png','jpeg','end'];
        if($request->hasFile('imagesStory')) {
            $file = $request->file('imagesStory');
            $duoi = $file->getClientOriginalExtension();
            foreach ($extension as $key) {
                # code...
                if($key == 'end'){
                    return redirect('admin/sotry/add')->with('Warning','Just except .jpg, .png, .jpeg');

                }
                else if($duoi == $key){
                    break;
                }
            }
            $name = $file->getClientOriginalName();
            $file->move("resources/upload/imagestory/",$name);
            $catestory->image = $name;
        } else {
            $catestory->image = "";
        }

        $catestory->save();
        return response()->json(['status' => 'success', 'data' => $catestory, 'message' => 'Success !! Complete Add Category']);
    }

    public function show($id) {
    	$catestory = CateStory::find($id);
    	return response()->json(['status' => 'success', 'data' => $catestory]);
    }

    public function update(Request $request, $id)
    {
    	//yêu cầu nhập chỉnh sửa
    	$this->validate($request,[
            'txtTitleEn'=>'required',
            'Type'=>'required',
            ],[
            'txtTitleEn.required'=>'Please enter title category story',
            'Type.required'=>'Please enter type category story',
            ]);

    	//cập nhật lại dữ liệu
    	$catestory = CateStory::find($id);
    	$catestory->catesto_title = $request->txtTitleEn;
    	$catestory->desc = $request->txtDesc;
    	$catestory->type = $request->Type;
    	$catestory->order = $request->txtOrder;

    	//xử lý hình ảnh
    	$img_current = 'resources/upload/imagestory/'.$request->input('imgCurrent');
    	if(!empty($request->file('imagesStory'))){
    		//echo "có file";
    		$file_name = $request->file('imagesStory')->getClientOriginalName();
    		$catestory->image = $file_name;
    		$request->file('imagesStory')->move('resources/upload/imagestory/',$file_name);
    		if(File::exists($img_current)){
    			File::delete($img_current);
    		}
    	}
    	else{
    		echo "không có file ảnh";
    	}

    	$catestory->save();
    	return redirect('admin/story/list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Edit Category Story']);
    }

    public function delete($id) {
    	$catestory = CateStory::find($id);
    	$story->delete($id);
    	return redirect()->route('admin.stories.list')->with(['flash_level'=>'success', 'flash_message'=>'success !! Complete Deleted']);
    }
}
