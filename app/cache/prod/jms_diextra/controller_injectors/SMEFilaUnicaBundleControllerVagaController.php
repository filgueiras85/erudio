<?php

namespace SME\FilaUnicaBundle\Controller;

/**
 * This code has been auto-generated by the JMSDiExtraBundle.
 *
 * Manual changes to it will be lost.
 */
class VagaController__JMSInjector
{
    public static function inject($container) {
        require_once '/www2/sistemas/intranet.educacao/app/cache/prod/jms_diextra/proxies/SME-FilaUnicaBundle-Controller-VagaController.php';
        $a = new \JMS\AopBundle\Aop\InterceptorLoader($container, array('SME\\FilaUnicaBundle\\Controller\\VagaController' => array('preencherAction' => array(0 => 'security.access.method_interceptor'))));
        $instance = new \EnhancedProxy_e7e707bcb56d811aae0273bc300574aa9925fd56\__CG__\SME\FilaUnicaBundle\Controller\VagaController();
        $instance->__CGInterception__setLoader($a);
        return $instance;
    }
}
