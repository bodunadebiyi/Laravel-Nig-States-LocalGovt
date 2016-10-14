# Laravel-Nig-States-LocalGovt
A Laravel Package that populates your database with all the states in the Nigeria and their corresponding local governments.

## Setup
- Include package in your project by running `composer require bodunde/states-and-local-govt`
- Add `Bodunde\SLG\SLGServiceProvider::class` to provider in `app.php` under `config` directory
- Publish package resources by running `php artisan vendor:publish`. Running this command would publish models, migrations and seeders.
- Run published migrations `php artisan migrate`
- Regenerate your autoload files `composer dump-autoload`
- Run published database seeders `php artisan db:seed --class=SlgTableSeeder`

## Usage
- Import models into your controllers


**Note: If your root namespace in your application isn't `app` make sure you go to the models and modify the namespace**

```php
...
use App\State;
use App\LocalGovt;

...
...
// fetch all states
$states = State::all();

// fetch state by id
$state = State::find($id) // where $id = 1

// fetch state by name
$state = State::findByName("Lagos State");

//get state local governments
$lg = $state->localGovernments;

// get all local governments
$lgs = LocalGovt::all();

// fetch local government by id
$lg = LocalGovt::find($id) // where $id = 1

// fetch local government state
$state = $lg->state;

```