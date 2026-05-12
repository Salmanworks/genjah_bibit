@echo off
echo === Memperbaiki Storage Images ===
echo.

:: Hapus folder storage/products lama
echo 1. Menghapus folder storage/products lama...
if exist "public\storage\products" (
    rmdir /s /q "public\storage\products"
    echo    Folder lama dihapus
)

:: Buat folder baru
echo 2. Membuat folder storage/products...
mkdir "public\storage\products" 2>nul
echo    Folder dibuat

:: Copy semua gambar
echo 3. Mengcopy gambar dari storage...
xcopy /s /e /y "storage\app\public\products\*" "public\storage\products\" >nul 2>&1

:: Clear cache Laravel
echo 4. Clear cache Laravel...
php artisan cache:clear >nul 2>&1
php artisan config:clear >nul 2>&1
php artisan view:clear >nul 2>&1
echo    Cache cleared

:: Hitung jumlah file
echo 5. Verifikasi...
for /f %%a in ('dir /b "public\storage\products" ^| find /c /v ""') do set count=%%a
echo    %count% file gambar berhasil dicopy

echo.
echo === SELESAI ===
echo Silakan refresh halaman admin panel.
pause
