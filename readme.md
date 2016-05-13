# Revizr

A fee based framework for collaborating on documents with subject experts. The framework is "GIT like". A subject expert submits a pull request. When pull request to the document is approved by the original author, the revised copy will become the new working version of the document.

### -Unix Install-

#### Install Prereq's
* PHP >= 5.5.9
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension

#### Install
1. Navigate to your projects directory.
2. Clone Repository `git clone https://ace2323@bitbucket.org/revizr/revizr.git`
3. Navigate to repository.
4. Install dependencies: `composer install` 
5. Copy .env file: `cp .env.example .env`
6. Create App Key: `php artisan key:generate`
7. Update database credentials in .env file.
8. Migrate database: `php artisan migrate`
9. (Opt) Seed Database: `php artisan db:seed`
10. Run Website: `php artisan serve`

### -Windows Install-
​
> NOTE: Composer Installer needs PHP installed before running the Composer Install. The Composer Installer will be looking for `php.exe` and setting environmental variables during the install process.
>> The easiest way to accomplish this is to install a web development environment.

>> Examples of these environments are: [WAMPSERVER](http://www.wampserver.com/en/) or [MAMP](https://www.mamp.info/en/downloads/).
​
#### Install

1. [Get Composer](https://github.com/composer/windows-setup#About) and follow the install instructions.

2. Run `Composer-Setup.exe`

 **NOTE:** After installation of Composer completes, you may have to restart any terminals or command prompt windows open because PATH variables will be updated.

3. Download and unzip repo.

 **Without Git Installed**

 [Download](https://bitbucket.org/revizr/revizr/downloads) zip file, unzip contents to desired location.

 **With Git Installed**

 `git clone https://ace2323@bitbucket.org/revizr/revizr.git`

4. Change to the unzipped directory
5. Install dependencies: `composer install`
6. Copy or rename `.env.example` to a file named `.env`
7. Create App Key: `php artisan key:generate`
7. Update database credentials in .env file.
8. Migrate database: `php artisan migrate`
9. (Opt) Seed Database: `php artisan db:seed`
10. Run Website: `php artisan serve`