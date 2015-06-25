<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

class DialogsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     * @internal param Request $request
     */
    public function index()
    {
//        $users = User::where('id', '!=', Auth::id())->get();

        return view('dialogs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $nickname
     * @param Request $request
     * @return Response
     */
    public function store($nickname, Request $request)
    {
        $toUser = User::select('id')->where('nickname', $nickname)->firstOrFail();

        $msg = Message::create([
            'from_id' => Auth::id(),
            'to_id'   => $toUser->id,
            'message' => $request->message
        ]);

        return \Response::json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param $nickname
     * @return Response
     */
    public function show($nickname)
    {
        $user = User::where('nickname', $nickname)->firstOrFail();

        $messages = Message::with(['from', 'to'])
            ->orderBy('created_at', 'ASC')
            ->where(['from_id' => Auth::id(), 'to_id' => $user->id])
            ->orWhere(['from_id' => $user->id, 'to_id' => Auth::id()])
            ->get();

        return view('dialogs.show')->with(compact('user', 'messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
