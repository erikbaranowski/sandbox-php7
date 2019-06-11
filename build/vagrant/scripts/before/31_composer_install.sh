#!/usr/bin/env bash

# Set path for composer executable
PATH=$PATH:/usr/local/bin

# composer must be run from the root of the workspace
cd /sandbox

# run composer
composer install --optimize-autoloader