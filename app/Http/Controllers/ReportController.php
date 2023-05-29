<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Report;
Use DataTables;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
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
        $admin = Auth::user()->role == 'ADMIN';
        $auth_id = Auth::user()->id;

        if($admin == TRUE){
            if (request()->ajax()) {
                $query = DB::table('reports')
                ->select('reports.id','date', 'businesses.nama_outlet', 'penjualan', 'pengeluaran', 'stor_bank')
                ->join('businesses','reports.business_id','=','businesses.id')
                ->get();

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
                        ->editColumn('penjualan', 'Rp {{ number_format($penjualan) }}' )
                        ->editColumn('pengeluaran', 'Rp {{ number_format($pengeluaran) }}' )
                        ->editColumn('stor_bank', 'Rp {{ number_format($stor_bank) }}' )
                        ->rawColumns(['action'])
                        ->make();
            }
        }else{
            if (request()->ajax()) {
                $query = DB::table('reports')
                ->select('reports.id','date', 'businesses.nama_outlet', 'penjualan', 'pengeluaran', 'stor_bank')
                ->join('businesses','reports.business_id','=','businesses.id')
                ->join('busines_users','businesses.id','=','busines_users.business_id')
                ->where('busines_users.status','=','AKTIF')
                ->where('busines_users.users_id','=',$auth_id)
                ->get();

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
                        ->editColumn('penjualan', 'Rp {{ number_format($penjualan) }}' )
                        ->editColumn('pengeluaran', 'Rp {{ number_format($pengeluaran) }}' )
                        ->editColumn('stor_bank', 'Rp {{ number_format($stor_bank) }}' )
                        ->rawColumns(['action'])
                        ->make();
            }
        }
        return view('be.pages.report.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $business = Business::all();
        return view('be.pages.report.create', compact('business'));
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
            'business_id' => 'required',
            'penjualan' => 'required|integer|min:1',
            'pengeluaran' => 'required|integer|min:1',
            'stor_bank' => 'required|integer|min:1',
        ]);
        $data['date'] = date('d-m-y');
        Report::create($data);
        toast()->success('Create data has been success');
        return redirect()->route('report.index');
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
