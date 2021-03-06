<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserService $service,$id)
    {
        $user = $service->getUserById($id);

        $userPosts = $service->getPostsByUser($user);
        $userComments = $service->getCommentsByUser($user);

        return view('home.user.userCenter',compact('user','userPosts','userComments'));
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

    public function posts(UserService $service, $id)
    {
        $user = $service->getUserById($id);
        $userPosts = $service->getPostsByUser($user,true);
        return view('home.user.userPosts',compact('user','userPosts'));
    }

    public function comments(UserService $service, $id)
    {
        $user = $service->getUserById($id);
        $userComments = $service->getCommentsByUser($user,true);
        return view('home.user.userComments',compact('user','userComments'));
    }

    public function votePost(UserService $service, $id)
    {
        $user = $service->getUserById($id);
        $userVotePosts = $service->getVotePostByUser($user);
        return view('home.user.userVotePosts',compact('user','userVotePosts'));
    }
}
