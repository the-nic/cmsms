<?php
#CMS - CMS Made Simple
#(c)2004 by Ted Kulp (wishy@users.sf.net)
#This project's homepage is: http://cmsmadesimple.sf.net
#
#This program is free software; you can redistribute it and/or modify
#it under the terms of the GNU General Public License as published by
#the Free Software Foundation; either version 2 of the License, or
#(at your option) any later version.
#
#This program is distributed in the hope that it will be useful,
#but WITHOUT ANY WARRANTY; without even the implied warranty of
#MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#GNU General Public License for more details.
#You should have received a copy of the GNU General Public License
#along with this program; if not, write to the Free Software
#Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

#NLS (National Language System) array.

#The basic idea and values was taken from then Horde Framework (http://horde.org)
#The original filename was horde/config/nls.php.
#The modifications to fit it for Gallery were made by Jens Tkotz
#(http://gallery.meanalto.com) 

#Ideas from Gallery's implementation made to CMS by Ted Kulp

#De Deutsch
#Created by: Piratos Jan Czarnowski <czarnowski@coftware.de>
#Maintained by: Ted Kulp <tedkulp@users.sf.net>
#This is the default language

#Native language name
$cms_nls['language']['de_DE'] = 'Deutsch';
$cms_nls['englishlang']['de_DE'] = 'German';

#Possible aliases for language
$cms_nls['alias']['de'] = 'de_DE';
$cms_nls['alias']['deutsch'] = 'de_DE' ;
$cms_nls['alias']['deu'] = 'de_DE' ;
$cms_nls['alias']['de_DE.ISO8859-1'] = 'de_DE' ;

#Encoding of the language
$cms_nls['encoding']['de_DE'] = 'UTF-8';

#Location of the file(s)
$cms_nls['file']['de_DE'] = array(dirname(__FILE__).'/de_DE/admin.inc.php');

#Language setting for HTML area
# Only change this when translations exist in HTMLarea and plugin dirs
# (please send language files to HTMLarea development)

$cms_nls['htmlarea']['de_DE'] = 'de';
?>
