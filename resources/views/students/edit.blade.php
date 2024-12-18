@extends('layouts.app')

@section('content')
<h1>Edit Student Info</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $student->name) }}" required>
    </div>
    
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', $student->email) }}" required>
    </div>
    
    <div class="form-group">
        <label for="course">Course</label>
        <select name="course" id="course" required onchange="updateYearLevels()">
            <option value="">Select Course</option>
            <option value="BSIS" {{ $student->course == 'BSIS' ? 'selected' : '' }}>BSIS</option>
            <option value="BSSW" {{ $student->course == 'BSSW' ? 'selected' : '' }}>BSSW</option>
            <option value="BAB" {{ $student->course == 'BAB' ? 'selected' : '' }}>BAB</option>
            <option value="BSA" {{ $student->course == 'BSA' ? 'selected' : '' }}>BSA</option>
            <option value="BSAIS" {{ $student->course == 'BSAIS' ? 'selected' : '' }}>BSAIS</option>
            <option value="ACT" {{ $student->course == 'ACT' ? 'selected' : '' }}>ACT</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="year_level">Year Level</label>
        <select name="year_level" id="year_level" required>
            <option value="">Select Year Level</option>
            <option value="1" {{ $student->year_level == 1 ? 'selected' : '' }}>1</option>
            <option value="2" {{ $student->year_level == 2 ? 'selected' : '' }}>2</option>
            <option value="3" {{ $student->year_level == 3 ? 'selected' : '' }}>3</option>
            <option value="4" {{ $student->year_level == 4 ? 'selected' : '' }}>4</option>
        </select>
    </div>
    
    <button type="submit">Update</button>
</form>

<script>
    function setInitialYearLevels() {
        var courseSelect = document.getElementById('course');
        var yearLevelSelect = document.getElementById('year_level');

        yearLevelSelect.innerHTML = '';

        var selectedCourse = courseSelect.value;

        var yearLevels;
        if (selectedCourse === 'ACT') {
            yearLevels = ['1', '2'];
        } else {
            yearLevels = ['1', '2', '3', '4'];
        }

        yearLevels.forEach(function(year) {
            var option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            yearLevelSelect.appendChild(option);
        });

        var defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.textContent = 'Select Year Level';
        yearLevelSelect.prepend(defaultOption);

        yearLevelSelect.value = "{{ $student->year_level }}";
    }

    function updateYearLevels() {
        setInitialYearLevels();
    }

    document.addEventListener('DOMContentLoaded', setInitialYearLevels);
</script>
@endsection