<?php namespace Horsefly\Http\Controllers;

use Horsefly\Http\Requests;
use Horsefly\Http\Controllers\Controller;
use Horsefly\Magazine;
use Horsefly\Category;
use Illuminate\Http\Request;
use DB;
use Form;
use Input;
use Validator;

class MagazineController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $data = Input::all();
        $magazines = Magazine::getAllMagazine($data);
        return view('magazine.index', array('magazines'=>$magazines,'data'=>$data));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        //
        $categories = Category::catrgotyListing();
        $data = Input::all();
        
        if( !empty( $data ) ){
            $rules = array (
                'name' => 'required',
                'category_id' => 'required',
                'short_description' => 'required',
            );
            $validator = Validator::make ($data, $rules);
            
            if ($validator -> passes()){
                 if( Magazine::saveFormData(Input::except(array('_token')))){
                    return redirect()->to('magazine')
                            ->withMessage('Data inserted');
                 }
            } else{
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }
        }
                
        return view('magazine.create',array('categories'=>$categories,'data'=>$data));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
    
    protected function getCategoriesTree($parent = NULL){ 
        // feching categories
        $categories = DB::table('categories')->where('is_active', '=', 1 );
        if( $parent )
        	$categories->where('parent_id','=', $parent);
        else	
        	$categories->whereNull('parent_id');
        
        $html = '<ul>';
        $catResult = $categories->get();
        
        foreach ($catResult as $cat) {
        	$current_id = $cat->id;
        	$html .= '<li><a href="'.'#'.'">'.htmlspecialchars($cat->name).'</a>';
        
        	$has_sub = '';
        	$has_sub = $categories->count();
        	if(!empty($has_sub))
        	{
        		$html .= $this->getCategoriesTree($current_id);
        	}
        	$html .= '</li>';
        }
        $html .= '</ul>';
        return $html;
    }

}
