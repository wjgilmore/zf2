<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   Zend_I18n
 */

namespace Zend\I18n\Translator;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Translator.
 *
 * @category   Zend
 * @package    Zend_I18n
 * @subpackage Translator
 */
class TranslatorServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // Configure the translator
        $config = $serviceLocator->get('Configuration');
        $translator = Translator::factory($config['translator']);

        // Provide translator to the view helpers
        $serviceLocator->get('ViewHelperManager')->get('translate')->setTranslator($translator);
        $serviceLocator->get('ViewHelperManager')->get('translateplural')->setTranslator($translator);

        return $translator;
    }
}
