@php
    $student = $student ?? null;
@endphp

<div class="mb-3">
    <label for="code" class="form-label fw-bold">Mã sinh viên: <span class="text-danger">*</span></label>
    <input type="text" 
           class="form-control @error('code') is-invalid @enderror" 
           id="code" 
           name="code" 
           value="{{ old('code', $student?->code) }}" 
           placeholder="Ví dụ: SV001">
    @error('code')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="name" class="form-label fw-bold">Họ và tên: <span class="text-danger">*</span></label>
    <input type="text" 
           class="form-control @error('name') is-invalid @enderror" 
           id="name" 
           name="name" 
           value="{{ old('name', $student?->name) }}" 
           placeholder="Ví dụ: Nguyễn Văn A">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="email" class="form-label fw-bold">Email: <span class="text-danger">*</span></label>
    <input type="email" 
           class="form-control @error('email') is-invalid @enderror" 
           id="email" 
           name="email" 
           value="{{ old('email', $student?->email) }}" 
           placeholder="Ví dụ: nguyenvana@gmail.com">
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="phone" class="form-label fw-bold">Số điện thoại: <span class="text-danger">*</span></label>
    <input type="text" 
           class="form-control @error('phone') is-invalid @enderror" 
           id="phone" 
           name="phone" 
           value="{{ old('phone', $student?->phone) }}" 
           placeholder="Ví dụ: 0912345678">
    @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-4">
    <label for="image" class="form-label fw-bold">
        Ảnh đại diện: 
        @if(!$student) <span class="text-danger">*</span> @endif
    </label>
    <input type="file" 
           class="form-control @error('image') is-invalid @enderror" 
           id="image" 
           name="image" 
           accept="image/*">
    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    @if ($student?->image_url)
        <div class="mt-2">
            <p class="mb-1 text-muted small">Ảnh hiện tại:</p>
            <img src="{{ $student->image_url }}" alt="Ảnh sinh viên" class="img-thumbnail" style="max-height: 80px;">
        </div>
    @endif
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary px-4">Lưu dữ liệu</button>
    <a href="{{ route('students.index') }}" class="btn btn-secondary px-4">Quay lại</a>
</div>

