<?php
namespace App\Http\Controllers;
use App\Models\User; 
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function index()
    {
        // Get the total number of users/employees from the database
        $totalEmployees = User::count();

        return view('dashboard', compact('totalEmployees'));
    }
}
