#!/bin/bash
set -e
cd "`dirname "$0"`"
echo "Utilisateur : `whoami`"

rm -rf app/cache/* app/logs/*

./app/console cache:clear
./app/console cache:clear --env=prod