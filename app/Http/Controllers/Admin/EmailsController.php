<?php


namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmailsController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $emails = DB::table('admin_emails')->get();
        return view('admin.emails', ['emails' => $emails]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
        ]);

        DB::table('admin_emails')->insert(
            array('email' => $request->email)
        );

        return redirect()->back();
    }

    public function delete(string $email)
    {
        DB::table('admin_emails')->where('email', $email)->delete();
        return redirect()->back();
    }

}
