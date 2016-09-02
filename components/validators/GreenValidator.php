<?php
namespace funcraft\year\components\validators;

use funcraft\chain\components\ChainValidator;

/**
 * Class GreenValidator
 * @package funcraft\year\components\validators
 * @author Funcraft
 */
class GreenValidator extends ChainValidator
{
    /**
     * @var string
     */
    protected $entityName = 'green';

    /**
     * @param int $value
     * @return bool
     */
    public function validate($value)
    {
        return $value < 70 ? true : false;
    }
}