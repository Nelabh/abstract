<?php

namespace App\Http\Controllers;

use App\Business;
use App\Category;
use App\CompanyNatureOption;
use App\General;
use App\Product;
use App\Providers\AppServiceProvider;
use App\SubCategory;
use App\SubSubCategory;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use URL;

class SearchProductController extends Controller
{
    public function searchProduct( $selected_category = null , $selected_sub_category = null , $selected_sub_sub_category = null )
    {
        if( $selected_category != null )
        {
            $category_id = $selected_category;
        }
        else
        {
            $category_id = Input::has('category') ? Input::get('category') : null;
        }

        $keyword = Input::has('keyword') ? Input::get('keyword') : null;
		
		
        $products = Product::where( function( $query ) use( $category_id, $keyword, $selected_sub_category, $selected_sub_sub_category ){
			
            $nature = Input::has('nature') ? Input::get('nature') : [];
            $selected_periods = Input::has('periods') ? Input::get('periods') : [];
            $credit = Input::has('credit') ? Input::get('credit') : [];
            $areas = Input::has('areas') ? Input::get('areas') : [];

            $users = $this->getUsers( $nature, $selected_periods, $credit, $areas );

            $query->where( 'active' , '=' , 1 );

            if( count( $nature ) > 0 || count( $selected_periods ) > 0 || count( $credit ) > 0 || count( $areas ) > 0 )
            {
                $query->whereIn( 'user_id' ,$users );
            }

            if ( $keyword != null )
            {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            }

			
            if ( $category_id != null )
            {
                $category = Category::where('name', 'LIKE', '%' . $category_id . '%')->firstOrFail();

                $query->where('category_id', 'LIKE', '%' . $category->id);
            }

            if ( $selected_sub_category != null )
            {
                $sub_category = SubCategory::where( 'slug', 'LIKE', '%' . $selected_sub_category . '%' )->firstOrFail();

                $query->where('sub_category_id', 'LIKE', '%' . $sub_category->id . '%');
            } 
			else 
			{
				$sub_category = SubCategory::where( 'name', 'LIKE', '%' . $keyword . '%' )->first();
				if( $sub_category ){
					$query->orWhere('sub_category_id', '=',$sub_category->id );
				}
				
				
			}

            if ( $selected_sub_sub_category != null )
            {
                $sub_sub_category = SubSubCategory::where( 'slug', 'LIKE', '%' . $selected_sub_sub_category . '%')->firstOrFail();

                $query->where('sub_sub_category_id', 'LIKE', '%' . $sub_sub_category->id . '%');
            }
        })->orderBy('id')->paginate(12);
		

        //$products->appends( Input::query() );
        //dd( Input::query() ); die();
        if( $selected_category != null || $selected_sub_category != null || $selected_sub_sub_category != null )
        {
            return $products;
        }

        return view('search.search', compact('products', 'keyword', 'category' ));
    }
    public function index()
    {
//        $categories = Category::where('active','=',1)->get();
//        return view('welcome-search',compact('categories'));
        $category = Input::get('category');
        $keyword = Input::get('keyword');
				
        if ($category == null && $keyword == null) {
            $products = Product::where('active', '=', 1)->paginate(12);
//            $main_cat = Category::where('slug','=',$category)->first();
            return view('search.search', compact('products'));
        }
        if ($keyword != null && $category == null) {
            $products = Product::where('active', '=', 1)->where('name', 'LIKE', '%' . $keyword . '%')->paginate(12);
            return view('search.search', compact('products', 'keyword', 'category'));
        }
        if ($keyword == null && $category != null) {
            $category = Category::where('slug', 'LIKE', '%' .$category . '%')->firstOrFail();
            $products = Product::where('category_id', '=', $category->id)->paginate(12);
            return view('search.search', compact('products', 'keyword', 'category'));
        }
        if ($category != null && $keyword != null) {
            $category = Category::where('slug', 'LIKE', '%' . $category . '%')->firstOrFail();
            $products = Product::where('active', '=', 1)->where('category_id', '=', $category->id)->where('name', 'LIKE', '%' . $keyword . '%')->paginate(12);
            return view('search.search', compact('products', 'keyword', 'category'));
        }
    }

