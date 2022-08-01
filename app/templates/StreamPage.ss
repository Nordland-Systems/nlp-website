<!DOCTYPE html>
<html lang="de">
    <head>
        <% base_tag %>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <meta name="description" content="$MetaDescription">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta charset="utf-8">
        <title>$Title - $SiteConfig.Title</title>
        <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
        <link rel="manifest" href="../site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#ffffff">

        <meta property="og:title" content="$Title - $SiteConfig.Title" />
        <meta property="og:site_name" content="$Title" />
        <meta property="og:type" content="article" />
        <meta property="og:description" content="$MetaDescription">
        <meta property="og:url" content="$Link" />
        <% if $Image %>
        <meta property="og:image" content="$Image.Link" />
        <% else %>
        <meta property="og:image" content="/socialmedia.png" />
        <meta property="og:image:alt" content="Das Nordland-Park-Logo mit Konzept Art" />
        <% end_if %>
        <meta property="og:image:type" content="image/jpeg" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="630" />
        <meta property="og:locale" content="de_DE" />
        <meta name="twitter:card" content="summary_large_image">

        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="$Mix("/css/styles.min.css")">
    </head>
    <body>
        $Layout
        <script src="$Mix("/js/main.js")"></script>
    </body>
</html>
