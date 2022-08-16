<% if $DocsPermission || $VisibleToGuests %>
    <div class="section section--docs_categorylist">
        <div class="section_content">
            <h2 class="centered">Kategorien</h2>
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
                                        <a href="$Top.Link('view')/$FormattedName" class="list_item link--button hollow white">$Title</a>
                                    <% end_loop %>
                                    <% if $Docs.Filter('VisibleToDreamteam','1').Count > 5 %>
                                        <a href="$Top.Link('category')/$FormattedName" class="list_more white centered">Mehr $Title ></a>
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
                                    <a href="$Top.Link('view')/$FormattedName" class="list_item link--button hollow white">$Title</a>
                                <% end_loop %>
                                <% if $Docs.Filter("VisibleToGuests", "1").Count > 5 %>
                                    <a href="$Top.Link('category')/$FormattedName" class="list_more white centered">Mehr $Title ></a>
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
                <h2 class="centered">Attraktionen</h2>
                <% loop Attractions.Filter("VisibleToDreamteam","1") %>
                    <a href="$Top.Link('attraction')/$FormattedName" class="attraction_item">
                        <% if $HeaderImage %>
                            <div class="item_image">
                                $HeaderImage.FocusFill(300, 200)
                            </div>
                        <% end_if %>
                        <% if $SvgIcon %>
                            <div class="item_icon">
                                <img src="$SvgIcon.Url">
                            </div>
                        <% end_if %>
                        <h2 class="item_title white">$Title</h2>
                        <p class="item_id white">$AttractionID (<% if $Type %> $Type <% end_if %> <% if $Area %> in $Area <% end_if %>)</p>
                        <% if PhotoGalleryImages %>
                            <div class="item_gallery">
                                <% loop PhotoGalleryImages.Limit(3) %>
                                    <div class="item_gallery_image">
                                        $Image.FocusFill(80,80)
                                    </div>
                                <% end_loop %>
                            </div>
                        <% end_if %>
                    </a>
                <% end_loop %>
            </div>
        </div>
    <% else_if Attractions.Filter("VisibleToGuests","1").Count > 0 %>
        <div class="section section--docs_attractionslist">
            <div class="section_content">
                <h2 class="centered">Attraktionen</h2>
                <% loop Attractions.Filter("VisibleToDreamteam","1") %>
                    <a href="$Top.Link('attraction')/$FormattedName" class="attraction_item">
                        <% if $HeaderImage %>
                            <div class="item_image">
                                $HeaderImage.FocusFill(300, 200)
                            </div>
                        <% end_if %>
                        <% if $SvgIcon %>
                            <div class="item_icon">
                                <img src="$SvgIcon.Url">
                            </div>
                        <% end_if %>
                        <h2 class="item_title white">$Title</h2>
                        <p class="item_id white">$AttractionID (<% if $Type %> $Type <% end_if %> <% if $Area %> in $Area <% end_if %>)</p>
                        <% if PhotoGalleryImages %>
                            <div class="item_gallery">
                                <% loop PhotoGalleryImages.Limit(3) %>
                                    <div class="item_gallery_image">
                                        $Image.FocusFill(80,80)
                                    </div>
                                <% end_loop %>
                            </div>
                        <% end_if %>
                    </a>
                <% end_loop %>
            </div>
        </div>
    <% else %>
        <div class="section section--docs_login">
            <div class="section_content">
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
