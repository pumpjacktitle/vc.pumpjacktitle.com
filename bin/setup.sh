#!/bin/bash

echo "Updating Permissions on Filesystem: \n"
chmod -R 777 app/storage app/config public/assets

echo " -- Permissions Updated"
echo "\n\n"
echo "Updating Git to Ignore Permission Changes..."
git config core.filemode false
echo " -- Git Updates"
