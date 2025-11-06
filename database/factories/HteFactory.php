<?php

namespace Database\Factories;

use App\Models\Faculty;
use App\Models\Hei;
use App\Models\Hte;
use App\Models\User;
use Dompdf\Dompdf;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hte>
 */
class HteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $companyName =fake()->company();

        $memorandumFile = $this->generatePdfContent($companyName);
        $timestamp = now()->format('Y-m-d_H-i-s_u');
        $filePath = "memorandum/". Str::slug($companyName) . '_moa_' . $timestamp . '.pdf';

        Storage::disk('public')->put($filePath, $memorandumFile);

        return [
            'hei_id' => Hei::factory(),
            'faculty_id' => Faculty::factory(),
            'name' => $companyName,
            'address' => fake()->address(),
            'company_number' => fake()->phoneNumber(),
            'president' => fake()->name(),
            'memorandum' => $filePath,
        ];
    }

    public function generatePdfContent(string $companyName) {
        $dompdf = new Dompdf();
        $dompdf->loadHtml("<h1>$companyName's memorandum</h1>");
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->output();
    }

    public function configure(): static {
        return $this->afterCreating(function (Hte $faculty) {
            User::factory()->create([
                'profile_type' => Hte::class,
                'profile_id' => $faculty->id,
            ]);
        });
    }

    public function withHei(Hei $hei): Factory {
        return $this->state(function (array $attributes) use ($hei) {
            return [
                'hei_id' => $hei->id,
            ];
        });
    }
}
