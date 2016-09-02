<?php
namespace funcraft\year\components\validators;

use funcraft\chain\components\ChainValidator;

/**
 * Class RedValidator
 * @package funcraft\year\components\validators
 * @author Funcraft
 */
class RedValidator extends ChainValidator
{
    /**
     * @var string
     */
    protected $entityName = 'red';

    /**
     * @param int $value
     * @return bool
     */
    public function validate($value)
    {
        return $value < 10 ? true : false;
    }
}