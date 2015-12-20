<?php

namespace App\Http\Controllers;

use App\CategorieOption;
use App\Category;
use App\CategoryOption;
use App\Product;
use App\Products;
use App\SubCategorieOption;
use App\SubCategory;
use App\SubCategoryOption;
use App\SubSubCategorieOption;
use App\SubSubCategory;
use App\SubSubCategoryOption;
use App\SubUnit;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

use Maatwebsite\Excel\Facades\Excel;
use Chumper\Zipper\Facades\Zipper;
use Validator;
use File;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $products = product::where('user_id','=',$user_id)->latest()->paginate(10);
        $units = SubUnit::lists('unit','slug');
        if($products === null){
            $category_id = Category::lists('name','id');
            return redirect()->route('products.create',compact('products','category_id','units'));
        }
        return view('products.index', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
            $category_id = Category::lists('name','id');
        $units = SubUnit::lists('unit','slug');
            return view('products.create',compact('products','category_id','units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $this->validate($request, [
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'sub_sub_category_id' => 'sometimes|integer',
            'name' => 'required|max:255',
			'brand_name' => 'sometimes|max:255',
            'description' => 'sometimes|max:65535',
//            'image' => 'sometimes|image',
            'max_retail_price' => 'sometimes|between:0,999999999.99',
            'package_type' => 'sometimes|max:255',
            'package_volume' => 'sometimes|between:0,999999999.99',
            'package_unit' => 'sometimes|max:255',
            'min_order_quantity' => 'sometimes|integer',
            'min_order_unit'=>'required',
            //'sustainability_initiatives' => 'sometimes|max:255',
            'active' => 'required|in:0,1',
			'sku_small' => 'sometimes|integer'
        ]);
        $input = $request->all();
        if (Input::hasFile('image'))
        {
            if (Input::file('image')->isValid())
            {
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = str_random(32) . '.' . $extension; // renameing image
                $destinationPath = public_path('home-theme/img/products');
                Input::file('image')->move($destinationPath, $fileName);
                $input['image'] = $fileName;
            }
        }
        $input['user_id'] = $user_id;
        product::create($input);
        Session::flash('flash_message', 'Product Successfully Saved!');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user_id = Auth::user()->id;
        $product = Product::where('user_id','=',$user_id)->where('id','=',$id)->first();
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user_id = Auth::user()->id;
        $product = Product::where('user_id','=',$user_id)->where('id','=',$id)->first();
        $sub_category_id = SubCategory::lists('name','id');
        $category_id = Category::lists('name','id');
        $units = SubUnit::lists('unit','slug');
        $sub_sub_category_id = SubSubCategory::lists('name' , 'id');
        return view('products.edit',compact('product','category_id', 'sub_category_id' , 'sub_sub_category_id' , 'units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
		
        $user_id = Auth::user()->id;
        $product = Product::where('id','=',$id)->where('user_id','=',$user_id)->first();
        $this->validate($request, [
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'sub_sub_category_id' => 'sometimes|integer',
            'name' => 'required|max:255',
			'brand_name' => 'sometimes|max:255',
            'description' => 'sometimes|max:65535',
//            'image' => 'sometimes|image',
            'max_retail_price' => 'sometimes|between:0,999999999.99',
            'package_type' => 'sometimes|max:255',
            'package_volume' => 'sometimes|between:0,999999999.99',
            'package_unit' => 'sometimes|max:255',
            'min_order_quantity' => 'sometimes|integer',
            'min_order_unit'=>'required',
            //'sustainability_initiatives' => 'sometimes|max:255',
            'active' => 'required|in:0,1',
			'sku_small' => 'sometimes|integer',
        ]);
        $input = $request->all();
		//var_dump( $input);die();
        if (Input::hasFile('image'))
        {
            if (Input::file('image')->isValid())
            {
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = str_random(32) . '.' . $extension; // renameing image
                $destinationPath = public_path('home-theme/img/products');
                Input::file('image')->move($destinationPath, $fileName);
                $input['image'] = $fileName;
            }
        }
        $product->fill($input)->save();
        Session::flash('flash_message','Information Updated Successfully');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user_id = Auth::user()->id;
        $product = Product::where('id','=',$id)->where('user_id','=',$user_id)->first();
        $product->delete();
        return redirect()->route('products.index');
    }

    public function getSubCategories(){
        $category_id = Input::get('name');
        $subcategories = SubCategory::where('category_id','=',$category_id)->lists('name','id');
        return $subcategories;
    }

    public function getSubSubCategories(){
        $category_id = Input::get('name');
        $subcategories = SubSubCategory::where('sub_category_id','=',$category_id)->lists('name','id');
        return $subcategories;
    }
	public function submitFeedback(){
		 $user_id = Input::get('user_id');
		 $product_id = Input::get('product_id');
		 $feedback = Input::get('feedback');
		
		DB::table('product_meta')->insert(
			['user_id' => $user_id , 'product_id' => $product_id,  'feedback' => $feedback ]
		);
		 
	
		
	}
	
public function import(Request $request)
    {
        $sucessflag=0;
        
        $excelname = '';
        $imagenames = array();
        $imagepath = array();
        $input = $request->all();
        $dir='';
        $msg='';
        if (Input::hasFile('productfile'))
        {
            if (Input::file('productfile')->isValid())
            {
                $extension = Input::file('productfile')->getClientOriginalExtension(); // getting file extension                
                if($extension!='xlsm' && $extension!='xlsx' && $extension!='zip'){
                    return redirect()->route('products.index')->withErrors(['Invalid file format']);
                }else{

                    //$fileName = str_random(32) . '.' . $extension; // renameing file
                    //read the excel file 
                    if($extension=='zip'){
                        $dir=rand();
                        mkdir($dir, 0777, true);
                        Zipper::make(Input::file('productfile'))->extractTo($dir);    
                        $files = File::allFiles($dir);
                        foreach ($files as $file)
                        {
                            $fname = (string)$file;
                            $tmp = pathinfo($file);
                            if($tmp['extension']=='xlsm' or $tmp['extension']=='xlsx'){
                                $excelname=$fname;
                            }else{
                                $imagenames[]=$tmp['basename'];
                                $imagepath[]=$fname;
                            }
                        }
                        if($excelname==''){
                            return redirect()->route('products.index')->withErrors(['Invalid file format']);
                        }
                        else{
                            $results=Excel::load($excelname)->get(); 
                        }
                        //exit;    
                    }
                    else{
                        $results=Excel::load(Input::file('productfile'))->get();  
                    }
                    
                    $results = $results->all();
                    //get all categories
                    $category_id = Category::lists('name','id')->toArray();
                    $sub_category_id = SubCategory::lists('name','id')->toArray();
                    $sub_sub_category_id = SubSubCategory::lists('name','id')->toArray();

                    for ($i=3; $i <sizeof($results) ; $i++) { 
                        $failedrow = array();
                        $content = $results[$i];
                        $sheet_title = $content->getTitle();
                        //check if the record is entered in excel sheet
                        if(sizeof($content)>0){                        
                            //print_r($sub_sub_category_id);
                            foreach ($content as $key => $value) {
                                $category = $value['category'];
                                $subcategory = $value['sub_category'];
                                $subsubcategory = $value['sub_sub_category'];
                                $catid = isset($category) ? array_search($category, $category_id) : '';
                                $subid = isset($subcategory) ? array_search($subcategory, $sub_category_id) : '';
                                $subsubid = isset($subsubcategory) ? array_search($subsubcategory, $sub_sub_category_id) : '';
                                if($catid!='' && $subid!=''){
                                    $value['category']=$catid;
                                    $value['sub_category']=$subid;
                                    $value['sub_sub_category']=$subsubid;
                                    //echo "sucess";
                                    //validation for all the data                                
                                    $validator = Validator::make(
                                        $value->toArray(),
                                        array(
                                            'category' => 'required|integer',
                                            'sub_category' => 'required|integer',
                                            'sub_sub_category'=>'sometimes|integer',
                                            'product_name' => 'required|max:255',
											'brand_name' => 'sometimes|max:255',
                                            'product_description' => 'sometimes|max:65535',
                                            'mrp' => 'sometimes|between:0,999999999.99',
                                            'sku_type' => 'sometimes|max:255',
                                            'sku_size' => 'sometimes|between:0,999999999.99',
                                            'sku_units' => 'sometimes|max:255',
                                            'min_order_quantity' => 'sometimes|integer',
                                            'min_order_units'=>'sometimes'
                                        )
                                    );

                                    // If validation fails, redirect to the settings page and send the errors
                                    if ($validator->fails())
                                    {
                                        $failedrow[]=$key+1;
                                    }
                                    else{
                                        // if($value['image']){
                                        //     $imagename = str_random(32).'.png';
                                        //     $image = file_get_contents($value['image']);
                                        //     file_put_contents('home-theme/img/products/'.$imagename, $image);
                                        // }
                                        $user_id = Auth::user()->id;
                                        $cols = array('category_id' => $catid,
                                            'user_id'=>$user_id,
                                                        'sub_category_id' => $subid,
                                                        'name' => $value['product_name']);
                                        if($subsubid!='')
                                            $cols['sub_sub_category_id']=$subsubid;
                                        if($value['product_description']!='')
                                            $cols['description']=$value['product_description'];
                                        if($value['image_name']!=''){
                                            $key = array_search($value['image_name'], $imagenames);
                                            if($key>=0 and $key!=''){                                            
                                                $tmp1=pathinfo($imagepath[$key]);
                                                $fileName = str_random(32). '.' .$tmp1['extension'];
                                                copy($imagepath[$key], 'home-theme/img/products/'.$fileName);
                                                $cols['image']=$fileName;
                                            }else{
                                                if(filter_var($value['image_name'], FILTER_VALIDATE_URL)){ 
                                                  $cols['image']=$value['image_name'];
                                                }
                                            }
                                        }                                        
                                        if($value['mrp']!='')
                                            $cols['max_retail_price']=$value['mrp'];
                                        if($value['sku_type']!='')
                                            $cols['package_type']=$value['sku_type'];
                                        if($value['sku_size']!='')
                                            $cols['package_volume']=$value['sku_size'];
                                        if($value['sku_units']!='')
                                            $cols['package_unit']=$value['sku_units'];
                                        if($value['min_order_quantity']!='')
                                            $cols['min_order_quantity']=$value['min_order_quantity'];
                                        if($value['min_order_units']!='')
                                            $cols['min_order_unit']=$value['min_order_units'];
                                        if($value['brand_name']!='')
                                            $cols['brand_name']=$value['brand_name'];
                                        $sucessflag=1;
                                        product::create($cols);                                    
                                    }
                                }
                                else{
                                    $failedrow[]=$key+1;
                                }
                            }
                            if(sizeof($failedrow)>0){
                                $msg.="<tr><td>".$sheet_title."</td><td>".implode(',',$failedrow)."</td></tr>";
                            }
                        }
                    }
                    
                    //remove unzipped folder
                    if($dir!=''){
                        File::deleteDirectory($dir);
                    }
                    //Input::file('productfile')->move($destinationPath, $fileName);
                    if($msg!=''){
                        $temp = "<table><tr colspan='2'><td>The following sheet records not imported</td></tr><tr><td><b>Sheet title</b></td><td><b>Row Numbers</b></td></tr>".$msg."</table>";
                        return redirect()->route('products.index')->withErrors([$temp]);
                    }                        
                    else{
                        if($sucessflag==1){
                            Session::flash('flash_message','All products imported Successfully');
                        }
                        return redirect()->route('products.index');
                    }                        
                }
            }
        }
    }

}
