<?php


namespace App\services\impl;


use App\Repositories\UnitRepoInterface;
use App\Repositories\PracticeRepoInterface;
use App\Services\LessonServiceInterface;
use App\services\UnitServiceInterface;
use App\services\PracticeServiceInterface;
use Illuminate\Support\Facades\Storage;

class UnitServiceImpl implements UnitServiceInterface
{
    protected $unitRepo;
    protected $lessonService;

    public function __construct(UnitRepoInterface $unitRepo,
                                LessonServiceInterface $lessonService)
    {
        $this->unitRepo = $unitRepo;
        $this->lessonService = $lessonService;
    }

    public function create($request)
    {
        $data = $request->all();
        if ($request->image) {
            $path = $this->storeImage($request->image);
            $data['image'] = $path;
        }
        $this->unitRepo->create($data);
    }

    public function getByID($id)
    {
        return $this->unitRepo->getByID($id);
    }

    public function getAll()
    {
        return $this->unitRepo->getAll();
    }

    public function delete($id)
    {
        $unit = $this->getByID($id);
        if ($unit->image) {
            $this->deleteOldImage($unit->image);
        }
        $lesson = $this->lessonService->getByUnitId($id);
        foreach ($lesson as $item) {
            $this->lessonService->delete($item->id);
        }
        $this->unitRepo->delete($id);
    }


    public function storeImage($image)
    {
        return $image->store('images', 'public');
    }

    public function deleteOldImage($nameImage)
    {
        Storage::disk('public')->delete($nameImage);

    }

    public function update($request, $id)
    {
        $unit = $this->getByID($id);
        $data = $request->all();
        if ($request->image) {
            $path = $this->storeImage($request->image);
            $data['image'] = $path;
        }
        $this->unitRepo->update($unit, $data);
    }
}
