<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return Admin::all();
    }

    public function show(Admin $admin)
    {
        return $admin;
    }

    public function getAdminId($username)
    {
        $query = DB::table('admins')
            ->where('admins.UserId', $username)
            ->get();
        return $query;
    }

    public function getOrgCode($adminId)
    {
        $query = DB::table('admins')
            ->join('org__codes', 'admins.OrgCodeId', '=', 'org__codes.CodeId')
            ->where('admins.AdminId', $adminId)
            ->pluck('org__codes.Org_code');
        return $query;

    }

    public function store(Request $request)
    {
        $admin = Admin::create($request->all());

        return response()->json($admin, 201);
    }

    public function update(Request $request, Admin $admin)
    {
        $admin->update($request->all());

        return response()->json($admin, 200);
    }

    public function delete(Admin $admin)
    {
        $admin->delete();

        return response()->json(null, 204);
    }

}
