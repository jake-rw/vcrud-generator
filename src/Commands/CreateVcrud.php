<?php
namespace Jakerw\VcrudGenerator\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;


class CreateVcrud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:vcrud {model}'; // Consider adding some options for Model View Controller


    ## Model
    #
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create cms crud and views';
    
    /** @var string */
    protected $viewsDir;

    /** @var array */
    protected $viewBlades;

    //protected $model;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();      
        $this->viewBlades = [
            'list',
            'show'
            'edit',
            'create'
        ];
        
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       
        $this->viewsDir = getcwd().'/resources/views/backend/' . $this->getModelDir();
        //Create model and migration
        $this->createModel();
        
        //Create controller
        $this->createController();

        //Create route
        $this->createRequests();

        //Create folders and blades
        $this->createViews();

        //Create route
        $this->createRoute();

    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getModel()
    {
        return 'Models/' . $this->_getModel();
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function _getModel()
    {
        return Str::studly(class_basename(trim($this->argument('model'))));
    }

    protected function getModelDir()
    {
        return strtolower($this->_getModel());        
    }

    /**
     * Get the desired controller name with pathfrom the input.
     *
     * @return string
     */
    protected function getController()
    {
        return 'Backend/' . Str::studly(class_basename(trim($this->argument('model'))));
    }

    /**
     * Create a model with migratiom.
     *
     * @return void
     */
    protected function createModel()
    {
        $this->call('make:model', [
            'name' => $this->getModel(),
            '--migration' => $this->getModel(),
        ]);
    }

    /**
     * Create a controller for the model.
     *
     * @return void
     */
    protected function createController()
    {
        $controller = $this->getController();
        
        $this->call('make:controller', [
            'name' => $this->getController()."Controller",
            '--model' => $this->getModel(),
        ]);
    }

    protected function createRequests()
    {
        
        $requests = array(
            'Add',
            'Edit'
        );

        foreach ($requests as $request) {
             $this->call('make:request', [
                'name' => 'Admin/' . $this->_getModel() . '/' . $request.$this->_getModel(),
            ]);
        }
       
    }

    protected function createViews()
    {
        $this->createDirectory($this->viewsDir);
        $this->createView($this->viewBlades);
    }

    protected function createDirectory($baseDir)
    {
        if (! file_exists($baseDir)) {
            mkdir($baseDir, 0777, true);
        }
    }

    protected function createView($views)
    {
        if( is_array($views) ) {
            foreach ($views as $view) {                
                $this->createFile($view);
            }
        }
    }

    protected function createFile($file)
    {
        $fullPath = $this->viewsDir . '/' . $file . '.blade.php';

        if (file_exists($fullPath)) {
            $this->error('File already exists: ' . $fullPath);
            return false;
        }

        file_put_contents($fullPath, $this->getContent($file));

        $this->info('File created: ' . $fullPath);
    }

    protected function getContent($file)
    {
        if (empty($file)) {
            $file = 'blank';
        }

        $content = '';       

        $template = file_get_contents(__DIR__."/../Templates/Backend/{$file}.php");

        $_content = preg_replace('/\{\{([\s]?\$model)[\s]?\}\}/', $this->_getModel(), $template);
        $__content = preg_replace('/\{\{([\s]?\$route)[\s]?\}\}/', $this->getModelDir(), $_content);
        $content .= preg_replace('/\{\{([\s]?\$routes)[\s]?\}\}/', Str::plural($this->getModelDir()), $__content);

        return $content;
    }

    protected function createRoute()
    {
        $name = $this->getModelDir();
        $controller = $this->getController()."Controller";
        $this->info("Create route with the following Route::resource('$name', '$controller');" );
    }
}
