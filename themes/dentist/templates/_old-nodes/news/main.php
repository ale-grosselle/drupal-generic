<?php

function drawSingleNews($nodes)
{
	$html = "";
	foreach ($nodes as $node) {
		$title = $node->title;
		$image = NULL;
		if ($title == NULL) {
			continue;
		}
		if (isset($node->field_image) && sizeof($node->field_image) > 0) {
			foreach ($node->field_image["und"] as $img) {
				$imgHtml = "<img src='{IMG}'/>";
				$imgHtml = str_ireplace("{IMG}", file_create_url($img['uri']), $imgHtml);
				$image .= $imgHtml;
			}
		} else {
			$imgHtml = "<img src='{IMG}'/>";
			$image = file_create_url("public://default_images/news-2.jpg");
			$imgHtml = str_ireplace("{IMG}", $image, $imgHtml);
			$image .= $imgHtml;
		}

		$description = getValue($node->body);

		$html .= <<<HTML
                    <div class="entry" style="cursor: pointer;" onclick="goToNews(this)">
                        <div class="entry-date">
                            <div class="entry-day">{DAY}</div>
                            <div class="entry-month">{MONTH}</div>
                        </div>
                        <div class="entry-body">
                            <h4 class="entry-title"><a href="{URL}">{TITLE}</a></h4>
                            <div class="entry-meta"><a href="#"></a></div>
                            <div class="entry-content">
                                <div class="section-news">{DESCRIPTION}</div>
                                <a href="{URL}">Vai alla news</a>
                            </div>
                        </div>
                    </div>
HTML;
		$mons = array(
			1 => "Gen",
			2 => "Feb",
			3 => "Mar",
			4 => "Apr",
			5 => "Mag",
			6 => "Giu",
			7 => "Lug",
			8 => "Ago",
			9 => "Sep",
			10 => "Oct",
			11 => "Nov",
			12 => "Dec"
		);
		$date = getdate(strtotime(getValue($node->field_date_news)));
		$html = str_ireplace("{TITLE}", $title, $html);
		$html = str_ireplace("{IMG}", $image, $html);
		$html = str_ireplace("{DESCRIPTION}", $description, $html);
		$html = str_ireplace("{DAY}", $date["mday"], $html);
		$html = str_ireplace("{MONTH}", $mons[$date["mon"]], $html);
		//Set URL
		$options = array('absolute' => TRUE);
		$url = url('node/' . $node->nid, $options);
		$html = str_ireplace("{URL}", $url, $html);
	}
	$html = "<li>" . $html . "</li>";

	return $html;

}

function getHtmlListNews(){
	$html = <<<HTML
     <script>
        var goToNews = function(el){
            jQuery(el).find("a")[0].click();
        }
    </script>
     <h3 class="title-news">News</h3>
            <!-- begin post carousel -->
            <ul class="post-carousel">
                <!-- begin first column -->
                {LIST}
                <!-- end first column -->
            </ul>
            <!-- end post carousel -->
HTML;
	return $html;
}


function getAllNews($n){
	function cmp($a, $b){
		return $a[0] < $b[0];
	}
	$nodes = getAllNodes("article");
	$ns = array();
	$nReturned = array();
	foreach ($nodes as $node) {
		$n = array();
		$n[0] = strtotime(getValue($node->field_date_news));
		$n[1] = $node;
		array_push($ns, $n);
	}
	usort($ns, "cmp");
	foreach ($ns as $singleNode) {
		array_push($nReturned, $singleNode[1]);
	}
	return $nReturned;
}


$news = getAllNews(-1);
$out = "";
$NEWS_PER_PAGE = 3;
for ($j = 0; $j < sizeof($news);) {
	if ($NEWS_PER_PAGE > sizeof($news)) {
		$out .= drawSingleNews($news);
		$j = sizeof($news);
	} else {
		$a = array();
		for ($i = 0; $i < $NEWS_PER_PAGE; $i++) {
			if(isset($news[$j + $i]))
				array_push($a, $news[$j + $i]);
		}
		$j += $NEWS_PER_PAGE;
		$out .= drawSingleNews($a);
	}
}
print str_ireplace("{LIST}", $out, getHtmlListNews());