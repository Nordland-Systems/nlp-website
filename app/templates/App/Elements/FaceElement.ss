<div class="section section--face $Variant">
    <div class="section_content">
        <% if $Image %>
            <div class="content_face">
                $Image.FocusFill(800,800)
            </div>
        <% end_if %>
        <div class="content_text">
            <% if ShowTitle %>
                <h2 class="text_title">$Title</h2>
            <% end_if %>
            <div class="text_content">$Text</div>
            <div class="text_socials">
                <% if $TwitterLink %>
                    <a href="$TwitterLink" class="social_button"><img src="images/social_media/logo_twitter.png"></a>
                <% end_if %>
                <% if $LinkedInLink %>
                    <a href="$LinkedInLink" class="social_button"><img src="images/social_media/logo_linkedin.png"></a>
                <% end_if %>
                <% if $InstagramLink %>
                    <a href="$InstagramLink" class="social_button"><img src="images/social_media/logo_instagram.png"></a>
                <% end_if %>
            </div>
        </div>
    </div>
</div>
