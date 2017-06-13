<?php
use Sami\Sami;
use Symfony\Component\Finder\Finder;
use Sami\Version\GitVersionCollection;

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->in($dir = 'app/')
;


return new Sami($iterator, array(

    'title'                => 'Inventory API',
    'build_dir'            => __DIR__.'/sami/build/sf2/%version%',
    'cache_dir'            => __DIR__.'/sami/cache/sf2/%version%',
    'default_opened_level' => 2,
));
