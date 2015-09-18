<?php
$apiData = (object) [
    'name' => '<HNK> Hoofddorp',
    'rating' => 7.9,
    'review_count' => 50,
    'url' => 'https://www.deskbookers.com/nl-nl/hoofddorp/hnk-hoofddorp'
];
function safe($value, $doubleEncode = true) {
    return htmlspecialchars( (string) $value, ENT_QUOTES, 'utf-8', $doubleEncode);
}




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

        <div class="widget horizontal">
            <div class="row">
                <div class="col-xs-12">
                    <div class="title"><?php echo safe($apiData->name); ?></div>
                    </div>
                <div class="col-xs-12 all">
                    <div class="logo_round">
                        <img src="img/512.png" alt="" style="width:100%;" />
                    </div>
                    <div class="review">
                        <?php echo generateWidgetStars($apiData->rating); ?>
                        <div class="reviews">Op basis van <?php echo safe($apiData->review_count); ?> reviews</div>
                    </div>
                </div>

            </div>
            <div class="row logo">
                <div class="col-xs-6 text">Bekijk reviews op</div>
                <div class="col-xs-6 img"><img src="img/deskbookers.png" alt="" /></div>
            </div>
        </div>
<br />
<br />
        <div class="widget vertical">
            <div class="row">
                <div class="col-xs-12">
                    <div class="title"><?php echo safe($apiData->name); ?></div>
                </div>
                <div class="col-xs-12 all">
                    <div class="logo_round">
                        <img src="img/512.png" alt="" style="width:100%;" />
                    </div>
                    <div class="review">
                        <?php echo generateWidgetStars($apiData->rating); ?>
                        <div class="reviews">Op basis van <?php echo safe($apiData->review_count); ?> reviews</div>
                    </div>
                </div>

            </div>
            <div class="row logo">
                <div class="col-xs-6 text">Bekijk reviews op</div>
                <div class="col-xs-6 img"><img src="img/deskbookers.png" alt="" /></div>
            </div>
        </div>

		<!-- BEGIN: SCRIPTS -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <!-- END: SCRIPTS -->
	</body>
</html>