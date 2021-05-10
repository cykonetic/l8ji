<?php

namespace Database\Seeders;

use App\Models\Pivots\Activity;
use App\Models\Exercise;
use App\Models\Interfaces\IKeywordable;
use App\Models\Journal;
use App\Models\Keyword;
use App\Models\Lesson;
use App\Models\Measure;
use App\Models\Program;
use App\Models\Sequence;
use App\Models\User;
use Exception;
use Illuminate\Database\Seeder;
use Log;

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
                'count' => 5,
            ],
            Exercise::class => [
                'count' => 4,
                'related' => [
                    Keyword::class => [
                        'count' => rand(3, 7), ],
                ],
            ],
            Journal::class => [
                'count' => 3,
            ],
            Lesson::class => [
                'count' => 10,
                'related' => [
                    Keyword::class => [
                        'count' => rand(3, 7),
                    ],
                ],
            ],
            Measure::class => [
                'count' => 2,
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
     * @throws Exception
     */
    public function run()
    {
        $count = 0;
        foreach($this->makeThings as $thing => $details) {
            Log::info("making $thing" . ++$count);
            for($made = 0; $made < $details['count']; ++$made) {
                $this->makeThing($thing, $details['related'] ?? []);
            }

        }
    }


    /**
     * makeThing
     *
     * @param mixed $thing
     * @param mixed $related
     * @return void
     * @throws Exception
     */
    private function makeThing($thing, $related): void
    {
        $it = call_user_func([$thing, 'factory'])->make();
        $it->save();

        if ($it instanceof IKeywordable && isset($related[Keyword::class])) {
            $needed = $related[Keyword::class]['count'];
            if ($needed > 0) {
                $pool = array_filter(array_unique(explode(' ', $it->name . ' ' . $it->description)));
                // use up any keywords that may already exist
                $existing = array_values(array_intersect($pool, array_keys($this->keywords))) ?? [];
                for ($made = 0; $made < $needed; ++$made) {

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
                    $it->keywords()->attach($this->keywords[$keyword]->id);
                }
            }
        }

        if (get_class($it) === Program::class) {
            $needed = $related[Activity::class]['count'] ?? 0;
            $position = 0;
            $poolSize = Activity::all()->count();
            while ($position <= $needed) {
                $id = rand(1, $poolSize);
                Sequence::create([
                    'activity_id' => $id,
                    'program_id' => $it->id,
                    'sequence' => ++$position,
                ]);
            }
        }
    }
}
