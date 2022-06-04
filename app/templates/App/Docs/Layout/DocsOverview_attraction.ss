<% with $Attraction %>
    <div class="section section--docs_header">
        <% if $HeaderImage %>
            <div class="section_content">
                <div class="header_image_wrap">
                    <div class="header_image" style="background-image:url($HeaderImage.ScaleWidth(1400).Link)">
                    </div>
                </div>
            </div>
        <% end_if %>
    </div>

    <div class="section section--docs_title">
        <div class="section_content">
            <a class="link--button centered" href="$Top.Link"> Zurück zu den Docs</a>
            <h1 class="header_text_title centered">$Title</h1>
            <% if $SvgIcon %>
                <div class="attraction_icon">
                    <img src="$SvgIcon.Url">
                </div>
            <% end_if %>
        </div>
    </div>

    <div class="section section--docs_attraction">
        <div class="section_content">
            <p class="attraction_attributes centered">ID: $AttractionID | Typ: $Type | Themenbereich: $Area</p>

            <% if PhotoGalleryImages %>
                <div class="attraction_gallery">
                    <% loop PhotoGalleryImages %>
                        <div class="item_gallery_image">
                            <a data-gallery="gallery" data-glightbox="description: $Title" data-caption="$Title" href="$Image.FitMax(2000,2000).URL"><img src="$Image.FocusFill(200,200).URL" /></a>
                        </div>
                    <% end_loop %>
                </div>
            <% end_if %>

            <% loop AttractionInfos %>
                <div class="attraction_info">
                    <h2>$InfoTitle</h2>
                    $InfoContent
                </div>
            <% end_loop %>
        </div>
    </div>

<% end_with %>
