<% with $Doc %>
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
            <a class="link--button centered" href="$Top.Link"> Zurück zu den Docs</a>
            <h1 class="header_text_title centered">$Title</h1>
        </div>
    </div>

    <div class="section section--docs_content">
        <div class="section_content">
            $Description
        </div>
    </div>

<% end_with %>
