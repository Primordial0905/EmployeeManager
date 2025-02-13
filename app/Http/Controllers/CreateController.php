<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;


class CreateController extends Controller
{
    public function getIndex(){
        return view('create');
    }

    public function AddEmployee(Request $request){
        $request->validate([
            'Name' => 'required|string|min:5|max:20',
            'Age' => 'required|integer|min:20',
            'Address' => 'required|string|min:10|max:40',
            'Phone' => 'required|string|min:9|max:12|regex:/^08\d{7,11}$/',
            'Image' => 'required',
        ], [
            'Name.required' => 'Nama wajib diisi.',
            'Age.min' => 'Umur harus minimal 20 tahun.',
            'Phone.regex' => 'Nomor telepon harus dimulai dengan 08 dan terdiri dari 9 hingga 12 digit.'
        ]);

        $file = $request->file('Image');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);

        $employee = Employee::create([      
            'Name' => $request->Name,
            'Age' => $request->Age,
            'Address' => $request->Address,
            'Phone' => $request->Phone,
            'Image' => $filename
        ]);

        return redirect('/')->with('success', 'Employee has been added');
    }


    
    public function getEdit($id){
        $employee = Employee::find($id);
        return view('edit',['employee' => $employee]);
    }

    public function EditEmployee(Request $request, $id)
    {
        $employee = Employee::find($id);

        $request->validate([
            'Name' => 'required|string|min:5|max:20',
            'Age' => 'required|integer|min:20',
            'Address' => 'required|string|min:10|max:40',
            'Phone' => 'required|string|min:9|max:12|regex:/^08\d{7,11}$/',
            'Image' => 'nullable',
        ]);

<<<<<<< HEAD
        unlink(public_path('images/'.$employee->image));
        $file = $request->file('Image');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
=======
    
        if ($request->hasFile('Image')) {
            if ($employee->image && file_exists(public_path('images/' . $employee->image))) {
                unlink(public_path('images/' . $employee->image)); 
            }
>>>>>>> 2cf9b43 (Edit bug fix)

            $file = $request->file('Image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
        } 
        else {
            $filename = $employee->image; 
        }

        $employee->update([
            'Name' => $request->Name,
            'Age' => $request->Age,
            'Address' => $request->Address,
            'Phone' => $request->Phone,
            'Image' => $filename, 
        ]);

    return redirect('/')->with('success', 'Employee has been updated');
}


    public function DeleteEmployee($id){
        $employee = Employee::find($id);

<<<<<<< HEAD

=======
>>>>>>> 2cf9b43 (Edit bug fix)
        unlink(public_path('images/'.$employee->image));
        $employee->delete();
        return redirect('/')->with('success', 'Employee has been deleted');
    }

}
