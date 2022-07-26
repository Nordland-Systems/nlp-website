<div class="header" data-behaviour="sticky-header">
    <div class="header_topbar">
        <ul>
            <% loop $Menu(1) %>
                <% if $MenuPosition == "topbar" %>
                    <li class="<% if $LinkOrSection == "section" %> nav_link--active<% end_if %>">
                        <a href="$Link">$MenuTitle</a>
                    </li>
                <% end_if %>
            <% end_loop %>
        </ul>
        <div class="header_topbar_darkmode">
            <input type="checkbox" class="checkbox" id="checkbox" name="darkmode">
            <label for="checkbox" class="label">
                <div class='ball'>
                    <svg width="100%" height="100%" viewBox="0 0 24 24"><path fill="CurrentColor" d="M21.915,13.313c-1.357,1.057 -3.062,1.687 -4.915,1.687c-4.418,0 -8,-3.582 -8,-8c0,-1.853 0.63,-3.558 1.687,-4.915c-4.902,0.643 -8.687,4.837 -8.687,9.915c0,5.523 4.477,10 10,10c5.078,0 9.272,-3.785 9.915,-8.687Z"/></svg>
                    <svg width="100%" height="100%" viewBox="0 0 24 24"><path fill="CurrentColor" d="M12,17c0.552,0 1,0.448 1,1l0,3c0,0.552 -0.448,1 -1,1c-0.552,0 -1,-0.448 -1,-1l0,-3c0,-0.552 0.448,-1 1,-1Zm-7.071,2.071c-0.39,-0.391 -0.39,-1.024 0,-1.414l2.121,-2.121c0.391,-0.391 1.024,-0.391 1.415,-0c0.39,0.39 0.39,1.023 -0,1.414l-2.122,2.121c-0.39,0.391 -1.023,0.391 -1.414,0Zm14.142,0c-0.39,0.391 -1.024,0.391 -1.414,0l-2.121,-2.121c-0.391,-0.391 -0.391,-1.024 -0,-1.414c0.39,-0.391 1.023,-0.391 1.414,-0l2.121,2.121c0.391,0.39 0.391,1.023 0,1.414Zm-7.071,-3.071c2.209,0 4,-1.791 4,-4c0,-2.209 -1.791,-4 -4,-4c-2.209,0 -4,1.791 -4,4c0,2.209 1.791,4 4,4Zm5,-4c0,-0.552 0.448,-1 1,-1l3,0c0.552,0 1,0.448 1,1c0,0.552 -0.448,1 -1,1l-3,0c-0.552,0 -1,-0.448 -1,-1Zm-15,0c0,-0.552 0.448,-1 1,-1l3,0c0.552,0 1,0.448 1,1c0,0.552 -0.448,1 -1,1l-3,0c-0.552,0 -1,-0.448 -1,-1Zm13.536,-3.536c-0.391,-0.39 -0.391,-1.023 -0,-1.414l2.121,-2.121c0.39,-0.391 1.024,-0.391 1.414,-0c0.391,0.39 0.391,1.024 0,1.414l-2.121,2.121c-0.391,0.391 -1.024,0.391 -1.414,0Zm-7.072,0c-0.39,0.391 -1.023,0.391 -1.414,0l-2.121,-2.121c-0.391,-0.39 -0.391,-1.024 -0,-1.414c0.39,-0.391 1.024,-0.391 1.414,-0l2.121,2.121c0.391,0.391 0.391,1.024 0,1.414Zm3.536,-6.464c0.552,0 1,0.448 1,1l0,3c0,0.552 -0.448,1 -1,1c-0.552,0 -1,-0.448 -1,-1l0,-3c0,-0.552 0.448,-1 1,-1Z"/></svg>
                </div>
            </label>
        </div>
        <div class="header_topbar_socials">
            <a href="https://twitter.com/NordlandPark" target="_blank" class="social_button"><img src="images/social_media/logo_twitter.png"></a>
            <a href="https://discord.gg/V3nCVXn" target="_blank" class="social_button"><img src="images/social_media/logo_discord.png"></a>
            <a href="https://github.com/Nordland-Systems/nlp-website" target="_blank" class="social_button"><img src="images/social_media/logo_github.png"></a>
        </div>
        <% if $Locales %>
            <div class="header_topbar_language">
                <ul>
                    <% loop $Locales %>
                        <% if $LinkingMode != "current" %>
                            <li class="$LinkingMode">
                                <a href="$Link.ATT" <% if $LinkingMode != 'invalid' %>rel="alternate"
                                hreflang="$LocaleRFC1766"<% end_if %>>$Title</a>
                            </li>
                        <% end_if %>
                    <% end_loop %>
                </ul>
            </div>
        <% end_if %>
    </div>

    <div class="header_mainbar">
        <nav class="header_mainbar_nav">
            <div class="nav_logo">
                <a href="" class="nav_brand_white">
                    <img src="images/NLP_LogoBannerWhite_SVG_wot.svg">
                </a>
                <a href="" class="nav_brand">
                    <img src="images/NLP_LogoBanner_SVG_wot.svg">
                </a>
            </div>
            <div class="nav_menu">
                <ul>
                    <% loop $Menu(1) %>
                        <% if $MenuPosition == "main" %>
                            <li class="<% if $LinkOrSection == "section" %> nav_link--active<% end_if %>">
                                <a href="$Link">$MenuTitle</a>
                            </li>
                        <% end_if %>
                    <% end_loop %>
                </ul>
            </div>
        </nav>
    </div>

    <div class="header_mobile">
        <div class="header_mobile_socials">
            <a href="https://twitter.com/NordlandPark" class="social_button"><img src="images/social_media/logo_twitter.png"></a>
            <a href="https://discord.gg/V3nCVXn" class="social_button"><img src="images/social_media/logo_discord.png"></a>
        </div>
        <a href="../" class="nav_brand">
            <img src="images/NLP_LogoBanner_SVG_wot.svg">
        </a>
        <div class="nav_button" data-behaviour="toggle-menu">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
            <div class="bar4"></div>
        </div>
        <div class="nav_menu">
            <ul>
                <% loop $Menu(1) %>
                    <% if $MenuPosition == "main" %>
                        <li class="<% if $LinkOrSection == "section" %> nav_link--active<% end_if %>">
                            <a href="$Link">$MenuTitle</a>
                        </li>
                    <% end_if %>
                <% end_loop %>
            </ul>
            <span class="spacer"></span>
            <ul class="topbar_menu">
                <% loop $Menu(1) %>
                    <% if $MenuPosition == "topbar" %>
                        <li class="<% if $LinkOrSection == "section" %> nav_link--active<% end_if %>">
                            <a href="$Link">$MenuTitle</a>
                        </li>
                    <% end_if %>
                <% end_loop %>
            </ul>
        </div>
    </div>

    <a class="totopbutton" data-behaviour="totopbutton">
        <span></span>
    </a>
</div>

<% if $ShowHeroImage == "hide" %>
<% else %>
    <% if $Image %>
        <section class="section section--headerimage overlay--hero" style="height: 350px" >
            <div class="section_content" data-behaviour="parallax" data-speed="0.3" style="background-image:url($Image.FocusFill(2000,1000).Link)">

            </div>
            <% if $ShowHeroImage == "show-with-title"  %>
                <div class="section_title">
                        <h1>$Title</h1>
                </div>
            <% end_if %>
        </section>
    <% else %>
        <section class="section section--headerimage overlay--hero" style="height: 150px" >
            <% if $ShowHeroImage == "show-with-title"  %>
                <div class="section_title">
                        <h1>$Title</h1>
                </div>
            <% end_if %>
        </section>
    <% end_if %>
<% end_if %>
