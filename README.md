# year
Github like year statistic, but more detailed and colorful

Example: http://funcraft.ru/#reading

# Installation via composer

"funcraft/year": "0.1.*"

# Usage

```
use funcraft\year\components\Year;

$year = new Year();
$year->setDaysData($data);
echo $year->renderYear();
```
