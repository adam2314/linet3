 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3.0
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.


linet3
======

www.linet.org.il
Linet accounting system

you need a PHP, Mysql, Apache servers.

to install from the source clone first(into your web root):
```sh
git clone https://github.com/adam2314/linet3.git
```

then cd into the protected folder and run
```sh
curl -sS https://getcomposer.org/installer | php
```

and install missing packages
```sh
./composer.phar update
```
it will sound dumb but now run(again)
```sh
./composer.phar update
```

you should now be able to access your Linet installtion