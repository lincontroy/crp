<?php

namespace App\Providers;

use Exception;
use App\Models\User;
use App\Models\SupportTicket;
use App\Constants\GlobalConst;
use App\Models\Admin\Currency;
use App\Models\Admin\Language;
use App\Models\Admin\Extension;
use App\Models\Admin\SetupPage;
use App\Models\Admin\UsefulLink;
use App\Models\Admin\AppSettings;
use App\Models\Admin\SiteSections;
use App\Models\Admin\BasicSettings;
use App\Models\Admin\InvestmentPlan;
use App\Models\Frontend\Announcement;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use App\Providers\Admin\CurrencyProvider;
use App\Providers\Admin\BasicSettingsProvider;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->startingPoint();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        try{
            $view_share = [];
            $view_share['basic_settings']               = BasicSettings::first();
            $view_share['default_currency']             = Currency::default();
            $view_share['__languages']                  = Language::get();
            // $view_share['__default_language']           = $view_share['__languages']->where('status',GlobalConst::ACTIVE)->first();
            $view_share['all_user_count']               = User::count();
            $view_share['email_verified_user_count']    = User::where('email_verified', 1)->count();
            $view_share['kyc_verified_user_count']      = User::where('kyc_verified', 1)->count();
            $view_share['default_currency']             = Currency::default();
            $view_share['__extensions']                 = Extension::get();
            $view_share['pending_ticket_count']         = SupportTicket::pending()->get()->count();
            $view_share['__website_sections']           = SiteSections::get();
            $view_share['__invest_plans']               = InvestmentPlan::active()->take(6)->get();
            $view_share['__announcements']              = Announcement::active()->latest()->take(6)->get();
            $view_share['__app_settings']               = AppSettings::first();
            $view_share['__website_useful_link']        = UsefulLink::where("status",GlobalConst::ACTIVE)->get();
            $view_share['__website_privacy_policy']     = UsefulLink::where("status",GlobalConst::ACTIVE)->where('type',GlobalConst::USEFUL_LINK_PRIVACY_POLICY)->first();
            $view_share['__setup_pages']                = SetupPage::where('status',GlobalConst::ACTIVE)->get();
            view()->share($view_share);

            $this->app->bind(BasicSettingsProvider::class, function () use ($view_share) {
                return new BasicSettingsProvider($view_share['basic_settings']);
            });
            $this->app->bind(CurrencyProvider::class, function () use ($view_share) {
                return new CurrencyProvider($view_share['default_currency']);
            });
        }catch(Exception $e) {
            //
        }
    }


    public function startingPoint() {
        if(env('PURCHASE_CODE','') == null) {
            Config::set('starting-point.status',true);
            Config::set('starting-point.point','/project/install/welcome');
        }
    }
}
