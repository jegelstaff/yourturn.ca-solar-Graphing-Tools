Installation Instructions:

1. put a copy of all the files in a folder on your server
2. change the root path defined in paths.php so it matches the path to the folder.  ie: if the files are in a folder called "solar" off the root of the domain, then the root path is "/solar".  If the files are in the root of the domain, then the root path should be "".
3. make sure proper permissions are set on the uploads folder so that the web server can write files to that location (possibly 755 or 777 on Linux)

Acknowledgements, inclusions:

This code relies on several other libraries and widgets, in no particular order:

* jQuery - jquery.com
* pChart - pchart.sourceforge.net (note that the version here is a modified copy of the original pChart, not version 2.  The changes are necessary to make the graph features scale properly depending on the size the user selects.)
* uploadify - www.uploadify.com (note, the uploadify.php script has been modified to fix the glaring security hole that uploadify ships with, and they expect you to know how to fix for your particular installation)
* farbtastic - acko.net/dev/farbtastic

--Julian Egelstaff, Toronto, Nov 2011