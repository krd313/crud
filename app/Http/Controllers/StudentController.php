<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::get();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'name' => ['required'],
            'email' => ['required','email'],
            'photo' => ['required','image']
        ]);

        $fn = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'),$fn);

        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->photo = $fn;
        $student->save();

        return redirect()->back()->with('success','Student is added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
                //dd($request->all());

                $request->validate([
                    'name' => ['required'],
                    'email' => ['required','email']
                ]);
        

        
                $obj = Student::find($student->id);
                $obj->name = $request->name;
                $obj->email = $request->email;

                if($request->photo){
                    $request->validate([
                        'photo' => ['required','image']
                    ]);
                    unlink(public_path('uploads/'.$student->photo));
                $fn = time().'.'.$request->photo->extension();
                $request->photo->move(public_path('uploads'),$fn);               
                $obj->photo = $fn;
                }
                $obj->update();
        
                return redirect()->back()->with('success','Student is updates successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        unlink(public_path('uploads/'.$student->photo));
        $student->delete();

        return redirect()->back()->with('success','Student is Deleted successfully');
    }
}
