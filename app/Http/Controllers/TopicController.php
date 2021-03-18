<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::all();
        return view('topic.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->all();
        $data = ['user_id' => \Auth::id(), 'title' => $post['title'], 'content' => $post['content'], 'grade' => $post['grade'], 'impression' => $post['impression']];
        
        Topic::insert($data);
        return redirect()->route('topic.index')->with('flash_message', 'レビューの投稿に成功しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic = Topic::find($id);
        return view('topic.show', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic = Topic::find($id);
        return view('topic.edit', compact('topic'));
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
        $update = [
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'grade' => $request->grade,
            'impression' => $request->impression
        ];
        Topic::where('id', $id)->update($update);
        return redirect()->route('topic.index')->with('flash_message', 'レビューの編集に成功しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Topic::where('id', $id)->delete();
        return redirect()->route('topic.index')->with('flash_message', 'レビューの削除に成功しました');
    }
    
}
