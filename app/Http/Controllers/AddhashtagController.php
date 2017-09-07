<?php

namespace App\Http\Controllers;
use App\Hashtag;
use Twitter;
use Illuminate\Http\Request;


class AddhashtagController extends Controller
{
    public function index(){


        return View('hashtag/addhashtag');




    }
    public function addtag(Hashtag $hashtag,Request $request){

        $tag = $hashtag;
        $tag->hashtag = $request->hashtag;
        $tag->save();

        return redirect('/');
    }

}
