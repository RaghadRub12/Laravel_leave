@extends('layouts.front')

@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="d-flex mb-4 justify-content-between">
            <div>
                <h2>Edit Leaves</h2>
            </div>
            @can('delete', $leave)
            <div>
                <form action="{{ route('leaves.destroy', $leave->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete Leave</button>
                </form>
            </div>
            @endcan
        </div>
        <form action="{{ route('leaves.update', $leave->id) }}" method="post" style="padding-bottom:250px">
            @csrf
            
            @method('put')

            <div class="mb-3">
                <textarea name="emp_name" rows="3" class="form-control">{{ old('emp_name', $leave->emp_name) }}</textarea>
                @error('emp_name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <textarea name="leave_type" rows="3" class="form-control">{{ old('leave_type', $leave->leave_type) }}</textarea>
                @error('leave_type')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <textarea name="apply_reason" rows="3" class="form-control">{{ old('apply_reason', $leave->apply_reason) }}</textarea>
                @error('apply_reason')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-3">
                <input  name="applied_date" rows="3" class="form-control" value="{{ old('applied_date', $leave->applied_date) }}"></input>
                @error('applied_date')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="date" name="created_at" rows="3" class="form-control">{{ old('created_at', $leave->created_at) }}</input>
                @error('created_at')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="date" name="update_at" rows="3" class="form-control">{{ old('update_at', $leave->update_at) }}</input>
                @error('update_at')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <select name="status" class="form-select">
                        <option value="registered" @selected(old('status', $leave->status) == 'registered')>Registered</option>
                        <option value="pinding" @selected(old('status', $leave->status) == 'pinding')>Pinding</option>
                        <option value="approval" @if(old('status', $leave->status) == 'approval') selected @endif>Approval</option>
                    </select>
                    @error('status')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 text-end">
                    <button type="submit" class="btn btn-primary">Update </button>  
                </div>
            </div>
        </form>
    </div>
</div>

@endsection