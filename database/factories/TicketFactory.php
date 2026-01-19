<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(3),
            'descripcion' => $this->faker->paragraph(),
            'prioridad' => $this->faker->randomElement(['baja', 'media', 'alta']),
            'estado' => $this->faker->randomElement(['abierto', 'en_proceso', 'cerrado']),
            // created_by will be assigned in seeder
        ];
    }
}
