@extends('layouts.front')

@section('title', 'Leaves List')

@section('content')
<table class="table ">
            <thead class="table table-dark table-striped container-fluid">
                <tr>
                    <th>Employee Name</th>
                    <th>Leave type</th>
                    <th>Apply reason </th>
                    <th>Apply Date</th>
                    <th>Status</th>
                    <th>created at</th>
                    <th>Updated at</th>
                    <th>
                        <form  action="{{ route('leaves.create') }}" method="get">
                             @csrf
                            <button type="submit" class="btn btn-danger">Create </button>
                        </form>
                    </th>
                    
                </tr>
            </thead>
            <tbody class="table-secondary" >
            @foreach ($leaves as $leave)  
            <tr >
                <td>{{ $leave->emp_name }}</td>
                <td>{{ $leave->leave_type }}</td>
                <td>{{ $leave->apply_reason}}</td>
                <td>{{ $leave->applied_date}}</td>
                <td>{{ $leave->status}}</td>
                <td>{{ $leave->created_at}}</td>
                <td>{{ $leave->updated_at}}</td>
                <td><form action="{{ route('leaves.destroy',$leave->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete </button>
                </form></td>
                
                <td><form action="{{ route('leaves.edit', $leave->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Edit </button>
                </form></td>
                
            @endforeach
        </tbody>
</table>

@endsection