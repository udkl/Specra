////////////////////////////////////////////////////

Y A H O O   B O S S  S E A R C H  1 . 0 . 1
//////////////////////////////////////////////////

System Requirement:

PHP Version 5.2 or higher

CURL : You can get cURL here 

You can get libcURL here http://curl.haxx.se/

Linux : To use PHP's cURL support you must also compile PHP --with-curl[=DIR] where DIR is the 
location of the directory containing the lib and include directories. In the "include" directory 
there should be a folder named "curl" which should contain the easy.h and curl.h files. 
There should be a file named libcurl.a located in the "lib" directory. 

Windows : In order to enable this module on a Windows environment, libeay32.dll and ssleay32.dll 
must be present in your PATH. 

Windows with Apache: Uncomment this line (extension=php_curl.dll) in php.ini and restart apache

Now place all files in your web folder or in any folder under web folder.

Sign up and generate Yahoo API key from here http://developer.yahoo.com/search/boss/

Open boss.php and edit this line $bs->setAPI('Your Yahoo API key');

Your application is ready to go


