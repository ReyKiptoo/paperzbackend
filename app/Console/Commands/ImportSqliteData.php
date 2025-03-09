<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\College;
use App\Models\Course;
use App\Models\Unit;
use App\Models\PastPaper;

class ImportSqliteData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:sqlite-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data from paperzdummy.db SQLite database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sqliteFile = base_path('paperzdummy.db');
        
        if (!file_exists($sqliteFile)) {
            $this->error('SQLite database file not found: ' . $sqliteFile);
            return 1;
        }

        $this->info('Starting import from SQLite database...');
        
        // Connect to SQLite database
        $sqlite = new \PDO('sqlite:' . $sqliteFile);
        
        DB::beginTransaction();
        
        try {
            // Import Colleges
            $this->info('Importing Colleges...');
            $colleges = $sqlite->query('SELECT * FROM Colleges')->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($colleges as $college) {
                College::updateOrCreate(
                    ['id' => $college['id']],
                    ['name' => $college['name']]
                );
            }
            $this->info('Imported ' . count($colleges) . ' colleges');
            
            // Import Courses
            $this->info('Importing Courses...');
            $courses = $sqlite->query('SELECT * FROM Courses')->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($courses as $course) {
                Course::updateOrCreate(
                    ['id' => $course['id']],
                    [
                        'college_id' => $course['college_id'],
                        'name' => $course['name']
                    ]
                );
            }
            $this->info('Imported ' . count($courses) . ' courses');
            
            // Import Units
            $this->info('Importing Units...');
            $units = $sqlite->query('SELECT * FROM Units')->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($units as $unit) {
                Unit::updateOrCreate(
                    ['id' => $unit['id']],
                    [
                        'course_id' => $unit['course_id'],
                        'year_semester' => $unit['year_semester'],
                        'unit_code' => $unit['unit_code'],
                        'unit_name' => $unit['unit_name']
                    ]
                );
            }
            $this->info('Imported ' . count($units) . ' units');
            
            // Import PastPapers
            $this->info('Importing Past Papers...');
            $pastPapers = $sqlite->query('SELECT * FROM PastPapers')->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($pastPapers as $paper) {
                PastPaper::updateOrCreate(
                    ['id' => $paper['id']],
                    [
                        'unit_id' => $paper['unit_id'],
                        'firebase_url' => $paper['firebase_url'],
                        'file_name' => $paper['file_name'],
                        'type' => $paper['type'],
                        'description' => $paper['description'],
                        'month_year' => $paper['month_year']
                    ]
                );
            }
            $this->info('Imported ' . count($pastPapers) . ' past papers');
            
            DB::commit();
            $this->info('Import completed successfully!');
            return 0;
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error('Import failed: ' . $e->getMessage());
            return 1;
        }
    }
}
