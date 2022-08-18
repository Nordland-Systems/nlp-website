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
            <a href="https://twitter.com/NordlandPark" target="_blank" class="social_button"><img alt="Twitter Logo" src="images/social_media/logo_twitter.png"></a>
            <a href="https://discord.gg/V3nCVXn" target="_blank" class="social_button"><img alt="Discord Logo" src="images/social_media/logo_discord.png"></a>
            <a href="https://github.com/Nordland-Systems/nlp-website" target="_blank" class="social_button"><img alt="Github Logo" src="images/social_media/logo_github.png"></a>
        </div>
    </div>
</div>
