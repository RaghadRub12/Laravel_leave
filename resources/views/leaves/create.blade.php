@extends('layouts.front')

@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <h2 class="mb-4">Create Leaves</h2>


        <form action="{{ route('leaves.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="emp_name">Employee Name</label>
                <input name="emp_name" rows="3" class="form-control">{{ old('emp_name') }}</input>
                @error('emp_name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="apply_reason">Apply Reason</label>
                <textarea name="apply_reason" rows="3" class="form-control">{{ old('apply_reason') }}</textarea>
                @error('apply_reason')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="applied_date">Applied date</label>
                <input name="applied_date" rows="3" class="form-control">{{ old('applied_date') }}</input>
                @error('applied_date')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-6">
                    <select name="status" class="form-select">
                        <option value="registered" @selected(old('status') == 'registered')>Registered</option>
                        <option value="casual" @selected(old('status') == 'pinding')>Pinding</option>
                        <option value="other" @selected(old('status') == 'approval')>Approval</option>
                    </select>
                    @error('status')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            <div class="row">
                <div class="col-md-6">
                    <select name="leave_type" class="form-select">
                        <option value="medical" @selected(old('leave_type') == 'medical')>Medical</option>
                        <option value="casual" @selected(old('leave_type') == 'casual')>Casual</option>
                        <option value="other" @selected(old('leave_type') == 'other')>Other</option>
                    </select>
                    @error('leave_type')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 text-end">
                    <button type="submit" class="btn btn-primary">Create</button>  
                </div>
            </div>
        </form>
    </div>
</div>

@endsection