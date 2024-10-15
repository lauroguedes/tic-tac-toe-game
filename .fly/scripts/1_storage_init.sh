#!/usr/bin/env bash

FOLDER=/var/www/html/storage/app
if [ ! -d "$FOLDER" ]; then
    echo "$FOLDER is not a directory, copying storage_bkp content to storage"
    cp -r /var/www/html/storage_bkp/. /var/www/html/storage
    echo "deleting storage_bkp..."
    rm -rf /var/www/html/storage_bkp
fi
