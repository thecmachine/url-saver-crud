<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Urls;
use Auth;
use Illuminate\Support\Facades\Log;

class UrlsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function storeUrl(Request $request) {
        $url = new Urls();
        $url->url = $request->url;
        $url->user_id = Auth::id();
        $url->save();

        return $url;
    }

    public function getUrls(Request $request) {
        $urls = Urls::where('user_id', Auth::id())->get();

        return $urls;
    }

    public function editUrls(Request $request, $id){
        $url = Urls::where('id',$id)->first();

        $url->url = $request->get('val_1');
        $url->save();

        return $url;
    }

    public function deleteUrl(Request $request){
        $url = Urls::find($request->id)->delete();
    }
}
