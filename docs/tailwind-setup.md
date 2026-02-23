# Tailwind CSS Setup - Estikra

Proyek telah dikonfigurasi untuk menggunakan **Tailwind CSS saja** tanpa Bootstrap, Alpine.js, atau Axios.

## Konfigurasi

### 1. Dependencies

- ✅ **Tailwind CSS** (v3.1.0) - Utility-first CSS framework
- ✅ **Tailwind CSS Forms** - Form styling
- ✅ **Tailwind CSS Vite** - Vite plugin untuk Tailwind
- ✅ **Laravel Vite Plugin** - Integration dengan Laravel
- ✅ **PostCSS** & **Autoprefixer** - CSS processing

### Removed

- ❌ Alpine.js (tidak diperlukan)
- ❌ Axios (tidak diperlukan)
- ❌ Concurrently

## Files yang Diubah

1. **[resources/css/app.css](resources/css/app.css)**
    - @tailwind directives untuk semua utilities
    - Custom animation utilities

2. **[resources/js/app.js](resources/js/app.js)**
    - Hanya menampilkan log untuk Tailwind
    - Tidak ada dependencies eksternal

3. **[resources/views/layouts/public.blade.php](resources/views/layouts/public.blade.php)**
    - Semua styling menggunakan Tailwind classes
    - Custom CSS hanya untuk special animations

4. **[tailwind.config.js](tailwind.config.js)**
    - Konfigurasi optimal untuk Laravel
    - Content paths sudah benar

5. **[vite.config.js](vite.config.js)**
    - Input: CSS dan JS saja
    - Refresh enabled untuk live reload

6. **[package.json](package.json)**
    - Dependencies di-optimasi
    - Hanya package yang diperlukan

## Setup Awal

Setelah perubahan ini, jalankan:

```bash
npm install
npm run dev
```

## Cara Menjalankan

### Development

```bash
npm run dev
```

Akses: `http://localhost:5173`

### Production Build

```bash
npm run build
```

## Tailwind Utilities yang Digunakan

### Spacing

- `p-*` (padding), `m-*` (margin)
- `gap-*` (grid/flex gap)
- `py-*`, `px-*` (vertical/horizontal)

### Colors

- `bg-blue-*` (backgrounds)
- `text-*` (text colors)
- `border-*` (border colors)

### Layout

- `flex`, `grid`, `block`, `hidden`
- `md:*` (medium breakpoint)
- `sm:*` (small breakpoint)

### Effects

- `hover:*` (hover states)
- `transition-*` (smooth transitions)
- `shadow-*` (box shadows)
- `rounded-*` (border radius)

### Typography

- `text-*` (font sizes)
- `font-*` (font weights)
- `leading-*` (line height)

## Breakpoints (Responsive)

- `sm`: 640px
- `md`: 768px
- `lg`: 1024px
- `xl`: 1280px
- `2xl`: 1536px

Contoh: `md:flex` = `display: flex` pada screen 768px+

## Custom Animations

Beberapa custom animations tersedia di `resources/css/app.css`:

- `.animate-fadeInUp` - Fade in dari bawah
- `.animate-fadeInUp-delay-200` - Dengan delay 200ms
- `.animate-fadeInUp-delay-400` - Dengan delay 400ms

## No More CSS Files

Tidak perlu membuat file CSS terpisah. Gunakan Tailwind classes langsung di HTML:

```blade
<!-- ✅ Benar -->
<div class="bg-blue-500 text-white p-4 rounded-lg hover:bg-blue-600 transition-colors">
    Content
</div>

<!-- ❌ Hindari -->
<div class="custom-class">
    Content
</div>
<!-- dengan CSS terpisah -->
```

## Tips

1. **Intellisense**: Install "Tailwind CSS IntelliSense" di VS Code
2. **Purging**: Unused classes otomatis dihapus di production build
3. **Custom Colors**: Tambah di `tailwind.config.js` jika perlu warna custom
4. **Dark Mode**: Bisa diaktifkan di `tailwind.config.js`

## Resources

- [Tailwind CSS Docs](https://tailwindcss.com/docs)
- [Tailwind UI Components](https://ui.tailwindcss.com)
- [Tailwind CSS Cheat Sheet](https://tailwindcss.com/docs/container)
