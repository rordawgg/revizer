# Revizr

A fee based framework for collaborating on documents with subject experts. The framework is "GIT like". A subject expert submits a pull request. When pull request to the document is approved by the original author, the revised copy will become the new working version of the document.

### -Unix Install-

#### Prereq's
* PHP >= 5.5.9
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension

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

