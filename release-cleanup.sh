#!/bin/sh

echo ------------------------------------
echo Running Cleanup Script
echo ------------------------------------

cd locale
sh generatemo.sh
rm -fr *.sh
cd ..

rm -fr CHECKLIST
rm -fr config.php
rm -fr autogen.sh
rm -fr mpd.sql
rm -fr mysql.sql
rm -fr images/*.svg
rm -fr smarty/cms/cache/*
rm -fr smarty/cms/templates_c/*
find -depth -type f -name *.po -exec rm -fr {} \;
find -depth -type d -name .svn -exec rm -fr {} \;
find . -type d -exec chmod 775 {} \;
rm -fr release-cleanup.sh

echo ------------------------------------
echo Done!
echo ------------------------------------
