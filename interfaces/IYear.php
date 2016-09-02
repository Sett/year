<?php
namespace funcraft\year\interfaces;

/**
 * Interface IYear
 * @package funcraft\year\interfaces
 * @author Funcraft <what4me@ya.ru>
 */
interface IYear
{
    const LEGEND_MIN = 'grey';
    const LEGEND_MAX = 'purple';

    const LEGEND_EXAMPLE = 'example';
    const LEGEND_TITLE   = 'title';
    const LEGEND_DESC    = 'desc';

    /**
     * Year constructor.
     * @param array $config
     */
    public function __construct(array $config = []);

    /**
     * @param array $statistic
     * @return string
     */
    public function calculateShadow($statistic);

    /**
     * @param string $shadow
     * @return $this
     */
    public function setShadow($shadow);

    /**
     * @param array $data
     * @return $this
     */
    public function setDaysData($data);

    /**
     * @return array
     */
    public function getDaysData(): array;

    /**
     * @param array $legend
     * @return $this
     */
    public function setColorsLegend($legend);

    /**
     * @return array
     */
    public function getColorsLegend(): array;

    /**
     * @return string
     */
    public function render(): string;

    /**
     * @return string
     */
    public function renderYear(): string;

    /**
     * @return string
     */
    public function getShadow(): string;

    /**
     * @return string
     */
    public function renderLegend(): string;

    /**
     * @return \DatePeriod
     */
    public function generateYear();
}