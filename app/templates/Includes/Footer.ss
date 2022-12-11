<div class="section section--fullwidth footer">
    <div class="footer_icon">
        <a class="home" href="/"><img alt="Logo des Nordland-Parks" src="images/NLP_LogoBanner_SVG.svg"></a>
    </div>
    <div class="footer_menu_container">
        <ul>
            <% loop $Menu(1) %>
                    <% if $MenuPosition == "footer" %>
                    <li>
                        <a href="$Link" class="footer_text footer_menu_link">$MenuTitle</a>
                    </li>
                    <% end_if %>
            <% end_loop %>

        </ul>
        <% if $CurrentMember %>
            <div class="footer_loginstatus">
                <p class="currentuser">Eingeloggt als '$CurrentUser.Name' <a class="button hollow white" href="home/logout">Logout</a></p>
            </div>
        <% end_if %>
        <div class="footer_menu_socials">
            <% if $SiteConfig.LinkTwitter %>
            <a href="$SiteConfig.LinkTwitter" target="_blank" class="social_button twitter"><img alt="Twitter Logo" src="images/social_media/logo_twitter.png"></a>
        <% end_if %>
        <% if $SiteConfig.LinkDiscord %>
            <a href="$SiteConfig.LinkDiscord" target="_blank" class="social_button discord"><img alt="Discord Logo" src="images/social_media/logo_discord.png"></a>
        <% end_if %>
        <% if $SiteConfig.LinkGitHub %>
            <a href="$SiteConfig.LinkGitHub" target="_blank" class="social_button github"><img alt="Github Logo" src="images/social_media/logo_github.png"></a>
        <% end_if %>
        </div>
    </div>
</div>
