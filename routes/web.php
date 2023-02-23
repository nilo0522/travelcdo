<?php



Auth::routes();
Route::get('/', '_101_1@index');
Route::resource('hotel-details', 'HoteldetailsController');
Route::resource('hotel-grid', 'HotelGridController');
Route::resource('booking','CustomerController');
Route::resource('reserve','ReservationController');
Route::resource('customer-login','CustomerLoginController');
Route::resource('customer-register','CustomerRegisterController');
Route::get('customer-logout','CustomerLoginController@logout');
Route::resource('Dashboard','CustomerDashboardController');
Route::resource('Booking','CustomerBookingController');
Route::resource('Invoice','CustomerInvoiceController');
Route::resource('Setting','CustomerProfileController');







Route::group(['middleware' => ['auth']], function() {
Route::get('admin', 'DashboardController@index');
Route::get('admin/home', 'DashboardController@index');

Route::resource('admin/addroomtype','RoomtypeController');
Route::resource('admin/addamenities','RoomamenitiesController');
Route::resource('admin-user','UserManage');
Route::get('admin/addrooms', 'AddroomsController@index');
Route::resource('admin/rooms','RoomsController');
Route::resource('admin/pos','PosController');
Route::resource('admin/settings','SettingController');
Route::resource('admin/settings-facilities','HotelFacilitiesController');
Route::resource('admin/settings-gallery','HotelgalerryController');
Route::resource('admin/rooms-gallery','RoomsGalleryController');
Route::resource('admin/reservation-pending','AdminReservationController');
Route::resource('admin/reservation-list','AdminReservationListController');
Route::resource('admin/reservation-manage','AdminManageController');
Route::resource('admin/reservation-manage-confirmed','CheckinController');
Route::resource('admin/reservation-manage-checkin','CheckoutController');
Route::resource('admin/reports-reservation','ReservationReport');
Route::get('export','ReportsController@export');
Route::resource('admin/reports-sales','SalesReportController');
Route::get('print',"ReservationReport@create");
Route::get('print-sales',"SalesReportController@create");
Route::get('export-sales',"SalesReportController@export");
});

//

Route::resource('tour-dashboard','TourDashboard');

Route::resource('tour-manage','TourManage');
Route::resource('tour-view','TourController');
Route::resource('tour-highlights','TourHighlights');
Route::resource('tour-itinerary','TourItenary');

    








