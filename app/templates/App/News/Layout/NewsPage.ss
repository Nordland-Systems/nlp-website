<div class="section section--news">
    <div class="section_content">

        <div class="news_socials">
            <a href="https://twitter.com/NordlandPark" class="social_icon"><img src="images/social_media/logo_twitter.png"></a>
            <a href="https://www.youtube.com/channel/UCGzoVFbz2ILFBaJpZNzRBJA" class="social_icon"><img src="images/social_media/logo_youtube.png"></a>
            <a href="https://www.instagram.com/nordlandpark/" class="social_icon"><img src="images/social_media/logo_instagram.png"></a>
        </div>

        <% if $Events.Count > 0 %>
            <div class="news_events">
                <h2>Anstehende Events:</h2>
                <% loop $Events %>
                    <div class="event_item">
                        <div class="event_item_image">
                            $Image.FocusFill(1000,300)
                        </div>
                        <div class="event_item_text">
                            <p>$FormattedStartDate<% if $HasEndTime %> - $FormattedEndDate<% end_if %></p>
                            <h3>$Title</h3>
                        </div>
                    </div>
                <% end_loop %>
            </div>
            <% include Pagination ItemList=$Events %>
        <% end_if %>

        <div class="news_grid">

            <div class="news_posts">
                <h2>Aktuelle Beiträge</h2>
                <% if $News.Count > 0 %>
                <div class="news">
                    <% loop $News %>
                        <% include NewsItem %>
                    <% end_loop %>
                </div>
                <% include Pagination ItemList=$News %>
                <% else %>
                    <p class="centered">- Keine Beiträge gefunden -</p>
                <% end_if %>
            </div>

            <div class="news_youtube">
                <h2>Aktuelles Video</h2>
                <iframe width="560" height="auto" src="$YoutubeLink" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div class="news_twitter">
                <a class="twitter-timeline" href="https://twitter.com/NordlandPark?ref_src=twsrc%5Etfw" data-tweet-limit="3" data-chrome="nofooter noborders">Aktuelle Tweets</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
    </div>
</div>
