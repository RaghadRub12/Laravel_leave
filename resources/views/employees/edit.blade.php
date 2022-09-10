@extends('layouts.front')

@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="d-flex mb-4 justify-content-between">
            <div>
                <h2>Edit Employees</h2>
            </div>
            @can('delete', $emp)
            <div>
                <form action="{{ route('employees.destroy', $emp->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete emp</button>
                </form>
            </div>
            @endcan
        </div>
        <form action="{{ route('employees.update', $emp->id) }}" method="post" style="padding-bottom:250px">
            @csrf
            
            @method('put')

            <div class="mb-3">
                <input name="name" rows="3" class="form-control" value="{{ old('name', $emp->name) }}"></input>
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input name="email" rows="3" class="form-control" value="{{ old('email', $emp->email) }}"></input>
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input name="address" rows="3" class="form-control" value="{{ old('address', $emp->address) }}"></input>
                @error('address')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-6">
                    <select name="gender" class="form-select">
                        <option value="female" @selected(old('gender', $emp->gender) == 'female')>Female</option>
                        <option value="male" @selected(old('gender', $emp->gender) == 'male')>Male</option>
                    </select>
                    @error('gender')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-3">
                <input name="phone_no" rows="3" class="form-control" value="{{ old('phone_no', $emp->phone_no) }}"></input>
                @error('phone_no')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input name="start_joining_date" rows="3" class="form-control" value="{{ old('start_joining_date', $emp->start_joining_date) }}"></input>
                @error('start_joining_date')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input name="department_id" rows="3" class="form-control" value="{{ old('department_id', $emp->department_id ) }}"></input>
                @error('department_id')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-6">
                    <select name="emp_type" class="form-select">
                        <option value="full_time" @selected(old('emp_type', $emp->emp_type) == 'full_time')>full_time</option>
                        <option value="part_time" @selected(old('emp_type', $emp->emp_type) == 'part_time')>part_time</option>
                    </select>
                    @error('emp_type')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            <div class="row">
                
                <div class="col-md-6 text-end">
                    <button type="submit" class="btn btn-primary">Update </button>  
                </div>
            </div>
        </form>
    </div>
</div>

@endsection