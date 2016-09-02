<?php
namespace funcraft\year\interfaces;

/**
 * Interface IChecker
 * @package funcraft\year\interfaces
 * @author Funcraft <what4me@ya.ru>
 */
interface IChecker
{
    const PARAM_COLORS            = 'colors';
    const PARAM_MAX               = 'max';
    const PARAM_CHAIN             = 'chain';
    const PARAM_VALIDATOR         = 'validator';
    CONST PARAM_DATA_DESC         = 'data desc';
    const PARAM_DEFAULT_VALIDATOR = 'default validator';

    const DATA_PARAM_TYPE  = 'type';
    const DATA_PARAM_DATE  = 'date';
    const DATA_PARAM_TS    = 'date timestamp';
    const DATA_PARAM_VALUE = 'value';

    const DATA_TYPE_OBJECT = 'object';
    const DATA_TYPE_ARRAY  = 'array';

    const RESULT_PARAM_COLOR    = 'color';
    const RESULT_PARAM_VALUE    = 'pages';
    const RESULT_PARAM_DATETIME = 'dateTime';

    const CHAIN_NONE = false;
    const DEFAULT_VALIDATOR = 'default';

    /**
     * @param array|object[] $data
     */
    public function __construct($data);

    /**
     * @return array
     */
    public function getConfig(): array;

    /**
     * @param array $config
     * @return $this
     */
    public function setConfig(array $config);

    /**
     * @param array $colors
     * @return $this
     */
    public function setStatisticColors($colors);

    /**
     * @return array
     */
    public function help();

    /**
     * @param string $color
     * @return $this
     */
    public function addStatisticColor($color);

    /**
     * @return array
     */
    public function getStatistic(): array;

    /**
     * @param string $color
     * @return $this
     */
    public function fixStatistic($color);

    /**
     * @return array|object[]
     */
    public function getData();

    /**
     * @param array|object[] $data
     * @return $this
     */
    public function setData($data);
}