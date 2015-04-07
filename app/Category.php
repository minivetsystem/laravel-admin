<?php namespace Horsefly;

use Illuminate\Database\Eloquent\Model;
use DB;
class Category extends Model {

	//
    public static function saveFormData($data)
    {
        $data['parent_id'] = ( !empty( $data['parent_id'] ) ) ? $data['parent_id'] : NULL;
        $data['created_at'] = $data['updated_at'] = new \DateTime;
        return DB::table('categories')->insert($data);
    }
    
    public static function catrgotyListing(){
        $categories = array(''=>NULL);
        $parentCatListing = DB::table('categories')->where('is_active', '=', 1 )->get();
        if( !empty($parentCatListing) ){
            foreach( $parentCatListing as $cat ){
                $categories[$cat->id] = $cat->name;
            }
        }
        
        return $categories;
    }
    
    public static function getNameById($id){
        return self::find($id)->name;
    }
}
