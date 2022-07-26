<?xml version="1.0"?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>$Title</title>
        <link>$Link</link>
        <atom:link href="$Link" rel="self" type="application/rss+xml" />
        <description>$Description.XML</description>

        <lastBuildDate><% loop $Entries.Sort("Date", DESC).Limit(1) %>$Date<% end_loop %></lastBuildDate>
        <language>de-DE</language>
        <sy:updatePeriod>hourly</sy:updatePeriod>
        <sy:updateFrequency>1</sy:updateFrequency>

        <image>
            <url>../../favicon-32x32.png</url>
            <title>$Title</title>
            <link>https://www.nordland-park.de</link>
            <width>32</width>
            <height>32</height>
        </image>

        <% loop $Entries %>
            <item>
                <title>$Title.XML</title>
                <link>$AbsoluteLink.XML</link>
                <description>$Summary</description>
                <% if $Date %><pubDate>$Date</pubDate>
                <% else %><pubDate>$Created</pubDate><% end_if %>
                <guid>$AbsoluteLink</guid>
            </item>
        <% end_loop %>
    </channel>
</rss>
