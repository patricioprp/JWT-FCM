<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index')->with('users',$users);
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
        dd("hola");
        $message = new Message();
        $message->title = $request->title;
        $message->body = $request->text;
        $message->user_id = $request->id;
        $message->save();
        return redirect(route('user.index'));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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



    public function showMessages($id)
    {
      $user = User::find($id);
      $msg = $user->messages();
      if(!$msg){
        return response()->json(['Mensaje'=>'No existen mensages','Codio 404'],404);
    }
    return response()->json(['Mensages'=>$msg],202);
    }

    public function saveMessages($title,$text,$id)
    {
        $message = new Message();
        $message->title = $title;
        $message->body = $text;
        $message->user_id = $id;
        $message->save();
        return response()->json(['Mensaje'=>'Los mensajes fueron enviados'],202);

    }
}
