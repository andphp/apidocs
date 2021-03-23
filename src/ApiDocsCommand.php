<?php

namespace AndPHP\ApiDocs;

use Illuminate\Console\Command;

class ApiDocsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docs:name';

    /**
     * The console command description. 控制台命令描述
     *
     * @var string
     */
    protected $description = 'Data conversion from markdown format to html format';

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
     * @return int
     */
    public function handle()
    {
        echo "======= hexo start =======";
        $str = shell_exec("hexo g && hexo s");
        var_dump($str);
        echo "======= hexo end =======";
        return 0;
    }
}
