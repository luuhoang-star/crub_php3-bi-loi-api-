<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'email',
        'phone',
        'image',
    ];

    protected $appends = ['image_url'];

    /**
     * Tự động xóa file ảnh khỏi storage khi bản ghi Student bị xóa.
     */
    protected static function booted(): void
    {
        static::deleted(function (Student $student) {
            $student->deleteImage();
        });
    }

    /**
     * Accessor lấy URL ảnh hiển thị của sinh viên.
     */
    public function getImageUrlAttribute(): ?string
    {
        if ($this->image && Storage::exists($this->image)) {
            return Storage::url($this->image);
        }
        return null;
    }

    /**
     * Xóa file ảnh lưu trữ của sinh viên nếu tồn tại.
     */
    public function deleteImage(): void
    {
        if ($this->image && Storage::exists($this->image)) {
            Storage::delete($this->image);
        }
    }
}

