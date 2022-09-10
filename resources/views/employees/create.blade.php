@extends('layouts.front')

@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <h2 class="mb-4">Add Employee</h2>


        <form action="{{ route('employees.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name">Name</label>
                <input name="name" rows="3" class="form-control">{{old('name')}}</input>
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input name="email" rows="3" class="form-control">{{ old('email') }}</input>
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
            <label for="address">Address</label>
                <input name="address" rows="3" class="form-control">{{ old('address') }}</input>
                @error('address')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="gender">Gender</label>
                <select name="gender" class="form-select">
                        <option value="male" @selected(old('gender') == 'male')>Male</option>
                        <option value="female" @selected(old('gender') == 'female')>Female</option>
                </select>
                @error('gender')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>            
            <div class="mb-3">
                <label for="phone_no">Phone No.</label>
                <input name="phone_no" rows="3" class="form-control">{{ old('phone_no') }}</input>
                @error('phone_no')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                 <label for="start_joining_date">Start joining date</label>
                <input type="date" name="start_joining_date" rows="3" class="form-control">{{ old('start_joining_date') }}</input>
                @error('start_joining_date')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
             <label for="department_id">Department.</label>
                <input  name="department_id" rows="3" class="form-control">{{ old('department_id') }}</input>
                @error('department_id')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
           
            <div class="col-md-6">
                    <select name="emp_type" class="form-select">
                        <option value="full_time" @selected(old('emp_type') == 'full_time')>full time</option>
                        <option value="casual" @selected(old('emp_type') == 'part_time')>part time</option>
                        <option value="other" @selected(old('emp_type') == 'independent_contract')>independent contract</option>
                    </select>
                    @error('emp_type')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            <div class="row">
                
                <div class="col-md-6 text-end">
                    <button type="submit" class="btn btn-primary">Create</button>  
                </div>
            </div>
        </form>
    </div>
</div>

@endsection