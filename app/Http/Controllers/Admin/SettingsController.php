<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings', [
            'settings' => DB::table('site_settings')->pluck('value', 'key'),
        ]);
    }

    public function updateAppearance(Request $request)
    {
        $data = $request->validate([
            'site_title' => 'required|string|max:120',
            'logo' => 'nullable|image|mimes:jpeg,jpg,png,webp,gif|max:20480',
        ]);

        DB::table('site_settings')->updateOrInsert(
            ['key' => 'site_title'],
            ['value' => $data['site_title'], 'updated_at' => now()]
        );

        if ($request->hasFile('logo')) {
            $oldLogo = DB::table('site_settings')->where('key', 'site_logo')->value('value');
            $logoPath = $request->file('logo')->store('site', 'public');

            DB::table('site_settings')->updateOrInsert(
                ['key' => 'site_logo'],
                ['value' => $logoPath, 'updated_at' => now()]
            );

            if ($oldLogo) {
                Storage::disk('public')->delete($oldLogo);
            }
        }

        return back()->with('success', 'Đã cập nhật tên website và logo.');
    }

    public function updatePassword(Request $request)
    {
        $data = $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if (!Hash::check($data['current_password'], $request->user()->password)) {
            return back()->withErrors([
                'current_password' => 'Mật khẩu hiện tại không chính xác.',
            ]);
        }

        $request->user()->update([
            'password' => Hash::make($data['new_password']),
        ]);

        return back()->with('success', 'Đã đổi mật khẩu.');
    }
}