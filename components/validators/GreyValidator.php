<?php
namespace funcraft\year\components\validators;

use funcraft\chain\components\ChainValidator;

/**
 * Class GreyValidator
 * @package funcraft\year\components\validators
 * @author Funcraft
 */
class GreyValidator extends ChainValidator
{
    /**
     * @var string
     */
    protected $entityName = 'grey';

    /**
     * @param int $value
     * @return bool
     */
    public function validate($value)
    {
        return $value == 0 ? true : false;
    }
}