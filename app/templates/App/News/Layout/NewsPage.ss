<div class="section section--news">
    <div class="section_content">

        <div class="news_socials">
        <% if $SiteConfig.LinkTwitter %>
            <a href="$SiteConfig.LinkTwitter" target="_blank" class="social_icon"><img src="images/social_media/logo_twitter.png"></a>
        <% end_if %>
        <% if $SiteConfig.LinkYouTube %>
            <a href="$SiteConfig.LinkYouTube" target="_blank" class="social_icon"><img src="images/social_media/logo_youtube.png"></a>
        <% end_if %>
        <% if $SiteConfig.LinkInstagram %>
            <a href="$SiteConfig.LinkInstagram" target="_blank" class="social_icon"><img src="images/social_media/logo_instagram.png"></a>
        <% end_if %>
        <% if $SiteConfig.LinkDiscord %>
            <a href="$SiteConfig.LinkDiscord" target="_blank" class="social_icon"><img src="images/social_media/logo_discord.png"></a>
        <% end_if %>
        </div>

        <% if $FutureEvents.Count > 0 %>
            <div class="news_events">
                <h2><%t App.CURRENTEVENTS 'Anstehende Events' %></h2>
                <% loop $FutureEvents %>
                    <div class="event_item">
                        <% if $Image %>
                            <div class="event_item_image">
                                $Image.FocusFill(1000,300)
                            </div>
                        <% end_if %>
                        <div class="event_item_text">
                            <div class="item_part title">
                                <% if $Allday %>
                                    <p class="event_date">$AllDayDate <span>(<%t App.ALLDAY 'Ganztägig' %>)</span></p>
                                <% else %>
                                    <p class="event_date">$FormattedStartDate</p>
                                    <% if $HasEndTime %><p class="event_date"> - $FormattedEndDate</p><% end_if %>
                                <% end_if %>
                                <h3>$Title</h3>



                            </div>
                            <% if $Description %>
                            <div class="item_part description">
                                $Description
                            </div>
                            <% else %>
                                <div class="placeholder">
                                </div>
                            <% end_if %>
                            <% if $Link %>
                                <div class="item_part link">
                                    <a href="$Link.Url" <% if $Link.OpenInNew %> target="_blank"<% end_if %> class="link--button hollow white readmore">$Link.Title</a>
                                </div>
                            <% end_if %>
                        </div>
                    </div>
                <% end_loop %>
            </div>
            <% include Pagination ItemList=$FutureEvents %>
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
