<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new Product();

        // $item->id = 1;

        $item->name = "Tủ lạnh LG Inverter 613 lít GR-B247JDS";
        // $item->slug = "tu-lanh-lg-inverter";
        // $item->tag = "Tủ lạnh";
        // $item->sold = 0;
        $item->price = 206900;

        // $item->status = 0;
        // $item->brand_id = 1;
        $item->category_id = 1;
        $item->created_at = "2021-09-25 23:19:08";
        $item->updated_at  = "2021-09-25 23:19:08";
        $item->image = 'hjj.jpg';
        $item->description = "Ngăn chứa rau củ quả của  ";


        $item->save();




    }
}
