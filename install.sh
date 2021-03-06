#!/bin/bash
set -e
cd "`dirname "$0"`"

if [ ! -f composer.phar ]; then
    curl -s http://getcomposer.org/installer | php
fi

php composer.phar install

rm -rf app/cache/* app/logs/*

if [ "$1" == "--symlink" ]; then
    ./app/console assets:install --symlink -v
else
    ./app/console assets:install -v
fi

./app/console doctrine:database:drop --force -v || true
./app/console doctrine:database:create -v
./app/console doctrine:schema:create -v
#./app/console doctrine:fixtures:load --fixtures=vendor/pum/core-bundle/Pum/Bundle/CoreBundle/DataFixtures/ORM/Config --fixtures=vendor/pum/app-bundle/Pum/Bundle/AppBundle/DataFixtures/ORM --append -v
./app/console assetic:dump --env=prod --no-debug -v