<% with $Attraction %>

    <div class="section section--attractions_headerimage">
        <% if $HeaderImage %>
            <div class="section_content">
                <div class="header_image_wrap">
                    <div class="header_image" style="background-image:url($HeaderImage.ScaleWidth(1400).Link)">
                    </div>
                </div>

                <div class="header_text">
                    <h1>$Title</h1>
                </div>
            </div>
        <% else %>
            <div class="section_content withoutimage">
                <div class="header_text">
                    <h1>$Title</h1>
                </div>
            </div>
        <% end_if %>
    </div>

    <div class="section section--attractions_view">
        <div class="section_content">
            <p class="attraction_attributes">ID: $AttractionID | Typ: $Type | Themenbereich: $Area</p>

            <div class="attraction_gallery">
                <% loop $GalleryImages.Limit(3) %>
                    <div class="item_gallery_image">
                        $Image.FocusFill(80,80)
                    </div>
                <% end_loop %>
            </div>
        </div>
    </div>

<% end_with %>