    public function category($slug)
    {
        $category = Category::where('slug', '=', $slug)->first();
        $keyword = Input::has('keyword') ? Input::get('keyword') : null;
        if ($category === null) {
            return redirect('/search');
        } else {
            $products = $this->searchProduct( $slug );
            //$products = Product::where('category_id', '=', $category->id)->paginate(12);
            return view('search.search', compact('products', 'category','keyword'));
        }
    }

    public function sub_category($slug)
    {
        $category = SubCategory::where('slug', '=', $slug)->first();
        $keyword = Input::has('keyword') ? Input::get('keyword') : null;
        $cat_id = $category->category_id;
        $main_cat = Category::where('id', '=', $cat_id)->first();
        if ($category === null) {
            return redirect('/search');
        } else {
            $products = $this->searchProduct( null, $slug );
            //$products = Product::where('sub_category_id', $category->id)->paginate(12);
            return view('search.search', compact('products', 'category', 'main_cat' , 'keyword'));
        }
    }

    public function child_category($slug)
    {
        $category = SubSubCategory::where('slug', '=', $slug)->first();
        $keyword = Input::has('keyword') ? Input::get('keyword') : null;
        $cat_id = $category->category_id;
        $sub_cat_id = $category->sub_category_id;
        $main_cat = Category::where('id', '=', $cat_id)->first();
        $sub_cat = SubCategory::where('id', '=', $sub_cat_id)->first();
        if ($category === null) {
            return redirect('/search');
        } else {
            $products = $this->searchProduct( null, null, $slug );
            //$products = Product::where('sub_sub_category_id', $category->id)->paginate(12);
            return view('search.search', compact('products', 'category', 'main_cat', 'sub_cat' , 'keyword'));
        }
    }

    public function nature($nature)
    {
        $filter = "Nature of the company";
        $ids = [];
        $users = General::where('company_nature', '=', $nature)->get();
        foreach ($users as $user) {
            $ids[$user->user_id] = $user->user_id;
        }
        $searchArray = json_encode( array( 'nature' => $nature ) );

        $products = Product::whereIn('user_id', $ids)->paginate(12);
        return view('search.search', compact('products', 'nature','filter','searchArray'));
    }

    public function year($min,$max){
        $filter = "Year of inception";
        $ids = [];
//        return 'min:'.$min.'max:'.$max;
        if($min==='0' && $max==='1950'){
            $users = General::where('year_of_inception','<=',$max)->get();
            foreach ($users as $user) {
                $ids[$user->user_id] = $user->user_id;
            }
            $products = Product::whereIn('user_id', $ids)->paginate(12);
            return view('search.search', compact('products','min', 'max','filter'));
        }
        if($min==='2010' && $max==='0'){
            $users = General::where('year_of_inception','>=',$max)->get();
            foreach ($users as $user) {
                $ids[$user->user_id] = $user->user_id;
            }
            $products = Product::whereIn('user_id', $ids)->paginate(12);
            return view('search.search', compact('products','min', 'max','filter'));
        }
        if($min!=null && $max!=null){
            $users = General::where('year_of_inception','>=',$min)->where('year_of_inception','<=',$max)->get();
            foreach ($users as $user) {
                $ids[$user->user_id] = $user->user_id;
            }
            $products = Product::whereIn('user_id', $ids)->paginate(12);
            return view('search.search', compact('products','min', 'max','filter'));
        }
        if($min===null && $max===null){
            return redirect('/search');
        }
    }

