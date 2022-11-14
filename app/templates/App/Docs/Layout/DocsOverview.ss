<% if $DocsPermission || $VisibleToGuests %>
    <div class="section section--docs_navigation">
        <div class="section_content">
            <a href="#Docs">Docs</a>
            <a href="#Areas">Themenbereiche</a>
            <a href="#Targetgroups">Zielgruppen</a>
            <a href="#Attractions">Attraktionen</a>
            <a href="#Restaurants">Restaurants</a>
            <a href="#Characters">Charaktere</a>
            <p class="nav_menu">Navigation</p>
        </div>
    </div>

    <div class="section section--docs_categorylist">
        <div class="section_content">
            <a class="anchor" id="Docs"></a>
            <h2 class="centered">Docs</h2>
            <div class="categorylist">
                <% loop DocsCategories.Filter('VisibleToDreamteam','1') %>
                    <% if $Top.DocsPermission %>
                        <% if $Docs.Filter('VisibleToDreamteam','1').Count > 0 %>
                            <div class="docs_category">
                                <a href="$Top.Link('category')/$ID">
                                    <h2 class="white centered">$Title</h2>
                                </a>
                                <div class="docs_list">
                                    <% loop $Docs.Filter('VisibleToDreamteam','1').Sort("Title", "ASC").Limit(5) %>
                                        <a href="$Top.Link('view')/$FormattedName" class="list_item link--button hollow white $Status">
                                            <p class="list_item_title">$Title</p>
                                            <p class="list_item_flair $Status">$Status</p>
                                        </a>
                                    <% end_loop %>
                                    <% if $Docs.Filter('VisibleToDreamteam','1').Count > 5 %>
                                        <a href="$Top.Link('category')/$FormattedName" class="list_more white centered $Status">Mehr $Title ></a>
                                    <% end_if %>
                                </div>
                            </div>
                        <% end_if %>
                    <% else_if $Docs.Filter('VisibleToGuests','1').Count > 0 %>
                        <div class="docs_category">
                            <a href="$Top.Link('category')/$ID">
                                <h2 class="white centered">$Title</h2>
                            </a>
                            <div class="docs_list">
                                <% loop $Docs.Filter("VisibleToGuests", "1").Sort("Title", "ASC").Limit(5) %>
                                    <a href="$Top.Link('view')/$FormattedName" class="list_item link--button hollow white $Status">
                                        <p class="list_item_title">$Title</p>
                                        <p class="list_item_flair $Status">$Status</p>
                                    </a>
                                <% end_loop %>
                                <% if $Docs.Filter("VisibleToGuests", "1").Count > 5 %>
                                    <a href="$Top.Link('category')/$FormattedName" class="list_more white centered $Status">Mehr $Title ></a>
                                <% end_if %>
                            </div>
                        </div>
                    <% end_if %>
                <% end_loop %>
            </div>
        </div>
    </div>
    <% if $DocsPermission %>
        <div class="section section--docs_attractionslist">
            <div class="section_content">

                <div class="search_bar" id="search-experience-bar">
                    <input type="text" name="search" id="search-docs" placeholder="Suche nach bestimmten Docs..." />
                </div>

                <div class="area_wrap" data-behaviour="searchable">
                    <a class="anchor" id="Areas"></a>
                    <h2 class="centered">Themenbereiche</h2>
                    <div class="area_list">
                        <% loop Areas.Filter("VisibleToDreamteam","1") %>
                            <a href="$Top.Link('area')/$FormattedName" class="area_item" data-behaviour="searchable">
                                <% if $Image %>
                                    <div class="item_image">
                                        $Image.FocusFill(200, 50)
                                    </div>
                                <% end_if %>
                                <h2 class="item_title white">$Title</h2>
                            </a>
                        <% end_loop %>
                    </div>
                </div>

                <div class="area_wrap" data-behaviour="searchable">
                    <a class="anchor" id="Targetgroups"></a>
                    <h2 class="centered">Zielgruppen</h2>
                    <div class="area_list">
                        <% loop Targetgroups %>
                            <a href="$Top.Link('targetgroup')/$FormattedName" class="area_item" data-behaviour="searchable">
                                <% if $Image %>
                                    <div class="item_image">
                                        $Image.FocusFill(200, 50)
                                    </div>
                                <% end_if %>
                                <h2 class="item_title white">$Title</h2>
                            </a>
                        <% end_loop %>
                    </div>
                </div>

                <div class="area_wrap" data-behaviour="searchable">
                    <a class="anchor" id="Attractions"></a>
                    <h2 class="centered">Attraktionen</h2>
                    <div class="attractions">
                        <% loop Attractions.Filter("VisibleToDreamteam","1") %>
                            <% include AttractionCard Parent=$Top %>
                        <% end_loop %>
                    </div>
                </div>

                <div class="area_wrap" data-behaviour="searchable">
                    <a class="anchor" id="Restaurants"></a>
                    <h2 class="centered">Restaurants</h2>
                    <div class="restaurants">
                        <% loop Restaurants.Filter("VisibleToDreamteam","1") %>
                            <% include RestaurantCard Parent=$Top %>
                        <% end_loop %>
                    </div>
                </div>

                <div class="area_wrap" data-behaviour="searchable">
                    <a class="anchor" id="Characters"></a>
                    <h2 class="centered">Charaktere</h2>
                    <div class="area_list">
                        <% loop Characters.Filter("VisibleToDreamteam","1") %>
                            <a href="$Top.Link('character')/$FormattedName" class="area_item" data-behaviour="searchable">
                                <% if $Image %>
                                    <div class="item_image">
                                        $Image.FocusFill(200, 50)
                                    </div>
                                <% end_if %>
                                <h2 class="item_title white">$Title</h2>
                            </a>
                        <% end_loop %>
                    </div>
                </div>
            </div>
        </div>
    <% else_if Attractions.Filter("VisibleToGuests","1").Count > 0 %>
        <div class="section section--docs_attractionslist">
            <div class="section_content">

                <div class="area_wrap" data-behaviour="searchable">
                    <a class="anchor" id="Attractions"></a>
                    <h2 class="centered">Attraktionen</h2>
                    <div class="attractions">
                        <% loop Attractions.Filter("VisibleToDreamteam","1") %>
                            <% include AttractionCard Parent=$Top %>
                        <% end_loop %>
                    </div>
                </div>
            </div>
        </div>
    <% else %>
        <div class="section section--docs_login">
            <div class="section_content">

                <a class="anchor" id="Attractions"></a>
                <h2 class="centered">Attraktionen</h2>
                <h3 class="centered">Aktuell sind noch keine geplanten Attraktionen öffentlich</h3>
                <br>
                <a href="admin" class="link--button hollow centered">Logge dich ein um Attraktionen zu sehen</a>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    <% end_if %>

    $Form

    $ElementalArea
<% else %>
    <div class="section section--docs_login">
        <div class="section_content">
            <h2>Keine Berechtigung!</h2>
            <p>Du hast keine Berechtigung diesen Inhalt anzusehen.</p>
            <a href="admin">Bitte logge dich ein</a>
        </div>
    </div>
<% end_if %>
