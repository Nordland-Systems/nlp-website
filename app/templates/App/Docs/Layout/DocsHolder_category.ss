<% with $DocCategory %>
    <div class="section section--docs_category">
        <% if $Image %>
            <div class="section_header">
                <div class="header_image_wrap">
                    <div class="header_image" style="background-image:url($Image.ScaleWidth(1400).Link)">
                    </div>
                </div>
                
                <div class="header_text">
                    <h1>Kategorie: $Title</h1>
                </div>
            </div>
        <% else %>
            <div class="section_header header--withoutimage">            
                <div class="header_text">
                    <h1>Kategorie: $Title</h1>
                </div>
            </div>
        <% end_if %>
        <div class="section_content">
            $Description
            <div class="docs_list">
                <% loop $Docs %>
                    <div class="list_item">
                        <a href="$Top.Link('view')/$ID"><h4>$Title</h4></a>
                    </div>
                <% end_loop %>
            </div>
        </div>
    </div>
<% end_with %>