<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        return Employee::all();

    }

    public function show($employee)
    {
//        $data = $employee->get('AdminId');
//        return DB::select(DB::raw("SELECT employees.Name, org__codes.CodeId, org__codes.Org_code FROM employees,admins,org__codes WHERE admins.AdminId=$data AND admins.OrgCodeId=org__codes.CodeId"));
        $query = DB::table('employees')
            ->where('employees.AdminId', $employee)
            ->get();
        return $query;
    }


    public function showEmployee($UserId)
    {
//        $data = $employee->get('AdminId');
//        return DB::select(DB::raw("SELECT employees.Name, org__codes.CodeId, org__codes.Org_code FROM employees,admins,org__codes WHERE admins.AdminId=$data AND admins.OrgCodeId=org__codes.CodeId"));
        $query = DB::table('employees')
            ->where('employees.UserId', $UserId)
            ->get();
        return $query;
    }

    public function OrgCode($id)
    {
//        return DB::select(DB::raw("SELECT employees.Name, org__codes.CodeId, org__codes.Org_code FROM employees,admins,org__codes WHERE admins.AdminId='$id' AND admins.OrgCodeId=org__codes.CodeId"));

        $query = DB::table('employees')
            ->join('admins', 'employees.AdminId', '=', 'admins.AdminId')
            ->join('org__codes', 'org__codes.CodeId', '=', 'admins.OrgCodeId')
            ->where('employees.EmployeeId', $id)
            ->get();
        return $query;

    }

    public function getAdminId($orgCode)
    {
        $query = DB::table('admins')
            ->join('org__codes', 'admins.OrgCodeId', '=', 'org__codes.CodeId')
            ->where('org__codes.Org_code', $orgCode)
            ->pluck('admins.AdminId');
        return $query;


    }


    public
    function store(Request $request)
    {
        $employee = Employee::create($request->all());

        return response()->json($employee, 201);
    }

    public
    function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());

        return response()->json($employee, 200);
    }

    public
    function delete(Employee $employee)
    {
        $employee->delete();

        return response()->json(null, 204);
    }

}
