<% with $Attraction %>
    <div class="section section--docs_header">
        <% if $HeaderImage %>
            <div class="section_content">
                <div class="header_image_wrap">
                    <div class="header_image" data-behaviour="parallax" data-speed="0.2" style="background-image:url($HeaderImage.FocusFill(1400,400).Link)">
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

            <% if PhotoGalleryImages %>
                <div class="attraction_gallery">
                    <% loop PhotoGalleryImages %>
                        <div class="item_gallery_image">
                            <a data-gallery="gallery" data-glightbox="description: $Title" data-caption="$Title" href="$Image.FitMax(2000,2000).URL"><img src="$Image.FocusFill(200,200).URL" /></a>
                        </div>
                    <% end_loop %>
                </div>
            <% end_if %>

            <div class="attraction_text">
                $Description
            </div>

            <div class="attraction_attributes centered">
                <% if $AttractionID %>
                    <div class="attribute">
                        <img class="title" src="_resources/app/client/icons/id.svg">
                        <p class="value">$AttractionID</p>
                    </div>
                <% end_if %>
                <% if $Type %>
                    <div class="attribute">
                        <img class="title" src="_resources/app/client/icons/type.svg">
                        <p class="value">$Type</p>
                    </div>
                <% end_if %>
                <% if $Area %>
                    <div class="attribute">
                        <img class="title" src="_resources/app/client/icons/area.svg">
                        <p class="value">$Area</p>
                    </div>
                <% end_if %>
                <% if $Price %>
                    <div class="attribute">
                        <img class="title" src="_resources/app/client/icons/price.svg">
                        <p class="value">$Price</p>
                    </div>
                <% end_if %>
                <% if $Capacity %>
                    <div class="attribute">
                        <img class="title" src="_resources/app/client/icons/capacity.svg">
                        <p class="value">$Capacity Besucher/Stunde</p>
                    </div>
                <% end_if %>
            </div>

            <div class="attraction_infolist">
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
    </div>

<% end_with %>
