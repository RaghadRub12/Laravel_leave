@extends('layouts.front')

@section('title', 'Employees List')

@section('content')
<table class="table ">
            <thead class="table table-dark table-striped container-fluid">
                <tr>
                    <th>id</th>
                    <th>Employee Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>gender</th>
                    <th>Phone No.</th>
                    <th>Start Joining date</th>
                    <th>Department id</th>
                    <th>Employee Type</th>
                    <th>
                        <form  action="{{ route('employees.create') }}" method="get">
                             @csrf
                            <button type="submit" class="btn btn-danger ">Add  new Employee </button>
                        </form>
                    </th>
                </tr>
            </thead>
            <tbody class="table-secondary" >
         @foreach ($employees as $emp) 
            <tr >
                <td>{{ $emp->id }}</td>
                <td>{{ $emp->name }}</td>
                <td>{{ $emp->email }}</td>
                <td>{{ $emp->address }}</td>
                <td>{{ $emp->gender }}</td>
                <td>{{ $emp->phone_no }}</td>
                <td>{{ $emp->start_joining_date }}</td>
                <td>{{ $emp->department_id }}</td>
                <td>{{ $emp->emp_type }}</td>
                
                <td>
                    <form action="{{ route('employees.destroy',$emp->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete </button>
                    </form>
                </td>
                </td>
                <th>
                    <form  action="{{ route('employees.edit',$emp->id) }}" >
                             @csrf
                            <button type="submit" class="btn btn-danger">Edit </button>
                    </form>
                    </th>
                
            </tr>
            @endforeach
        </tbody>
</table>

@endsection