@ECHO OFF
call revizyon_sil.cmd
rem http://stackoverflow.com/questions/1192476/format-date-and-time-in-a-windows-batch-script
set datetimef=%date%_%time:~0,2%-%time:~3,2%-%time:~6,2%
set datetimef=%datetimef: =0%

ECHO.
SET klasor=%date:~-10,2%.%date:~-7,2%.%date:~-4,4%
SET siliniecek_data=%datetimef%
mkdir "D:\xampp\htdocs\nucleon.dev\backup\OneDrive\sql\%klasor%" 


ECHO sql yedekleme 
ECHO.
"D:\xampp\mysql\bin\mysqldump.exe" --user=root --password= --skip-opt  nucleon_dev > D:\paket\Backup\OneDrive/sql/%klasor%/app.sql"

ECHO  zip  Files  
"C:\Program Files\7-Zip\7z.exe" a -tzip   "D:\paket\Backup\OneDrive\sql\%klasor%\chromatin-sql-%datetimef%.zip" "D:\paket\Backup\OneDrive\sql\%klasor%\app.sql" -mx5


del "D:\paket\Backup\OneDrive\sql\%klasor%\app.sql"

Pause
