@extends('master')

@section('title', 'Thêm mới Sinh viên')

@section('content')
    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('students._form')
    </form>
@endsection

