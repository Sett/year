<?php
namespace funcraft\year\components\validators;

use funcraft\chain\components\ChainValidator;

/**
 * Class YellowValidator
 * @package funcraft\year\components\validators
 * @author Funcraft
 */
class YellowValidator extends ChainValidator
{
    /**
     * @var string
     */
    protected $entityName = 'yellow';

    /**
     * @param int $value
     * @return bool
     */
    public function validate($value)
    {
        return $value < 40 ? true : false;
    }
}