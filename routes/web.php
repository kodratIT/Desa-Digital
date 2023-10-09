<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\KartuKController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\RtController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\WebGisController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// Route::get('/coba', function () {
//     $admin= null;
//     $user = null;

//     return view('surat_pengantar', compact('admin', 'user'));
// });




Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->group(function(){
    Route::get('/profile',[UserController::class,'profile'])->name('profile');
    Route::post('/profile-update/{id}',[UserController::class,'update'])->name('profile.update');
    Route::post('/profile-info/{id}',[UserController::class,'save'])->name('profile.save');
});

Route::middleware(['auth','role:super-admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::resource('/roles',RolesController::class);
    Route::post('/roles/{role}/permissions',[RolesController::class,'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}',[RolesController::class,'revokePermission'])->name('roles.permissions.revoke');
    Route::resource('/permissions',PermissionsController::class);
    Route::post('/permissions/{permission}/roles',[PermissionsController::class,'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}',[PermissionsController::class,'removeRole'])->name('permissions.roles.remove');
    Route::get('/users',[UserController::class,'index'])->name('users.index');
    Route::delete('/users/{user}',[UserController::class,'destroy'])->name('users.destroy');
    Route::get('/users/{user}',[UserController::class,'show'])->name('users.show');
    Route::post('/users/{user}/roles',[UserController::class,'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}',[UserController::class,'removeRole'])->name('users.roles.remove');
});

Route::name('manage.')->prefix('manage')->group(function () {
    // route pengajuan
    route::get('/pengajuan',[PengajuanSuratController::class,'index'])->middleware('auth','permission:pengajuan.index')->name('pengajuan.index');
    route::get('/pengajuan/create',[PengajuanSuratController::class,'create'])->middleware('auth','permission:pengajuan.create')->name('pengajuan.create');
    route::post('/pengajuan/store',[PengajuanSuratController::class,'store'])->middleware('auth','permission:pengajuan.create')->name('pengajuan.store');
    route::put('/pengajuan/{id}',[PengajuanSuratController::class,'update'])->middleware('auth','permission:pengajuan.update')->name('pengajuan.update');
    route::get('/pengajuan/edit/{id}',[PengajuanSuratController::class,'edit'])->middleware('auth','permission:pengajuan.update')->name('pengajuan.edit');
    route::get('/cetak-surat/{id}',[PengajuanSuratController::class,'CetakSurat'])->middleware('auth','permission:cetak.surat')->name('cetak.surat');
    //pengajuan

    route::get('/data-warga',[KartuKController::class,'DataWarga'])->middleware('auth','permission:data.warga')->name('data.warga');
    route::get('/data-warga/create',[KartuKController::class,'Wargacreate'])->middleware('auth','permission:datawarga.create')->name('datawarga.create');
    route::post('/data-warga/store',[KartuKController::class,'Wargastore'])->middleware('auth','permission:datawarga.create')->name('datawarga.store');
    route::put('/data-warga/update/{id}',[KartuKController::class,'Wargaupdate'])->middleware('auth','permission:datawarga.edit')->name('datawarga.update');
    route::get('/data-warga/edit/{id}',[KartuKController::class,'Wargaedit'])->middleware('auth','permission:datawarga.edit')->name('datawarga.edit');
    Route::get('/import', [ImportController::class,'index'])->middleware('auth','permission:import.excel')->name('import.index');
    Route::post('/import/store', [ImportController::class,'store'])->middleware('auth','permission:import.save')->name('import.store');

    // route::resource('/laporan',LaporanController::class);
    route::get('/laporan',[LaporanController::class,'index'])->middleware('auth','permission:laporan.index')->name('laporan.index');
    route::get('/laporan/create',[LaporanController::class,'create'])->middleware('auth','permission:laporan.create')->name('laporan.create');
    route::post('/laporan/store',[LaporanController::class,'store'])->middleware('auth','permission:laporan.create')->name('laporan.store');
    route::get('/laporan/{id}',[LaporanController::class,'show'])->middleware('auth','permission:laporan.update')->name('laporan.edit');
    route::put('/laporan/edit/{id}',[LaporanController::class,'update'])->middleware('auth','permission:laporan.update')->name('laporan.update');
});

Route::middleware('auth','role:super-admin')->name('manage.')->prefix('manage')->group(function(){
    route::resource('/jenis-surat',SuratController::class);
    route::resource('/kartukeluarga',KartuKController::class);
    route::resource('/data-desa',DesaController::class);
    route::resource('/data-rt',RtController::class);
    route::resource('/data-rw',RwController::class);
});
Route::name('manage.')->prefix('manage')->group(function(){
    Route::get('/webgis-pbb',[WebGisController::class,'index'])->middleware('auth','permission:webgis.index')->name('webgis.index');
    Route::get('/webgis-pbb/create',[WebGisController::class,'create'])->middleware('auth','permission:webgis.create')->name('webgis.create');
    Route::post('/webgis-pbb/store',[WebGisController::class,'store'])->middleware('auth','permission:webgis.create')->name('webgis.store');
    Route::put('/webgis-pbb/update',[WebGisController::class,'update'])->middleware('auth','permission:webgis.update')->name('webgis.update');
    Route::get('/webgis-pbb/json',[WebGisController::class,'json'])->middleware('auth')->name('json-data');
});

