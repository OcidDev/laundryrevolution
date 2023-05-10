<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
Use Alert;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cari = User::all();

        if (request()->ajax()) {
            $query = User::query();
            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                //     $admin = '<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                //     <div class="btn-group" role="group">
                //         <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                //         Aksi
                //         </button>
                //         <ul class="dropdown-menu">
                //             <li><a class="dropdown-item btn btn-primary" href="' . route('edit', $item->id) . '"">Edit</a></li>
                //             <li>
                //                 <form action="' . route('destroy', $item->id) . '" method="POST">
                //                 ' . method_field('delete') . csrf_field() . '
                //                     <button type="submit" class="dropdown-item text-danger">
                //                         Hapus
                //                     </button>
                //                 </form>
                //             </li>
                //             <li>
                //             <a class="dropdown-item" href="' . ($item->status == 'NONAKTIF' ? route('member.accept', $item->id) : route('member.reject', $item->id) ) . '">' . ($item->status == 'NONAKTIF' ? 'Aktifkan' : 'Nonaktifkan') . '</a>

                //             </li>
                //         </ul>
                //     </div>
                // </div>';
                // $user = 'No Action';
                // return Auth::user()->role == 'ADMIN' ? $admin : $user ;
                    return '
                    <div class="d-flex ms-auto">
                    <a href="' . route('member.edit',$item->id) . '" class="btn btn-warning me-1"> Edit </a>
                    <form action="' . route('member.destroy', $item->id) . '" method="POST">
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
        return view('be.pages.member.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = User::all();

        $q = DB::table('users')->select(DB::raw('MAX(RIGHT(no_member,4)) as kode'));
        $kd ="";
        if($q->count()>0)
        {
            foreach($q->get() as $k)
            {
            $tmp = ((int)$k->kode)+1;
            $kd = sprintf("%04s",$tmp);
            }
        }
        else
        {
            $kd = "0001";
        }
        // return $kd;
        return view('be.pages.member.create', compact('members','kd'));
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
            'no_member'=>'string|required',
            'marking_kode'=>'string|required',
            'fullname'=>'string|required',
            'email'=>'email|required|unique:users,email',
            'username'=>'string|unique:users,username',
            'no_whatsapp'=>'string|required',
            'kota'=>'string|required',
            'kota_ws'=>'string|required',
            'usaha'=>'string|required'
        ]);
        // dd($data);
        // exit;
        $data['password'] = Hash::make($request->password);
        User::create($data);
        toast()->success('Create data has been success');
        return redirect()->route('member.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = user::findOrFail($id);
        return view('pages.dashboard.member.edit',compact('item'));
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
        $data = $request->all();
        $item = Member::findOrFail($id);
        $item->update($data);
        toast()->success('Edit data has been success');
        return redirect()->route('member.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();
        toast()->error('Deleted has been success');
        return redirect()->route('member.index');
    }

    public function accept($id){
        $item = User::findOrFail($id);
        $item->update(['status' => 'AKTIF']);
        toast()->success('Accepted member has been success');
        return redirect()->route('member.index');
    }

    public function reject($id){
        $item = User::findOrFail($id);
        $item->update(['status' => 'NONAKTIF']);
        toast()->success('Rejected member has been success');
        return redirect()->route('member.index');
    }
}
