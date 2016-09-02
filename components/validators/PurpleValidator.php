<?php
namespace funcraft\year\components\validators;

use funcraft\chain\components\ChainValidator;

/**
 * Class PurpleValidator
 * @package funcraft\year\components\validators
 * @author Funcraft
 */
class PurpleValidator extends ChainValidator
{
    /**
     * @var string
     */
    protected $entityName = 'purple';

    /**
     * @param int $value
     * @return bool
     */
    public function validate($value)
    {
        return $value > 180 ? true : false;
    }
}