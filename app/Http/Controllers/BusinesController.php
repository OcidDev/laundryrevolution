<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Busines;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
Use Alert;

class BusinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Busines::all();
        dd($query);
        if (request()->ajax()) {
            $query = Busines::query();
            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="d-flex ms-auto">
                    <a href="' . route('busines.edit',$item->id) . '" class="btn btn-warning me-1"> Edit </a>
                    <form action="' . route('busines.destroy', $item->id) . '" method="POST">
                    ' . method_field('delete') . csrf_field() . '
                    <button type="submit" class="btn btn-danger"> Hapus </button>
                    </form>
                    </div>';
                    })
                    ->editColumn('no_whatsapp',function($item){
                        return '
                        <a href="https://wa.me/'.$item->no_whatsapp.'" type="button" class="btn btn-success">Hubungi</a>
                        ';
                    })
                    ->rawColumns(['no_whatsapp','action'])
                    ->make();
            }
        return view('be.pages.busines.index');
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
}
