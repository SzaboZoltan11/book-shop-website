@echo off
reg add HKEY_CLASSES_ROOT\game /t REG_SZ /d "My beautiful game" /f
reg add HKEY_CLASSES_ROOT\game /v "URL Protocol" /t REG_SZ /d "" /f
reg add HKEY_CLASSES_ROOT\game\shell /f
reg add HKEY_CLASSES_ROOT\game\shell\open /f
reg add HKEY_CLASSES_ROOT\game\shell\open\command /t REG_EXPAND_SZ /d "%ComSpec% /C \"cd /D \"D:\shop\desktop\bin\Debug\net8.0-windows\" ^& WinFormsApp1.exe %1\"" /f
pause
