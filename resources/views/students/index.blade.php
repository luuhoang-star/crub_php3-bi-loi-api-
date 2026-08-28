@extends('master')

@section('title', 'Danh sách Sinh viên')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Tổng số: <strong>{{ $data->total() }}</strong> sinh viên</span>
        <a href="{{ route('students.create') }}" class="btn btn-primary">
            + Thêm mới sinh viên
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light text-center">
                <tr>
                    <th style="width: 60px;">ID</th>
                    <th style="width: 80px;">Ảnh</th>
                    <th>Mã SV</th>
                    <th>Họ và tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Ngày tạo</th>
                    <th style="width: 200px;">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $student)
                    <tr>
                        <td class="text-center">{{ $student->id }}</td>
                        <td class="text-center">
                            @if ($student->image_url)
                                <img src="{{ $student->image_url }}" alt="{{ $student->name }}" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <div class="bg-secondary text-white rounded d-inline-flex justify-content-center align-items-center" style="width: 50px; height: 50px; font-size: 11px; text-align: center; line-height: 1.2;">
                                    Chưa có ảnh
                                </div>
                            @endif
                        </td>
                        <td><span class="badge bg-info text-dark">{{ $student->code }}</span></td>
                        <td class="fw-semibold">{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td class="text-muted small">{{ $student->created_at?->format('d/m/Y H:i') }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-info text-white">Xem</a>
                                <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-warning">Sửa</a>
                                <form action="{{ route('students.destroy', $student) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-4 text-muted">Chưa có sinh viên nào trong danh sách.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end mt-3">
        {{ $data->links('pagination::bootstrap-5') }}
    </div>
@endsection

