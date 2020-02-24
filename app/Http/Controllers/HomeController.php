<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    private $id = null;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $todos = DB::table('todo_list')->paginate(10);
        return view('home')->with('todos',$todos);
    }

    public function store(Request $request)
    {
        $data = array(
            'title' => $request->title,
            'decription' => $request->description
        );
        DB::table('todo_list')->insert($data);
        return back();
    }

    public function edit($id)
    {
        $todos = DB::table('todo_list')->paginate(10);
        $edit = $todos->where('id',$id)->first();
//        dd($edit);
        return view('home')->with('edit',$edit)->with('todos',$todos)->with('id',$id);
    }

    public function update($id,Request $request)
    {
//        dd($id);
        $data = array(
            'title' => $request->title,
            'decription' => $request->description
        );
        DB::table('todo_list')->where('id',$id)->update($data);
        return redirect(('/home'));
    }

    public function destroy($id)
    {
        DB::table('todo_list')->where('id',$id)->delete();
        return back();
    }
}
