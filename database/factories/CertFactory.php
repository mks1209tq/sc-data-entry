<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Cert;

class CertFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cert::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        return [
            'file_name' => 'P2498-GEOSCIENCE TESTING LABORATORY PC-02 ORDER 1664-1' . '.pdf',
            'project_id' => $this->faker->unique()->numberBetween(1000, 9999),
            'order_id' => $this->faker->unique()->numberBetween(10000, 99999),
            'pc_id' => $this->faker->unique()->numberBetween(100, 999),
            'latest_pc_id' => $this->faker->boolean,
            'advance_amount' => $this->faker->randomFloat(2, 1000, 100000),
            'retention_amount' => $this->faker->randomFloat(2, 100, 10000),
            'deduction_amount' => $this->faker->randomFloat(2, 100, 10000),
            'user_id' => '2', // Assuming you have users with IDs 1-10
            'single_po' => $this->faker->randomElement(['0', '1']),
            'po_number' => $this->faker->unique()->numberBetween(10000, 99999),
          
        ];
    }
}
