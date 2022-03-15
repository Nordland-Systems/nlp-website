<% with $Doc %>
    <div class="section section--docs_image">
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
    <div class="section section--docs_content">
        <div class="section_content">
            $Description
        </div>
    </div>
<% end_with %>
