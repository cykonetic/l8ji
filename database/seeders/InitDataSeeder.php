<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Exercise;
use App\Models\Interfaces\IKeywords;
use App\Models\Journal;
use App\Models\Keyword;
use App\Models\Lesson;
use App\Models\Measure;
use App\Models\Pivots\ProgramActivity;
use App\Models\Program;
use App\Models\Sequence;
use App\Models\User;
use Database\Factories\ExerciseFactory;
use Database\Factories\JournalFactory;
use Database\Factories\LessonFactory;
use Database\Factories\MeasureFactory;
use Database\Factories\ProgramFactory;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class InitDataSeeder extends Seeder
{
    /** @var Keyword[] */
    private $keywords = [];

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
                        'count' => rand(1, 3), ],
                ],
            ],
            Journal::class => [
                'count' => 1,
            ],
            Lesson::class => [
                'count' => 10,
                'related' => [
                    Keyword::class => [
                        'count' => rand(1, 3),
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
                        'count' => rand(5, 10),
                    ],
                    Keyword::class => [
                        'count' => rand(3, 7),
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
            for($made = 0; $made < $details['count']; ++$made) {
                $this->makeThing($thing, $details['related'] ?? []);
            }

        }

    }

    private function makeThing($thing, $related)
    {
        $it = $this->getThing($thing);
        $it->save();

        if ($it instanceof IKeywords && isset($related[Keyword::class])) {
            $needed = $related[Keyword::class]['count'] || 0;
            if ($needed > 0) {
                $pool = array_filter(array_unique(explode(' ', $it->name . ' ' . $it->description)));
                // use up any keywords that may already exist
                $existing = array_values(array_intersect($pool, array_keys($this->keywords))) ?? [];
                for ($made = 0; $made < $needed; ++$made) {
                    $activity = $it->activity()->get()->first();

                    if (count($existing)) {
                        $existing = array_values($existing);
                        $use = rand(0, count($existing) - 1);
                        $keyword = $existing[$use];
                        array_splice($existing, $use, 1);

                    } elseif (count($pool)) {
                        $pool = array_values($pool);
                        $use = rand(0, count($pool) - 1);
                        $keyword = $pool[$use];
                        array_splice($pool, $use, 1);

                        $this->keywords[$keyword] = Keyword::create(['keyword' => $keyword]);
                        //$this->keywords[$keyword]->save();
                    } else {
                        throw(new Exception('No more word to use!'));
                    }
                    $activity->keywords()->attach($this->keywords[$keyword]);
                }
            }
        }

        if (get_class($it) === Program::class) {
            $needed = $related[Activity::class]['count'] ?? 0;
            $position = 1;
            $poolSize = Activity::all()->count();
            while ($position <= $needed) {
                $id = rand(1, $poolSize);
                $sequence = Sequence::create([
                    'activity_id' => $id,
                    'program_id' => $it->id,
                    'sequence' => $position,
                ]);
                //$sequence->save();
                ++$position;
            }
        }
    }

    private function getThing(string $thing): Model
    {
        switch ($thing) {
            case Exercise::class:
                return Exercise::factory()->make();
            case Journal::class:
                return Journal::factory()->make();
            case Lesson::class:
                return Lesson::factory()->make();
            case Measure::class:
                return Measure::factory()->make();
            case Program::class:
                return Program::factory()->make();
            case User::class:
                return User::factory()->make();
        }
    }
}
