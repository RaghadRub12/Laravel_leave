@extends('layouts.front')

@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <h2 class="mb-4">Create New Department</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            Validation Error!
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('departments.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <textarea name="department_name" rows="3" class="form-control">{{ old('department_name') }}</textarea>
                @error('department_name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6">
                    <select name="location" class="form-select">
                        <option value="jenin" @selected(old('location') == 'Jenin')>Jenin</option>
                        <option value="Ramallah" @selected(old('location') == 'Ramallah')>Ramallah</option>
                        <option value="Hebron" @selected(old('location') == 'Hebron')>Hebron</option>
                    </select>
                    @error('location')
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