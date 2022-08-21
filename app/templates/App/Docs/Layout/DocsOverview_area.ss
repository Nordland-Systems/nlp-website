<% if $DocsPermission || $VisibleToGuests %>
    <% with $Area %>
        <div class="section section--docs_header">
            <% if $Image %>
                <div class="section_content">
                    <div class="header_image_wrap">
                        <div class="header_image" data-behaviour="parallax" data-speed="0.2" style="background-image:url($Image.ScaleWidth(1400).Link)">
                        </div>
                    </div>
                </div>
            <% end_if %>
        </div>

        <div class="section section--docs_title">
            <div class="section_content">
                <a class="link--button backbutton" href="$Top.Link"></a>
                <h1 class="header_text_title">$Title</h1>
            </div>
        </div>

        <div class="section section--docs_attractionslist">
            <div class="section_content">
                $Description
                <div class="docs_list">
                    <h3>Attraktionen:</h3>
                    <% loop $AllAttractions.Filter('VisibleToDreamteam','1') %>
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
                            <p class="item_id white">$AttractionID (<% if $Type %> $Type <% end_if %>)</p>
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
        </div>
    <% end_with %>
<% else %>
    <div class="section section--docs_login">
        <div class="section_content">
            <h2>Keine Berechtigung!</h2>
            <p>Du hast keine Berechtigung diesen Inhalt anzusehen.</p>
            <a href="admin">Bitte logge dich ein</a>
        </div>
    </div>
<% end_if %>
