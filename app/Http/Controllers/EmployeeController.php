<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Show the employees list page
    public function index()
    {
        $employees = Employee::with('department')->latest()->get();
        $departments = Department::all();

        return view('components.employees', compact('employees', 'departments'));
    }

    // Handle the "Add Employee" form submission
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name'     => 'required|string|max:255',
            'email'         => 'required|email|unique:employees,email',
            'phone'         => 'nullable|string|max:20',
            'address'       => 'nullable|string|max:255',
            'position'      => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'employee_type' => 'nullable|string',
            'date_hired'    => 'nullable|date',
            'status'        => 'required|in:Active,Inactive',
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Employee added successfully.');
    }

    // Delete an employee
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted.');
    }
}