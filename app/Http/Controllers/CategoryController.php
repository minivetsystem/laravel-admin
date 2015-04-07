<?php namespace Horsefly\Http\Controllers;

use Horsefly\Http\Requests;
use Horsefly\Http\Controllers\Controller;
use Horsefly\Category;
use Illuminate\Http\Request;
use DB;
use Form;
use Input;
use Validator;

class CategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $catTree = $this->getCategoriesTree();
        return view('category.index', compact('catTree'));
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
                'name' => 'required'
            );
            $validator = Validator::make ($data, $rules);
            
            if ($validator -> passes()){
                 if( Category::saveFormData(Input::except(array('_token')))){
                    return redirect()->to('category')
                            ->withMessage('Data inserted');
                 }
            } else{
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }
        }
                
        return view('category.create',array('categories'=>$categories,'data'=>$data));
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
