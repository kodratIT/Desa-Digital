<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ModelFamily;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Crypt;



use function PHPUnit\Framework\returnValue;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::join('members_card_family','members_card_family.user_id','=','users.id')
            ->select('users.*','members_card_family.name')
            ->get();
        $breadcrumb = "Users";
        return view('pages.users.index',compact('breadcrumb','users'));
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
       $user = User::find($id);
       $roles = Role::all();
       $breadcrumb = "user";

       return view('pages.users.show',compact('user','breadcrumb','roles'));
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
        $url = decrypt($id);

        $data = $request->validate([
            'agama'     => 'required',
            'pekerjaan'     => 'required',
            'tempatlahir'   => 'required',
            'tgllahir'      => 'required',
            'jeniskelamin'  => 'required',
            'pendidikan'    => 'required',
            'status'        => 'required'
        ]);

        $user = Auth()->User();
        $member = ModelFamily::where('user_id',$user->id)->first();
        $member->update([
            'agama'             => $request->agama,
            'tempat_lahir'      => $request->tempatlahir,
            'tanggal_lahir'     => $request->tgllahir,
            'jenis_kelamin'     => $request->jeniskelamin,
            'pendidikan'        => $request->pendidikan,
            'pekerjaan'         => $request->pekerjaan,
            'status'            => $request->status,
        ]); 

        return back()->with('success','Data Berhasil Di Update');

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

    public function assignRole(Request $request,User $user ){
        if($user->hasRole($request->role)){
            return back()->with('message','Role exists');
        }

        $user->assignRole($request->role);
        return back()->with('message','Role Assigmed');
        
    }

    public function removeRole(User $user,Role $role){
        if($user->hasRole($role)){
            $user->removeRole($role);
            return back()->with('message','Role removed');

        }

        return back()->with('message','Role no exists');
    }

    public function profile(){
        $breadcrumb = "Profile Saya";
        $user = Auth()->User();
        $member = ModelFamily::where('user_id',$user->id)->first();
        return view('pages.profile.index',compact('breadcrumb','user','member'));
    }

    public function save(Request $request, $id){
        $url = decrypt($id);

        $user = Auth()->User();
        $role = $user->getRoleNames();
        if($role[0] != 'admin'){
            $data = $request->validate([
                'phone'   => 'required',
            ]);;
            $user->update([
                'phone' => $request->phone  ,
            ]);
        }else{
            $request->validate([
                'signature' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'phone' => 'required' 
            ]);

             // Get the image file from the request
            $image = $request->file('signature');

            // Generate a unique name for the image
            $signature = time() . '_' . $image->getClientOriginalName();

            $image->move(public_path('signature'), $signature);

            $user->update([
                'phone' => $request->phone  ,
                'digital_signature' => $signature  
            ]);
        }

        return back()->with('success','Data Berhasil Di Update');
    }
}
