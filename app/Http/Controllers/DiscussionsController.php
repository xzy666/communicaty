<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;

use App\Http\Requests;

class DiscussionsController extends Controller
{
    function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $discussions = Discussion::latest()->paginate(15);
        return view('layouts.timeline', compact('discussions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //发表文章 传入id
        return view('discussion.create');
    }

    public function createDis(Requests\DiscussionRequest $request)
    {
        $data = [
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'user_id' => auth()->id(),
            'last_user_id' => auth()->id()
        ];
        if ($discussion = Discussion::create($data)) {
            return redirect('/discussion/' . $discussion->id);
        }
        return back()->withInput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $discussion = Discussion::find($id);
        return view('discussion.one', compact('discussion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discussion = Discussion::find($id);
        return view('discussion.edit', compact('discussion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\DiscussionRequest $request, $id)
    {
        $discussion = Discussion::find($id);
        $discussion->title = $request->get('title');
        $discussion->content = $request->get('content');
        $discussion->last_user_id = $id;

        if ($discussion->save()){
            return redirect('/discussion/'.$id);
        }
        //这里可以执行一步falsh到session通知没有修改成功
        return back()->withInput();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
