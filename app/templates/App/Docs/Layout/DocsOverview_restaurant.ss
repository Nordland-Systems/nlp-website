<% if $DocsPermission || $VisibleToGuests %>
    <% with $Restaurant %>
        <div class="section section--docs_header">
            <% if $HeaderImage %>
                <div class="section_content">
                    <div class="header_image_wrap">
                        <div class="header_image" data-behaviour="parallax" data-speed="0.2" style="background-image:url($HeaderImage.FocusFill(1000,400).Link)">
                        </div>
                    </div>
                </div>
            <% end_if %>
        </div>

    <div class="section section--docs_title <% if not $HeaderImage %>noimage<% end_if %>">
            <div class="section_content">
                <a class="link--button backbutton" href="$Top.Link"></a>
                <h1 class="header_text_title">$Type: $Title</h1>
            </div>
        </div>

        <div class="section section--docs_attractionslist">
            <div class="section_content">
                $Description
                <div class="menu">
                    <h2>Speisekarte</h2>
                    <h3 class="centered">Essen:</h3>
                    <% if $Foods.Count > 0 %>
                        <div class="menu_list">
                            <% loop $Foods %>
                                <% include FoodCard %>
                            <% end_loop %>
                        </div>
                    <% else %>
                        <p class="centered">Kein Essen festgelegt.</p>
                    <% end_if %>
                    <h3 class="centered">Getränke:</h3>
                    <% if $Drinks.Count > 0 %>
                        <div class="menu_list">
                            <% loop $Drinks %>
                                <% include FoodCard %>
                            <% end_loop %>
                        </div>
                    <% else %>
                        <p class="centered">Keine Getränke festgelegt.</p>
                    <% end_if %>
                </div>
            </div>
        </div>
    <% end_with %>
    <div class="menu_legend">
        <p class="centered">V = Vegetarisch</p>
        <p class="centered">A = Vegan</p>
        <p class="centered">G = Glutenfrei</p>
        <p class="centered">L = Lactosefrei</p>
        <p class="centered">N = Nussfrei</p>
        <p class="centered">H = Halal</p>
        <br>
        <br>
        <br>
    </div>
<% else %>
    <div class="section section--docs_login">
        <div class="section_content">
            <h2>Keine Berechtigung!</h2>
            <p>Du hast keine Berechtigung diesen Inhalt anzusehen.</p>
            <a href="admin">Bitte logge dich ein</a>
        </div>
    </div>
<% end_if %>
