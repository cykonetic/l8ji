<?php

namespace Database\Seeders;

use App\Interfaces\ICanDo;
use App\Models\Activity;
use App\Models\Exercise;
use App\Models\Journal;
use App\Models\Keyword;
use App\Models\Lesson;
use App\Models\Measure;
use App\Models\Program;
use App\Models\User;
use Database\Factories\ExerciseFactory;
use Database\Factories\KeywordFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Notifications\Action;

class InitDataSeeder extends Seeder
{
    /** @var string[] */
    private $words;

    /** @var string[] */
    private $keywords;

    /** @var array */
    private $makeThings;

    public function __construct()
    {
        $this->makeThings = [
            User::class => [
                'count' => 5,
            ],
            Exercise::class => [
                'count' => 4,
                'related' => [
                    Keyword::class => [
                        'count' => rand(1,3)],
                ],
            ],
            Journal::class => [
                'count' => 1,
            ],
            Lesson::class => [
                'count' => 10,
                'related' => [
                    Keyword::class => [
                        'count' => rand(1,3),
                    ],
                ],
            ],
            Measure::class => [
                'count' => 1,
            ],
            Program::class => [
                'count' => 2,
                'related' => [
                    Activity::class => [
                        'count' => rand(5,10),
                    ],
                    Keyword::class => [
                        'count' => rand(3,7),
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
            for($$made = 0; $made < $details['count']; ++$made) {
                $this->makeThing($thing, $details['related'] ?? []);
            }

        }

    }

    private function makeThing($thing, $related)
    {
        $it = ($thing)::factory()->make();

        if (!$it instanceof ICanDo) {
            return;
        }

        if (in_array('keywords', get_class_methods($it))) {
            if (!(isset($related[Keyword::class]) && isset($related[Keyword::class]['count']))) {
                return;
            }
            $pool = array_unique(explode(' ', $it->name.' '.$it->description));
            $existing = array_intersect(
                $pool,
                $this->keywords,
            );
            $needed = $related[Keyword::class]['count'] - count($existing);
            if ($needed > 0) {
                $available = array_diff($pool, $this->keyword);
                for($k = 0; $k < $needed; ++$k) {
                    $new = $available[rand(0, count($available) - 1 )];
                    $it->keywords()->create(['keyword' => $new]);
                    $this->keywords[] = $new;
                }
            }
        }

        if ($it instanceof Program) {
            $needed = $related[Activity::class]['count'] ?? 0;
            $position = 1;
            $poolSize = Activity::all()->count();
            while ($position <= $needed) {
                $id = rand(1, $poolSize);
                $activity = Activity::find($id);
                $it->activity()->save($activity);
            }
        }
    }
}
