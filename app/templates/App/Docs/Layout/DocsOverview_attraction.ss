<% with $Attraction %>
    <div class="section section--docs_header">
        <% if $HeaderImage %>
            <div class="section_content">
                <div class="header_image_wrap">
                    <div class="header_image" data-behaviour="parallax" data-speed="0.5" style="background-image:url($HeaderImage.ScaleWidth(1400).Link)">
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
            <div class="attraction_attributes centered">
                <% if $AttractionID %>
                    <div class="attribute">
                        <p class="title">ID:</p>
                        <p class="value">$AttractionID</p>
                    </div>
                <% end_if %>
                <% if $Type %>
                    <div class="attribute">
                        <p class="title">Typ:</p>
                        <p class="value">$Type</p>
                    </div>
                <% end_if %>
                <% if $Area %>
                    <div class="attribute">
                        <p class="title">Themenbereich:</p>
                        <p class="value">$Area</p>
                    </div>
                <% end_if %>
                <% if $Price %>
                    <div class="attribute">
                        <p class="title">Geplanter Preis:</p>
                        <p class="value">$Price</p>
                    </div>
                <% end_if %>
                <% if $Capacity %>
                    <div class="attribute">
                        <p class="title">Geplante Kapazität:</p>
                        <p class="value">$Capacity Besucher/Stunde</p>
                    </div>
                <% end_if %>
            </div>

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
                    <h2 class="info_name" data-behaviour="parent-toggle">$InfoTitle</h2>
                    <div class="info_content">
                        $InfoContent
                    </div>
                </div>
            <% end_loop %>
        </div>
    </div>

<% end_with %>
