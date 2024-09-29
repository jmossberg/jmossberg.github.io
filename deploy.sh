#!/bin/sh

rsync -avz --delete _site/ jacobmossberg.se@ssh.jacobmossberg.se:/www/
