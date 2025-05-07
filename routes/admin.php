<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\VideoBlogCategoryController;
use App\Http\Controllers\Admin\VideoBlogController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SectionController;

//admin part start
Route::group(['prefix' =>'admin/', 'middleware' => ['auth', 'is_admin']], function(){
    Route::get('dashboard', [HomeController::class, 'adminHome'])->name('admin.dashboard')->middleware('is_admin');
    //profile
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::put('profile/{id}', [AdminController::class, 'adminProfileUpdate']);
    Route::post('changepassword', [AdminController::class, 'changeAdminPassword']);
    Route::put('image/{id}', [AdminController::class, 'adminImageUpload']);
    //profile end
    //admin registration
    Route::get('register','App\Http\Controllers\Admin\AdminController@adminindex');
    Route::post('register','App\Http\Controllers\Admin\AdminController@adminstore');
    Route::get('register/{id}/edit','App\Http\Controllers\Admin\AdminController@adminedit');
    Route::put('register/{id}','App\Http\Controllers\Admin\AdminController@adminupdate');
    Route::get('register/{id}', 'App\Http\Controllers\Admin\AdminController@admindestroy');
    //admin registration end
    //agent registration
    Route::get('agent-register','App\Http\Controllers\Admin\AdminController@agentindex');
    Route::post('agent-register','App\Http\Controllers\Admin\AdminController@agentstore');
    Route::get('agent-register/{id}/edit','App\Http\Controllers\Admin\AdminController@agentedit');
    Route::put('agent-register/{id}','App\Http\Controllers\Admin\AdminController@agentupdate');
    Route::get('agent-register/{id}', 'App\Http\Controllers\Admin\AdminController@agentdestroy');
    // certificate update
    // Route::post('image-upload', 'App\Http\Controllers\Admin\AdminController@agentCertificateUpdate')->name('image.upload.post');
    //agent registration end
    //user registration
    Route::get('user-register','App\Http\Controllers\Admin\AdminController@userindex');
    Route::post('user-register','App\Http\Controllers\Admin\AdminController@userstore');
    Route::get('user-register/{id}/edit','App\Http\Controllers\Admin\AdminController@useredit');
    Route::put('user-register/{id}','App\Http\Controllers\Admin\AdminController@userupdate');
    Route::get('user-register/{id}', 'App\Http\Controllers\Admin\AdminController@userdestroy');
    //user registration end
    //code master 
    Route::resource('softcode','App\Http\Controllers\Admin\SoftcodeController');
    Route::resource('pages','App\Http\Controllers\Admin\MasterController');
    //code master end
    //company details
    Route::resource('company-detail','App\Http\Controllers\Admin\CompanyDetailController');
    //company details end
    //slider 
    Route::resource('sliders','App\Http\Controllers\Admin\SliderController');
    Route::get('sliders/{id}/edit', [SliderController::class, 'edit']);
    Route::get('activeslider','App\Http\Controllers\Admin\SliderController@activeslider');
    //slider end
    Route::resource('seo-settings','App\Http\Controllers\Admin\SeoSettingController');


    Route::resource('role','App\Http\Controllers\RoleController');
    Route::post('roleupdate','App\Http\Controllers\RoleController@roleUpdate');
    Route::resource('staff','App\Http\Controllers\StaffController');


    // property 
    Route::get('/property', [PropertyController::class, 'index'])->name('admin.property');
    Route::post('/property', [PropertyController::class, 'store']);
    Route::get('/property/{id}/edit', [PropertyController::class, 'edit']);
    Route::put('/property/{id}', [PropertyController::class, 'update']);
    Route::get('/property/{id}', [PropertyController::class, 'delete']);
    
    // category 
    Route::get('/category', [PropertyController::class, 'category'])->name('admin.category');
    Route::post('/category', [PropertyController::class, 'categorystore']);
    Route::get('/category/{id}/edit', [PropertyController::class, 'categoryedit']);
    Route::put('/category/{id}', [PropertyController::class, 'categoryupdate']);
    Route::get('/category/{id}', [PropertyController::class, 'categorydelete']);

    Route::get('/property-image/{id}', [PropertyController::class, 'image'])->name('propertyimage');
    Route::post('/property-image', [PropertyController::class, 'imageStore']);
    Route::get('/property-image-delete/{id}', [PropertyController::class, 'imageDelete']);

    // contact mail
    
    Route::get('/admin-contact', [ContactController::class, 'admincontact'])->name('admin.contact');
    Route::get('/admin-contact-mail', [ContactController::class, 'contactMail'])->name('admin.contactmail');
    Route::post('/admin-contact-mail/{id}', [ContactController::class, 'mailUpdate'])->name('contactmail.update');
    Route::get('/admin-contact-mail/edit/{id}', [ContactController::class, 'ContactmailEdit'])->name('contactmail.edit');

    // banner 
    Route::get('/banner', [BannerController::class, 'index'])->name('admin.banner');
    Route::post('/banner', [BannerController::class, 'store']);
    Route::get('/banner/{id}/edit', [BannerController::class, 'edit']);
    Route::put('/banner/{id}', [BannerController::class, 'update']);
    Route::get('/banner/{id}', [BannerController::class, 'delete']);

    // Blog Categories Routes
    Route::get('/video-blog-categories', [VideoBlogCategoryController::class, 'index'])->name('allVideoBlogCategories');
    Route::post('/video-blog-categories', [VideoBlogCategoryController::class, 'store']);
    Route::get('/video-blog-categories/{id}/edit', [VideoBlogCategoryController::class, 'edit']);
    Route::post('/video-blog-categories-update', [VideoBlogCategoryController::class, 'update']);
    Route::get('/video-blog-categories/{id}', [VideoBlogCategoryController::class, 'delete']);
    Route::post('/video-blog-categories/{id}/status', [VideoBlogCategoryController::class, 'updateStatus'])->name('blogCategories.updateStatus');

    Route::get('/video-blogs', [VideoBlogController::class, 'index'])->name('allVideoBlogs');
    Route::post('/video-blogs', [VideoBlogController::class, 'store']);
    Route::get('/video-blogs/{id}/edit', [VideoBlogController::class, 'edit']);
    Route::post('/video-blogs-update', [VideoBlogController::class, 'update']);
    Route::get('/video-blogs/{id}', [VideoBlogController::class, 'delete']);
    Route::post('/video-blogs/{id}/status', [VideoBlogController::class, 'updateStatus'])->name('blogs.updateStatus');

    Route::get('/services', [ServiceController::class, 'index'])->name('allServices');
    Route::post('/services', [ServiceController::class, 'store']);
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit']);
    Route::post('/services-update', [ServiceController::class, 'update']);
    Route::get('/services/{id}', [ServiceController::class, 'delete']);
    Route::post('/services/{id}/status', [ServiceController::class, 'updateStatus'])->name('services.updateStatus');

    Route::get('/section-status', [SectionController::class, 'sectionStatus'])->name('sectionstatus');
    Route::post('/section-status/update', [SectionController::class, 'updateSectionStatus'])->name('updateSectionStatus');
    

});
//admin part end