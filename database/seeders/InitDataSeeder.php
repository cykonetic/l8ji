<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Exercise;
use App\Models\Journal;
use App\Models\Keyword;
use App\Models\Lesson;
use App\Models\Measure;
use App\Models\Program;
use App\Models\User;
use Illuminate\Database\Seeder;

class InitDataSeeder extends Seeder
{
    /** @var Keyword[] */
    private $keywords = [];

    /** @var array */
    private $makeThings;

    /**
     *
     */
    public function __construct()
    {
        $this->makeThings = [
            User::class => [
                'min' => 5,
                'max' => 5,
            ],
            Exercise::class => [
                'min' => 5,
                'max' => 9,
                'related' => [
                    Keyword::class => [
                        'min' => 5,
                        'max' => 9,
                    ],
                ],
            ],
            Journal::class => [
                'min' => 3,
                'max' => 4,
                'count' => 3,
            ],
            Lesson::class => [
                'min' => 9,
                'max' => 13,
                'related' => [
                    Keyword::class => [
                        'min' => 5,
                        'max' => 9,
                    ],
                ],
            ],
            Measure::class => [
                'min' => 2,
                'max' => 3,
                'count' => 2,
            ],
            Program::class => [
                'min' => 2,
                'max' => 3,
                'related' => [
                    Activity::class => [
                        'min' => 9,
                        'max' => 13,
                    ],
                    Keyword::class => [
                        'min' => 9,
                        'max' => 13,
                    ],
                ],
            ],
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->makeThings as $thing => $details) {
            $count = rand($details['min'], $details['max']);
            for($made = 0; $made < $count; ++$made) {
                $this->makeThing($thing, $details['related'] ?? []); ;
            }
        }
    }


    /**
     * makeThing
     *
     * @param  string $thing
     * @param  array $related
     * @return void
     */
    private function makeThing(string $thing, array $related): void
    {
        $it = call_user_func([$thing, 'factory'])->create();
        foreach ($related as $class => $props) {
            if (Keyword::class === $class) {
                $wordPool = explode(' ', $it->description);
                $count = rand($props['min'], $props['max']);
                for ($wordsPicked = []; count($wordsPicked) < $count;) {
                    $index = rand(0, count($wordPool) - 1);
                    $picking = preg_replace('/[^a-z]+/', '', strtolower($wordPool[$index]));
                    if (strlen($picking) > 3 && !in_array($picking, $wordsPicked)) {
                        $wordsPicked[] = $picking;
                        array_splice($wordPool, $index, 1);
                    }
                }

                foreach($wordsPicked as $adding) {
                    if (array_key_exists($adding, $this->keywords)) {
                        $keyword = $this->keywords[$adding];
                    } else {
                        $keyword = Keyword::create(['keyword' => $adding]);
                        $this->keywords[$adding] = $keyword;
                    }
                    $it->activity->keywords()->attach($keyword->id);
                }
            } else {
                $count = rand($props['min'], $props['max']);
                $activities = Activity::inRandomOrder()->take($count)->pluck('id');
                for ($i = 0; $i < count($activities); ++$i) {
                    if ($activities[$i] !== $it->activity->id) {
                        $it->activities()->attach($activities[$i], ['sequence' => $i + 1]);
                    }
                }
            }
        }
    }
}
