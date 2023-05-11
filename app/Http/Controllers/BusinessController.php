<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
Use Alert;
use DataTables;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Business::query();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return
                        '<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Aksi
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="' . route('business.edit', $item->id) . '"">Edit</a></li>
                                    <li>
                                        <form action="' . route('business.destroy', $item->id) . '" method="POST">
                                        ' . method_field('delete') . csrf_field() . '
                                            <button type="submit" class="dropdown-item text-danger">
                                                Hapus
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>';

                    })
                    ->addColumn('gabung',function($item){
                        return '
                        <a href="'.route('business.show',$item->id).'" type="button" class="btn btn-success">Detail</a>
                        ';
                    })
                    ->editColumn('foto1',function($item){
                        return $item->foto1 ? '<img class=" w-300 img-thumbnail" src="'.Storage::url($item->foto1).'">' : '';
                    })
                    ->rawColumns(['action','foto1','gabung'])
                    ->make();
            }
        return view('be.pages.business.index');
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
