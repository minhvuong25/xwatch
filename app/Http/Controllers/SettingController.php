<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $googleAnalyticsCode = Setting::where('key', 'google_analytics_code')->value('value');
        return view('admin.settings.analytics', compact('googleAnalyticsCode'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'google_analytics_code' => 'nullable|string', 
        ]);

        Setting::updateOrCreate(
            ['key' => 'google_analytics_code'], 
            ['value' => $validated['google_analytics_code'] ?? null] 
        );
        
        return back()->with('success', 'Google Analytics code has been saved successfully.');
    }
}