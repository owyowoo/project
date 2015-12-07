<?php

namespace App\Http\Middleware;

use Closure;

class StandardInput
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //获取路由
        $path = $request->path();
        $path = explode('/', $path);

        $args = $this->config($path[0], $path[1]);
      
        foreach ($args as $key => $arg) {
            //参数可选
            // if($arg['optional']) {
            //     if(!$request->input($arg['name'])) {
            //         return $error = 1;
            //     }
            // }

            $subject = $request->input($arg['name']);
            //参数类型
            $pattern = '/^-?[1-9]\d*$/';
            preg_match_all($pattern, $subject, $matches);
            dd($matches);
            $result = intval($request->input($arg['name']));
            dd($result);
        }
        
        
        
        //b.参数传递


        return $next($request);
    }

    private function config($c, $a){
        $config = [
            'Index' => [
                'index' => [
                    [
                        'name' => 'page',
                        'type' => 'int',
                        'optional' => FALSE
                    ]
                ]
            ]
        ];

        return $config[$c][$a];

    }


}