    public function credit($slug){
        $filter = "Average Credit Period";
        $nature = $slug;
        $ids = [];
        $users = Business::where('credit_period', '=', $slug)->get();
        foreach ($users as $user) {
            $ids[$user->user_id] = $user->user_id;
        }
        $products = Product::whereIn('user_id', $ids)->paginate(12);
        return view('search.search', compact('products', 'nature','filter'));
    }

    public function area($slug){
        $filter = "Average Credit Period";
        $nature = $slug;
        $ids = [];
        $users = Business::where('service_areas', 'LIKE' , '%' . $slug . '%' )->get();
        foreach ($users as $user) {
            $ids[$user->user_id] = $user->user_id;
        }
        $products = Product::whereIn('user_id', $ids)->paginate(12);
        return view('search.search', compact('products', 'nature','filter'));
        /*if($slug==='local_only'){
            $products = Product::paginate(12);
            return view('search.search', compact('products', 'nature','filter'));
        }
        if($slug==='country_wide'){
            $users = Business::where('service_areas', '=', $slug)->get();
            foreach ($users as $user) {
                $ids[$user->user_id] = $user->user_id;
            }
            $products = Product::whereIn('user_id', $ids)->paginate(12);
            return view('search.search', compact('products', 'nature','filter'));
        }
        if($slug==='abroad'){
            $users = Business::where('service_areas', '=', $slug)->get();
            foreach ($users as $user) {
                $ids[$user->user_id] = $user->user_id;
            }
            $products = Product::whereIn('user_id', $ids)->paginate(12);
            return view('search.search', compact('products', 'nature','filter'));
        }*/
    }

    public function getUsers( $nature, $selected_periods, $credit, $areas )
    {
        $users = User::where( function( $query )use( $nature, $selected_periods, $credit, $areas ){
            if( count( $selected_periods ) > 0 )
            {
                $query->where(function( $query )use( $selected_periods ) {
                    foreach ( $selected_periods as $period ) {
                        $results = array_filter(AppServiceProvider::$yoi_periods, function ( $x ) use ( $period ) {
                            return $x["slug"] == $period;
                        });
                        foreach ( $results as $result ) {
                            $min = $result["min"];
                            $max = $result["max"];

                            if ( $min == '0' && $max == '1950' ) {
                                $query->orWhereHas('general', function ( $query ) use ( $min, $max ) {
                                    $query->where('year_of_inception', '<=', $max);
                                });
                            }
                            if ( $min == '2010' && $max == '0' ) {
                                $query->orWhereHas('general', function ( $query ) use ( $min, $max ) {
                                    $query->where('year_of_inception', '>', $min);
                                });
                            }
                            if ( $min != null && $max != null ) {
                                $query->orWhereHas('general', function ( $query ) use ( $min, $max ) {
                                    $query->where('year_of_inception', '>=', $min)
                                        ->where('year_of_inception', '<=', $max);
                                });
                            }
                        }
                    }
                });
            }
            if( count( $nature ) > 0 )
            {
                $query->where(function( $query )use( $nature ) {
                    foreach( $nature as $selected_nature )
                    {
                        $query->orWhere(function( $query )use( $selected_nature ) {
                            $query->whereHas('general', function ( $query ) use ( $selected_nature ) {
                                $query->where('company_nature', 'LIKE', '%' . $selected_nature . '%');
                            });
                        });
                    }
                });
            }

            if( count( $credit ) > 0 )
            {
                $query->whereHas( 'business', function( $query ) use( $credit ){
                    $query->whereIn('credit_period', $credit );
                });
            }

            if( count( $areas ) > 0 )
            {
                $query->where(function( $query )use( $areas ) {
                    foreach( $areas as $area )
                    {
                        $query->orWhere(function( $query )use( $area ) {
                           $query->whereHas('business', function ( $query ) use ( $area ) {
                                $query->where('service_areas', 'LIKE', '%' . $area . '%');
                            });
                        });
                    }
                });
            }
        })->lists('id');

        return $users;
    }
}