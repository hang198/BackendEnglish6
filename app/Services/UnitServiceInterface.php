<?php


namespace App\services;


interface UnitServiceInterface extends ServicesInterface
{
    public function storeImage($image);
    public function deleteOldImage($nameImage);
    public function delete($id);
}
