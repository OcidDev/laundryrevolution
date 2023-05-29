<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\User;
use App\Models\Business;
use App\Models\BusinesUser;
use Illuminate\Http\Request;

class BusinessUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $query = BusinesUser::with('business','users')->get();
        // dd($query);
        if (request()->ajax()) {
            $query = BusinesUser::with('business','users')->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return
                        '<div class="d-flex ms-auto">
                        <a href="' . route('business_user.edit',$item->id) . '" class="btn btn-warning me-1"> Edit </a>
                        <form action="' . route('business_user.destroy', $item->id) . '" method="POST">
                        ' . method_field('delete') . csrf_field() . '
                        <button type="submit" class="btn btn-danger"> Hapus </button>
                        </form>
                        </div>';

                    })
                    ->rawColumns(['action'])
                    ->make();
            }
        return view('be.pages.business_user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $businesses = Business::all();
        return view('be.pages.business_user.create',compact('users','businesses'));
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
            'users_id' => 'required',
            'business_id' => 'required',
        ]);
        $data['status'] = 'AKTIF' ;
        BusinesUser::Create($data);
        toast()->success('Create has been success');
        return redirect()->route('business_user.index');
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
