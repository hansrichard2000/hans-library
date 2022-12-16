<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collection>
 */
class CollectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'collectionCode' => fake()->text(maxNbChars: 7),
            'collectionName' => fake()->sentence(nbWords: 2),
            'collectionAuthor' => fake()->name(),
            'collectionPublishYear' => fake()->year(),
            'collectionDesc' => collect($this -> faker->paragraphs(mt_rand(5, 10)))
                ->map(fn($p)=>"<p>$p</p>")
                ->implode(''),
            'collectionTypeID' => mt_rand(1, 2),
            'collectionStatusID' => 1,
        ];
    }
}
