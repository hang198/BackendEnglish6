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
        $video->image = $request->image;

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
        $video->image = $request->image;

        $video->save();
        return response()->json(['status' => 'success', 'data' => $video, 'message' => 'Success !! Complete Edit Video']);
    }

    public function delete($id)
    {
        $video = Video::find($id);
        $video->delete($id);
        return response()->json(['status' => 'success', 'data' => $video, 'message' => 'success !! Complete Deleted']);
    }

    public function getVideos($catevideo_id)
    {
        $videos = Video::find(['catevideo_id' => $catevideo_id]);
        return response()->json(['status' => 'success', 'data' => $videos]);
    }
}
