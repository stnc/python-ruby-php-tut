del "D:\xampp\htdocs\nucleon.dev\wp-content\themes\nucleon\.gitignore"
call "revizyon_sil.cmd"
call "live_olustur.bat"
call "yedekle_sql.bat"
msgbox.exe
call "grunt_run.bat"
call "yedekle.bat"
rem call "media_sil.cmd"
PAUSE
ECHO.
PAUSE