@extends('layouts.front')

@section('title', 'Department List')

@section('content')
<table class="table ">
            <thead class="table table-dark table-striped container-fluid">
                <tr>
                    <th>Department Name</th>
                    <th>Department Location</th>
                    <th>
                    <form  action="{{ route('departments.create') }}" method="get">
                             @csrf
                            <button type="submit" class="btn btn-danger ">Add  new department</button>
                        </form> 
                    </th>
                </tr>
            </thead>
            <tbody class="table-secondary" >
            @foreach ($departments as $department)  
            <tr >
                <td>{{ $department->department_name }}</td>
                <td>{{ $department->location }}</td>
                <td><a href="{{ route('departments.edit', $department->id) }}">Edit department</a></td>
                <td>
                    <form action="{{ route('departments.destroy',$department->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
</table>

@endsection