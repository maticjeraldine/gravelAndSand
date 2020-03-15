<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductNameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collateral = [
            'Gravel 3/4',
            'Gravel G1',
            'Gravel 3/8',
            'Sand S1',
            'Whitesand',
            'Vibrosand',
            'Crushed Aggregate Base Course',
            'Aggregate Base Course',
            'Sub-base Course',
            'Apple-size Boulders',
            'Gabion-size Boulders',
            'Head-size Boulders'
        ];
       
        foreach ($collateral as $collateral) {
           $data[] =  [
                'name' => $collateral,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }
        DB::table('product_names')->insert($data);
    }
}
