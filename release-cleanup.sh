#!/bin/sh

echo ------------------------------------
echo Running Cleanup Script
echo ------------------------------------

sh autogen.sh

rm -fr CHECKLIST
rm -fr config.php
rm -fr autogen.sh
rm -fr mpd.sql
rm -fr mysql.sql
rm -fr makedoc.sh
rm -fr cleardb.sh
rm -fr generatedump.php
rm -fr images/cms/*.svg
#rm -fr tmp/cache/*
#rm -fr tmp/templates_c/*
rm -fr admin/lang/*.sh
rm -fr admin/lang/*.pl
rm -fr modules/LinkBlog
rm -fr modules/HTMLArea
rm -fr modules/PngTransparencyIE
rm -fr modules/PermaLinks
rm -fr modules/faqX
rm -fr modules/FCKeditor
find -depth -type d -name .svn -exec rm -fr {} \;
find . -type d -exec chmod 775 {} \;
rm -fr release-cleanup.sh

echo ------------------------------------
echo Done!
echo ------------------------------------
