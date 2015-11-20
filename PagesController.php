<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Views;
use Redirect;
use Input;
use GuzzleHttp\Client;
 class PagesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function home()
    {
    	return \View::make('index');
    }
    public function info()
    {
    	return \View::make('info');
    }
    public function search()
    {
        $search=Input::get('obj');
          $client = new Client(['base_uri' => 'https://data.gov.in/api/datastore/']);
          
          $response = $client->request('GET', 'resource.json?resource_id=e16c75b6-7ee6-4ade-8e1f-2cd3043ff4c9&api-key=f679eef3a738730ea25505cec1a62c30&filters[state]='.$search);
      
      $body=json_decode($response->getBody(),true);
      //dd($body);
        return \View::make('result',array('response'=> $body));
     //   https://data.gov.in/api/datastore/resource.json?resource_id=e16c75b6-7ee6-4ade-8e1f-2cd3043ff4c9&api-key=f679eef3a738730ea25505cec1a62c30&filters[state]=%22maharashtra%22
         // return Redirect::to('https://data.gov.in/api/datastore/resource.json?resource_id=e16c75b6-7ee6-4ade-8e1f-2cd3043ff4c9&api-key=f679eef3a738730ea25505cec1a62c30');
    	//return https://data.gov.in/api/datastore/resource.json?resource_id=e16c75b6-7ee6-4ade-8e1f-2cd3043ff4c9&api-key=f679eef3a738730ea25505cec1a62c30;
    }
}
