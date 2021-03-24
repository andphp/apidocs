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
    protected $signature = 'docs:html';

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
        // cp markdown to source
        echo "同步加载 markdown 文件 》》".PHP_EOL;
        $markdown =  app_path().'/ApiDocs/Markdown';
        $source = __DIR__.'/hexo_d/source/_posts';
        if( PHP_OS == "WINNT"){
            shell_exec('xcopy "'.$markdown.'" "'.$source.'" /s /y');
        }else{
            echo "同步加载 markdown 文件 》》 失败".PHP_EOL;
            return false;
        }
        // hexo g
        echo "构建 html 文件 》》".PHP_EOL;
        shell_exec("cd ".__DIR__."/hexo_d && hexo clean && hexo g");
        echo "构建 html 文件 》》 成功".PHP_EOL;
        // cp public to public
        echo "导出 html 文件 》》".PHP_EOL;

        $docs =  public_path().'/docs';
        $public = __DIR__.'/hexo_d/public';
        if( PHP_OS == "WINNT"){
            shell_exec('xcopy "'.$public.'" "'.$docs.'" /s /y');
        }else{
            echo "导出 html 文件 》》 失败".PHP_EOL;
            return false;
        }

        echo "======= 执行完成 =======".PHP_EOL;
        return 0;
    }
}
