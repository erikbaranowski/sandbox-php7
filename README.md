# TestRepo

Install

	install VirtualBox 5.2 https://www.virtualbox.org/
	install Vagrant 2.1.1 https://www.vagrantup.com/
	on Windows 7 SP1 ONLY you will have to update PowerShell to version 3 or above for Vagrant https://docs.microsoft.com/en-us/powershell/scripting/setup/installing-windows-powershell?view=powershell-6
	run cmd as admin
	cd to directory with this repo
	vagrant up

ssh

	install putty https://www.putty.org/
	connect to 192.168.56.2 port 22 as vagrant/vagrant

Initialize

	cd /sandbox
	composer install (installs php 3rd party packages)
	
Test Page

	http://192.168.56.2/info.php (verified working in chrome/firefox)

Development/Debug

	XDebug has already been configured with remote_autostart enabled in the vm
	download Visual Studio Code https://code.visualstudio.com/
	install Visual Studio Code PHP plugins including PHP Debug
	
	Update the launch.json file with pathMappings. "${workspaceRoot}/TestRepo" might need to be set differently depending on the relative path of your workspace to the Visual Studio Code workspace
		{
			"name": "Listen for XDebug",
			"type": "php",
			"request": "launch",
			"port": 9000,
			"pathMappings": {
				"/sandbox": "${workspaceRoot}/TestRepo"
			}
		},

	Set the debugger to Listen for XDebug
	Set a breakpoint and go!
