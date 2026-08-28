@extends('master')

@section('title', 'Chi tiết Sinh viên: ' . $student->name)

@section('content')
    <div class="row">
        <div class="col-md-4 text-center mb-3">
            @if ($student->image_url)
                <img src="{{ $student->image_url }}" alt="{{ $student->name }}" class="img-fluid rounded border shadow-sm" style="max-height: 250px;">
            @else
                <div class="bg-secondary text-white rounded d-flex align-items-center justify-content-center mx-auto" style="width: 200px; height: 200px;">
                    Không có ảnh
                </div>
            @endif
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 30%;" class="table-light">ID</th>
                    <td>{{ $student->id }}</td>
                </tr>
                <tr>
                    <th class="table-light">Mã sinh viên</th>
                    <td><span class="badge bg-primary fs-6">{{ $student->code }}</span></td>
                </tr>
                <tr>
                    <th class="table-light">Họ và tên</th>
                    <td class="fw-bold">{{ $student->name }}</td>
                </tr>
                <tr>
                    <th class="table-light">Email</th>
                    <td>{{ $student->email }}</td>
                </tr>
                <tr>
                    <th class="table-light">Số điện thoại</th>
                    <td>{{ $student->phone }}</td>
                </tr>
                <tr>
                    <th class="table-light">Ngày tạo</th>
                    <td>{{ $student->created_at?->format('d/m/Y H:i:s') }}</td>
                </tr>
                <tr>
                    <th class="table-light">Ngày cập nhật gần nhất</th>
                    <td>{{ $student->updated_at?->format('d/m/Y H:i:s') }}</td>
                </tr>
            </table>

            <div class="d-flex gap-2 mt-4">
                <a href="{{ route('students.edit', $student) }}" class="btn btn-warning px-3">Sửa thông tin</a>
                <a href="{{ route('students.index') }}" class="btn btn-secondary px-3">Quay lại danh sách</a>
            </div>
        </div>
    </div>
@endsection

