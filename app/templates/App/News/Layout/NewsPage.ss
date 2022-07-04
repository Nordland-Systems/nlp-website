<div class="section section--news">
    <div class="section_content">

        <div class="news_socials">
            <a href="https://twitter.com/NordlandPark" class="social_icon"><img src="images/social_media/logo_twitter.png"></a>
            <a href="https://www.youtube.com/channel/UCGzoVFbz2ILFBaJpZNzRBJA" class="social_icon"><img src="images/social_media/logo_youtube.png"></a>
            <a href="https://www.instagram.com/nordlandpark/" class="social_icon"><img src="images/social_media/logo_instagram.png"></a>
        </div>

        <% if $Events.Count > 0 %>
            <div class="news_events">
                <h2><%t App.CURRENTEVENTS 'Anstehende Events' %></h2>
                <% loop $Events %>
                    <div class="event_item">
                        <div class="event_item_image">
                            $Image.FocusFill(1000,300)
                        </div>
                        <div class="event_item_text">
                            <p>$FormattedStartDate<% if $HasEndTime %> - $FormattedEndDate<% end_if %></p>
                            <h3>$Title</h3>
                            <% if $Link %>
                                <a href="$Link.Url" <% if $Link.OpenInNew %> target="_blank"<% end_if %> class="link--button hollow white readmore">$Link.Title</a>
                            <% end_if %>
                        </div>
                    </div>
                <% end_loop %>
            </div>
            <% include Pagination ItemList=$Events %>
        <% end_if %>

        <div class="news_grid">

            <div class="news_posts">
                <h2><%t App.CURRENTPOSTS 'Aktuelle Beiträge' %></h2>
                <% if $News.Count > 0 %>
                <div class="news">
                    <% loop $News %>
                        <% include NewsItem %>
                    <% end_loop %>
                </div>
                <% include Pagination ItemList=$News %>
                <% else %>
                    <p class="centered"><%t App.NORESULTS '- Keine Ergebnisse -' %></p>
                <% end_if %>
            </div>

            <div class="news_youtube">
                <h2><%t App.CURRENTVIDEO 'Aktuelles Video' %></h2>
                <div class="youtube_wrap" data-behaviour="youtube_wrap">
                    <iframe width="560" height="315" data-src="https://www.youtube-nocookie.com/embed/videoseries?list=$YoutubeLink" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>

            <div class="news_twitter">
                <div class="twitter_light">
                    <a class="twitter-timeline light" href="https://twitter.com/NordlandPark?ref_src=twsrc%5Etfw" data-theme="light" data-tweet-limit="3" data-chrome="nofooter noborders transparent">Aktuelle Tweets</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
                <div class="twitter_dark">
                    <a class="twitter-timeline dark" href="https://twitter.com/NordlandPark?ref_src=twsrc%5Etfw" data-theme="dark" data-tweet-limit="3" data-chrome="nofooter noborders transparent">Aktuelle Tweets</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
        </div>
    </div>
</div>
