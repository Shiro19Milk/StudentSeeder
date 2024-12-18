@extends('layouts.app')

@section('content')
<h1>Student List</h1>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Year Level</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->course->name }}</td>
                <td>{{ $student->year_level }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection