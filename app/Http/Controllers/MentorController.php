<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $items = Mentor::all();
        return view('be.pages.mentoring.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('be.pages.mentoring.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'vidio_yt' => 'required|string',
            'image' => 'required|image',
        ]);

        $data['image'] = $request->file('image')->store('assets/image', 'public');
        Mentor::Create($data);
        toast()->success('Create has been success');
        return redirect()->route('mentoring.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Mentor::find($id);
        return view('be.pages.mentoring.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Mentor::find($id);
        return view('be.pages.mentoring.edit',compact('item'));
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
        $item = Mentor::find($id);
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'vidio_yt' => 'required|string',
        ]);

        $data['image'] = ($request->image == NULL) ? $item->image : $request->file('image')->store('assets/image', 'public');
        Mentor::find($id)->update($data);
        toast()->success('Update has been success');
        return redirect()->route('mentoring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mentor::find($id)->delete();
        toast()->success('Delete has been success');
        return redirect()->route('mentoring.index');
    }
}
