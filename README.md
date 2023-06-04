## Laravel Breeze
	1. Install WAMP Server
		-> Apache, Mysql, Php
		-> PHP8.2 or more
		-> include php folder in system path
	2. Composer [getcomposer.org]
	3. NodeJs [Current or LTS]
	4. pnpm
		-> npm i -g pnpm
	
	
## Project
1. Create a new laravel project
	-> Usually command found in laravel.com website 
		[Getting Started / Installation]
		composer create-project laravel/laravel your-project-name
		// Run this command in your project list directory
	-> Run all other commands in your project directory
	-> Open Visual Studio Code in your project folder
		-> Go to your project directory, Right Click and Open Terminal
			-> code . // opens vs code in your project directory
		-> Open VS Code
			-> Open Folder
	
2. Install Starter Kit
	-> Breeze [Found in laravel.com website]
		-> composer require laravel/breeze --dev
	-> Install process
		-> php artisan breeze:install
	-> Install NPM dependencies
		-> pnpm i
		
3. Database Configuration and Migration
	-> .env [Db_Database=your_db]
	-> php artisan migrate
	
4. Run app

5. Database Connection
	-> Create a database model/entity
		-> Select a place to create file
			-> Create Modules directory
				-> Create your module directory [Inventory]
					-> Create an entity folder [Place your database files here]
					-> Create an entity [Category.php]
					-> extends Model [use Illuminate\Database\Eloquent\Model]
						-> select table name
							protected $table = "inv_category";
						-> Document name of the columns
							/**
							 * @property string $name
							 * @property string $code
							 * @property int $id
							 */
				
		->
	-> Create a new migration
		-> php artisan make:migration
			-> add columns to table and rename table
	-> Run migration
		-> php artisan migrate
		
		
# Create Category Page
	-> Create controller
		-> CategoryController.php
			-> app / Http / Controllers
				-> Inventory
					-> CategoryController.php
						-> Generate PHP Class
						-> extends Controller
	-> Routing
		When user visits /inventory/category/add	
			-> Show them category add page
		// routes/web.php
		
		
1. Front End
	-> getbootstrap.com
	
	
## Edit
	1. Create a link which user can click to edit data
		- what link
			- inventory/category/add -- for add
			- inventory/category/edit?categoryId=1
				-> query parameters 
					/AdminSetup/TaxSetup/Edit?id=1
				-> route parameters
					/AdminSetup/TaxSetup/Edit/1
	2. Show the old data to the user in the form
		-> populating the form // populate gareko
	3. Perform update in the database when user submits
	
	
	
1. Any Action
	- Figure out URL
		/inventory/category/edit
		/profile
		/profile-edit
		/profile/edit
	- Figure out controller class
		- app / Http / Controllers
			- Inventory
				- CategoryController.php
			- ProfileController.php
	- Figure out action
		public function Edit()
		{
			// Get Data from database
			// show a view
			return view('inventory.category.edit');
			return view('profile.edit');
			return view('user'); // resources / views / user.blade.php			
		}
	- Create a view
		- resources / views / inventory / category / edit.blade.php
	- Mapping URL or Routing
		- routes/web.php
		- GET OR POST
		Route::get('/inventory/category/edit', [ CategoryController::class, 'Edit' ]);
		
		
		
// POST
	-> 1. Figure out url
			/inventory/category/edit-post
		2. Figure out controller
			CategoryController
		3. Create an action
			public function EditPost()
			{
				return redirect('/inventory/category');
			}
		4. Routing
			Route::post("/inventory/category/edit-post", [ CategoryController.., 'EditPost' 
			
			
