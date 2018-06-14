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
	composer install to install php 3rd party packages
	
Test page (works in firefox)

	http://192.168.56.2/info.php