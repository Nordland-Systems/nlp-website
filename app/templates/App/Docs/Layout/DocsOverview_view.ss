<% if $DocsPermission || $VisibleToGuests %>
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
                <a class="link--button backbutton" href="$Top.Link"></a>
                <h1 class="header_text_title">$Title</h1>
            </div>
        </div>

        <div class="section section--docs_content">
            <div class="tableofcontents_wrap">
                <div class="tableofcontents" data-behaviour="tableofcontents">
                    <h2>Inhaltsverzeichnis</h2>
                </div>
            </div>
            <div class="section_content" data-behaviour="textContent">
                $Description
                <a href="{$Top.Link}pdf/$FormattedName" class="link--export" target="_blank">
                    <p>Als PDF exportieren</p>
                </a>
                <br>
                <br>
                <p>Zuletzt bearbeitet am $LastEdited.Format(d.m.Y HH:mm)</p>
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
