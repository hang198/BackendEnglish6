<?php

use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit = new \App\Unit();
        $unit->name = 'UNIT 1: MY NEW SCHOOL';
        $unit->name_vi = 'NGÔI TRƯỜNG MỚI CỦA TÔI';
        $unit->image = 'images/bai1.jpg';
        $unit->order = '1';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'UNIT 2: MY HOME';
        $unit->name_vi = 'NGÔI NHÀ CỦA TÔI';
        $unit->image = 'images/bai2.jpg';
        $unit->order = '2';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'UNIT 3: MY FRIENDS';
        $unit->name_vi = 'NHỮNG NGƯỜI BẠN CỦA TÔI';
        $unit->image = 'images/bai3.jpg';
        $unit->order = '3';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'UNIT 4: MY NEIGHBOURHOOD';
        $unit->name_vi = 'HÀNG XÓM CỦA TÔI';
        $unit->image = 'images/bai4.jpg';
        $unit->order = '4';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'UNIT 5: NATURAL WONDERS';
        $unit->name_vi = 'KỲ QUAN THIÊN NHIÊN';
        $unit->image = 'images/bai5.jpg';
        $unit->order = '5';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'UNIT 6: OUR TET HOLIDAY';
        $unit->name_vi = 'KÌ NGHỈ TẾT CỦA CHÚNG TÔI';
        $unit->image = 'images/bai6.jpg';
        $unit->order = '6';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'UNIT 7: TELEVISION';
        $unit->name_vi = 'TIVI';
        $unit->image = 'images/bai7.jpg';
        $unit->order = '7';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'UNIT 8: SPORTS AND GAMES';
        $unit->name_vi = 'THỂ THAO VÀ TRÒ CHƠI';
        $unit->image = 'images/bai8.jpg';
        $unit->order = '8';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'UNIT 9:CITIES';
        $unit->name_vi = 'THÀNH PHỐ';
        $unit->image = 'images/bai9.jpg';
        $unit->order = '9';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'UNIT 10: OUR HOUSES';
        $unit->name_vi = 'NHÀ CỦA CHÚNG TÔI';
        $unit->image = 'images/bai10.jpg';
        $unit->order = '10';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'UNIT 11: OUR GREENER WORLD';
        $unit->name_vi = 'THẾ GIỚI XANH CỦA CHÚNG TÔI';
        $unit->image = 'images/bai11.jpg';
        $unit->order = '11';
        $unit->save();
        $unit = new \App\Unit();
        $unit->name = 'UNIT 12: ROBOTS';
        $unit->name_vi = 'NGƯỜI MÁY';
        $unit->image = 'images/bai12.jpg';
        $unit->order = '12';
        $unit->save();
    }
}
