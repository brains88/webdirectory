<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Website;

class WebsiteFactory extends Factory
{
    protected $model = Website::class;

    public function definition()
    {
        return [
            'name' => $this->faker->domainName,
            'url' => $this->faker->url,
            'votes' => $this->faker->numberBetween(0, 1000),
        ];
    }
}