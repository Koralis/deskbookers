<?php
/**
 * Simple API object with data for test
 */
$apiData = (object) [
    'name' => 'HNK Hoofddorp',
    'rating' => 8,
    'review_count' => 49,
    'url' => 'https://www.deskbookers.com/nl-nl/hoofddorp/hnk-hoofddorp'
];


/**
 * String escape function
 *
 * @param $value
 * @param bool $doubleEncode
 * @return string
 */
function safe($value, $doubleEncode = true) {
    return htmlspecialchars( (string) $value, ENT_QUOTES, 'utf-8', $doubleEncode);
}


/**
 * Generate widget stars depending on object rating
 *
 * @param int $rating
 * @return string
 */
function generateWidgetStars($rating = 0)
{
    $html = '<div class="stars clearfix">';

    $i = 1;
    while ($i <= 5) {
        $star = 'fa-star-o';

        if (
            ($i == 1 && $rating >= 0.1 && $rating < 2) ||
            ($i == 2 && $rating >= 2.1 && $rating < 4) ||
            ($i == 3 && $rating >= 4.1 && $rating < 6) ||
            ($i == 4 && $rating >= 6.1 && $rating < 8) ||
            ($i == 5 && $rating >= 8.1 && $rating < 10)
        ) {
            $star = 'fa-star-half-o';
        } else if (
            ($i == 1 && $rating >= 2) ||
            ($i == 2 && $rating >= 4) ||
            ($i == 3 && $rating >= 6) ||
            ($i == 4 && $rating >= 8) ||
            ($i == 5 && $rating == 10)
        ) {
            $star = 'fa-star';
        }

        $html .= '<div class="star star_'.$i.'">
                <i class="fa '.$star.'"></i>
            </div>';

        $i++;
    }

    $html .= '</div>';

    return $html;
}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link href="css/style.css" rel="stylesheet" />
	</head>
	<body>

        Resize window to see responsiveness of the widget :)<br /><br />

        <!-- BEGIN: HORIZONTAL (DEFAULT) WIDGET -->
        <div class="widget horizontal">
            <div class="row">
                <div class="col-xs-12">
                    <div class="title"><?php echo safe($apiData->name); ?></div>
                    </div>
                <div class="col-xs-12 review">
                    <div class="logo">
                        <img src="img/512.png" alt="Deskbookers" style="width:100%;" />
                    </div>
                    <div class="result">
                        <?php echo generateWidgetStars($apiData->rating); ?>
                        <div class="text">Op basis van <?php echo safe($apiData->review_count); ?> reviews</div>
                    </div>
                </div>

            </div>
            <div class="row logo">
                <div class="col-xs-6 text">Bekijk reviews op</div>
                <div class="col-xs-6 img"><img src="img/deskbookers.png" alt="Deskbookers" /></div>
            </div>
        </div>
        <!-- END: HORIZONTAL (DEFAULT) WIDGET -->

        <br /><br />

        <!-- BEGIN: VERTICAL WIDGET -->
        <div class="widget vertical">
            <div class="row">
                <div class="col-xs-12">
                    <div class="title"><?php echo safe($apiData->name); ?></div>
                </div>
                <div class="col-xs-12 review">
                    <div class="logo">
                        <img src="img/512.png" alt="Deskbookers" style="width:100%;" />
                    </div>
                    <div class="result">
                        <?php echo generateWidgetStars($apiData->rating); ?>
                        <div class="text">Op basis van <?php echo safe($apiData->review_count); ?> reviews</div>
                    </div>
                </div>

            </div>
            <div class="row logo">
                <div class="col-xs-6 text">Bekijk reviews op</div>
                <div class="col-xs-6 img"><img src="img/deskbookers.png" alt="Deskbookers" /></div>
            </div>
        </div>
        <!-- END: VERTICAL WIDGET -->

		<!-- BEGIN: SCRIPTS -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <!-- END: SCRIPTS -->
	</body>
</html>