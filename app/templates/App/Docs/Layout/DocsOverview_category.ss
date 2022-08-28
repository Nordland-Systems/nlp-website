<% if $DocsPermission || $VisibleToGuests %>
    <% with $Category %>
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
                <a class="link--button backbutton" href="$Top.Link"></a>
                <h1 class="header_text_title">$Title</h1>
            </div>
        </div>

        <div class="section section--docs_category">
            <div class="section_content">
                $Description
                <h3>Einträge:</h3>
                <div class="docs_list">

                    <% loop $Docs.Filter('VisibleToDreamteam','1') %>
                        <a href="$Top.Link('view')/$FormattedName" class="list_item link--button hollow white $Status">
                            <p class="list_item_title">$Title</p>
                            <p class="list_item_flair $Status">$Status</p>
                        </a>
                    <% end_loop %>
                </div>
            </div>
        </div>
    <% end_with %>
<% else %>
    <div class="section section--docs_login">
        <div class="section_content">
            <h2>Keine Berechtigung!</h2>
            <p>Du hast keine Berechtigung diesen Inhalt anzusehen.</p>
            <a href="admin">Bitte logge dich ein</a>
        </div>
    </div>
<% end_if %>
