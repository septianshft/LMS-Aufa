<?php

use App\Http\Controllers\CommonController;
use App\Http\Controllers\InstallController;
use App\Http\Controllers\ModalController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\PaymentController;

//Cache clear route
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Cache::flush();

    return 'Application cache cleared';
});

Route::get('home/switch/{id}', [HomeController::class, 'homepage_switcher'])->name('home.switch');

//Redirect route
Route::get('/dashboard', function () {
    if (auth()->user()->role == 'admin') {
        return redirect(route('admin.dashboard'));
    }elseif(auth()->user()->role == 'student'){
        return redirect(route('my.courses'));
    } else {
        return redirect(route('home'));
    }
})->middleware(['auth', 'verified'])->name('dashboard');

//Common modal route
Route::get('modal/{view_path}', [ModalController::class, 'common_view_function'])->name('modal');
Route::any('get-video-details/{url?}', [CommonController::class, 'get_video_details'])->name('get.video.details');
Route::get('view/{path}', [CommonController::class, 'rendered_view'])->name('view');

Route::get('closed_back_to_mobile_ber', function () {
    session()->forget('app_url');
    return redirect()->back();
})->name('closed_back_to_mobile_ber');

//Mobile payment redirect
Route::get('payment/web_redirect_to_pay_fee', [PaymentController::class, 'webRedirectToPayFee'])->name('payment.web_redirect_to_pay_fee');

// Development installation route (only in local environment)
if (app()->environment('local')) {
    Route::get('/dev-install', function() {
        // Skip purchase code validation in development
        if (!DB::connection()->getDatabaseName() || DB::connection()->getDatabaseName() == 'db_name') {
            return response('Please configure your database in .env file first!', 500);
        }

        try {
            // Run the SQL installation
            $templine = '';
            $lines = file(base_path('public/assets/install.sql'));
            foreach ($lines as $line) {
                if (substr($line, 0, 2) == '--' || $line == '') continue;
                $templine .= $line;
                if (substr(trim($line), -1, 1) == ';') {
                    DB::statement($templine);
                    $templine = '';
                }
            }

            // Create default admin user if doesn't exist
            if (DB::table('users')->where('role', 'admin')->count() == 0) {
                DB::table('users')->insert([
                    'name' => 'Admin',
                    'email' => 'admin@academy.com',
                    'password' => Hash::make('admin123'),
                    'role' => 'admin',
                    'status' => 1,
                    'skills' => json_encode([]),
                    'email_verified_at' => now(),
                    'created_at' => now(),
                ]);
            }

            return '<h1>✅ Development installation complete!</h1>
                    <p><strong>Admin Login:</strong></p>
                    <p>Email: admin@academy.com</p>
                    <p>Password: admin123</p>
                    <p><a href="/login">Go to Login</a></p>';

        } catch (Exception $e) {
            return response('Installation failed: ' . $e->getMessage(), 500);
        }
    });
}

//Installation routes
Route::controller(InstallController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('install/step0', 'step0')->name('step0');
    Route::get('install/step1', 'step1')->name('step1');
    Route::get('install/step2', 'step2')->name('step2');
    Route::any('install/step3', 'step3')->name('step3');
    Route::get('install/step4', 'step4')->name('step4');
    Route::get('install/step4/{confirm_import}', 'confirmImport')->name('step4.confirm_import');
    Route::get('install/install', 'confirmInstall')->name('confirm_install');
    Route::post('install/validate', 'validatePurchaseCode')->name('install.validate');
    Route::any('install/finalizing_setup', 'finalizingSetup')->name('finalizing_setup');
    Route::get('install/success', 'success')->name('success');
});
//Installation routes
