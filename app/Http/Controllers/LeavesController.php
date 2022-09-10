<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Leave;
use Illuminate\Support\Facades\Redirect;

class LeavesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
            $leaves = Leave::select([
                        'leaves.*',
                    ])
                     ->get();
            
            return view('leaves.index', [
                'leaves' => $leaves,
                
            ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
         return view('leaves.create');
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
          // 'leave' => 'required|string|max:500',
        ]);

        $leave = new Leave();
        $leave->emp_name = $request->post('emp_name');//
        $leave->leave_type = $request->post('leave_type');//
        $leave->apply_reason = $request->post('apply_reason');//
        $leave->applied_date = $request->post('applied_date');//
        $leave->status = $request->post('status');//
       
        $leave->save();

        Session::put('message', 'This message will not disappear!');
        return redirect()
                ->route('leaves.index'); 
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
        $leave=Leave::findOrFail($id); // return "Post" Model object
        // if (!$post) {
        //     abort(404);
        //     return redirect()->route('posts.index');
        // }

        return view('leaves.edit', [
            'leave' => $leave,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave )
    {
       
        
        //$this->authorize('update', $post);

        $request->validate([
            'emp_name' => 'required|string|max:500',//
            'status' => 'required',
        ]);

        //$leave->emp_name = $request->post('emp_name');
        $leave->leave_type = $request->post('leave_type');
        $leave->apply_reason = $request->post('apply_reason');
        $leave->applied_date = $request->post('applied_date');
        $leave->status = $request->post('status');
        if ($request->has('status')) {
            $leave->status = $request->post('status');
        }
        $leave->save(); 

        return redirect()->route('leaves.index')->with('status', 'leaves updated.');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
    
        $leave= Leave::findOrFail($id);
       
        $leave->delete();

        Session::flash('status', 'leave deleted.');
        return redirect()->route('leaves.index')->with('status', 'leaves updated.');
    }
}
