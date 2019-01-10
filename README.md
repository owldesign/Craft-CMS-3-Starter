![Starter Logo](https://s3-us-west-2.amazonaws.com/od-cdn/craft-cms-starter/website-login-logo.png)

![Craft CMS](https://poser.pugx.org/craftcms/cms/v/stable)

# Craft CMS 3 Starter

**This is a quick starter boilerplate for Craft CMS 3 projects.** 

## Whats Included
* [Craft CMS 3.1 Beta](https://craftcms.com/blog/craft-3-1-beta)
* Starter Module
* Laravel Mix
* SASS
* Heroku required files (if you want to deploy to Heroku)

## Project Config
Craft's `project.yaml` is enabled by default. So any db changes will be saved and can be synced in staging & production. Note: if you make changes on production DB it will not sync back to `project.yaml` because this is disabled by default. Check `config/general.php` for details.

## Usage
* `git clone https://github.com/owldesign/Craft-CMS-3-Starter.git projectname`
* `composer install` - Install craft dependencies
* `yarn install` - Install dev tools

## Development
* `yarn watch` - Run preprocessor for js (babel) and scss files, or
* `yarn production:watch` - To watch and minitify files
* Edit scss + js files located in `/development/scss` and `/development/js`

## Production
* `yarn production` - Compiles and minifies js and css files

## Heroku

There is a `app.json`, `nginx_app.conf`, and ` Procfile` included to deploy to Heroku. 

## Starter Module
This repo comes with starter module that allows you to customize some of the admin/site styles. There are also some handy utilities. 

## Issues
You maybe have issues installing `ext-imagick` php extension while running `composer install`. Follow these instructions to resolve it.

* `pecl channel-update pecl.php.net` update pecl (you need pecl to install imagick)
* `brew reinstall imagemagick`
* `brew reinstall autoconf`
* `pecl install imagick`
* If script didn't add automatically you may need to place `extension=imagick.so` in your `/usr/local/etc/php/[php version]/php.ini`

## Latest Tested On

* PHP 7.30
* MySQL 8.0.12
* GD 7.3.0
* Craft Pro 3.1.0-beta.6
* Yii Version 2.0.15.1
* Twig Version 2.6.0
* Guzzle Version 6.3.3


## Roadmap

* Work on Starter module