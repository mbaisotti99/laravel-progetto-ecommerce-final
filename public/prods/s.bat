@echo off
setlocal enabledelayedexpansion

:: Cambia estensione se vuoi lavorare con un altro tipo
set ext=jpg

set count=0

for %%f in (*.%ext%) do (
    ren "%%f" "prod_!count!.%ext%"
    set /a count+=1
)

echo Rinominati !count! file.
pause