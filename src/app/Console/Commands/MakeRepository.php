<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Str;
use InvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;

class MakeRepository extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository';

    /**
     * @var string
     */
    private $baseModelName;

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return resource_path('stubs/repository.stub');
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Repositories\Eloquent';
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name): string
    {
        $stub = parent::replaceClass($stub, $name);
        return str_replace('{{ model_name }}', $this->baseModelName, $stub);
    }

    /**
     * Execute the console command.
     * @throws FileNotFoundException
     */
    public function handle(): bool
    {
        $this->baseModelName = $this->getNameInput();

        $this->input->setArgument('name', $this->baseModelName . 'Repository');

        if (parent::handle() === false && ! $this->option('force')) {
            return false;
        }

        $modelName = $this->parseModel('Models\\' . $this->baseModelName);
        if (!class_exists($modelName) && $this->confirm("A {$modelName} model does not exist. Do you want to generate it?", true)) {
            $this->call('make:model', ['name' => $modelName]);
        }

        $this->call('make:repository-interface', ['name' => $this->baseModelName]);

        return true;
    }

    /**
     * Get the fully-qualified model class name.
     *
     * @param  string  $model
     * @return string
     *
     * @throws InvalidArgumentException
     */
    private function parseModel($model): string
    {
        if (preg_match('([^A-Za-z0-9_/\\\\])', $model)) {
            throw new InvalidArgumentException('Model name contains invalid characters.');
        }

        $model = trim(str_replace('/', '\\', $model), '\\');

        if (! Str::startsWith($model, $rootNamespace = $this->laravel->getNamespace())) {
            $model = $rootNamespace.$model;
        }

        return $model;
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments(): array
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the model to which the repository will be generated'],
        ];
    }
}
