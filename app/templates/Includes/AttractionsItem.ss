<a class="attraction_item" href="$Link">
    <% if $HeaderImage %>
        <div class="item_image">
            $HeaderImage
        </div>
    <% end_if %>
    <h2 class="item_title">$Title</h2>
    <p class="item_id">$AttractionID ($Type in $Area)</p>
    <% if $GalleryImages %>
        <div class="item_gallery">
            <% loop $GalleryImages.Limit(3) %>
                <div class="item_gallery_image">
                    $Image.FocusFill(80,80)
                </div>
            <% end_loop %>
        </div>
    <% end_if %>
</a>
