<div class="section section--fullwidth footer">
    <div class="footer_icon">
        <a href="/"><img src="images/NLP_LogoBanner_SVG.svg"></a>
    </div>
    <div class="footer_menu_container">
        <ul>
            <% loop $Menu(1) %>
                    <% if $MenuPosition == "footer" %>
                    <li>
                        <a href="$Link" class="footer_text">$MenuTitle</a>
                    </li>
                    <% end_if %>
            <% end_loop %>

        </ul>
        <div class="footer_menu_socials">
            <a href="https://twitter.com/NordlandPark" target="_blank" class="social_button"><img src="images/social_media/logo_twitter.png"></a>
            <a href="https://discord.gg/V3nCVXn" target="_blank" class="social_button"><img src="images/social_media/logo_discord.png"></a>
            <a href="https://github.com/Nordland-Systems/nlp-website" target="_blank" class="social_button"><img src="images/social_media/logo_github.png"></a>
        </div>
    </div>
</div>
