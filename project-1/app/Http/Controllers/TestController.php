<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = ['id'=>1,'name'=>'gina'];
        $data[0] = ['id'=>1,'name'=>'gina'];
        $data[1] = ['id'=>2,'name'=>'Lily'];
        $data[2] = ['id'=>3,'name'=>'Jay'];
        $data[3] = ['id'=>4,'name'=>'Steve'];
        $data[4] = ['id'=>5,'name'=>'Mary'];
        $data[5] = ['id'=>6,'name'=>'Kiki'];
        $data[6] = ['id'=>7,'name'=>'Monkey'];


        // return view('Test.index')->with('data',$data);
        return view('Test.index',compact(['data']));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
