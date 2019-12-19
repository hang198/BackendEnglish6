<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoryRequest;
use App\Stories;
use DB;
use File;

class StoriesController extends Controller
{
    public function getList()
	{
		$dataStory = Stories::select('id', 'storytitle', 'catestory_id')->orderBy('id', 'DESC')->get()->toArray();
		//return view('admin.story.list', compact('data'));
		return view('admin.stories.list',compact('dataStory'));
	}
    public function getAdd()
    {
    	//$parent = CateStory::select('id', 'storytitle')->get()->toArray();
    	$Listcate = DB::table('catestory')->get();
    	return view('admin.stories.add', compact('Listcate'));
    }
    public function postAdd(StoryRequest $request){
    	$story = new Stories();
    	$story->storytitle = $request->txtTitleStory;
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

    public function getDelete($id)
    {
    	$story = Stories::find($id);
        File::delete('resources/upload/imagestory/'.$story->image);
    	$story->delete($id);
    	return redirect()->route('admin.stories.list')->with(['flash_level'=>'success', 'flash_message'=>'success !! Complete Deleted']);
    }
    public function getEdit($id)
    {
        $data = Stories::findOrFail($id)->toArray();
        $Listcate = DB::table('catestory')->get();
        return view('admin.stories.edit', compact('data', 'Listcate'));
    }

    public function postEdit(Request $request, $id)
    {
        //yêu cầu nhập chỉnh sửa
        $this->validate($request,[
            'txtTitleStory'=>'required',
            ],[
            'txtTitleStory.required'=>'Please enter title story',
            ]);

        //cập nhật lại dữ liệu
        $story = Stories::find($id);
        $story->storytitle = $request->txtTitleStory;
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
}
