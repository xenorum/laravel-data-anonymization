<?php

namespace Arrilot\LaravelDataAnonymization\Commands;

use Illuminate\Support\Composer;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Console\GeneratorCommand;

class MakeAnonymizerCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:anonymizer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new anonymizer class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Anonymizer';

    /**
     * The Composer instance.
     *
     * @var \Illuminate\Support\Composer
     */
    protected $composer;

    /**
     * Create a new command instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @param  \Illuminate\Support\Composer  $composer
     */
    public function __construct(Filesystem $files, Composer $composer)
    {
        parent::__construct($files);

        $this->composer = $composer;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        parent::handle();

        $this->composer->dumpAutoloads();
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/anonymizer.stub';
    }

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        return $this->laravel->databasePath().'/anonymization/'.$name.'.php';
    }

    /**
     * Parse the name and format according to the root namespace.
     *
     * @param  string  $name
     * @return string
     */
    protected function parseName($name)
    {
        return $name;
    }
}
