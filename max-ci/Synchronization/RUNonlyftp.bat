@echo off
echo "birde reduxjs yi otomatik oluşturacak bişey olmalı mesela skin generate çalıştıp MaterialDesign.json dosyası ocdi içine kopyalanmalı"
del D:\paket\autobatch\Synchronization\ftp\winscp.log
rem echo "----------CSS/JS Sikiştirma Yapiliyor-----------------"
rem call grunt_run.bat
echo ----------Dosya Kopyalama Yapiliyor-----------------
call rich_copy.cmd
TIMEOUT /T 10 /NOBREAK



echo ----------Ftp ye gonderilecek dosyalar ayriştirliyor -----------------
D:\xampp\php\php.exe -f D:\paket\autobatch\Synchronization\ftp_file_generate.php -- -s run
TIMEOUT /T 2 /NOBREAK
echo ----------Ftp ye gonderilecek dosya taşindi -----------------
copy D:\paket\autobatch\Synchronization\f_t_p_run.txt  D:\paket\autobatch\Synchronization\ftp\f_t_p_run.txt

echo ----------Ftp ye gonderilecek dosya icinde isim degisikligi yapiliyor -----------------
"D:\paket\autobatch\Synchronization\Filerenamer\fnr.exe" --cl --dir "D:\paket\autobatch\Synchronization\ftp" --fileMask "*.*" --excludeFileMask "*.dll, *.exe ,*.png" --includeSubDirectories --showEncoding --find "nucleon.dev" --replace "testwp.dev"

echo ----------Ftp ye gonderilecek dosya icinde hata verenleri temizle adim 1 yapiliyor -----------------
"D:\paket\autobatch\Synchronization\Filerenamer\fnr.exe" --cl --dir "D:\paket\autobatch\Synchronization\ftp" --fileMask "*.*" --excludeFileMask "*.dll, *.exe ,*.png" --includeSubDirectories --showEncoding --find "cd /includes/plugins/ReduxCore/inc/extensions/wbc_importer/wbc_importer/inc" --replace ""

echo ----------Ftp ye gonderilecek dosya icinde hata verenleri temizle adim 2 yapiliyor -----------------
"D:\paket\autobatch\Synchronization\Filerenamer\fnr.exe" --cl --dir "D:\paket\autobatch\Synchronization\ftp" --fileMask "*.*" --excludeFileMask "*.dll, *.exe ,*.png" --includeSubDirectories --showEncoding --find "put D:\xampp\htdocs\testwp.dev\wp-content\themes\nucleon\includes\plugins\ReduxCore\inc\extensions\wbc_importer\wbc_importer\inc\importer" --replace ""

echo ----------Ftp ye gonderilecek dosya icinde hata verenleri temizle adim 3 yapiliyor -----------------
"D:\paket\autobatch\Synchronization\Filerenamer\fnr.exe" --cl --dir "D:\paket\autobatch\Synchronization\ftp" --fileMask "*.*" --excludeFileMask "*.dll, *.exe ,*.png" --includeSubDirectories --showEncoding --find "put D:\xampp\htdocs\testwp.dev\wp-content\themes\nucleon\includes\plugins\ReduxCore\inc\extensions\wbc_importer\wbc_importer\wbc_importer" --replace ""

echo ----------Ftp ye gonderilecek dosya icinde hata verenleri temizle adim 4 yapiliyor -----------------
"D:\paket\autobatch\Synchronization\Filerenamer\fnr.exe" --cl --dir "D:\paket\autobatch\Synchronization\ftp" --fileMask "*.*" --excludeFileMask "*.dll, *.exe ,*.png" --includeSubDirectories --showEncoding --find "put D:\xampp\htdocs\testwp.dev\wp-content\themes\nucleon\includes\plugins\ReduxCore\inc\extensions\wbc_importer\wbc_importer\inc" --replace ""

TIMEOUT /T 2 /NOBREAK
COLOR 4
echo ----------Ftp ye gonderilecek dosya silindi -----------------
del D:\paket\autobatch\Synchronization\f_t_p_run.txt
TIMEOUT /T 1 /NOBREAK

COLOR 2
echo ----------Ftp Dosya GoNDEDriIMI -----------------
call winscp.cmd