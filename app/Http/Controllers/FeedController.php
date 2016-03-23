<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;

class FeedController extends Controller
{
    //
    public function index(Request $request) {
        $url=$request->url;
        if($url=='') {
            $xml=new Collection;
            $xml->channel=new Collection();
            $xml->channel->title='Document';
            $xml->channel->item=array();
        }
        else {
            $data = file_get_contents($url);
            $xml = simplexml_load_string($data);
            if($xml==false) {
                return response('Wrong feed url or error in xml syntax');
            }
        }
        return view('index',compact('xml'));
    }
}
