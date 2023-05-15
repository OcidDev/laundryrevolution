<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
Use Alert;
use DataTables;

class BusinessController extends Controller
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
        if (request()->ajax()) {
            $query = Business::all();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return
                        '<div class="d-flex ms-auto">
                        <a href="' . route('business.edit',$item->id) . '" class="btn btn-warning me-1"> Edit </a>
                        <form action="' . route('business.destroy', $item->id) . '" method="POST">
                        ' . method_field('delete') . csrf_field() . '
                        <button type="submit" class="btn btn-danger"> Hapus </button>
                        </form>
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
        return view('be.pages.business.create');
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
            'foto1'             =>'image|required',
            'foto2'             =>'image|required',
            'foto3'             =>'image|required',
            'foto4'             =>'image|required',
            'foto5'             =>'image|required',
            'foto6'             =>'image|required',
            'vidio_yt'          =>'string|required',
            'nama_outlet'       =>'string|required',
            'alamat'            =>'string|required',
            'kota'              =>'string|required',
            'waktu_bep'         =>'string|required',
            'estimasi_bep'      =>'string|required',
            'proposal'          =>'image|required',
            'total_saham'       =>'numeric|required',
            'harga_saham'       =>'numeric|required',
            'saham_terjual'     =>'numeric|required',
        ]);


        $data['foto1'] = $request->file('foto1')->store('assets/photo', 'public');
        $data['foto2'] = $request->file('foto2')->store('assets/photo', 'public');
        $data['foto3'] = $request->file('foto3')->store('assets/photo', 'public');
        $data['foto4'] = $request->file('foto4')->store('assets/photo', 'public');
        $data['foto5'] = $request->file('foto5')->store('assets/photo', 'public');
        $data['foto6'] = $request->file('foto6')->store('assets/photo', 'public');
        $data['proposal'] = $request->file('proposal')->store('assets/photo', 'public');

        Business::create($data);
        toast()->success('Create has been success');
        return redirect()->route('business.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Business::FindOrFail($id);
        return view('be.pages.business.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $item = Business::findOrFail($id);
        $item->delete();
        toast()->error('Deleted has been success');
        return redirect()->route('business.index');
    }
}
