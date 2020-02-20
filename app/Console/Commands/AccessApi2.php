<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AccessApi2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'accessApi2:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $json = file_get_contents("https://sq1-api-test.herokuapp.com/posts");
        $posts = json_decode($json, true);
        foreach($posts["data"] as $clave =>$valor){
            $title = $valor["title"];
            $desc = $valor["description"];
            $fecha = $valor["publication_date"];

            //insert to DB
            DB::table('post')->insert([
                ['title' => $title, 'description' => $desc, 'publication_date' => $fecha, 'author' => 7]
            ]);
        }
    }
}
