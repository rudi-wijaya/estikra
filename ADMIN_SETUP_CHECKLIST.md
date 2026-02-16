# Setup Checklist - Admin Panel Bootstrap

Panduan lengkap setup admin panel untuk project Estikra Anda.

## ✅ Step-by-Step Setup

### 1. **Verify Model Structure**

Pastikan `User` model sudah ada dan memiliki atribut berikut:

- `id` (primary key)
- `name` (string)
- `email` (string, unique)
- `password` (string)
- `email_verified_at` (timestamp, nullable)
- `created_at` (timestamp)
- `updated_at` (timestamp)
- `status` (string, optional - untuk active/inactive)

### 2. **Setup Message Model**

Jalankan migration untuk messages jika belum ada:

```bash
php artisan make:model Message -m
```

Di file migration `database/migrations/xxxx_create_messages_table.php`:

```php
Schema::create('messages', function (Blueprint $table) {
    $table->id();
    $table->string('name')->nullable();
    $table->string('email');
    $table->text('message');
    $table->timestamp('read_at')->nullable();
    $table->timestamps();
});
```

Jalankan migration:

```bash
php artisan migrate
```

### 3. **Create Admin Controllers**

Status files sudah dibuat:

- ✅ `app/Http/Controllers/Admin/DashboardController.php`
- ✅ `app/Http/Controllers/Admin/UserController.php`
- ✅ `app/Http/Controllers/Admin/MessageController.php`

### 4. **Setup Routes**

Edit `routes/web.php` dan tambahkan:

```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MessageController;

// ... existing routes ...

// Admin routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);
    Route::post('/messages/{message}/mark-as-read', [MessageController::class, 'markAsRead'])->name('messages.markAsRead');
});
```

### 5. **Check View Files**

Status files sudah dibuat:

- ✅ `resources/views/layouts/admin.blade.php` - Layout utama
- ✅ `resources/views/admin/dashboard.blade.php` - Dashboard
- ✅ `resources/views/admin/users/index.blade.php` - User list
- ✅ `resources/views/admin/users/form.blade.php` - User create/edit
- ✅ `resources/views/admin/users/show.blade.php` - User detail
- ✅ `resources/views/admin/messages/index.blade.php` - Message list
- ✅ `resources/views/admin/messages/show.blade.php` - Message detail

### 6. **Create Admin Middleware (Optional but Recommended)**

```bash
php artisan make:middleware IsAdmin
```

Di `app/Http/Middleware/IsAdmin.php`:

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }

        return abort(403, 'Unauthorized access');
    }
}
```

Register di `app/Http/Kernel.php`:

```php
protected $routeMiddleware = [
    // ... existing middleware ...
    'admin' => \App\Http\Middleware\IsAdmin::class,
];
```

Update routes untuk menggunakan middleware:

```php
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // ... routes ...
});
```

### 7. **Test Admin Panel**

1. Buka browser: `http://localhost:8000/admin/dashboard` (atau port Anda)
2. Anda akan redirect ke login jika belum auth
3. Login dengan akun admin Anda
4. Akses dashboard, user management, dan message management

## 📝 Database Seeding (Optional)

Untuk data dummy, buat seeder:

```bash
php artisan make:seeder AdminSeeder
```

Di `database/seeders/AdminSeeder.php`:

```php
<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@estikra.local',
            'password' => bcrypt('password123'),
            'is_admin' => true,
            'email_verified_at' => now(),
        ]);

        // Create dummy users
        User::factory()->count(10)->create();

        // Create dummy messages if available
        // Message::factory()->count(20)->create();
    }
}
```

Jalankan seeder:

```bash
php artisan db:seed --class=AdminSeeder
```

## 🔒 Security Checklist

- [ ] Add admin middleware to protect admin routes
- [ ] Validate all user inputs
- [ ] Use bcrypt for passwords
- [ ] CSRF token included in forms (automatic di Blade)
- [ ] Add authorization policies if needed
- [ ] Use soft deletes untuk user/message
- [ ] Log admin activities pa untuk audit trail
- [ ] Rate limiting di admin (optional)

## 🎨 Customization Guide

### Mengubah Brand Name

Di `resources/views/layouts/admin.blade.php`, ubah:

```blade
<div class="sidebar-title">
    <i class="bi bi-shield-lock"></i> Your App Name
</div>
```

### Mengubah Sidebar Menu

Di `resources/views/layouts/admin.blade.php`, di section `<ul class="sidebar-menu">`:

```blade
<li>
    <a href="{{ route('admin.new-item') }}" class="{{ request()->routeIs('admin.new-item') ? 'active' : '' }}">
        <i class="bi bi-icon-name"></i>
        <span>Menu Item</span>
    </a>
</li>
```

### Mengubah Warna

Di `resources/views/layouts/admin.blade.php`, ubah `:root` CSS:

```css
:root {
    --sidebar-bg: #YOUR_COLOR;
    --sidebar-hover: #YOUR_HOVER_COLOR;
    --primary-color: #YOUR_PRIMARY_COLOR;
}
```

## 📦 Available Icons

Bootstrap Icons tersedia di: https://icons.getbootstrap.com/

Gunakan format: `<i class="bi bi-icon-name"></i>`

Contoh:

- `bi-house-door` - Home
- `bi-people` - Users
- `bi-chat-dots` - Messages
- `bi-pencil` - Edit
- `bi-trash` - Delete
- `bi-eye` - View
- `bi-plus-circle` - Add

## 🚀 Performance Tips

1. **Optimize Queries**: Gunakan `with()` untuk eager loading relasi
2. **Pagination**: Default 15 items per page, bisa disesuaikan
3. **Caching**: Cache dashboard stats jika needed
4. **Indexing**: Add database index ke fields yang sering di-query

## 🐛 Troubleshooting

### Admin dashboard tidak bisa diakses

- Pastikan authenticated
- Check route registration
- Verify middleware setup

### Styling tidak tampil

- Clear cache: `php artisan cache:clear`
- Compile assets: `npm run build`

### Form validation error

- Check request validation rules di controller
- Verify form inputs name attribute

## 📚 Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Bootstrap Documentation](https://getbootstrap.com/docs/)
- [Bootstrap Icons](https://icons.getbootstrap.com/)

## ✨ Next Features to Add

- [ ] User roles & permissions
- [ ] Activity logging
- [ ] Bulk actions
- [ ] Export to CSV/PDF
- [ ] Advanced search filters
- [ ] Dark mode
- [ ] User avatar upload
- [ ] Recent activity timeline
- [ ] System notifications
- [ ] Admin profile settings

---

**Questions?** Refer to `ADMIN_PANEL_DOCS.md` atau `ADMIN_ROUTES_EXAMPLE.php`
