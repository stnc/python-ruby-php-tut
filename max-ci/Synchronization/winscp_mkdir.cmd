rem echo ----------Rich Copy Çalıştırılıyor -----------------
rem call "rich_copy.cmd"
echo ----------Ftp ye gonderilecek dosyalar ayriştirliyor -----------------

rem bu kısım test yapamk için kullanılıyor 
rem del D:\paket\autobatch\Synchronization\richCopy.log
rem copy D:\paket\autobatch\Synchronization\richCopy_2.log  D:\paket\autobatch\Synchronization\richCopy.log

mkdir_uyari.vbs
rem D:\xampp\php\php.exe -f D:\paket\autobatch\Synchronization\ftp_file_generate.php -- -mkdir mkdir_for
copy D:\paket\autobatch\Synchronization\mkdir_file.txt  D:\paket\autobatch\Synchronization\ftp\mkdir_file.txt
del D:\paket\autobatch\Synchronization\mkdir_file.txt
"D:\paket\autobatch\Synchronization\Ftp\winscp.com" /script=ftp\mkdir_file.txt /ini=nul /log=ftp\winscp-mkdir.log
pause