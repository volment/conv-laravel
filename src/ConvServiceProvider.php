<?php

namespace Howyi\ConvLaravel;

use Howyi\ConvLaravel\Console\ConvGenerateCommand;
use Howyi\ConvLaravel\Console\ConvReflectCommand;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class ConvServiceProvider extends ServiceProvider
{
	/**
	 * @return void
	 */
	public function boot()
	{
		if (!$this->isLumen()) {
			$this->publishes([
				__DIR__ . '/../config/conv.php' => config_path('conv.php'),
			]);
		}
	}

	/**
	 * @return void
	 */
	public function register()
	{
		$this->commands([
            ConvReflectCommand::class,
            ConvGenerateCommand::class,
		]);
	}

	/**
	 * @return bool
	 */
	protected function isLumen()
	{
		return Str::contains($this->app->version(), 'Lumen');
	}
}
