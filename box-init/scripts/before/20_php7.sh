#!/usr/bin/env bash

rpm --import /etc/pki/rpm-gpg/RPM-GPG-KEY*
yum -y install epel-release
rpm -Uvh http://rpms.remirepo.net/enterprise/remi-release-7.rpm
yum -y install yum-utils
yum update
yum-config-manager --enable remi-php72
yum -y install php php-opcache