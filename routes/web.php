<?php
// use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
// use App\Http\Controllers\categoryController;
use App\Http\Controllers\checkoutController;
// use App\Http\Controllers\CityController;
use App\Http\Controllers\partnership;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ExcelController;

// use App\Http\Controllers\ProductController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\ActionsController;

use App\Http\Controllers\TerritorryController;
use App\Http\Controllers\SpotifyController;
use App\Http\Controllers\CinetController;
use App\Http\Controllers\userProductController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SellerControllers\brandController;
use App\Http\Controllers\SellerControllers\categoryController;
use App\Http\Controllers\SellerControllers\galleryController;
use App\Http\Controllers\SellerControllers\ProductController;
use App\Http\Controllers\SellerControllers\sellerDashboardController;
use App\Http\Controllers\UserController\homeController;
use App\Mail\WelcomeMail;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::GET('/loginUser', function () {
return view('user.login');
});
Route::GET('/contact_Us', function () {
return view('user.contact_us');
});
Auth::routes();
Route::GET('/confirmation', function () {
return view('seller.waitForConfirmation');
});
Route::GET('/', function () {
return view('user.home');
})->name('user.home');
Route::GET('term_and_condition', [homeController::class, 'term_and_condition'])->name('term.conditions');
Route::GET('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::match(['GET', 'POST'], '/email/code_verification', [homeController::class, 'index'])->name('user.register');
Route::match(['GET', 'POST'], '/email', [homeController::class, 'code'])->name('user.code');
Route::group(['prefix' => 'user'], function () {
Route::group(['middleware' => ['auth']], function () {
});
});
Route::GET('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
Route::GET('/dashboard_new', [App\Http\Controllers\AdminController::class, 'dashboard_new'])->name('admin.new-dashboard');
Route::GET('/create-album', [App\Http\Controllers\AdminController::class, 'create'])->name('album.create');
Route::GET('/user-settings', [App\Http\Controllers\AdminController::class, 'user_settings'])->name('admin.settings');
Route::POST('/add-settings/{id}',[AdminController::class, 'add_settings_user']);
Route::POST('/album', [App\Http\Controllers\AdminController::class, 'Album'])->name('create-album');
Route::GET('/album/{id}', [App\Http\Controllers\AdminController::class, 'albumShow'])->name('show-album');
Route::GET('/admin/album/{id}', [App\Http\Controllers\AdminController::class, 'AdminAlbumShow'])->name('admin-album');

Route::GET('/admin/add/{id}', [App\Http\Controllers\ActionsController::class, 'addExcel'])->name('excel_add');
Route::GET('/rep/{id}', [App\Http\Controllers\ActionsController::class, 'addExcel'])->name('rep_add');
Route::GET('/admin/remove/{id}', [App\Http\Controllers\ActionsController::class, 'removeExcel'])->name('excel_remove');
Route::GET('/admin/action/{id}', [App\Http\Controllers\ActionsController::class, 'cause_action'])->name('action_cause');

Route::GET('/release/{id}', [App\Http\Controllers\ReleaseController::class, 'releaseform'])->name('release');
Route::POST('/release/{id}', [App\Http\Controllers\AdminController::class, 'releaseStore'])->name('release.store');
Route::GET('/audio/{id}', [App\Http\Controllers\AdminController::class, 'audio'])->name('audio');
Route::POST('/audio/{id}', [App\Http\Controllers\AdminController::class, 'audioStore'])->name('audio.store');
Route::GET('/artwork/{id}', [App\Http\Controllers\AdminController::class, 'artwork'])->name('artwork');
Route::POST('/artwork/{id}', [App\Http\Controllers\AdminController::class, 'artworkStore'])->name('artwork.store');
Route::GET('/store/{id}', [App\Http\Controllers\AdminController::class, 'store'])->name('store');
Route::GET('/file', [App\Http\Controllers\AdminController::class, 'file'])->name('admin.file');
Route::POST('update_profile', [App\Http\Controllers\Admin::class, 'update_profile']);
Route::GET('/chat', [App\Http\Controllers\AdminController::class, 'Chat'])->name('admin.chat');
Route::GET('/labels', [App\Http\Controllers\AdminController::class, 'labels'])->name('admin.labels');
Route::match(['GET', 'POST'], '/insert_label', [App\Http\Controllers\AdminController::class, 'insert_label'])->name('insert.label');
Route::match(['GET', 'POST'], '/edit_label/{id}', [App\Http\Controllers\AdminController::class, 'edit_label'])->name('edit_label');
Route::match(['GET', 'POST'], '/view_artists/{id}', [App\Http\Controllers\AdminController::class, 'view_artists'])->name('view_artists');
Route::match(['GET', 'POST'], '/update_label', [App\Http\Controllers\AdminController::class, 'update_label'])->name('update_label');
Route::match(['GET', 'POST'], '/delete_label/{id}', [App\Http\Controllers\AdminController::class, 'delete_label']);
Route::GET('/artists', [App\Http\Controllers\AdminController::class, 'artists'])->name('admin.artists');
Route::match(['GET', 'POST'], '/insert_artist', [App\Http\Controllers\AdminController::class, 'insert_artist'])->name('insert.artist');
Route::match(['GET', 'POST'], '/edit_artist/{id}', [App\Http\Controllers\AdminController::class, 'edit_artist'])->name('edit_artist');
Route::match(['GET', 'POST'], '/update_artist', [App\Http\Controllers\AdminController::class, 'update_artist'])->name('update_artist');
Route::match(['GET', 'POST'], '/delete_artist/{id}', [App\Http\Controllers\AdminController::class, 'delete_artist']);
Route::GET('logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
//Create Accounts Controllers
Route::match(['GET', 'POST'], 'accounts', [App\Http\Controllers\Admin\AccountController::class, 'index'])->name('accounts');
Route::match(['GET', 'POST'], 'store_account', [App\Http\Controllers\Admin\AccountController::class, 'store_account'])->name('store_account');
Route::match(['GET', 'POST'], 'edit_account/{id}', [App\Http\Controllers\Admin\AccountController::class, 'edit_account'])->name('edit_account');
Route::match(['GET', 'POST'], 'view_account_labels/{id}', [App\Http\Controllers\Admin\AccountController::class, 'view_account_labels'])->name('view_account_labels');
Route::match(['GET', 'POST'], 'view_account_artists/{id}', [App\Http\Controllers\Admin\AccountController::class, 'view_account_artists'])->name('view_account_artists');
Route::match(['GET', 'POST'], 'update_account', [App\Http\Controllers\Admin\AccountController::class, 'update_account'])->name('update_account');
Route::match(['GET', 'POST'], 'delete_account/{id}', [App\Http\Controllers\Admin\AccountController::class, 'delete_account'])->name('delete_account');
Route::match(['GET', 'POST'], 'users', [App\Http\Controllers\Admin\AccountController::class, 'users'])->name('users');
Route::match(['GET', 'POST'], 'edit_user', [App\Http\Controllers\Admin\AccountController::class, 'edit_user'])->name('edit_user');
//mailing section start
Route::match(['GET', 'POST'], 'mailing_list/contacts', [App\Http\Controllers\Admin\MailingListController::class, 'index'])->name('mailing_list.contacts');
Route::match(['GET', 'POST'], 'mailing_list/add_contact_to_list', [App\Http\Controllers\Admin\MailingListController::class, 'add_contact_to_list'])->name('add_contact_to_list');
Route::match(['GET', 'POST'], 'mailing_list/mailing_lists', [App\Http\Controllers\Admin\MailingListController::class, 'mailing_list'])->name('mailing_list');
Route::match(['GET', 'POST'], 'mailing_list/list_contacts/{id}', [App\Http\Controllers\Admin\MailingListController::class, 'list_contacts'])->name('list_contacts');
Route::match(['GET', 'POST'], 'mailing_list/store_list', [App\Http\Controllers\Admin\MailingListController::class, 'store_mailing_list'])->name('store_mailing_list');
Route::match(['GET', 'POST'], 'mailing_list/edit_list/{id}', [App\Http\Controllers\Admin\MailingListController::class, 'editMailingListView'])->name('edit.list-name');
Route::match(['GET', 'POST'], 'mailing_list/update_mailing_list/{id}', [App\Http\Controllers\Admin\MailingListController::class, 'update_mailing_list'])->name('update.list-name');
Route::match(['GET', 'POST'], 'mailing_list/delete_list/{id}', [App\Http\Controllers\Admin\MailingListController::class, 'deleteMailingList'])->name('delete.list-name');
Route::match(['GET', 'POST'], 'mailing_list/send_mail', [App\Http\Controllers\Admin\MailingListController::class, 'send_mail_view'])->name('send_mail_view');
Route::match(['GET', 'POST'], 'mailing_list/send_mail_to_contacts', [App\Http\Controllers\Admin\MailingListController::class, 'send_mail'])->name('send_mail');
Route::match(['GET', 'POST'], 'mailing_list/send_mail_individually', [App\Http\Controllers\Admin\MailingListController::class, 'send_mail_to_individual_view'])->name('send_mail_to_individual_view');
// send mail individually GET labels with ajax
Route::match(['GET', 'POST'], 'mailing_list/GET_labels', [App\Http\Controllers\Admin\MailingListController::class, 'GET_labels'])->name('GET_labels');
Route::match(['GET', 'POST'], 'mailing_list/GET_artists', [App\Http\Controllers\Admin\MailingListController::class, 'GET_artists'])->name('GET_artists');
Route::match(['GET', 'POST'], 'mailing_list/send_mail_individually_to_list', [App\Http\Controllers\Admin\MailingListController::class, 'send_mail_individually'])->name('send_mail_individually');
Route::resource('group', App\Http\Controllers\GroupController::class);
Route::match(['GET', 'POST'], 'group/add_group_to_list', [App\Http\Controllers\GroupController::class, 'add_group_to_list'])->name('add_group_to_list');
Route::GET('label/register_form', [App\Http\Controllers\SellerController::class, 'labelForm'])->name('label.register');
Route::POST('label/register', [App\Http\Controllers\SellerController::class, 'register'])->name('seller.register');
Route::GET('artist/register', [App\Http\Controllers\SellerController::class, 'artist_register']);
//to save label registration data
Route::POST('save_label', [App\Http\Controllers\SellerController::class, 'save_label']);
Route::GET('success', [App\Http\Controllers\SellerController::class, 'success']);
Route::POST('save_artist', [App\Http\Controllers\SellerController::class, 'save_artist']);
Route::GET("Beatmaker/register", [App\Http\Controllers\SellerController::class, 'Beatmaker']);
Route::POST('save_beatmaker', [App\Http\Controllers\SellerController::class, 'save_beatmaker']);
Route::GET('partnership', [App\Http\Controllers\partnership::class, 'index']);
Route::POST('save_partnership', [App\Http\Controllers\partnership::class, 'save_partnership']);
Route::GET('/logout', [App\Http\Controllers\Admin::class, 'Logout']);
Route::GET('/register_form', [homeController::class, 'register_form']);
Route::group(['prefix' => 'account', 'middleware' => 'account.auth'], function () {
Route::GET('/logout', [App\Http\Controllers\Admin::class, 'Logout']);
Route::GET('/chat', [App\Http\Controllers\Account\AccountController::class, 'Chat']);
Route::match(['GET', 'POST'], 'dashboard', [App\Http\Controllers\Account\AccountController::class, 'index'])->name('account.dashboard');
Route::POST('update_profile', [App\Http\Controllers\Account\AccountController::class, 'update_profile']);
Route::match(['GET', 'POST'], 'labels', [App\Http\Controllers\Account\AccountController::class, 'labels'])->name('account.labels');
Route::match(['GET', 'POST'], 'artists/{id}', [App\Http\Controllers\Account\AccountController::class, 'artists'])->name('account.artists');
Route::match(['GET', 'POST'], 'add_update_artists_name', [App\Http\Controllers\Account\AccountController::class, 'add_update_artists_name'])->name('add_update_artists_name');
});
//Chat
Route::GET('messenger', [App\Http\Controllers\MessagesController::class, 'index'])->name('messenger');
Route::POST('/message', [App\Http\Controllers\MessagesController::class, 'sendMessage']);
Route::GET('/message/{id}', [App\Http\Controllers\MessagesController::class, 'GETMessage'])->name('message');
Route::GET('/messagecount/{id}', [App\Http\Controllers\MessagesController::class, 'GETMessageCount'])->name('messagecount');
Route::GET('announcements', [App\Http\Controllers\AnnouncementsController::class, 'index'])->name('announcements');
Route::POST('/announcement', [App\Http\Controllers\AnnouncementsController::class, 'sendAnnouncement']);
Route::POST('/multiannouncement', [App\Http\Controllers\AnnouncementsController::class, 'sendMultiAnnouncement'])->name('storeMultiAnnouncement');
Route::GET('/announcement/{id}', [App\Http\Controllers\AnnouncementsController::class, 'GETAnnouncement'])->name('announcement');
Route::GET('/announcementcount/{id}', [App\Http\Controllers\AnnouncementsController::class, 'GETAnnouncementCount'])->name('announcementcount');
Route::POST('/multigroupannouncement', [App\Http\Controllers\AnnouncementsController::class, 'sendMultiGroupAnnouncement'])->name('storeMultiGroupAnnouncement');
Route::POST('/releaseForm', [App\Http\Controllers\ReleaseController::class, 'releaseform'])->name('releaseform');
Route::GET('/saveAudio/{id}', [App\Http\Controllers\AudioController::class, 'save'])->name('saveAudio');
Route::get('autocomplete', [TerritorryController::class, 'fetch'])->name('autocomplete');
Route::POST('/audiodetailsstore/{id}', [AdminController::class, 'audiodetails'])->name('audiodetails');
Route::POST('/store/{id}', [StoreController::class, 'store'])->name('store.controls');
Route::POST('/searchArtist',[SpotifyController::class, 'searchArtist'])->name('searchArtist');
Route::GET('/admin_dashboard',[AdminController::class, 'admin_dashboard'])->name('admin_dashboard');
Route::GET('/payment_transaction/{id}',[CinetController::class, 'payment'])->name('payment');
Route::GET('/payment_notify/{id}',[CinetController::class, 'notify'])->name('notify');
Route::GET('/edit-settings/{id}',[AdminController::class, 'edit_settings_page'])->name('edit_page');
Route::POST('/add-settings/{id}',[AdminController::class, 'add_settings_user']);
Route::POST('/multipleusers-settings',[AdminController::class, 'multiple_users_settings']);
Route::POST('/multiple-users-settings',[AdminController::class, 'multiple_users_store']);
