<% with $Category %>
    <div class="section section--docs_header">
        <% if $Image %>
            <div class="section_content">
                <div class="header_image_wrap">
                    <div class="header_image" style="background-image:url($Image.ScaleWidth(1400).Link)">
                    </div>
                </div>
            </div>
        <% end_if %>
    </div>

    <div class="section section--docs_title">
        <div class="section_content">
            <a class="link--button centered" href="$Top.Link"> Zurück zu den Docs</a>
            <h1 class="header_text_title centered">$Title</h1>
        </div>
    </div>

    <div class="section section--docs_category">
        <div class="section_content">
            $Description
            <div class="docs_list">
                <h3>Einträge:</h3>
                <% loop $Docs %>
                    <a class="link--button" href="$Top.Link('view')/$ID">$Title</a>
                <% end_loop %>
            </div>
        </div>
    </div>
<% end_with %>