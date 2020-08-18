<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Str;
use InvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;

class MakeRepositoryInterface extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository-interface {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository interface';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository interface';

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
        return resource_path('stubs/repository.interface.stub');
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Repositories';
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

        $this->input->setArgument('name', $this->baseModelName . 'RepositoryInterface');

        return !(parent::handle() === false && !$this->option('force'));
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
