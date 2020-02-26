<?php
echo '<p>php环境搭建成功</p>';


try {
    new PDO("mysql:host=172.19.0.6;dbname=mysql", 'root', '123456');//host地址直接使用link指定的标签mysql
    echo '<p>mysql连接成功</p>';
} catch (Exception $e) {
    echo '<p>mysql连接失败 : '.$e->getMessage().'</p>';
} finally {
    try {
        $mem = new Memcached();
        $memcached=$mem->addServer('172.19.0.4',11211);

        $red = new Redis();
        $redis = $red->connect('172.19.0.3', 6379);//地址直接使用link指定的标签redis

        if($memcached != true && !$redis ){
            echo "redis和memcached都连接失败";
        }
        if($memcached != true){
            echo "memcached 连接失败";
        }
        if (!$redis) {
            echo "redis 连接失败";
        }
        if($memcached && $redis ){
            echo "redis和memcached都连接成功";
        }

    } catch (Exception $e) {
        echo '<p>redis和memcached连接失败 : '.$e->getMessage().'</p>';
    } finally {
        var_dump(phpinfo());
    }
}
