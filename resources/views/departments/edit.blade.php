@extends('layouts.front')

@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="d-flex mb-4 justify-content-between">
            <div>
                <h2>Edit Departments</h2>
            </div>
            @can('delete', $department)
            <div>
                <form action="{{ route('departments.destroy', $department->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete Department</button>
                </form>
            </div>
            @endcan
        </div>
        <form action="{{ route('departments.update', $department->id) }}" method="post" style="padding-bottom:250px">
            @csrf
            
            @method('put')

            <div class="mb-3">
                <textarea name="department_name" rows="3" class="form-control">{{ old('department_name', $department->department_name) }}</textarea>
                @error('department_name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6">
                    <select name="location" class="form-select">
                        <option value="Jenin" @selected(old('location', $department->location) == 'Jenin')>Jenin</option>
                        <option value="Hebron" @selected(old('location', $department->location) == 'Ramallah')>Hebron</option>
                        <option value="Ramallah" @if(old('location', $department->location) == 'Ramallah') selected @endif>Ramallah</option>
                    </select>
                    @error('location')
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