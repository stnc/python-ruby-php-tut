@echo off
"D:\paket\autobatch\Synchronization\Filerenamer\fnr.exe" --cl --dir "D:\xampp\htdocs\testwp.dev\wp-content\themes\nucleon\ocdi" --fileMask "*.*" --excludeFileMask "*.dll, *.exe" --includeSubDirectories --showEncoding --find "coreon.localhost" --replace "coreon.chromthemes.com"

rem pause