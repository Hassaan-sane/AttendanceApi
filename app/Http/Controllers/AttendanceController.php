<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function index()
    {
        return Attendance::all();
    }

    /// show employee of this id where checkout id null
    public function show($attendance)
    {
//        return Attendance::find($attendance);
        $query = DB::table('attendances')
            ->where('attendances.EmployeeId', '=', $attendance)
            ->WhereNull('attendances.CheckOut')
            ->get();
        return $query;
    }


    ///show all the checkedIN employee of certian admin
    public function showEmployee($attendance)
    {
        $query = DB::table('admins')
            ->join('employees', 'admins.AdminId', '=', 'employees.AdminId')
            ->join('attendances', 'attendances.EmployeeId', '=', 'employees.EmployeeId')
            ->where('employees.AdminId', $attendance)
            ->WhereNull('attendances.CheckOut')
            ->get();
        return $query;

    }

    ////show all the attendance of certian employee
    public function report($id)
    {
        $query = DB::table('attendances')
            ->where('attendances.EmployeeId',$id)
            ->orderBy('attendances.AttendanceId','desc')
            ->get();
        return $query;

    }


    public function store(Request $request)
    {
        $attendance = Attendance::create($request->all());

        return response()->json($attendance, 201);
    }

    public function update(Request $request, Attendance $attendance)
    {
        //return $attendance;
        $attendance->update($request->all());

        return response()->json($attendance, 200);
//        return $request->all();
    }

    public function delete(Attendance $attendance)
    {
        $attendance->delete();

        return response()->json(null, 204);
    }

}
