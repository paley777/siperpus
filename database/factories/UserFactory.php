<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => 'Valleryan Virgil Zuliuskandar',
            'jabatan' => 'Petugas',
            'alamat' => 'PT. HMR Jalan K.H. Mas Mansyur 45',
            'no_tlp' => '0896-3204-6116',
            'nama_gambar' => '',
            'email' => 'valleryan1212@gmail.com',
            'password' => Hash::make('12345'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
