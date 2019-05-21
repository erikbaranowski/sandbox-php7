# sandbox-php7

## About

This repository holds the configuration and instructions for hosting a php7 development sandbox.

Currently running PHP 7.3 on CentOS 7.6

## Install

1. install [VirtualBox 5.2.30](https://www.virtualbox.org/)
2. install [Vagrant 2.2.4](https://www.vagrantup.com/)
3. on Windows 7 SP1 ONLY you will have to update [PowerShell](https://docs.microsoft.com/en-us/powershell/scripting/setup/installing-windows-powershell?view=powershell-6) to version 3 or above for Vagrant
4. run cmd as admin
5. cd to directory with this repo
6. `vagrant up`

## ssh

1. install [putty](https://www.putty.org/)
2. connect to 192.168.56.2 port 22 as vagrant/vagrant

## Initialize php packages

`composer install`
- run from default directory /sandbox

## Test Page

http://192.168.56.2/test
- verified working in chrome/firefox

http://192.168.56.2/info
- verified working in chrome/firefox

## Unit Tests

`phpunit`
- there is an alias in the .bash_profile so that you can run phpunit from any directory

`phpunit-coverage` 
- there is an alias in the .bash_profile so that you can run phpunit from any directory
- See /sandbox/docs/index.html for results

## Development/Debug

XDebug has already been configured with remote_autostart enabled in the vm (/etc/php.d/xdebug.ini)

1. install [Visual Studio Code](https://code.visualstudio.com/)
2. install Visual Studio Code PHP plugins including PHP Debug
3. Update the launch.json file with pathMappings. "${workspaceRoot}/sandbox-php7" might need to be set differently depending on the relative path of your workspace to the Visual Studio Code workspace
```json
{
	"name": "Listen for XDebug",
	"type": "php",
	"request": "launch",
	"port": 9000,
	"pathMappings": {
		"/sandbox": "${workspaceRoot}/sandbox-php7"
	}
}
```
4. Set the debugger to Listen for XDebug
5. Set a breakpoint and go!
