<?php

const PUBLIC_PAGES = [
    'index',
    'bothdesign',
    'contactus',
    'distributorplacement',
    'getquote',
    'industries',
    'leadgeneration',
    'logistic',
    'potfolio',
    'printable',
    'product',
    'staff',
    'strategy',
    'usamarket',
    'wearhose',
];

define('TSR_STATIC_EXPORT', true);

$root = __DIR__;
$output = $root . DIRECTORY_SEPARATOR . '_site';
if (!is_dir($output) && !mkdir($output, 0755, true) && !is_dir($output)) {
    throw new RuntimeException('Unable to create the static output directory.');
}

$renderPage = static function (string $pagePath, string $route): string {
    $_SERVER['PHP_SELF'] = $route . '.php';
    $_SERVER['REQUEST_METHOD'] = 'GET';
    ob_start();
    include $pagePath;
    $html = ob_get_clean();
    if ($html === false) {
        throw new RuntimeException('Unable to capture rendered page: ' . $route);
    }

    $html = preg_replace('/\.php(?=([?#"\']))/i', '.html', $html);
    if ($html === null) {
        throw new RuntimeException('Unable to rewrite page links: ' . $route);
    }
    return $html;
};

foreach (PUBLIC_PAGES as $route) {
    $pagePath = $root . DIRECTORY_SEPARATOR . $route . '.php';
    if (!is_file($pagePath)) {
        throw new RuntimeException('Public page does not exist: ' . $pagePath);
    }

    $html = $renderPage($pagePath, $route);
    $destination = $output . DIRECTORY_SEPARATOR . $route . '.html';
    if (file_put_contents($destination, $html) === false) {
        throw new RuntimeException('Unable to write static page: ' . $destination);
    }
}

$quoteRedirect = <<<'HTML'
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="refresh" content="0;url=getquote.html">
  <title>Get a Quote | Trade Show Realm</title>
</head>
<body>
  <p>Continue to <a href="getquote.html">Get a Quote</a>.</p>
</body>
</html>
HTML;
if (file_put_contents($output . DIRECTORY_SEPARATOR . 'quote.html', $quoteRedirect) === false) {
    throw new RuntimeException('Unable to write the quote redirect.');
}

$assetsSource = $root . DIRECTORY_SEPARATOR . 'assets';
$assetsTarget = $output . DIRECTORY_SEPARATOR . 'assets';
$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($assetsSource, FilesystemIterator::SKIP_DOTS),
    RecursiveIteratorIterator::SELF_FIRST
);
foreach ($iterator as $entry) {
    $relativePath = substr($entry->getPathname(), strlen($assetsSource) + 1);
    $destination = $assetsTarget . DIRECTORY_SEPARATOR . $relativePath;
    if ($entry->isDir()) {
        if (!is_dir($destination) && !mkdir($destination, 0755, true) && !is_dir($destination)) {
            throw new RuntimeException('Unable to create asset directory: ' . $destination);
        }
    } elseif (!copy($entry->getPathname(), $destination)) {
        throw new RuntimeException('Unable to copy asset: ' . $entry->getPathname());
    }
}

if (file_put_contents($output . DIRECTORY_SEPARATOR . '.nojekyll', '') === false) {
    throw new RuntimeException('Unable to write the Pages configuration marker.');
}

printf("Generated %d static pages in %s\n", count(PUBLIC_PAGES) + 1, $output);
