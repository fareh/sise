#!/bin/bash
set -e
cd "`dirname "$0"`"

if [ "$1" == "--symlink" ]; then
    php ./app/console assets:install --symlink -v
else
    php ./app/console assets:install -v
fi

php ./app/console assetic:dump --env=prod --no-debug -v