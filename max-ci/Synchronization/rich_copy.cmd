rem http://www.techrepublic.com/blog/windows-and-office/how-do-i-use-richcopy-for-high-powered-file-copy-and-transfers/
rem https://www.claudiokuenzler.com/blog/251/windows-file-copy-transfer-robocopy-vs-richcopy#.WNVxxPnyi70
@echo off
"D:\app\RichCopy4.0\RichCopy.exe"    D:\xampp\htdocs\nucleon.dev\wp-content\themes\nucleon  D:\xampp\htdocs\testwp.dev\wp-content\themes\nucleon /FSD /TSD /TSU /CNF /FED ".git,.idea" /QO /QP D:\paket\autobatch\Synchronization\richCopy.log /UC 



rem echo -------İşlem Tamamlandı-----
rem pause