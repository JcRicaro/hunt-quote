<meta name="title" content="Quotes by {{ $author->getName() }}">
<meta name="keywords" content="<?php meta_author($author); ?>">
<meta property="og:title" content="Quotes by {{ $author->getName() }}" />
<meta property="og:description" content="Enjoy the best {{ $author->getName() }} at HuntQuote. Quotations by {{ $author->getName() }}{{ meta_authorDesc($author->professions, $author->nationality) }}Born {{ date('M d, y', $author->birth_date->timestamp) }}. Share with your friends.">
<meta name="description" content="Enjoy the best {{ $author->getName() }} at HuntQuote. Quotations by {{ $author->getName() }}{{ meta_authorDesc($author->professions, $author->nationality) }}Born {{ date('M d, y', $author->birth_date->timestamp) }}. Share with your friends.">