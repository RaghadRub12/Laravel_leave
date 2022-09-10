<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Department;
class DepartmentsCtontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
            $departments = Department::select([
                        'departments.*',
                    ])
                     ->get();
            
            return view('departments.index', [
                'departments' => $departments,
                
            ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
         return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required|string|max:500',
            'location' => 'required',
        ]);

        $department = new Department();
        $department->department_name = $request->post('department_name');
        $department->location= $request->post('location');;
       
        $department->save();

        Session::put('message', 'This message will not disappear!');
        return redirect()
                ->route('departments.index'); 
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
        $department= Department::findOrFail($id); // return "Post" Model object
        // if (!$post) {
        //     abort(404);
        //     return redirect()->route('posts.index');
        // }

        return view('departments.edit', [
            'department' => $department,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        //$post = Post::findOrFail($id);
        
        //$this->authorize('update', $post);

        $request->validate([
            'department_name' => 'required|string|max:500',
            'location' => 'required|string|max:500',
        ]);

        $department->department_name = $request->post('department_name');
        $department->location = $request->post('location');
       
        $department->save(); 

        return redirect()->route('departments.index')->with('location', 'department updated.');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dep=Department::findOrFail($id);
       
        $dep->delete();

        Session::flash('status', 'employee deleted.');
        return redirect()->route('departments.index')->with('status', 'employee updated.');
    }
}
