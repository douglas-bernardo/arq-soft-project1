<?php

namespace Library\Aspect;

use Go\Aop\Aspect;
use Go\Aop\Intercept\FieldAccess;
use Go\Aop\Intercept\MethodInvocation;
use Go\Lang\Annotation\After;
use Go\Lang\Annotation\Before;
use Go\Lang\Annotation\Around;
use Go\Lang\Annotation\Pointcut;
use Library\Log\Log;
use Monolog\Handler\StreamHandler;

/**
 * Profilador aspect
 */
class LoggingAspect implements Aspect
{
    /**
     *
     * @param MethodInvocation $invocation Invocation
     * @Before("execution(public App\Controller\ProdutoForm->create(*))")
     */
    public function beforeMethodExecution(MethodInvocation $invocation)
    {
        $logger = new Log('create_product');
        $logger->addHandler(new StreamHandler('App/Tmp/logs/create_product.log', $logger::DEBUG));
        $logger->info('A new product will be created. ' . $invocation->getMethod()->getName());
    }

    /**
     *
     * @param MethodInvocation $invocation Invocation
     * @After("execution(public App\Controller\ProdutoForm->create(*))")
     */
    public function afterMethodExecution(MethodInvocation $invocation)
    {
        $logger = new Log('create_product');
        $logger->addHandler(new StreamHandler('App/Tmp/logs/create_product.log', $logger::DEBUG));
        $logger->info('A new product was created. ' . $invocation->getMethod()->getName());
    }

    /**
     *
     * @param MethodInvocation $invocation Invocation
     * @After("execution(public App\Controller\CategoriaList->changeStatus(*))")
     */
    public function afterChangeCategoryStatus(MethodInvocation $invocation)
    {
        
        $logger = new Log('update_category');
        $logger->addHandler(new StreamHandler('App/Tmp/logs/update_category.log', $logger::DEBUG));
        $logger->info('Category status was changed');

        // echo 'Calling Before Interceptor for method: ',
        //      is_object($obj) ? get_class($obj) : $obj,
        //      $invocation->getMethod()->isStatic() ? '::' : '->',
        //      $invocation->getMethod()->getName(),
        //      '()',
        //      ' with arguments: ',
        //      json_encode($invocation->getArguments()),
        //      "<br>\n";
    }
}