<?php
namespace funcraft\year\components\validators;

use funcraft\chain\components\ChainValidator;

/**
 * Class BlueValidator
 * @package funcraft\year\components\validators
 * @author Funcraft
 */
class BlueValidator extends ChainValidator
{
    /**
     * @var string
     */
    protected $entityName = 'blue';

    /**
     * @param int $value
     * @return bool
     */
    public function validate($value)
    {
        return $value < 180 ? true : false;
    }
}