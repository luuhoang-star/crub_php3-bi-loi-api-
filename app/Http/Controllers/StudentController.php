<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Hiển thị danh sách sinh viên có phân trang.
     */
    public function index()
    {
        $data = Student::query()->latest('id')->paginate(5);
        return view('students.index', compact('data'));
    }

    /**
     * Hiển thị form tạo mới sinh viên.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Lưu sinh viên mới vào cơ sở dữ liệu.
     */
    public function store(StoreStudentRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = Storage::put('students', $request->file('image'));
        }

        Student::create($data);

        return redirect()->route('students.index')
            ->with('success', 'Thêm mới sinh viên thành công!');
    }

    /**
     * Hiển thị chi tiết thông tin sinh viên.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Hiển thị form chỉnh sửa sinh viên.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Cập nhật thông tin sinh viên.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $student->deleteImage();
            $data['image'] = Storage::put('students', $request->file('image'));
        }

        $student->update($data);

        return redirect()->route('students.index')
            ->with('success', 'Cập nhật sinh viên thành công!');
    }

    /**
     * Xóa sinh viên khỏi cơ sở dữ liệu (tự động xóa ảnh kèm theo).
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Xóa sinh viên thành công!');
    }
}

