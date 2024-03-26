<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class PrintController extends Controller
{
     public function index()
      {
            $students = Student::all();
            return view('print.printstudent')->with('students', $students);;
      }
      public function prnpriview()
      {
            $students = Student::all();
            return view('print.students')->with('students', $students);;
      }
}
