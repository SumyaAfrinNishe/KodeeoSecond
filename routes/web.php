<?php

//backend
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MailController;
//frontend

use App\Http\Controllers\Frontend\ShowTrackController;
use App\Http\Controllers\frontend\ShowBranchController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\LoginController;
use App\Http\Controllers\frontend\InformationController;
use App\Http\Controllers\frontend\ShowCourierInfoController;





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

// Route::get('home',[HomeController::class,'home']);


// Route::get('/admin', function ()
// {
//     return view ('master');
// });
// Route::get('/', function ()
// {
//     return view ('frontend.pages.home');
// });

//frontend part
Route::get('/home',[HomeController::class, 'home'])->name('home');

Route::group(['middleware'=>'web_auth'],function (){
Route::get('/showbranch',[ShowBranchController::class, 'showbranch'])->name('showbranch');

Route::get('/your/courier/information/',[ShowCourierInfoController::class,'showCourierInfo'])->name('show.courier.info');

Route::get('/show/tracking/details',[ShowTrackController::class, 'showTrack'])->name('showtrack');
Route::get('/search/by/tracking',[ShowTrackController::class,'trackSearch'])->name('track.search');

Route::get('/your/profile',[HomeController::class,'profile'])->name('profile');
Route::get('/your/profile/edit',[HomeController::class,'profileEdit'])->name('profile.edit');
Route::put('/your/profile/update',[HomeController::class,'profileUpdate'])->name('profile.update');
Route::get('/change/password',[HomeController::class,'changePassword'])->name('change.password');
Route::post('/update/password',[HomeController::class,'updatePassword'])->name('update.password');

Route::get('/your/courier/status',[ProfileController::class,'statusView'])->name('profile.status.view');

Route::get('/information',[InformationController::class, 'information'])->name('information');


Route::get('/edit/update/your/information/{info_id}',[ProfileController::class,'infoEdit'])->name('customer.edit.information');
Route::put('/update/your/information/{info_id}',[ProfileController::class,'infoUpdate'])->name('customer.update.information');
Route::get('/customerinfo/confirm/{info_id}',[ProfileController::class,'customerConfirm'])->name('admin.customer.confirm');
Route::get('/customerinfo/confirmation/cancel/{info_id}',[ProfileController::class,'confirmCancel'])->name('admin.customer.confirm.cancel');

// Route::get('payment/status/paid/{info_id}',[ProfileController::class,'prePayment'])->name('admin.pre.payment');
// Route::get('payment/status/condition/{info_id}',[ProfileController::class,'paymentCondition'])->name('admin.payment.condition');
Route::get('/about',[HomeController::class,'about'])->name('about');
});


Route::get('/admin/customerinfo',[CustomerController::class,'customerinfo'])->name('admin.customer.info');
Route::post('/admin/customerinfo/create',[InformationController::class,'customerinfoCreate'])->name('admin.customer.create');
Route::get('/customerinfo/view/{info_id}',[CustomerController::class,'customerDetails'])->name('admin.customer.details.view');
Route::get('/customerinfo/edit/{info_id}',[CustomerController::class,'customerEdit'])->name('admin.customer.details.edit');
Route::put('/customerinfo/update/{info_id}',[CustomerController::class,'customerUpdate'])->name('admin.customer.details.update');
Route::get('/customerinfo/delete/{info_id}',[CustomerController::class,'customerDelete'])->name('admin.customer.details.delete');
Route::get('/customerinfo/accept/{info_id}',[CustomerController::class,'customerAccept'])->name('admin.customer.accept');
Route::get('/customerinfo/cancel/{info_id}',[CustomerController::class,'customerCancel'])->name('admin.customer.cancel');



//login and registration
Route::get('/registration',[LoginController::class,'registration'])->name('registration');
Route::post('/registration/store',[LoginController::class,'registrationstore'])->name('registration.store');
Route::get('/user/login',[LoginController::class,'userlogin'])->name('user.login');
Route::post('/user/do/login',[LoginController::class,'userdoLogin'])->name('doLogin');
Route::get('/user/logout',[LoginController::class,'logout'])->name('user.logout');


