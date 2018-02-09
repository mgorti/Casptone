<?php

use Illuminate\Database\Seeder;

use App\Csvdata;

class video_lookup_valueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array1= array();
        $array2= array();
        //clear out staging table
        DB::table('csv_data')->truncate();
        DB::table('video_lookup_value')->truncate();


        //Load tab-delimited file for medications
        if (($handle = fopen ( public_path('video_list.txt'), 'r' )) !== FALSE) {
            while ($data = fgetcsv ($handle, 1000, "\t")) {

                $csv_data = new Csvdata ();
                $csv_data->medical_list = $data[0];
                array_push($array1,$data[0]);
                array_push($array2,$data[1]);
                $csv_data->save();

            }
            fclose ($handle);
        };

        /*
                //Load lookup_value
                $select_medlist = DB::table('csv_data')
                    ->get(array('medical_list'));

                 foreach($select_medlist as $data){
                     DB::table('image_lookup_value')->insert(
                         [
                             'image_lookup_value_tag' => $data->medical_list,
                             'created_by'=>1
                         ]);
                 }*/
        for($i=0;$i<count($array1);$i++){
            DB::table('video_lookup_value')->insert(
                [
                    'video_lookup_value_tag' =>  $array1[$i],
                    'video_lookup_value_link' => $array2[$i],
                    'created_by'=>1
                ]);
        }
        //
        //
    }
}
