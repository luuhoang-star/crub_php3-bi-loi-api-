# 🎓 Hệ Thống Quản Lý Sinh Viên (Laravel CRUD & API)

Ứng dụng quản lý thông tin sinh viên xây dựng trên nền tảng **Laravel**, hỗ trợ đầy đủ các thao tác Thêm, Xem, Sửa, Xóa (CRUD) qua cả giao diện Web (Blade) và RESTful API.

---

## 🚀 Tính Năng Chính

- **Giao diện Web (Blade + Bootstrap 5)**: Danh sách phân trang, form thêm/sửa tái sử dụng component, thông báo flash alerts, xem chi tiết và upload hình ảnh.
- **RESTful API**: Hỗ trợ đầy đủ các endpoint (GET, POST, PUT, DELETE) với validation tự động và HTTP status code chuẩn.
- **Xử lý hình ảnh tự động**: Upload ảnh vào Storage và tự động dọn dẹp file vật lý khi bản ghi bị xóa hoặc cập nhật ảnh mới.

---

## 🛠️ Yêu Cầu Hệ Thống

- **PHP** >= 8.1
- **Composer** >= 2.x
- **MySQL** hoặc cơ sở dữ liệu tương thích
- **Web Server**: Laravel Herd, Laragon, XAMPP hoặc PHP Built-in Server

---

## ⚡ Hướng Dẫn Cài Đặt & Chạy Nhanh

1. **Cài đặt dependencies**:
   ```bash
   composer install
   ```

2. **Cấu hình môi trường**:
   Sao chép `.env.example` thành `.env` và cấu hình database:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Chạy Migration & Tạo Storage Link**:
   ```bash
   php artisan migrate
   php artisan storage:link
   ```

4. **Khởi chạy ứng dụng**:
   ```bash
   php artisan serve
   ```
   Truy cập Web tại: `http://127.0.0.1:8000/students`

---

## 📌 Danh Sách Routes & API Endpoints

### 1. Web Routes (`routes/web.php`)
| Phương thức | URI | Tên Route | Mô tả |
| :--- | :--- | :--- | :--- |
| `GET` | `/students` | `students.index` | Danh sách sinh viên (phân trang) |
| `GET` | `/students/create` | `students.create` | Form thêm mới sinh viên |
| `POST` | `/students` | `students.store` | Lưu sinh viên mới |
| `GET` | `/students/{student}` | `students.show` | Xem chi tiết sinh viên |
| `GET` | `/students/{student}/edit` | `students.edit` | Form chỉnh sửa sinh viên |
| `PUT/PATCH` | `/students/{student}` | `students.update` | Cập nhật thông tin sinh viên |
| `DELETE` | `/students/{student}` | `students.destroy` | Xóa sinh viên |

### 2. RESTful API Endpoints (`routes/api.php`)
| Phương thức | Endpoint | Mô tả | Mã phản hồi |
| :--- | :--- | :--- | :--- |
| `GET` | `/api/students` | Lấy danh sách sinh viên | `200 OK` |
| `POST` | `/api/students` | Tạo mới sinh viên | `201 Created` |
| `GET` | `/api/students/{id}` | Lấy chi tiết 1 sinh viên | `200 OK` |
| `PUT/PATCH` | `/api/students/{id}` | Cập nhật thông tin | `200 OK` |
| `DELETE` | `/api/students/{id}` | Xóa sinh viên | `200 OK` |

---

## 📂 Cấu Trúc Mã Nguồn Chính

```text
app/
├── Http/
│   ├── Controllers/
│   │   ├── StudentController.php         # Controller giao diện Web
│   │   └── Api/StudentController.php     # Controller API
│   └── Requests/
│       ├── StoreStudentRequest.php       # FormRequest validate khi thêm mới
│       └── UpdateStudentRequest.php      # FormRequest validate khi cập nhật
└── Models/
    └── Student.php                       # Model + Event tự động dọn ảnh storage
resources/views/
├── master.blade.php                      # Layout chính
├── partials/alerts.blade.php             # Component thông báo flash & lỗi
└── students/
    ├── _form.blade.php                   # Form dùng chung (Create/Edit)
    ├── index.blade.php                   # Trang danh sách
    ├── create.blade.php                  # Trang thêm mới
    ├── edit.blade.php                    # Trang chỉnh sửa
    └── show.blade.php                    # Trang chi tiết
```

