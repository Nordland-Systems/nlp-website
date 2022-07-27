<?xml version="1.0" encoding="UTF-8"?><rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	>
    <channel>
        <title>$Title.CDATA</title>
        <link>$Link</link>
        <atom:link href="https://new.nordland-park.de/neuigkeiten/rss" rel="self" type="application/rss+xml" />
        <description>$Description.CDATA</description>
        <lastBuildDate><% loop $Entries.Sort("Date", DESC).Limit(1) %>$Date.RFC822<% end_loop %></lastBuildDate>
        <language>de-DE</language>
        <sy:updatePeriod>hourly</sy:updatePeriod>
        <sy:updateFrequency>1</sy:updateFrequency><image><url>https://new.nordland-park.de/favicon-32x32.png</url>
            <title>$Title</title>
            <link>$Link</link>
            <width>32</width>
            <height>32</height>
        </image>
        <% loop $Entries %>
            <item><title>$Title.CDATA</title>
                <link>$AbsoluteLink.CDATA</link>
                <image>$Image.AbsoluteLink</image>
                <description>$Summary.CDATA</description>
                <% if $Date %><pubDate>$Date.RFC822</pubDate>
                <% else %><pubDate>$Created.RFC822</pubDate><% end_if %>
                <guid isPermaLink="true">$AbsoluteLink</guid></item>
        <% end_loop %>
    </channel>
</rss>
