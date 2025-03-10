<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LegalPage;
use Illuminate\Http\Request;

class LegalPageController extends Controller
{
    public function index($slug)
    {
        $page = LegalPage::where('slug', $slug)->first();

        return view('admin.legalPage.index', compact('page'));
    }

    public function edit($slug)
    {
        $page = LegalPage::where('slug', $slug)->first();

        return view('admin.legalPage.edit', compact('page'));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'description' => 'required',
        ]);

        $page = LegalPage::where('slug', $slug)->first();
        $page->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return to_route('admin.legalPage.index', $slug)->withSuccess(__('Legal page updated successfully'));
    }
}
