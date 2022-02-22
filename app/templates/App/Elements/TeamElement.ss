<div class="section section--team">
    <div class="section_content">
        <% if $ShowTitle %>
            <h2>$Title</h2>
        <% end_if %>
        <p>$Text</p>
        <div class="content_facelist <% if $Faces.Count <= 2 %>face--small<% end_if %>">
            <% loop $Faces %>
                <div class="face">
                    <% if $Name %>
                        <h3 class="face_name">
                            $Name
                        </h3>
                    <% end_if %>
                    <% if $Image %>
                        <div class="face_image">
                            $Image.Fill(300,300)
                        </div>
                    <% end_if %>
                    <% if $Profession %>
                        <h4 class="face_profession">
                            $Profession
                        </h4>
                    <% end_if %>
                    <% if $Description %>
                        <div class="face_description">
                            $Description
                        </div>
                    <% end_if %>

                    <div class="face_socials">
                        <% if $WebsiteLink %>
                            <a href="$WebsiteLink" class="social_button"><img src="images/social_media/logo_website.png"></a>
                        <% end_if %>
                        <% if $Mail %>
                            <a href="mailto:$Mail" class="social_button"><img src="images/social_media/logo_mail.png"></a>
                        <% end_if %>
                        <% if $TwitterLink %>
                            <a href="$TwitterLink" class="social_button"><img src="images/social_media/logo_twitter.png"></a>
                        <% end_if %>
                        <% if $InstagramLink %>
                            <a href="$InstagramLink" class="social_button"><img src="images/social_media/logo_instagram.png"></a>
                        <% end_if %>
                        <% if $LinkedInLink %>
                            <a href="$LinkedInLink" class="social_button"><img src="images/social_media/logo_linkedin.png"></a>
                        <% end_if %>
                        <% if $RedditLink %>
                            <a href="$RedditLink" class="social_button"><img src="images/social_media/logo_reddit.png"></a>
                        <% end_if %>
                        <% if $FacebookLink %>
                            <a href="$FacebookLink" class="social_button"><img src="images/social_media/logo_facebook.png"></a>
                        <% end_if %>
                        <% if $PinterestLink %>
                            <a href="$PinterestLink" class="social_button"><img src="images/social_media/logo_pinterest.png"></a>
                        <% end_if %>
                        <% if $TikTokLink %>
                            <a href="$TikTokLink" class="social_button"><img src="images/social_media/logo_tiktok.png"></a>
                        <% end_if %>
                        <% if $FlickrLink %>
                            <a href="$FlickrLink" class="social_button"><img src="images/social_media/logo_flickr.png"></a>
                        <% end_if %>
                        <% if $YoutubeLink %>
                            <a href="$YoutubeLink" class="social_button"><img src="images/social_media/logo_youtube.png"></a>
                        <% end_if %>
                        <% if $SoundcloudLink %>
                            <a href="$SoundcloudLink" class="social_button"><img src="images/social_media/logo_soundcloud.png"></a>
                        <% end_if %>
                        <% if $GitHubLink %>
                            <a href="$GitHubLink" class="social_button"><img src="images/social_media/logo_github.png"></a>
                        <% end_if %>
                        <% if $BehanceLink %>
                            <a href="$BehanceLink" class="social_button"><img src="images/social_media/logo_behance.png"></a>
                        <% end_if %>
                        <% if $TelegramLink %>
                            <a href="$TelegramLink" class="social_button"><img src="images/social_media/logo_telegram.png"></a>
                        <% end_if %>
                    </div>
                </div>
            <% end_loop %>
        </div>
    </div>
</div>
