<?php

namespace App\Http\Controllers;

use App\Hashtag;
use Illuminate\Http\Request;
use Twitter;

class HashtagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return View('hashtag/hashtag')->with('data', '' );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Hashtag  $hashtag
     * @return \Illuminate\Http\Response
     */
    public function show(Hashtag $hashtag)
    {
        //
            $tag = $hashtag->all();
            $context = array();
            if($tag!=''){

            for($j=0; $j < count($tag);$j++){
              # code...

            $data = Twitter::getSearch(['q' => $tag[$j]->hashtag, 'count' => '100','result_type' => 'recent']);
            $data = $data->statuses;
            $user = array();

              for($i=0;$i<count($data);$i++){


                $data[$i]->text=Twitter::linkify("@".$data[$i]->user->screen_name . " &rarr; " . $data[$i]->text);

                }
                $context[$j] = $data;


          }
          return View('hashtag/hashtag')->with('data', $context)->with('tag',$tag);
        }else{
          return View('hashtag/hashtag')->with('data','')->with('tag','');


        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hashtag  $hashtag
     * @return \Illuminate\Http\Response
     */
    public function edit(Hashtag $hashtag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hashtag  $hashtag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hashtag $hashtag, $id)
    {


    }
    //show charts of hashtags
    public function showcharts(){

        return view('hashtag/showcharts');

    }
    //request data  for charts
    public function datacharts(Hashtag $hashtag,Request $request){
            $tempo = $request->tempo;
            $tag = $hashtag->all();
            $hashtag = array();
            $count = array();
            $datasend= array();
            $now = date("D M j G:i:s T Y");
            $newdata = strtotime($now) - $tempo*3600;


            $counter = 0;
        for($i=0; $i < count($tag);$i++){

                $data = Twitter::getSearch(['q' => $tag[$i]->hashtag, 'count' => '100','result_type' => 'recent']);
                $data = $data->statuses;

                $counter = 0;
             for($j=0;$j<count($data);$j++){

                if( strtotime($data[$j]->created_at) > $newdata )

                {

                    $counter++;

                }
                // array_push($count,count($data));



             }
                array_push($count,$counter);
                array_push($hashtag,$tag[$i]->hashtag);
            }
            $datasend['count'] = $count;
            $datasend['name']= $hashtag;
        //  return strtotime( $data[0]->created_at);
        return $datasend;

    }
    public function topRTweets(Hashtag $hashtag){

        $tag = $hashtag->all();
        $rt = array();
        $maior = 0;
        $rtcount= 0;
        for($i=0; $i < count($tag);$i++){

                $data = Twitter::getSearch(['q' => $tag[$i]->hashtag, 'count' => '100','result_type' => 'recent']);
                $data = $data->statuses;

                 for($j=0;$j<count($data);$j++){

                            $rt = $data[$i]->retweet_count;
                            $data[$i]->text=Twitter::linkify("@".$data[$i]->user->screen_name . " &rarr; " . $data[$i]->text);

                         }

                }


        return var_dump($rt);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hashtag  $hashtag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hashtag $hashtag,$id)
    {
        $hashtag->find($id)->delete();
        return "Deletado com sucesso";
    }
}