Route::get('/send/email',[MailController::class,'Sendmail'])->name('send.mail');

    Route::get('/login',[AdminController::class,'login'])->name('admin.login');
    Route::post('/do/login',[AdminController::class,'doLogin'])->name('admin.doLogin');

    Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function () {
    Route::get('/', function () {
        return view('admin.partial.home');
    })->name('admin.home');

    Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout');

//dashboard
Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');


//Branch
Route::get('/addbranch',[BranchController::class,'addbranch'])->name('admin.add.branch');
Route::get('/branchlist',[BranchController::class,'branchlist'])->name('admin.branch.list');
Route::post('/branchlist/create',[BranchController::class,'branchlistCreate'])->name('admin.branch.list.create');
Route::get('/branchdetails/view/{branch_id}',[BranchController::class,'branchdetails'])->name('admin.branchdetails.view');
Route::get('/branchdetails/delete/{branch_id}',[BranchController::class,'branchdelete'])->name('admin.branchdetails.delete');
Route::get('/branchedit/{branch_id}',[BranchController::class,'branchEdit'])->name('admin.branch.edit');
Route::put('/branchupdate/{branch_id}',[BranchController::class,'branchUpdate'])->name('admin.branch.update');
Route::get('/branch/search',[BranchController::class,'branchSearch'])->name('admin.branch.search');

//Customer and Booking

//Staff
Route::get('/addstaff',[StaffController::class,'staffadd'])->name('admin.staff.add');
Route::get('/stafflist',[StaffController::class,'stafflist'])->name('admin.staff.list');
Route::post('/addstaff/create',[StaffController::class,'stafflistCreate'])->name('admin.staff.create');
Route::get('/staffdetails/view/{staff_id}',[StaffController::class,'staffdetails'])->name('admin.staffdetails.view');
Route::get('/stafffdetails/delete/{staff_id}',[StaffController::class,'staffdelete'])->name('admin.staffdetails.delete');
Route::get('/staff/edit/{staff_id}',[StaffController::class,'staffEdit'])->name('admin.staff.edit');
Route::put('/staff/update/{staff_id}',[StaffController::class,'staffUpdate'])->name('admin.staff.update');
Route::get('/staff/search',[StaffController::class,'staffSearch'])->name('admin.staff.search');



//Status
Route::get('/arrived/destination',[StatusController::class,'arriveddestination'])->name('admin.arrived.destination');
Route::get('/arrived/destination/details/view/{arrd_id}',[StatusController::class,'arriveDetails'])->name('admin.arrived.details.view');
Route::get('/arrived/destination/edit/{arrd_id}',[StatusController::class,'arriveEdit'])->name('admin.arrived.edit');
Route::put('/arrived/destination/update/{arrd_id}',[StatusController::class,'arriveUpdate'])->name('admin.arrived.update.status');



Route::get('/intransit',[StatusController::class,'intransit'])->name('admin.in.transit');
Route::get('/intransit/details/view/{intra_id}',[StatusController::class,'intransitDetails'])->name('admin.intransit.details.view');
Route::get('/intransit/edit/{intra_id}',[StatusController::class,'intransitEdit'])->name('admin.intransit.edit');
Route::put('/intransit/update/{intra_id}',[StatusController::class,'intransitUpdate'])->name('admin.intransit.update.status');



Route::get('/outdelievery',[StatusController::class,'outdelievery'])->name('admin.out.delievery');
Route::get('/outdelievery/details/view/{outd_id}',[StatusController::class,'outdelieveryDetails'])->name('admin.out.delievery.details.view');
Route::get('/outdelievery/edit/{outd_id}',[StatusController::class,'outdelieveryEdit'])->name('admin.out.delievery.edit');
Route::put('/outdelievery/update/{outd_id}',[StatusController::class,'outdelieveryUpdate'])->name('admin.out.delievery.update.status');



Route::get('/accepted/by/courier',[StatusController::class,'acceptCourier'])->name('admin.accept.courier');
Route::get('/accept/courier/details/view/{ac_id}',[StatusController::class,'acceptdetails'])->name('admin.acceptdetails.view');
Route::get('/accept/edit/{ac_id}',[StatusController::class,'acceptEdit'])->name('admin.accept.edit');
Route::put('/update/{ac_id}',[StatusController::class,'acceptUpdate'])->name('admin.accept.update.status');


Route::get('/totaldelieverd',[StatusController::class,'totaldelieverd'])->name('admin.total.delieverd');
Route::get('/delieverd/details/view/{d_id}',[StatusController::class,'delieverDetails'])->name('admin.deliever.details.view');
Route::get('/delieverd/edit/{d_id}',[StatusController::class,'delieverEdit'])->name('admin.deliever.edit');
Route::put('/delieverd/update/{d_id}',[StatusController::class,'delieverUpdate'])->name('admin.deliever.update.status');



Route::get('/totalpickup',[StatusController::class,'totalpickup'])->name('admin.picked.up');
Route::get('/pickup/details/view/{p_id}',[StatusController::class,'pickupDetails'])->name('admin.pickup.details.view');
Route::get('/pickup/edit/{p_id}',[StatusController::class,'pickupEdit'])->name('admin.pickup.edit');
Route::put('/pickup/update/{p_id}',[StatusController::class,'pickupUpdate'])->name('admin.pickup.update.status');


Route::get('/totalshipped',[StatusController::class,'totalshipped'])->name('admin.shipped');
Route::get('/shipped/details/view/{s_id}',[StatusController::class,'shippedDetails'])->name('admin.shipped.details.view');
Route::get('/shipped/edit/{s_id}',[StatusController::class,'shippedEdit'])->name('admin.shipped.edit');
Route::put('/shipped/update/{s_id}',[StatusController::class,'shippedUpdate'])->name('admin.shipped.update.status');


Route::get('/totalcollected',[StatusController::class,'collected'])->name('admin.courier.collected');
Route::get('/collected/details/view/{collect_id}',[StatusController::class,'collectDetails'])->name('admin.collect.details.view');
Route::get('/acollectededit/{collect_id}',[StatusController::class,'collectEdit'])->name('admin.collect.edit');
Route::put('/collected/update/{collect_id}',[StatusController::class,'collectUpdate'])->name('admin.collect.update.status');

Route::get('/ready/to/pickup',[StatusController::class,'readyPickup'])->name('admin.ready.pickup');
Route::get('/ready/to/pickup/details/view/{rp_id}',[StatusController::class,'readypickupDetails'])->name('admin.readypickup.details.view');
Route::get('/ready/to/pickup/edit/{rp_id}',[StatusController::class,'readypickupEdit'])->name('admin.readypickup.edit');
Route::put('/ready/to/pickup/update/{rp_id}',[StatusController::class,'readypickupUpdate'])->name('admin.readypickup.update.status');


Route::get('/unsuccessful/delievery',[StatusController::class,'unsuccessful'])->name('admin.unsuccessful.delievery');
Route::get('/unsuccessful/details/view/{unsu_id}',[StatusController::class,'unsuccessfulDetails'])->name('admin.unsuccessful.details.view');
Route::get('/unsuccessful/edit/{unsu_id}',[StatusController::class,'unsuccessfulEdit'])->name('admin.unsuccessful.edit');
Route::put('/unsuccessful/update/{unsu_id}',[StatusController::class,'unsuccessfulUpdate'])->name('admin.unsuccessful.update.status');

Route::get('/handover',[StatusController::class,'handover'])->name('admin.handover.delievery');
Route::get('/handover/details/view/{ho_id}',[StatusController::class,'handoverDetails'])->name('admin.handover.details.view');
Route::get('/handover/edit/{ho_id}',[StatusController::class,'handoverEdit'])->name('admin.handover.edit');
Route::put('/handover/update/{ho_id}',[StatusController::class,'handoverUpdate'])->name('admin.handover.update.status');



//payment status

//deliver status
Route::get('courier/status/accepted/by/courier/{info_id}',[CustomerController::class,'statusAccepted'])->name('admin.courier.accepted');
Route::get('courier/status/courier/collected/{info_id}',[CustomerController::class,'statusCollect'])->name('admin.status.collected');
Route::get('courier/status/ready/to/pickup/{info_id}',[CustomerController::class,'statusReadyPickup'])->name('admin.courier.ready.pickup');
Route::get('courier/status/shipped/{info_id}',[CustomerController::class,'statusShipped'])->name('admin.courier.shipped');
Route::get('courier/status/intransit/{info_id}',[CustomerController::class,'statusIntransit'])->name('admin.courier.intransit');
Route::get('courier/status/arrived/at/destination/{info_id}',[CustomerController::class,'statusArrived'])->name('admin.courier.arrived.destination');
Route::get('courier/status/out/for/delivery/{info_id}',[CustomerController::class,'statusOutDelievery'])->name('admin.courier.out.for.delievery');
Route::get('courier/status/picked/{info_id}',[CustomerController::class,'statusPicked'])->name('admin.courier.picked');
Route::get('courier/status/delieverd/{info_id}',[CustomerController::class,'statusDeliverd'])->name('admin.courier.deliverd');
Route::get('courier/status/unsuccesful/delievery/attempt/{info_id}',[CustomerController::class,'statusUnsuccessful'])->name('admin.courier.unsuccessful');
Route::get('courier/status/handover/{info_id}',[CustomerController::class,'statusHandover'])->name('admin.courier.handover');



//Tracking
Route::get('/status',[StatusController::class,'status'])->name('admin.status');
Route::get('/tracklist',[StatusController::class,'tracklist'])->name('admin.track.list');
Route::get('/payment/report',[ReportController::class,'paymentreport'])->name('admin.payment.report.show');
Route::get('/status/report',[ReportController::class,'statusreport'])->name('admin.status.report.show');
Route::get('/add/payment/{info_id}',[CustomerController::class,'addPayment'])->name('admin.add.payment');
Route::post('/add/payment/create/{d}',[CustomerController::class,'addPaymentCreate'])->name('admin.add.payment.create');
Route::get('payment/status/paid',[CustomerController::class,'paymentPaid'])->name('admin.payment.paid');
});
