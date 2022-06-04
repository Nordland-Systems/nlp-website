<div class="section section--docs_header">
    <% if $Image %>
        <div class="section_content">
            <div class="header_image_wrap">
                <div class="header_image" data-behaviour="parallax" data-speed="0.5" style="background-image:url($Image.ScaleWidth(1400).Link)">
                </div>
            </div>
        </div>
    <% end_if %>
</div>

<div class="section section--docs_title">
    <div class="section_content">
        <h1 class="header_text_title centered">$Title</h1>
    </div>
</div>

<div class="section section--docs_categorylist">
    <div class="section_content">
        <h2 class="centered">Kategorien</h2>
        <div class="categorylist">
            <% loop getDocsCategories.Filter('Visible','1') %>
                <% if $Docs.Filter('Visible','1') %>
                    <div class="docs_category">
                        <a href="$Top.Link('category')/$ID">
                            <h2 class="white centered">$Title</h2>
                        </a>
                        <div class="docs_list">
                            <% loop $Docs.Sort("Title", "ASC").Limit(5) %>
                                <a href="$Top.Link('view')/$ID" class="list_item link--button hollow white">$Title</a>
                            <% end_loop %>
                            <% if $Docs.Count > 1 %>
                                <a href="$Top.Link('category')/$ID" class="list_more white centered">Mehr $Title ></a>
                            <% end_if %>
                        </div>
                    </div>
                <% end_if %>
            <% end_loop %>
        </div>
    </div>
</div>

<div class="section section--docs_attractionslist">
    <div class="section_content">
        <h2 class="centered">Attraktionen</h2>
        <% loop Attractions %>
            <a href="$Top.Link('attraction')/$ID" class="attraction_item">
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
                <h2 class="item_title">$Title</h2>
                <p class="item_id">$AttractionID (<% if $Type %> $Type <% end_if %> <% if $Area %> in $Area <% end_if %>)</p>
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

$ElementalArea
