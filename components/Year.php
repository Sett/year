<?php
namespace funcraft\year\components;

use funcraft\glyphicon\components\Glyphicon;
use funcraft\year\interfaces\IYear;

/**
 * Class Year
 * @package funcraft\year\components
 * @author Funcraft <what4me@ya.ru>
 */
class Year implements IYear
{
    /**
     * @var array
     */
    protected $colorsLegend = [];

    /**
     * @var string
     */
    protected $shadow = 'shadow-grey';

    /**
     * @var array
     */
    protected $daysData = [];

    /**
     * Year constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        if(!$config){
            $config = include __DIR__ . '/../configs/default.php';
        }

        $this->setColorsLegend($config);
    }

    /**
     * @param array $statistic
     * @return string
     */
    public function calculateShadow($statistic)
    {
        arsort($statistic);

        return 'shadow-' . array_shift(array_keys($statistic));
    }

    /**
     * @param string $shadow
     * @return $this
     */
    public function setShadow($shadow)
    {
        $this->shadow = $shadow;

        return $this;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setDaysData($data)
    {
        $this->daysData = $data;

        return $this;
    }

    /**
     * @return array
     */
    public function getDaysData()
    {
        return $this->daysData;
    }

    /**
     * @param array $legend
     * @return $this
     */
    public function setColorsLegend($legend)
    {
        $this->colorsLegend = $legend;

        return $this;
    }

    /**
     * @return array
     */
    public function getColorsLegend(): array
    {
        return $this->colorsLegend;
    }

    /**
     * @return string
     */
    public function render()
    {
        return $this->renderYear() . $this->renderLegend();
    }

    /**
     * @param \DatePeriod $year
     * @return array
     */
    protected function prepareYear($year)
    {
        $result = ['week days from monday 2 sunday-->', [], [], [], [], [], [], []];

        $first = true;

        foreach($year as $day){
            if($first){
                $first = false;
                $weekDay = 1 - $day->format('N');
                if($weekDay){// means it is not a monday
                    $emptyDays = -1 * $weekDay;
                    for($i = 0; $i < $emptyDays; $i++){
                        $result[$i+1][] = ['empty' => true, 'dateTime' => $day];
                    }
                }
            }
            $result[$day->format('N')][] = [
                'day'      => $day->format('Y-m-d'),
                'empty'    => false,
                'dateTime' => $day
            ];
        }

        return $result;
    }

    /**
     * @return string
     */
    public function renderYear()
    {
        $helper   = new YearDataChecker($this->getDaysData());
        $daysData = $helper->help();
        $year     = $this->prepareYear($this->generateYear());

        $this->setShadow($this->calculateShadow($helper->getStatistic()));

        $weekDays = ['Дни недели:', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс'];
        $monthsNames = ['Месяцы:','Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'];

        $months = '<div class="year-row month"><div class="year-day"></div>';
        $result = '';
        $currentMonth = 0;

        for($i = 1; $i < 8; $i++){
            $result .= '<div class="year-row">';
            $first = true;
            foreach($year[$i] as $info){
                if($first){
                    $first = false;
                    $result .= '<div class="year-day empty weekDay">' . $weekDays[$i] . '</div>';
                }
                if($info['empty']){
                    $result .= '<div class="year-day empty"></div>';
                } else {
                    $date  = $info['day'];
                    $month = $info['dateTime']->format('n');
                    if($i == 1){
                        if($month != $currentMonth){
                            $currentMonth = $month;
                            $months .= '<div class="year-day"><div class="month-start">' . $monthsNames[$month] . '</div></div>';
                        } else {
                            $months .= '<div class="year-day month-middle"></div>';
                        }
                    }
                    $color = isset($daysData[$date]) ? $daysData[$date]['color'] : self::LEGEND_MIN;
                    $pages = isset($daysData[$date]) ? $daysData[$date]['pages'] : 0;
                    $result .= '<div class="year-day ' . $color . '" title="' . $date . ' (' . $pages . ' стр.)"></div>';
                }
            }
            $result .= '</div>';
        }

        $months .= '</div>';

        return $months . $result;
    }

    /**
     * @return string
     */
    public function getShadow()
    {
        return $this->shadow;
    }

    /**
     * @return string
     */
    public function renderLegend()
    {
        $result = '<div class="year-legend">';
        $legend = $this->getColorsLegend();
        $inRow  = 0;

        foreach($legend as $info){
            $icon = new Glyphicon(Glyphicon::Book, $info[static::LEGEND_EXAMPLE]);
            if(!$inRow){
                $result .= '<div class="row">';
            }
            $result .= '
            <div class="col-md-3">
                <div class="kb-left">' . $icon->render() . '</div>
                 ' . $info[self::LEGEND_DESC] . '
            </div>
            ';
            $inRow++;
            if($inRow == 4){
                $inRow = 0;
                $result .= '</div>';
            }
        }

        if($inRow && ($inRow < 4)){
            $result .= '</div>';
        }

        $result .= '</div><!-- year-legend -->';

        return $result;
    }

    /**
     * @return \DatePeriod
     */
    public function generateYear()
    {
        $end   = new \DateTime(date('Y-m-d'));
        $end   = $end->modify('+1 day');
        $start = new \DateTime(date('Y-m-d'));
        $start = $start->modify( '-1 year' );

        $interval  = new \DateInterval('P1D');
        $dateRange = new \DatePeriod($start, $interval ,$end);

        return $dateRange;
    }
}