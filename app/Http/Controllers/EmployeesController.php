<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $employees = Employee::select([
            'employees.*',
        ])
         ->get();

        return view('employees.index', [
            'employees' => $employees,
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    /*
        $request->validate([
            'name' => 'required|string|max:500',
        ]);
*/
        $employee = new Employee();
        $employee->name = $request->post('name');
        $employee->email = $request->post('email');
        $employee->address= $request->post('address');
        $employee->gender = $request->post('gender');
        $employee->phone_no= $request->post('phone_no');
        $employee->start_joining_date= $request->post('start_joining_date');
        $employee->department_id= $request->post('department_id');
        $employee->emp_type = $request->post('emp_type');
        $employee->is_admin ='no';
        $employee->save();

        Session::put('message', 'This message will not disappear!');
        return redirect()
                ->route('employees.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          // SELECT * FROM posts WHERE id = $id
          $emp=Employee::findOrFail($id); // return "Post" Model object
          // if (!$post) {
          //     abort(404);
          //     return redirect()->route('posts.index');
          // }
  
          return view('employees.edit', [
              'emp' => $emp,
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $emp)
    {
         
        //$this->authorize('update', $post);

       

        //$leave->emp_name = $request->post('emp_name');
        $emp->name = $request->post('name');
        $emp->email = $request->post('email');
        $emp->address = $request->post('address');
        $emp->phone_no= $request->post('phone_no');
        $emp->start_joining_date = $request->post('start_joining_date');
        $emp->department_id  = $request->post('department_id');
        $emp->gender = $request->post('gender');
        $emp->emp_type = $request->post('emp_type');
        $emp->is_admin = 'no';
        $emp->save(); 

        return redirect()->route('employees.index')->with('status', 'leaves updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp= Employee::findOrFail($id);
       
        $emp->delete();

        Session::flash('status', 'employee deleted.');
        return redirect()->route('employees.index')->with('status', 'employee updated.');
    }
}
