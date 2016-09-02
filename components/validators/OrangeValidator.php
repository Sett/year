<?php
namespace funcraft\year\components\validators;

use funcraft\chain\components\ChainValidator;

/**
 * Class OrangeValidator
 * @package funcraft\year\components\validators
 * @author Funcraft
 */
class OrangeValidator extends ChainValidator
{
    /**
     * @var string
     */
    protected $entityName = 'orange';

    /**
     * @param int $value
     * @return bool
     */
    public function validate($value)
    {
        return $value < 30 ? true : false;
    }
}