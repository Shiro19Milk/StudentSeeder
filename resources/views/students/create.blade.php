@extends('layouts.app')

@section('content')
<h1>Add New Student</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('students.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
    </div>
    
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
    </div>
    
    <div class="form-group">
        <label for="course">Course</label>
        <select name="course" id="course" required onchange="updateYearLevels()">
            <option value="">Select Course</option>
            <option value="BSIS">BSIS</option>
            <option value="BSSW">BSSW</option>
            <option value="BAB">BAB</option>
            <option value="BSA">BSA</option>
            <option value="BSAIS">BSAIS</option>
            <option value="ACT">ACT</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="year_level">Year Level</label>
        <select name="year_level" id="year_level" required>
            <option value="">Select Year Level</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
    </div>
    
    <button type="submit">Submit</button>
</form>

<script>
    function updateYearLevels() {
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
    }
</script>
@endsection