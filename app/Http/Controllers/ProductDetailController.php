<?php

namespace App\Http\Controllers;

use Input;
use DB;
use Mail;
use Views;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductDetailController extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function index($id) {
        if (\Auth::check()) {

            $user_id = \Auth::user()->id;

            $catarray = array();
            $data = DB::table('view_products')->where('id', $id)->get();


            $img = array();
            $mrp = array();
            $pt = array();
            $pv = array();
            $variant = DB::table('view_products')->where('parent_product_id', $data[0]->parent_product_id)->get();
            foreach ($variant as $var) {
                array_push($img, $var->image);
                array_push($pt, $var->package_type);
                array_push($pv, $var->package_volume);
                array_push($mrp, $var->max_retail_price);
            }

            $parent_product_data = DB::table('parent_products')->where('id', $data[0]->parent_product_id)->get();

            $category = DB::table('categories')->where('id', $parent_product_data[0]->category_id)->get();
            $catarray['category_name'] = $category[0]->name;
            $catarray['category_slug'] = $category[0]->slug;
            $sub_category = DB::table('sub_categories')->where('id', $parent_product_data[0]->sub_category_id)->get();
            $catarray['sub_category_name'] = $sub_category[0]->name;
            $catarray['sub_category_slug'] = $sub_category[0]->slug;
            $sub_sub_category = DB::table('sub_sub_categories')->where('id', $parent_product_data[0]->sub_sub_category_id)->get();
            $catarray['sub_sub_category_name'] = $sub_sub_category[0]->name;
            $catarray['sub_sub_category_slug'] = $sub_sub_category[0]->slug;
            $categories = $catarray;

            $product_attribute_data = DB::select('SELECT * FROM product_attribute_value WHERE attribute_value_id IN (SELECT attribute_value_id FROM `product_attribute_relation` WHERE product_id =' . $data[0]->id . ')');

            array_push($data, $user_id);
            Session::put('prod_id', $id);

            return \View::make('product-detail.detail', compact('data', 'variant', 'parent_product_data','product_attribute_data', 'categories', 'mrp', 'pt', 'pv', 'img'));
        } else {
            return Redirect::to('/auth/login');
        }
    }

    public function place_order() {
        if (\Auth::check()) {

            $email = \Auth::user()->email;
            $id = Session::get('prod_id');
            $data = DB::table('parent_products')->where('id', $id)->get();
            $quantity = Input::get('quantity');
            $num = 0;
            $variant = DB::table('products')->where('parent_product_id', $id)->get();
            $var = Input::get('variant');
            $var_varient = $variant[$var];
            $name = DB::table('users')->where('email', $email)->pluck('name');
            $contact = DB::table('users')->where('email', $email)->pluck('phone');
            $username = DB::table('users')->where('email', $email)->pluck('username');
            $add1 = DB::table('meta')->where('email', $email)->pluck('address1');
            $add2 = DB::table('meta')->where('email', $email)->pluck('address2');
            $city = DB::table('meta')->where('email', $email)->pluck('city');
            $state = DB::table('meta')->where('email', $email)->pluck('state');
            $zip = DB::table('meta')->where('email', $email)->pluck('zipcode');
            $address = '' . $add1 . ',' . $add2 . ',' . $city . ',' . $state . '-' . $zip;
            //dd($parentproduct);
            $text = "";
            $text.="Dear vKulp Sales Team,<br/>";
            $text.="The order has been placed by " . $username . " with following specifications:<br/>";



            $text.="Name: " . $data[0]->name . "<br/>" . "Variant : " . $var_varient->variant_name . "<br/>";
            $text.="Description: " . $data[0]->description . "<br/>";
            $text.="Quantity: " . $quantity . "<br/>";
            $text.="Price: Rs. " . $var_varient->max_retail_price . "<br/>";


            $text.="<h2>Buyer Details are as follows:</h2><br/>";
            $text.="Name of the Buyer: " . $name . "<br/>";
            $text.="Name of the Hotel: " . $username . " <br/>";
            $text.="Email id: " . $email . "  <br/>";
            $text.="Phone No.: " . $contact . "   <br/>";
            $text.="Address: " . $address . "    <br/>";
            $text.="Please complete the Order within 48-hours.<br/>Regards,<br/>";
            $subj = "Order Placed by " . $username;
            Mail::send(['html' => 'testing.mail'], array('text' => $text), function ($m) use ($subj) {
                $m->from('contact@vkulp.com');
                $m->to('nelabhkotiya@gmail.com', 'placeorder')->subject($subj);
            });
            return Redirect::to('/wait_order');
        } else {
            return Redirect::to('/auth/login');
        }
    }

    public function req_sample() {
        if (\Auth::check()) {

            $email = \Auth::user()->email;
            $id = Session::get('prod_id');
            $data = DB::table('products')->where('id', $id)->get();
            // $quantity=Input::get('quantity');
            $num = 0;
            $name = DB::table('users')->where('email', $email)->pluck('name');
            $contact = DB::table('users')->where('email', $email)->pluck('phone');
            $username = DB::table('users')->where('email', $email)->pluck('username');
            $add1 = DB::table('meta')->where('email', $email)->pluck('address1');
            $add2 = DB::table('meta')->where('email', $email)->pluck('address2');
            $city = DB::table('meta')->where('email', $email)->pluck('city');
            $state = DB::table('meta')->where('email', $email)->pluck('state');
            $zip = DB::table('meta')->where('email', $email)->pluck('zipcode');
            $address = '' . $add1 . ',' . $add2 . ',' . $city . ',' . $state . '-' . $zip;

            $parentproductid = $data[0]->parent_product_id;
            $parentproduct = DB::table('parent_products')->where('id', $parentproductid)->get();

            $text = "";
            $text.="Dear vKulp Sales Team,<br/>";
            $text.="A sample has been requested by " . $username . " with following specifications:<br/>";



            $text.="Name: " . $parentproduct[0]->name . ' ' . $data[0]->variant_name . "<br/>";
            $text.="Description: " . $parentproduct[0]->description . "<br/>";

            $text.="Price: Rs. " . $data[0]->max_retail_price . "<br/>";


            $text.="<h2>Buyer Details are as follows:</h2><br/>";
            $text.="Name of the Buyer: " . $name . "<br/>";
            $text.="Name of the Hotel: " . $username . " <br/>";
            $text.="Email id: " . $email . "  <br/>";
            $text.="Phone No.: " . $contact . "   <br/>";
            $text.="Address: " . $address . "    <br/>";
            $text.="Please revert back within 48-hours.<br/>Regards,<br/>";
            $subj = "Sample Requested by " . $username;
            Mail::send(['html' => 'testing.mail'], array('text' => $text), function ($m) use ($subj) {
                $m->from('contact@vkulp.com');
                $m->to('nelabhkotiya@gmail.com', 'samplerequired')->subject($subj);
            });
            return Redirect::to('/wait_req');
        } else {
            return Redirect::to('/auth/login');
        }
    }

    public function wait_order() {
        if (\Auth::check()) {
            return \View::make('testing.wait_order');
        } else {
            return Redirect::to('/auth/login');
        }
    }

    public function wait_req() {
        if (\Auth::check()) {
            return \View::make('testing.wait_req');
        } else {
            return Redirect::to('/auth/login');
        }
    }

}
