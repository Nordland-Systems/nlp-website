<div class="section section--attractions_headerimage">
    <% if $Image %>
        <div class="section_content">
            <div class="header_image_wrap">
                <div class="header_image" style="background-image:url($Image.ScaleWidth(1400).Link)">
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
<div class="section section--attractions_overview">
    <div class="section_content">
        <% loop Attractions %>
            <% include AttractionsItem %>
        <% end_loop %>
    </div>
</div>
