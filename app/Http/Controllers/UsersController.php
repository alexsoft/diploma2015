<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();

        return $users;
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $nickname
     * @return Response
     */
    public function show($nickname)
    {
        $user = User::where('nickname', $nickname)->firstOrFail();

        return view('users.show')->with(compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $nickname
     * @return Response
     */
    public function edit($nickname)
    {
        $user = User::where('nickname', $nickname)->firstOrFail();

        return view('users.edit')->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  string  $nickname
     * @param  Request  $request
     * @return Response
     */
    public function update($nickname, Request $request)
    {
        $user = User::where('nickname', $nickname)->firstOrFail();

        if ($request->ajax()) {
            $userInfo = $request->get('user');

            foreach ($userInfo as $key => $value) {
                $user->$key = $value;
            }

            return [
                'success' => $user->save(),
            ];
        } else {
            $user->update($request->only('email', 'name'));

            return redirect()->route('users.show', $user->nickname);
        }
    }
}
