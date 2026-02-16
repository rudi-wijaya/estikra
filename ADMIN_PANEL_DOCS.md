# Admin Panel Bootstrap - Dokumentasi

Panel admin modern dan minimalis menggunakan Bootstrap 5.3 dengan desain clean dan responsif.

## 📁 Struktur File

```
resources/views/
├── layouts/
│   └── admin.blade.php          # Layout utama admin dengan sidebar
├── admin/
│   ├── dashboard.blade.php      # Halaman dashboard
│   ├── users/
│   │   ├── index.blade.php      # Daftar user dengan tabel & filter
│   │   ├── form.blade.php       # Form create & edit user
│   │   └── show.blade.php       # Detail user
│   └── messages/
│       ├── index.blade.php      # Daftar pesan kontak
│       └── show.blade.php       # Detail pesan
```

## 🎨 Fitur

### Layout Admin (`layouts/admin.blade.php`)

- **Sidebar Navigation**: Menu sidebar yang dapat dikustomisasi
- **Top Navigation**: Bar navigasi atas dengan user profile
- **Responsive Design**: Mobile-friendly dengan toggle sidebar
- **Alert System**: Template untuk success, error, warning, info messages
- **Bootstrap Icons**: Icons dari Bootstrap Icons CDN
- **Custom Styling**: CSS modular dan mudah dikustomisasi

### Dashboard (`admin/dashboard.blade.php`)

- **Stat Cards**: 4 kartu statistik dengan gradient background
- **Recent Users Table**: Tabel user terbaru
- **Recent Messages Table**: Tabel pesan terbaru
- **System Information**: Card informasi sistem

### User Management

#### Index (`admin/users/index.blade.php`)

- Tabel daftar user dengan fitur:
    - Search & filter by role
    - Status badge (Terverifikasi/Pending)
    - Action buttons (View, Edit, Delete)
    - Pagination support

#### Form (`admin/users/form.blade.php`)

- Form create & edit user dengan:
    - Validasi form Bootstrap
    - Info card dengan tips keamanan
    - Informasi user (untuk edit)
    - Status dropdown

#### Show (`admin/users/show.blade.php`)

- Detail profil user dengan:
    - User avatar & info dasar
    - Status verifikasi email
    - Data historis (created/updated)
    - Zona berbahaya (delete action)

### Message Management

#### Index (`admin/messages/index.blade.php`)

- Tabel daftar pesan dengan:
    - Search & filter by status
    - Status badge (Dibaca/Belum Dibaca)
    - Highlight untuk pesan belum dibaca
    - Action buttons

#### Show (`admin/messages/show.blade.php`)

- Detail pesan dengan:
    - Konten pesan yang mudah dibaca
    - Informasi pengirim
    - Status baca
    - Quick actions (Mark as read, Reply, Delete)

## 🔧 Cara Menggunakan

### 1. Setup Routes

Tambahkan route di `routes/web.php`:

```php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MessageController;

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Users
    Route::resource('users', UserController::class);

    // Messages
    Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);
    Route::post('/messages/{message}/mark-as-read', [MessageController::class, 'markAsRead'])->name('messages.markAsRead');
});
```

### 2. Setup Controller

Contoh controller untuk dashboard:

```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'totalMessages' => Message::count(),
            'unreadMessages' => Message::whereNull('read_at')->count(),
            'recentUsers' => User::latest()->take(5)->get(),
            'recentMessages' => Message::latest()->take(5)->get(),
        ]);
    }
}
```

### 3. Setup User Controller

```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%")
                  ->orWhere('email', 'like', "%{$request->search}%");
        }

        if ($request->role) {
            $query->where('role', $request->role);
        }

        $users = $query->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'status' => 'required|in:active,inactive',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.form', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->password) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus');
    }
}
```

### 4. Setup Message Controller

```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $query = Message::query();

        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%")
                  ->orWhere('email', 'like', "%{$request->search}%");
        }

        if ($request->status == 'read') {
            $query->whereNotNull('read_at');
        } elseif ($request->status == 'unread') {
            $query->whereNull('read_at');
        }

        $messages = $query->latest()->paginate(15);

        return view('admin.messages.index', compact('messages'));
    }

    public function show(Message $message)
    {
        // Mark as read
        if (!$message->read_at) {
            $message->update(['read_at' => now()]);
        }

        return view('admin.messages.show', compact('message'));
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success', 'Pesan berhasil dihapus');
    }

    public function markAsRead(Message $message)
    {
        $message->update(['read_at' => now()]);

        return back()->with('success', 'Pesan ditandai sudah dibaca');
    }
}
```

## 🎯 Customization

### Mengubah Warna

Edit file `layouts/admin.blade.php` pada bagian `:root`:

```css
:root {
    --sidebar-bg: #2c3e50; /* Warna sidebar */
    --sidebar-hover: #34495e; /* Warna hover sidebar */
    --primary-color: #3498db; /* Warna primary */
}
```

### Menambah Menu Sidebar

Edit di `layouts/admin.blade.php`:

```blade
<li>
    <a href="{{ route('admin.new-menu') }}" class="{{ request()->routeIs('admin.new-menu') ? 'active' : '' }}">
        <i class="bi bi-icon-name"></i>
        <span>New Menu</span>
    </a>
</li>
```

### Mengubah Sidebar Width

Di `layouts/admin.blade.php` ubah:

```css
.sidebar {
    width: 280px; /* Ubah nilai ini */
}

.main-content {
    margin-left: 280px; /* Harus sama dengan sidebar width */
}
```

## 📱 Responsive Breakpoints

- **Desktop**: > 768px (sidebar fixed, full layout)
- **Tablet/Mobile**: ≤ 768px (sidebar toggle, responsive)

## 🔒 Security Tips

1. Selalu tambahkan middleware `auth` dan `admin` untuk route admin
2. Gunakan policy untuk authorization
3. Validate semua input dari user
4. Gunakan CSRF token (sudah included di form)
5. Encrypt sensitive data

## 📦 Dependencies

- **Bootstrap 5.3.0**: CSS Framework CDN
- **Bootstrap Icons 1.11.0**: Icon Set CDN
- **Laravel 10+**: Framework

## 🚀 Next Steps

1. Setup database & migration untuk Message model jika belum ada
2. Ensure User model punya relasi dengan Message
3. Setup middleware `admin` untuk authentication
4. Create Admin policy untuk authorization
5. Customize styling sesuai brand Anda
6. Tambahkan fitur-fitur tambahan sesuai kebutuhan

## 📝 License

Free to use and modify for your project.
