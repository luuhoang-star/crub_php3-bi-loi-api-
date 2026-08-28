@extends('master')

@section('title', 'Cập nhật Sinh viên: ' . $student->name)

@section('content')
    <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('students._form', ['student' => $student])
    </form>
@endsection

