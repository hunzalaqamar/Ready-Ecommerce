<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeneraleSettingRequest;
use App\Models\Currency;
use App\Repositories\GeneraleSettingRepository;

class GeneraleSettingController extends Controller
{
    /**
     * Display a listing of the generale settings.
     */
    public function index()
    {
        $currencies = Currency::all();

        return view('admin.generale-setting', compact('currencies'));
    }

    /**
     * Update the generale settings.
     */
    public function update(GeneraleSettingRequest $request)
    {
        if (app()->environment() == 'local') {
            return back()->with('demoMode', 'You can not update the generale settings in demo mode');
        }

        // store generale settings from generaleSettingRepository
        GeneraleSettingRepository::updateByRequest($request);

        return back()->withSuccess(__('Generale settings updated successfully'));
    }
}
