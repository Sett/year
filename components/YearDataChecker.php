<?php
namespace funcraft\year\components;

use app\kilobook\interfaces\ChainValidatorInterface;
use funcraft\year\interfaces\IChecker;

/**
 * Class YearDataChecker
 * @package funcraft\year\components
 * @author Funcraft <what4me@ya.ru>
 */
class YearDataChecker implements IChecker
{
    /**
     * @var string
     */
    protected $entityName = 'YearDataCheckerHelper';

    /**
     * @var array|object[]
     */
    protected $data = [];

    /**
     * @var array
     */
    protected $config = [];

    /**
     * @var array
     */
    protected $statistic = [
        'red'    => 0, 'orange' => 0, 'yellow' => 0,
        'green'  => 0, 'cyan'   => 0, 'blue'   => 0,
        'purple' => 0, 'grey'   => 0
    ];

    /**
     * @param array|object[] $data
     */
    public function __construct($data)
    {
        $this->setData($data);
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }
    
    /**
     * @param array $config
     * @return $this
     */
    public function setConfig(array $config)
    {
        $this->config = $config;
        
        return $this;
    }

    /**
     * @param array $colors
     * @return $this
     */
    public function setStatisticColors($colors)
    {
        $this->statistic = $colors;
        
        return $this;
    }

    /**
     * @param array $item
     * @param string $property
     * @param array $config
     * @return string|int
     */
    protected function arrayOperate($item, $property, $config)
    {
        if($property == IChecker::DATA_PARAM_DATE) {
            return date('Y-m-d', $item[$config[IChecker::DATA_PARAM_DATE]]);
        } elseif ($property == IChecker::DATA_PARAM_TS){
            return $item[$config[IChecker::DATA_PARAM_DATE]];
        } else {
            return $item[$config[IChecker::DATA_PARAM_VALUE]];
        }
    }

    /**
     * @param object $item
     * @param string $property
     * @param array $config
     * @return string|int
     */
    protected function objectOperate($item, $property, $config)
    {
        if($property == IChecker::DATA_PARAM_DATE){
            return $item->{$config[IChecker::DATA_PARAM_DATE]}('Y-m-d');
        } elseif ($property == IChecker::DATA_PARAM_TS){
            return $item->{$config[IChecker::DATA_PARAM_DATE]}();
        } else {
            return $item->{$config[IChecker::DATA_PARAM_VALUE]}();
        }
    }

    /**
     * @param array $config
     * @param int $pages
     * @return string
     */
    protected function checkColor($config, $pages): string
    {
        $first     = true;
        $validator = null;
        $colorsNotSet = empty($this->getStatistic());

        foreach ($config as $color => $options){
            /**
             * @var ChainValidatorInterface $validator
             */
            if($colorsNotSet){
                $this->addStatisticColor($color);
            }
            $chain = $options[IChecker::PARAM_CHAIN];
            if($first){
                $first = false;
                $validator = $options[IChecker::PARAM_VALIDATOR]
                    ->is($pages)
                    ->chain($config[$chain][IChecker::PARAM_VALIDATOR]);
            } else {
                $validator = $validator->chain($config[$chain][IChecker::PARAM_VALIDATOR]);
            }
        }
        
        return $validator->getEntityName();
    }

    /**
     * @return array
     */
    public function help()
    {
        $data    = $this->getData();
        $config  = $this->getConfig();
        $checked = [];
        
        $itemOperator = $config[IChecker::PARAM_DATA_DESC][IChecker::DATA_PARAM_TYPE] . 'Operate';

        foreach($data as $item){
            $date  = $this->$itemOperator($item, IChecker::DATA_PARAM_DATE, $config);
            $pages = $this->$itemOperator($item, IChecker::DATA_PARAM_VALUE, $config);
            
            if(isset($checked[$date])){
                $pages += $checked[$date]['pages'];
            }

            $color = $this->checkColor($config[IChecker::PARAM_COLORS], $pages);

            $checked[$date] = [
                IChecker::RESULT_PARAM_COLOR    => $color,
                IChecker::RESULT_PARAM_VALUE    => $pages,
                IChecker::RESULT_PARAM_DATETIME => $this->$itemOperator($item, IChecker::DATA_PARAM_TS)
            ];
            $this->fixStatistic($color);
        }
        return $checked;
    }

    /**
     * @param string $color
     * @return $this
     */
    public function addStatisticColor($color)
    {
        $this->statistic[$color] = 0;

        return $this;
    }

    /**
     * @return array
     */
    public function getStatistic(): array
    {
        return $this->statistic;
    }

    /**
     * @param string $color
     * @return $this
     */
    public function fixStatistic($color)
    {
        $this->statistic[$color]++;

        return $this;
    }

    /**
     * @return array|object[]
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array|object[] $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
}