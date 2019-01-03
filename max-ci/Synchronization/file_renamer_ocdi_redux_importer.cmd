@echo off
"D:\paket\autobatch\Synchronization\Filerenamer\fnr.exe" --cl --dir "D:\xampp\htdocs\testwp.dev\wp-content\themes\nucleon\includes\plugins\ReduxCore\inc\extensions\wbc_importer\demo-data" --fileMask "*.*" --excludeFileMask "*.dll, *.exe ,*.png" --includeSubDirectories --showEncoding --find "coreon.localhost" --replace "coreon.chromthemes.com"

rem pause