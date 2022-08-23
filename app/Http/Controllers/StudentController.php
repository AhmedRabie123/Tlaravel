<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Phone;
use PHPUnit\Framework\Constraint\FileExists;

class StudentController extends Controller
{
   // public function home(){

   //     return view ('home');

   // }

   // public function about(){

   //     return view ('about');



   // }


   // public function add(){

   //     $student = new Student();
   //     $student->name = 'ali';
   //     $student->email = 'ali@gmail.com';
   //     $student->save();

   // }

   // public function view(){

   //     $result = Student::where('id',2)->get();
   //    // dd($result);
   //     return view('view', compact('result'));
   // }

   // public function update(){

   //     $student = Student::where('id',2)->first();
   //     $student->name = 'hassan ahmed';
   //     $student->email = 'hassan123@gmail.com';
   //     $student->update();

   // }

   // public function delete(){

   //     $student = Student::where('id',2)->first();
   //     $student->delete();

   // }

   //normall relashinship one to one 

   // public function all_student(){

   //     $all_student = Student::with('rphone')->get();
   //     return view('all_student', compact('all_student'));

   // }

   //reverse relashinship one to one 

   //  public function all_student(){

   //     $all_student = phone::with('rstudent')->get();
   //     return view('all_student', compact('all_student'));

   //  }

   // relashinship one to many

   //  public function all_student(){

   //    $all_student = student::with('rphone')->get();
   //     return view('all_student', compact('all_student'));

   // }

   public function index()
   {

      $all_student = Student::paginate(5);
      return view('main.home', compact('all_student'));
   }

   // store data with form

   public function store(Request $request)
   {

      //    dd($request->input());

      $request->validate([

         'photo' => 'required|image|mimes:jpeg,jpg,png,gif',
         'name' => 'required|min:3|max:40|',
         'email' => 'required|email|'

      ]);

      $ext = $request->file('photo')->extension();
      $final_name = date('YmdHis') . '.' . $ext;
      $request->file('photo')->move(public_path('upload/'), $final_name);

      // dd($final_name);

      $student = new Student();
      $student->photo =  $final_name;
      $student->name = $request->name;
      $student->email = $request->email;
      $student->save();

      return redirect()->route('home')->with('success', 'Student is inserted successfully.');
   }

   public  function edit($id)
   {

      // dd($id);

      $edit_student = Student::where('id', $id)->first();
      return view('main.edit', compact('edit_student'));
   }

   public function update(Request $request, $id)
   {

      // dd($request->input());
      $student = Student::where('id', $id)->first();

      $request->validate([

         'name' => 'required|min:3|max:40|',
         'email' => 'required|email|'

      ]);

      if (request()->hasFile('photo')) {

         $request->validate([

            'photo' => 'image|mimes:jpeg,jpg,png,gif|',

         ]);

         if (file_exists(public_path('upload/' . $student->photo)) and !empty($student->photo)) {

            unlink(public_path('upload/' . $student->photo));
         }

         $ext = $request->file('photo')->extension();
         $final_name = date('YmdHis') . '.' . $ext;
         $request->file('photo')->move(public_path('upload/'), $final_name);


         $student->photo = $final_name;
      }

      $student->name = $request->name;
      $student->email = $request->email;
      $student->update();

      return redirect()->route('home')->with('success', 'Student is updated successfully.');
   }

   public function delete($id)
   {

      $student = Student::where('id', $id)->first();

      if (file_exists(public_path('upload/' . $student->photo)) and !empty($student->photo)) {

         unlink(public_path('upload/' . $student->photo));
      }

      $student->delete();

      return redirect()->back()->with('success', 'Student is deleted successfully.');
   }

   public function trashed()
   {

      return dd(Student::onlyTrashed()->latest()->get());
   }

   public function restore($id)
   {

      $student = Student::withTrashed()->where('id', $id)->first();

      $student->restore();

      return redirect()->back()->with('success', 'Student restored successfully.');

      // or 

      // Student::where('id',$id)->restore();

   }



   public function force_delete($id)
   {

      Student::where('id', $id)->forceDelete();
   }
}
