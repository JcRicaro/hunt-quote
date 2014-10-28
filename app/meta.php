<?php

function meta_authorIndex($letters)
{
	foreach($letters as $letter => $authors)
	{
		foreach($authors as $index => $author)
		{
			echo $author->getName();

			echo ", ";
		}
	}

}

function meta_authorAlpha($authors)
{
	foreach($authors as $author)
	{
		echo $author->getName();
		echo ", ";
	}
}

function meta_author($author)
{
	echo sprintf("%s, %s, %s,",
		$author->getName(),
		$author->firstname,
		$author->lastname
	);

	foreach($author->professions as $profession)
	{
		echo $profession->name;
		echo ", ";
	}

	echo $author->nationality->name;
}

function meta_authorDesc($professions, $nationality)
{
	$str = '';
	if($professions->count())
	{
		foreach($professions as $profession)
		{
			$str .= sprintf("%s %s, ",
				$nationality->name,
				$profession->name
			);
		}
	}
	else
	{
		$str = ", ";
	}

	return $str;
}

function meta_professionIndex($professions)
{
	foreach($professions as $profession)
	{
		echo $profession->name;
		echo ", ";
	}
}

function meta_profession($authors)
{
	foreach($authors as $author)
	{
		echo sprintf("%s, %s, %s, %s,",
			$author->getName(),
			$author->firstname,
			$author->lastname,
			$author->fullname
		);
	}
}

function meta_quote($quote)
{
	$string = '';

	foreach($quote->tags as $tag)
	{
		$string .= sprintf("%s, ", $tag->name);
	}

	foreach($quote->topics as $topic)
	{
		$string .= sprintf("%s", $topic->name);
	}

	foreach($quote->author->professions as $profession)
	{
		$string .= sprintf("%s, ", $profession->name);
	}

	$string .= sprintf("%s, %s, %s, %s,",
		$quote->author->getName(),
		$quote->author->firstname,
		$quote->author->lastname,
		$quote->author->fullname
	);


	$string .= sprintf("%s",
		$quote->author->nationality->name
	);

	return $string;
}

function meta_quotePhotos($quotes)
{
	$string = '';

	foreach($quotes as $quote)
	{
		foreach($quote->tags as $tag)
		{
			$string .= sprintf("%s, ", $tag->name);
		}
	}

	$string .= sprintf("%s, %s, %s",
		'photo quote',
		'quotes',
		'quote'
	);

	return $string;
}

function meta_topicIndex($topics)
{
	$string = '';

	foreach($topics as $topic)
	{
		$string .= sprintf("%s, ",
			$topic->name
		);
	}

	$string .= sprintf("%s, %s, %s",
		'topics',
		'holiday',
		'seasonal'
	);

	return $string;
}

function meta_topic($topic)
{
	$string = '';

	foreach($topic->quotes as $quote)
	{
		$string .= sprintf("%s, ",
			$quote->author['fullname']
		);
	}

	$string .= $topic->name;

	return $string;
}

function meta_home($topics, $authors, $birthdays, $topicsToExplore, $authorsToExplore)
{
	$string = '';

	foreach($topics as $topic)
	{
		$string .= sprintf("%s, ",
			$topic->name
		);
	}

	foreach($authors as $author)
	{
		$string .= sprintf("%s, ",
			$author->getName()
		);
	}


	foreach($birthdays as $author)
	{
		$string .= sprintf("%s, %s, ",
			$author->getName(),
			$author->birth_date->format('Y-m-d')
		);
	}

	foreach($topicsToExplore as $topic)
	{
		$string .= sprintf("%s, ",
			$topic->name
		);
	}

	foreach($authorsToExplore as $author)
	{
		$string .= sprintf("%s, ",
			$author->getName()
		);
	}

	$string .= sprintf("%s, %s, %s, %s, %s, %s, %s",
		'HuntQuote',
		'Quotes',
		'Quotes by Authors',
		'Quotes by Topics',
		'Holiday Quotes',
		'Quote by Nationality',
		'Quote by Profession',
		'Picture Quotes'
	);

	return $string;
}

function meta_nationality($nationality)
{
	$string = '';

	if( $nationality->authors->count() )
	{

		foreach($nationality->authors as $author)
		{
			$string .= sprintf("%s, ",
				$author->getName()
			);
		}

	}

	$string .= sprintf("%s",
		$nationality->name
	);

	return $string;
}

function meta_nationalityIndex($nationalities)
{
	$string = '';

	foreach($nationalities as $nationality)
	{
		$string .= sprintf("%s, ",
			$nationality->name
		);
	}

	$string .= sprintf("%s, %s, %s, %s, %s",
		'Nationality',
		'Quotes by Nationality',
		'Author by Nationality',
		'Authors',
		'Author Quotes'
	);

	return $string;
}

function meta_tagIndex($tags)
{
	$string = '';

	foreach($tags as $chunk) {
		foreach($chunk as $tag)
		{
			$string .= sprintf("%s, ",
				$tag->name
			);
		}
	}

	$string .= sprintf("%s, %s, %s",
		"HuntQuote",
		"Tags",
		"By tag"
	);

	return $string;
}