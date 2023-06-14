<?php

Route::get('/', 'WebsiteController@index');

Route::prefix('forms')->group(function () {
    Route::post('contact', 'WebsiteController@contact');
    Route::post('newsletter', 'WebsiteController@newsletter');
    Route::post('recruitment', 'WebsiteController@recruitment');
    Route::post('recruitments/media', '\App\Http\Controllers\Admin\RecruitmentController@storeMedia')->name('forms.recruitments.storeMedia');
});

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }
    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Client
    Route::delete('clients/destroy', 'ClientController@massDestroy')->name('clients.massDestroy');
    Route::post('clients/parse-csv-import', 'ClientController@parseCsvImport')->name('clients.parseCsvImport');
    Route::post('clients/process-csv-import', 'ClientController@processCsvImport')->name('clients.processCsvImport');
    Route::resource('clients', 'ClientController');

    // Urgency
    Route::delete('urgencies/destroy', 'UrgencyController@massDestroy')->name('urgencies.massDestroy');
    Route::resource('urgencies', 'UrgencyController');

    // Info
    Route::delete('infos/destroy', 'InfoController@massDestroy')->name('infos.massDestroy');
    Route::resource('infos', 'InfoController');

    // Budget Request
    Route::delete('budget-requests/destroy', 'BudgetRequestController@massDestroy')->name('budget-requests.massDestroy');
    Route::post('budget-requests/media', 'BudgetRequestController@storeMedia')->name('budget-requests.storeMedia');
    Route::post('budget-requests/ckmedia', 'BudgetRequestController@storeCKEditorImages')->name('budget-requests.storeCKEditorImages');
    Route::resource('budget-requests', 'BudgetRequestController');
    Route::get('budget-requests/pdf/{id}', 'BudgetRequestController@pdf')->name('budget-requests.pdf');

    // Client Type
    Route::delete('client-types/destroy', 'ClientTypeController@massDestroy')->name('client-types.massDestroy');
    Route::resource('client-types', 'ClientTypeController');

    // Surface Type
    Route::delete('surface-types/destroy', 'SurfaceTypeController@massDestroy')->name('surface-types.massDestroy');
    Route::resource('surface-types', 'SurfaceTypeController');

    // Contact
    Route::delete('contacts/destroy', 'ContactController@massDestroy')->name('contacts.massDestroy');
    Route::post('contacts/media', 'ContactController@storeMedia')->name('contacts.storeMedia');
    Route::post('contacts/ckmedia', 'ContactController@storeCKEditorImages')->name('contacts.storeCKEditorImages');
    Route::resource('contacts', 'ContactController');

    // Newsletter
    Route::delete('newsletters/destroy', 'NewsletterController@massDestroy')->name('newsletters.massDestroy');
    Route::resource('newsletters', 'NewsletterController');

    // Datasheet
    Route::delete('datasheets/destroy', 'DatasheetController@massDestroy')->name('datasheets.massDestroy');
    Route::post('datasheets/media', 'DatasheetController@storeMedia')->name('datasheets.storeMedia');
    Route::post('datasheets/ckmedia', 'DatasheetController@storeCKEditorImages')->name('datasheets.storeCKEditorImages');
    Route::resource('datasheets', 'DatasheetController');

    // Recruitment
    Route::delete('recruitments/destroy', 'RecruitmentController@massDestroy')->name('recruitments.massDestroy');
    Route::post('recruitments/media', 'RecruitmentController@storeMedia')->name('recruitments.storeMedia');
    Route::post('recruitments/ckmedia', 'RecruitmentController@storeCKEditorImages')->name('recruitments.storeCKEditorImages');
    Route::resource('recruitments', 'RecruitmentController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});