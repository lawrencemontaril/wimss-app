<?php

namespace Database\Seeders;

use App\Models\Recommendation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecommendationSeeder extends Seeder
{
    /*
    | -------------------------
    |  Run the database seeds.
    | -------------------------
    */
    public function run(): void
    {
        $recommendations = [
            [
                'label' => 'General Appearance',
                'code' => 'per1',
                'message' => 'Could improve consistency in maintaining a neat, professional appearance and demeanor.',
            ],
            [
                'label' => 'Social Maturity',
                'code' => 'per2',
                'message' => 'Could improve consistency in maintaining a neat, professional appearance and demeanor.',
            ],
            [
                'label' => 'Mental Alertness',
                'code' => 'per3',
                'message' => 'Would benefit from sharpening focus and improving task comprehension.',
            ],
            [
                'label' => 'Self-Confidence',
                'code' => 'per4',
                'message' => 'Needs to build confidence in approaching and completing tasks independently.',
            ],
            [
                'label' => 'Exercise Office Etiquette',
                'code' => 'per5',
                'message' => 'Should work on better adherence to office policies, deadlines, and expectations.',
            ],
            [
                'label' => 'Typing Skills',
                'code' => 'tech1',
                'message' => 'Improving typing speed and accuracy would enhance overall efficiency.',
            ],
            [
                'label' => 'PC Operations',
                'code' => 'tech2',
                'message' => 'Needs to gain more fluency in basic computer operations.',
            ],
            [
                'label' => 'Programming Skills',
                'code' => 'tech3',
                'message' => 'Should focus on improving code clarity, structure, and correctness.',
            ],
            [
                'label' => 'Basic Network Administration',
                'code' => 'tech4',
                'message' => 'Would benefit from deeper knowledge and practical exposure to networking concepts.',
            ],
            [
                'label' => 'Computer Troubleshooting',
                'code' => 'tech5',
                'message' => 'Needs to strengthen problem-solving skills in hardware and software issues.',
            ],
            [
                'label' => 'Communication Skills',
                'code' => 'tech6',
                'message' => 'Improving clarity, vocabulary, and expression would strengthen communication.',
            ],
            [
                'label' => 'Quality and Quantity of Work',
                'code' => 'office1',
                'message' => 'Should aim for greater consistency and accuracy in completing assigned tasks.',
            ],
            [
                'label' => 'Promptness',
                'code' => 'office2',
                'message' => 'Time management strategies could help with meeting deadlines more reliably.',
            ],
            [
                'label' => 'Reliability and Trustworthiness',
                'code' => 'office3',
                'message' => 'Developing greater dependability in handling responsibilities is encouraged.',
            ],
            [
                'label' => 'Interest and Initiatives',
                'code' => 'office4',
                'message' => 'Could show more initiative and take ownership of tasks without waiting for direction.',
            ],
            [
                'label' => 'Cooperativeness and Discipline',
                'code' => 'office5',
                'message' => 'More consistent participation and adherence to rules would improve team performance.',
            ],
            [
                'label' => 'Observance of Office Procedure',
                'code' => 'office6',
                'message' => 'Reinforcing understanding of standard procedures would support smoother operations.',
            ],
            [
                'label' => 'Judgement Ability',
                'code' => 'office7',
                'message' => 'Should work on making sound decisions and accurately completing assigned work.',
            ],
        ];

        foreach ($recommendations as $recommendation) {
            Recommendation::firstOrCreate([
                'code' => $recommendation['code']
            ], [
                'label' => $recommendation['label'],
                'message' => $recommendation['message']
            ]);
        }
    }
}
