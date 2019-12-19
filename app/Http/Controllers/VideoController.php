<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\VideoRequest;
use App\CateVideo;
use App\Videos;
use DB;
use File;

class VideoController extends Controller
{
    public function getList()
	{
		$dataVideo = Videos::select('id', 'videotitle', 'desc', 'catevideo_id')->orderBy('id', 'DESC')->get()->toArray();
		//return view('admin.story.list', compact('data'));
		return view('admin.videos.list',compact('dataVideo'));
	}
    public function getAdd()
    {
    	//$parent = CateStory::select('id', 'videotitle')->get()->toArray();
    	$Listcate = DB::table('catevideo')->get();
    	return view('admin.videos.add', compact('Listcate'));
    }
    public function postAdd(VideoRequest $request){
    	$video = new Videos();
    	$video->videotitle = $request->txtTitleVideo;
        $video->link = $request->urlVideo;
    	$video->desc = $request->txtDesc;
    	$video->catevideo_id = $request->id_category;
    	$extension = ['jpg','png','jpeg','end'];
        if($request->hasFile('imagesStory')){
            $file = $request->file('imagesStory');
            $duoi = $file->getClientOriginalExtension();
            foreach ($extension as $key) {
                # code...
                if($key == 'end'){
                    return redirect('admin/videos/add')->with('Warning','Just except .jpg, .png, .jpeg');
                    
                }
                else if($duoi == $key){
                    break;
                }
            }
            $name = $file->getClientOriginalName();
            $file->move('resources/upload/imagevideo/',$name);
            $video->image = $name;
        }
        else{
        	$video->image = "";
        }
        $video->save();
        return redirect('admin/videos/list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Add Video']);
    }

    public function getDelete($id)
    {
    	$video = Videos::find($id);
        File::delete('resources/upload/imagevideo/'.$video->image);
    	$video->delete($id);
    	return redirect()->route('admin.videos.list')->with(['flash_level'=>'success', 'flash_message'=>'success !! Complete Deleted']);
    }
    public function getEdit($id)
    {
        $data = Videos::findOrFail($id)->toArray();
        //$dataCate = CateVideo::select('id', 'catesto_title')->get();
        $Listcate = DB::table('catevideo')->get();
        return view('admin.videos.edit', compact('data', 'Listcate'));
    }

    public function postEdit(Request $request, $id)
    {
        //yêu cầu nhập chỉnh sửa
        $this->validate($request,[
            'txtTitleVideo'=>'required',
            'urlVideo' => 'required'
            ],[
            'txtTitleVideo.required'=>'Please enter title category video',
            'urlVideo.required' => 'Please enter link video',
            ]);
        //cập nhật lại dữ liệu
        $video = Videos::find($id);
        $video->videotitle = $request->txtTitleVideo;
        $video->link = $request->urlVideo;
        $video->desc = $request->txtDesc;
        $video->catevideo_id = $request->id_category;

        //xử lý hình ảnh
        $img_current = 'resources/upload/imagevideo/'.$request->input('imgCurrent');
        if(!empty($request->file('imagesStory'))){
            //echo "có file";
            $file_name = $request->file('imagesStory')->getClientOriginalName();
            $video->image = $file_name;
            $request->file('imagesStory')->move('resources/upload/imagevideo/',$file_name);
            if(File::exists($img_current)){
                File::delete($img_current);
            }
        }
        else{
            echo "không có file ảnh";
        }

        $video->save();
        return redirect('admin/videos/list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Edit Video']);
    }
}
