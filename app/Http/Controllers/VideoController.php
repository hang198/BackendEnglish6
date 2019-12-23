<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\VideoRequest;
use App\CateVideo;
use App\Video;
use Illuminate\Support\Facades\File;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::join('catevideo', 'catevideo.id', '=', 'videos.catevideo_id')
            ->select('videos.id', 'videos.title', 'catevideo.title as catevideo_title')
            ->orderBy('id', 'DESC')->get()->toArray();
        return response()->json(['status' => 'success', 'data' => $videos]);
    }

    public function create(VideoRequest $request)
    {
        $video = new Video();
        $video->title = $request->title;
        $video->link = $request->link;
        $video->catevideo_id = $request->catevideo_id;
        $extension = ['jpg', 'png', 'jpeg', 'end'];
        if ($request->hasFile('imagesStory')) {
            $file = $request->file('imagesStory');
            $duoi = $file->getClientOriginalExtension();
            foreach ($extension as $key) {
                # code...
                if ($key == 'end') {
                    return redirect('admin/videos/add')->with('Warning', 'Just except .jpg, .png, .jpeg');
                } else if ($duoi == $key) {
                    break;
                }
            }
            $name = $file->getClientOriginalName();
            $file->move('resources/upload/imagevideo/', $name);
            $video->image = $name;
        } else {
            $video->image = "";
        }
        $video->save();
        return response()->json(['status' => 'success', 'data' => $video, 'message' => 'Success !! Complete Add Video']);
    }

    public function show($id)
    {
        $video = Video::find($id);
        return response()->json(['status' => 'success', 'data' => $video]);
    }

    public function update(Request $request, $id)
    {
        //yêu cầu nhập chỉnh sửa
        $this->validate($request, [
            'title' => 'required',
            'link' => 'required'
        ], [
            'title.required' => 'Please enter title category video',
            'link.required' => 'Please enter link video',
        ]);
        //cập nhật lại dữ liệu
        $video = Video::find($id);
        $video->title = $request->title;
        $video->link = $request->link;
        $video->catevideo_id = $request->catevideo_id;

        //xử lý hình ảnh
        $img_current = 'resources/upload/imagevideo/' . $request->input('imgCurrent');
        if (!empty($request->file('imagesStory'))) {
            //echo "có file";
            $file_name = $request->file('imagesStory')->getClientOriginalName();
            $video->image = $file_name;
            $request->file('imagesStory')->move('resources/upload/imagevideo/', $file_name);
            if (File::exists($img_current)) {
                File::delete($img_current);
            }
        }

        $video->save();
        return response()->json(['status' => 'success', 'data' => $video, 'message' => 'Success !! Complete Edit Video']);
    }

    public function delete($id)
    {
        $video = Video::find($id);
        $video->delete($id);
        return response()->json(['status' => 'success', 'data' => $video, 'message' => 'success !! Complete Deleted']);
    }
}
