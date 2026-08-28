<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Danh sách sinh viên có phân trang.
     */
    public function index()
    {
        $data = Student::query()->latest('id')->paginate(5);
        return response()->json($data);
    }

    /**
     * Tạo mới sinh viên.
     */
    public function store(StoreStudentRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = Storage::put('students', $request->file('image'));
        }

        $student = Student::create($data);

        return response()->json([
            'message' => 'Tạo sinh viên thành công',
            'data'    => $student,
        ], 201);
    }

    /**
     * Chi tiết sinh viên.
     */
    public function show(Student $student)
    {
        return response()->json([
            'data' => $student,
        ]);
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

        return response()->json([
            'message' => 'Cập nhật sinh viên thành công',
            'data'    => $student,
        ]);
    }

    /**
     * Xóa sinh viên (tự động dọn dẹp ảnh storage).
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json([
            'message' => 'Xóa sinh viên thành công',
        ], 200);
    }
}

