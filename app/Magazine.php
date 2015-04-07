<?php namespace Horsefly;

use Illuminate\Database\Eloquent\Model;
use DB;

class Magazine extends Model {

	//
    public static function getAllMagazine($whereData){
        $magazines = DB::table('magazines');
        if( isset( $whereData['mag_search'] ) ){
            $magazines->where('short_description', 'like', '%'.$whereData['mag_search'].'%');
        }
        return $magazines->get();
    }
    
    public static function saveFormData($data){
        $data['created_at'] = $data['updated_at'] = new \DateTime;
        return DB::table('magazines')->insert($data);
    }
}
