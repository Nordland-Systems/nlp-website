<div class="header" data-behaviour="sticky-header">
    <div class="header_topbar">
        <ul>
            <% loop $Menu(1) %>
                <% if $MenuPosition != "footer" %>
                    <li class="<% if $LinkOrSection == "section" %> nav_link--active<% end_if %>">
                        <a href="$Link">$MenuTitle</a>
                    </li>
                <% end_if %>
            <% end_loop %>
        </ul>
        <div class="header_topbar_socials">
            <a href="https://twitter.com/NordlandPark" class="social_button"><img src="images/twitter_icon.png"></a>
            <a href="https://discord.gg/V3nCVXn" class="social_button"><img src="images/discord_icon.png"></a>
        </div>
        <div class="header_topbar_logo">
            <a href="/">
                <img src="images/NLP_LogoBannerWhite_SVG_wot.svg">
            </a>
            <% if $Locales %>
                    <% loop $Locales %>
                        <% if $LinkingMode != "current" %>
                            <li>&nbsp;</li>
                            <li class="$LinkingMode">
                                <a href="$Link.ATT" <% if $LinkingMode != 'invalid' %>rel="alternate"
                                   hreflang="$LocaleRFC1766"<% end_if %>>$URLSegment</a>
                            </li>
                        <% end_if %>
                    <% end_loop %>
                <% end_if %>
        </div>
    </div>

    <div class="header_mainbar">
        <nav class="header_mainbar_nav">
            <div class="nav_logo">
                <a href="" class="nav_brand_white">
                    <img src="images/NLP_LogoBannerWhite_SVG_wot.svg">
                </a>
                <a href="" class="nav_brand">
                    <img src="images/NLP_LogoBanner_SVG.svg">
                </a>
            </div>
            <div class="nav_menu">
                <ul>
                    <% loop $Menu(1) %>
                        <% if $MenuPosition != "footer" %>
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
        <a href="#" class="nav_brand">
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
                        <% if $MenuPosition != "footer" %>
                            <li class="<% if $LinkOrSection == "section" %> nav_link--active<% end_if %>">
                                <a href="$Link">$MenuTitle</a>
                            </li>
                        <% end_if %>
                    <% end_loop %>
                </ul>
            </div>
    </div>
</div>
