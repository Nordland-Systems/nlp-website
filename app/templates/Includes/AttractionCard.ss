<a href="$Parent.Link('attraction')/$FormattedName" class="attraction_item" data-behaviour="searchable">
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
