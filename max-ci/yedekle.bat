@ECHO OFF

rem http://stackoverflow.com/questions/1192476/format-date-and-time-in-a-windows-batch-script
set datetimef=%date%_%time:~0,2%-%time:~3,2%-%time:~6,2%
set datetimef=%datetimef: =0%

ECHO.
SET klasor=%date:~-10,2%.%date:~-7,2%.%date:~-4,4%
SET siliniecek_data=%datetimef%
mkdir "D:\xampp\htdocs\nucleon.dev\backup\%klasor%" 


ECHO sql yedekleme 
ECHO.

"D:\xampp\mysql\bin\mysqldump.exe" --user=root --password= --skip-opt nucleon_dev > "D:\xampp\htdocs\nucleon.dev\wp-content\themes\nucleon\app.sql"  
ECHO  Theme Files  
"C:\Program Files\7-Zip\7z.exe" a -tzip -x!.git -x!node_modules -x!.idea  "D:\xampp\htdocs\nucleon.dev\backup\OneDrive\%klasor%\tema-%datetimef%.zip" "D:\xampp\htdocs\nucleon.dev\wp-content\themes\nucleon\*" -mx5

del "D:\xampp\htdocs\nucleon.dev\wp-content\themes\nucleon\app.sql"



PAUSE