<?php

namespace Library\Aspect;

use Go\Aop\Aspect;
use Go\Aop\Intercept\FieldAccess;
use Go\Aop\Intercept\MethodInvocation;
use Go\Lang\Annotation\After;
use Go\Lang\Annotation\Before;
use Go\Lang\Annotation\Around;
use Go\Lang\Annotation\Pointcut;
use Go\Lang\Annotation\AfterThrowing;
use Library\Database\Transaction;
use Exception;
use Library\Log\Log;
use Monolog\Handler\StreamHandler;

/**
 * Profilador aspect
 */
class TransactionManagerAspect implements Aspect
{

    /**
     * @param MethodInvocation $invocation Invocation
     * @Before("@execution(Library\Annotation\Transactional)")
     */
    public function beginTransaction(MethodInvocation $invocation)
    {
        Transaction::open('self_menu');
    }

    /**
     * @param MethodInvocation $invocation Invocation
     * @After("@execution(Library\Annotation\Transactional)")
     */
    public function commitTransaction(MethodInvocation $invocation)
    {
        Transaction::close();
    }

    /**
     * Rollback if throw exception
     *
     * @param MethodInvocation
     * @return void
     * 
     * @AfterThrowing("@execution(Library\Annotation\Transactional)");
     */
    public function rollBackTransaction(MethodInvocation $invocation, \Exception $exception)
    {
        Transaction::rollback();
        $logger = new Log('transaction_exception');
        $logger->addHandler(new StreamHandler('App/Tmp/logs/transaction_exception.log', $logger::DEBUG));
        $logger->info('Error on transaction method: ' . $exception->getMessage());
        echo json_encode(["status" => "error", "data" => message($exception->getMessage(),'danger',true)]);
        exit;
    }
}
