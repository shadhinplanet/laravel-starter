<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard.index');
    }

   /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function fileUpload(Request $request)
    {
        if ($request->hasFile('image') || $request->hasFile('thumbnail')) {

            if ($request->hasFile('image')) {
                $file = $request->file('image');
            }
            if ($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');
            }
            $filename = time() . '--' . $file->getClientOriginalName();
            $folder = uniqid();
            $filename = str_replace(' ', '-', $filename);
            $file->move("uploads/tmp/" . $folder, $filename);

            return $folder;
        }
        return '';
    }
}
