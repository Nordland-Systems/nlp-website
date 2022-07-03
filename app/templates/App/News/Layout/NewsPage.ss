<div class="section section--news">
    <div class="section_content">
        <div class="news_grid">
            <div class="news_posts">
                <div class="news">
                    <% loop $News %>
                        <% include NewsItem %>
                    <% end_loop %>
                </div>
                <% include Pagination ItemList=$News %>
            </div>
            <div class="news_youtube">
            <iframe width="560" height="100%" src="https://www.youtube.com/embed/videoseries?list=PLocB-Pr2mEkDOuKQvO3c58OYD8o7iqdZb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="news_twitter">
                <a class="twitter-timeline" href="https://twitter.com/NordlandPark?ref_src=twsrc%5Etfw" data-tweet-limit="3" data-chrome="nofooter noborders">Tweets von NordlandPark</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
            <div class="news_socials">
                <a href="https://twitter.com/NordlandPark" class="social_icon"><img src="images/social_media/logo_twitter.png"></a>
                <a href="https://www.youtube.com/channel/UCGzoVFbz2ILFBaJpZNzRBJA" class="social_icon"><img src="images/social_media/logo_youtube.png"></a>
            </div>
        </div>
    </div>
</div>
