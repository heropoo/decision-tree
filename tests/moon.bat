@echo off

rem -------------------------------------------------------------
rem  Moon console command line bootstrap script for Windows.
rem
rem  @author Heropoo
rem -------------------------------------------------------------

@setlocal

set APP_PATH=%~dp0

if "%PHP_COMMAND%" == "" set PHP_COMMAND=php.exe

"%PHP_COMMAND%" "%APP_PATH%moon" %*

@endlocal