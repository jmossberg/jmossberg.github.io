#!/bin/sh

CWD=`pwd`
xterm -e "sh -c 'cd $CWD && jekyll serve --drafts'" &
