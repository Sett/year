<?php
namespace funcraft\year\components\validators;

use funcraft\chain\components\ChainValidator;

/**
 * Class CyanValidator
 * @package funcraft\year\components\validators
 * @author Funcraft
 */
class CyanValidator extends ChainValidator
{
    /**
     * @var string
     */
    protected $entityName = 'cyan';

    /**
     * @param int $value
     * @return bool
     */
    public function validate($value)
    {
        return $value < 110 ? true : false;
    }
}