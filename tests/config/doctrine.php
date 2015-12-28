<?php
use Doctrine\Common\Cache\ApcCache;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;

$cache = null;

if(APPLICATION_ENV != "production")
{
    $cache = new ArrayCache;
}
else
{
    $cache = new ApcCache;
}

$doctrineConfig = new Configuration();
$driver = $doctrineConfig->newDefaultAnnotationDriver(SRC_PATH . "/entities");
$doctrineConfig->setMetadataDriverImpl($driver);
$doctrineConfig->setMetadataCacheImpl($cache);
$doctrineConfig->setQueryCacheImpl($cache);
$doctrineConfig->setProxyDir(SRC_PATH . "/proxies");
$doctrineConfig->setProxyNamespace('DoctrineSpike\Proxies');

if(APPLICATION_ENV != "production")
{
    $doctrineConfig->setAutoGenerateProxyClasses(true);
}
else
{
    $doctrineConfig->setAutoGenerateProxyClasses(false);
}

$connectionOptions = [
    "driver"   => "pdo_mysql",
    "host"     => DB_HOST,
    "port"     => DB_PORT,
    "dbname"   => DB_NAME,
    "user"     => DB_USER,
    "password" => DB_PASS
];

$entityManager = EntityManager::create($connectionOptions, $doctrineConfig);
