<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Circulation;
use App\Models\ContactUs;
use App\Models\PrivacyPolicy;
use App\Models\TermsCondition;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function privacyPolicy()
    {
        return view('website.page.privacy-policy', ['privacyPolicy' => PrivacyPolicy::where('status',1)->orderBy('created_at', 'desc')->first()]);
    }
    public function termsCondition()
    {
        return view('website.page.terms-condition', ['termsCondition' => TermsCondition::where('status',1)->orderBy('created_at', 'desc')->first()]);
    }
    public function contact()
    {
        return view('website.page.contact', ['contactUs' => ContactUs::where('status',1)->orderBy('created_at', 'desc')->first()]);
    }
    public function circulation()
    {
        return view('website.page.circulation', ['circulation' => Circulation::where('status',1)->orderBy('created_at', 'desc')->first()]);
    }
    public function advertisement()
    {
        return view('website.page.advertisement', ['advertisement' => Advertisement::where('status',1)->orderBy('created_at', 'desc')->first()]);
    }
}
