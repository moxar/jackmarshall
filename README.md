# Dependancies

In order to participate, you might need the following programs

* php > 5.3
* nodejs
* gulp
* bower
* Nginx/Apache
* git
* mysql

# Install your environment (Windows - for newbies)

If you are working on windows and have absolutely no idea of how to install the listed programs, follow this guide.

## 1. Install Cygwin

Cygwin is a terminal for windows which provides some very useful tools from Linux. 
You can find it [here](https://www.cygwin.com/).  Don't install it after download since you will set up this
program to come along with other tools.

## 2. Install Git

Git is a version control system. It allows you to keep trace of the previous versions of the code you produced, 
to work on different versions/releases of a same project, etc. Jackmarshall is a git project, so you will a git 
client to participate the project.

Once Cygwin has been downloaded, run setup.exe to install it. During the installation process, 
choose a custom installation and search for "git" in the plugin/modules. Tick the checkbox, and git will
be shiped with Cygwin and the required dependancies.

To ensure Git is properly installed, type

```bash
$ git -v
```

## 3. Install Nodejs

Nodejs is a javascript server. It allows you to run scripts that jackmarshall uses during deployment.
You can find Nodejs [here](https://nodejs.org/). Download and install it.

To ensure Node is properly installed, type

```bash
$ node -v
```

### 3.1 Install Gulp

Gulp is a tool that will ease your developper's life. It automates the concatenation of the styles and scripts, 
obfuscates them, moves them from a directory to another, etc. You can make your own `gulpfile.js` but we suggest you
use the file provided in this repository.

To install gulp, run 

```bash
$ npm install -g gulp-cli
...
$ npm install -g gulp
```

* `gulp-cli` is for *console line interface*, which allows you to use gulp on your terminal (Cygwin, cmd...)
* the `-g` option installs gulp as a global module, making it accessible from every project.

### 3.2 Install Bower

Bower is a package manager for front end libraries. to install it, run

```bash
$ npm install -g bower
```

## 4. Install WAMP

In order to make Jackmarshall work, you will need a webserver on your computer.
Wamp is for *Windows Apache MySQL PHP*. It's a package containing those four programs and an out of the
box configuration.
* The Apache component is the webserver
* The MySQL component is a database, where you store your data. Jackmarshall uses Sqlite for now, but we intend to migrate
toward a MySQL solution.
* PHP is a program which interprets code written in .php files. Without PHP, you can't execute any .php script.

## 5. Install Composer

Just like Gulp is a front-end package manager, composer is a PHP package manager. You can get it [here](https://getcomposer.org/).
Follow the instructions on this site and ensuire composer is properly installed by running:

```bash
composer
```

If the command is not found, try 

```bash
php composer
```

Again, if it fails, composer was not properly installed. If it works, you need to move composer somewhere 
in your `PATH`, add composer to your `PATH`, or alias `composer` with `php composer` in your `.bashrc` file.

## 6. Create your github account

Create a github account [here](http://github.com/). Then you will need a ssh key for each device you use.
In Cygwin, type

```bash
$ ssh-keygen
```

Press enter to all requests, and a key will be generated. Then type

```bash
$ cat ./ssh/id_rsa.pub
```

Copy the output. Go to your github account, go to *SSH keys*, add a new key and past it in the textarea.
Save, and your SSH key will be linked to your github account.

## 7. Fork the project

The only way to contribute this project is by pull-requests. So you need
to fork the project, make it evolve on your side, and propose evolutions by making pull requests. Once a pull request is made, 
I will accept it or explain why it has been denied and propose you enhancements to make it acceptable.

Once the project is forked, go to Cygwin and run

```bash
$ git clone git@github.com/<username>/jackmarshall.git
```

The project will be cloned on your computer.

## 8. Configure WAMP and hosts

Let's assume your jackmarshall folder is `c:/Cygwin/home/Moxar/jackmarshall/`.
Open your `c:/windows/system32/driver/etc/hosts` file and add this line:

```
127.0.0.1 jackmarshall.dev
```

The open your `c:/Program Files(x86)/wamp/bin/apache/Apache2.x.y/conf/httpd.conf`
Search for the line 

```
# Virtual hosts
# Include conf/extra/httpd-vhosts.conf
```

and change the block to

```
# Virtual hosts
# Include conf/extra/httpd-vhosts.conf
Include conf/extra/jackmarshall.dev.conf
```

You will now include the jackmarshall.dev.conf file to your apache configuration.

Now, create the file `c:/Program Files(x86)/wamp/bin/apache/Apache2.x.y/conf/extra/jackmarshall.dev.conf`
with this content:

```
<VirtualHost *:80>   
	DocumentRoot "c:/Cygwin/home/Moxar/jackmarshall/public/" 
	ServerName jackmarshall.dev
	<Directory c:/Cygwin/home/Moxar/jackmarshall/public/>
		Require all granted
		
		Options +FollowSymLinks
		RewriteEngine On

		RewriteCond %{REQUEST_FILENAME} !-d
		RewriteCond %{REQUEST_FILENAME} !-f
		RewriteRule ^ index.php [L]
	</Directory>
</VirtualHost>
```

Finaly, open your WAMP manager, and ensure the Apache module mod_rewrite is enabled.
Restart WAMP, open a browser and go to *http://jackmarshall.dev/*. There should be something.

## 9. Deploy the project

Now that your hosts are configured, you need to deploy the project, which means download all 3th-part libraries
and process the scripts. Open cygwin, go to your project's directory and type

```bash
composer update
...
bower install
...
gulp vendors
...
gulp
...
gulp watch
```

* `composer update` will download the PHP dependancies of the project
* `bower install` will download the js/css dependancies of the project
* `gulp vendors` will "compile" your 3rd-parts scripts and styles into a public/vendors.js file
* `gulp` will "compile" the scripts in assets/js into a public/app.js file, and the styles in assets/less into a public/app.css file.
* `gulp watch` will survey the js and less directories and re-compile them every time a modification happens in one of their files.

If you want to add another 3rd-part library, install it via bower

```
$ bower install my-awesome-lib -s
...
gulp vendors
```

* Use `-s` to save this library in the bower.json file.
* Use `gulp vendors` to re-compile the 3rd-parts styles and scripts since you have a new one.

# Conclusion

Everything should work fine. Happy dev!
