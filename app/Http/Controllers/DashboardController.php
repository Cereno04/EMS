<?php
namespace App\Http\Controllers;
use App\Models\User; 
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;

class DashboardController extends Controller
{
     public function index()
    {
        // Get the total number of users/employees from the database
        $totalEmployees = Employee::count();
        $totalDepartments = Department::count();
        $totalAttendanceRecords = Employee::count();
        $activeEmployees = Employee::where('status', 'active')->count();

        return view('dashboard', compact('totalEmployees', 'totalDepartments', 'totalAttendanceRecords', 'activeEmployees'));
    }
}
