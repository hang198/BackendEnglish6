<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CateVideoRequest;

use App\CateVideo;
use File;

class CateVideoController extends Controller
{
    public function getList()
	{
		$data = CateVideo::select('id', 'catevi_title', 'desc', 'type', 'order')->orderBy('id', 'DESC')->get()->toArray();
		return view('admin.catevideo.list', compact('data'));
	}
    public function getAdd()
    {
    	$parent = CateVideo::select('id', 'catevi_title')->get()->toArray();
    	return view('admin.catevideo.add', compact('parent'));
    }
    public function postAdd(CateVideoRequest $request){
    	$catevideo = new CateVideo();
    	$catevideo->catevi_title = $request->txtTitleEn;
    	$catevideo->desc = $request->txtDesc;
    	$catevideo->type = $request->Type;
    	$catevideo->order = $request->txtOrder;

    	$extension = ['jpg','png','jpeg','end'];
        if($request->hasFile('imagesStory')){
            $file = $request->file('imagesStory');
            $duoi = $file->getClientOriginalExtension();
            foreach ($extension as $key) {
                # code...
                if($key == 'end'){
                    return redirect('admin/catevideo/add')->with('Warning','Just except .jpg, .png, .jpeg');
                    
                }
                else if($duoi == $key){
                    break;
                }
            }
            $name = $file->getClientOriginalName();
            $file->move("resources/upload/imagevideo/",$name);
            $catevideo->image = $name;
        }
        else{
            $catevideo->image = "";
        }
        $catevideo->save();
        return redirect('admin/catevideo/list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Add Category']);
    }

    public function getDelete($id)
    {
    	$catevideo = CateVideo::find($id);
    	File::delete('resources/upload/imagestory/'.$catevideo->image);
    	$catevideo->delete($id);
    	return redirect()->route('admin.catevideo.list')->with(['flash_level'=>'success', 'flash_message'=>'success !! Complete Deleted']);
    }

    public function getEdit($id)
    {
    	$catevideo = CateVideo::findOrFail($id)->toArray();
    	//$story_image = CateStory::find($id);
    	return view('admin.catevideo.edit', compact('catevideo'));
    }

    public function postEdit(Request $request, $id)
    {
    	//yêu cầu nhập chỉnh sửa
    	$this->validate($request,[
            'txtTitleEn'=>'required',
            'Type'=>'required',
            ],[
            'txtTitleEn.required'=>'Please enter title category video',
            'Type.required'=>'Please enter type category video',
            ]);
    	//cập nhật lại dữ liệu
    	$catevideo = CateVideo::find($id);
    	$catevideo->catevi_title = $request->txtTitleEn;
    	$catevideo->desc = $request->txtDesc;
    	$catevideo->type = $request->Type;
    	$catevideo->order = $request->txtOrder;

    	//xử lý hình ảnh
    	$img_current = 'resources/upload/imagevideo/'.$request->input('imgCurrent');
    	if(!empty($request->file('imagesStory'))){
    		//echo "có file";
    		$file_name = $request->file('imagesStory')->getClientOriginalName();
    		$catevideo->image = $file_name;
    		$request->file('imagesStory')->move('resources/upload/imagevideo/',$file_name);
    		if(File::exists($img_current)){
    			File::delete($img_current);
    		}
    	}
    	else{
    		echo "không có file ảnh";
    	}

    	$catevideo->save();
    	return redirect('admin/catevideo/list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Edit Category Video']);
    }
}
