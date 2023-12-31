<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ModelKk;
use App\Models\ModelRt;
use Illuminate\Support\Facades\Crypt;
use App\Models\ModelDesa;
use App\Models\ModelFamily;
use App\Models\ModelLaporan;
use App\Models\ModelPengajuan;

class HomeController extends Controller
{
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
        $breadcrumb = "Dashboard";
        $data = Auth()->User();
        $roles = $data->getRoleNames();
        $user = User::where('users.id',$data->id)
            ->join('members_card_family','members_card_family.user_id','=','users.id')
            ->join('card_family','card_family.id','=','members_card_family.no_kk')
            ->select('users.*','card_family.no_kk','members_card_family.*' ,'card_family.id_rt','card_family.id_desa')
            ->first();


        if($roles[0] == 'admin'){

            $dump = ModelFamily::where('members_card_family.user_id',$user->id)
                ->join('card_family','card_family.id','=','members_card_family.no_kk')
                ->join('rukun_tetangga','rukun_tetangga.id','=','card_family.id_rt')
                ->join('vilages','vilages.id','=','card_family.id_desa')
                ->select('rukun_tetangga.id as no_rt','vilages.id')
                ->first();

            $result = ModelKk::where('card_family.id_rt', $dump->no_rt, true)
                ->where('card_family.id_desa', $dump->id, true)
                ->join('rukun_tetangga', 'rukun_tetangga.id', '=', 'card_family.id_rt')
                ->join('vilages', 'vilages.id', '=', 'card_family.id_desa')
                ->join('members_card_family', 'members_card_family.id', '=', 'card_family.id')
                ->join('users', 'users.id', '=', 'members_card_family.user_id')
                ->select('users.id')
                ->get();

            $result1 = ModelPengajuan::join('members_card_family','members_card_family.user_id','pengajuan_surat.id_user')
                    ->join('card_family','card_family.id','=','members_card_family.no_kk')
                    ->join('rukun_tetangga', 'rukun_tetangga.id', '=', 'card_family.id_rt')
                    ->join('vilages', 'vilages.id', '=', 'card_family.id_desa')
                    ->where('rukun_tetangga.id',$dump->no_rt,true)
                    ->where('vilages.id',$dump->id,true)
                    ->select('rukun_tetangga.id as no_rt','vilages.id')
                    ->get();
            
                    
            $result2 = ModelKk::where('card_family.id_rt', $dump->no_rt, true)
            ->where('card_family.id_desa', $dump->id, true)
            ->select('card_family.id')
            ->get();

            $result3 = ModelLaporan::join('members_card_family', 'members_card_family.user_id', '=', 'laporan_warga.id_user')
                    ->join('card_family','card_family.id','members_card_family.no_kk')
                    ->where('card_family.id_desa',$user->id_desa)
                    ->where('card_family.id_rt',$user->id_rt)
                    ->select('members_card_family.name','members_card_family.no_nik','laporan_warga.*','card_family.id_rt','card_family.id_desa')
                    ->count();

          
            $jumlahWarga = $result->count();
            $jmhpengajuan = $result1->count();
            $jmhlaporan =$result3;
            $jmhkk = $result2->count();
            
            
            return view('pages.index',compact('breadcrumb','user','jumlahWarga','jmhpengajuan','jmhlaporan','jmhkk'));
        }elseif($roles[0] == 'super-admin'){
            $result = User::all();
            $result1 = ModelPengajuan::all();
            $result2 = ModelKk::all();
            $result3 = ModelLaporan::all()->count();
            $jumlahWarga = $result->count();
            $jmhpengajuan = $result1->count();
            $jmhlaporan =$result3;
            $jmhkk = $result2->count();
            return view('pages.index',compact('breadcrumb','user','jumlahWarga','jmhpengajuan','jmhlaporan','jmhkk'));

        }else{
            
            $result = ModelPengajuan::where('id_user',$user->id)
                ->get();
            $result2 = User::join('members_card_family','members_card_family.user_id','users.id')
                    ->join('card_family','card_family.id','=','members_card_family.no_kk')
                    ->where('card_family.no_kk',$user->no_kk)
                    ->get();
            $result3 = ModelLaporan::where('id_user',Auth()->User()->id)->count();
            $dump = ModelFamily::where('user_id', Auth()->user()->id)->first();
            $result4 = ModelFamily::where('no_kk', $dump->no_kk)->count();
          
            $jmhpengajuan = $result->count();
            $jumlahWarga = $result2->count();
            $jmhlaporan =$result3;
            $jmhkk = $result4;
        
            return view('pages.index',compact('breadcrumb','user','jumlahWarga','jmhpengajuan','jmhlaporan','jmhkk'));
        }
    }
}
